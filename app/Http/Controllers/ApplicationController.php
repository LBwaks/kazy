<?php

namespace App\Http\Controllers;

use App\Application;

use App\Job;
use App\User;
use DataTables;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
class ApplicationController extends Controller
{
    public function __construct()
 {
     $this->middleware('auth',['except'=>['']]);
 }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Job $job, Application $application)
    {
    //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug,Application $application)
    {
        // dd($slug);
        $job=Job::whereSlug($slug)->first();
// dd($job);
        $otherJobs=Job::where([['application_id',null],['due','>',Carbon::now()]])->inRandomOrder()->limit(7)->get();
        return view('applications.create',compact('job','otherJobs'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store($slug,Application $application,Request $request)
    {
        $job=Job::whereSlug($slug)->first();
// dd($job);
        $request->validate([

            'availability'=>'required',
            'charge'=>'required|numeric',
            'duration'=>'required|numeric',
            'time'=>'required'
        ]);

        $user=Auth::user();
//  dd($job->);
        if($user->id !== $job->user_id){
            if(Application::where('job_id',$job->id)->where('user_id',$user->id)->count()){

                abort(403,'You have Already Applied For This Job');
            }
            else{
                $application=$job->applications()->create([

                    'time_available'=>$request->availability,
                    'slug'=>SlugService::createSlug(Application::class,'slug',$request->charge),
                    'time'=>$request->time,
                      'charge'=>$request->charge,
                     "duration"=>$request->duration,
                      'user_id'=>\Auth::id()]);
            }

        if($application)
        {
            return redirect()->route('job.index')->with('success', '   Application Successful!');
        }
    }else{
        abort(403,'You Cannot Apply  Your Own Job');
    }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job,Application $application)
    {
        // $jobb=Job::findOrFail($job);
        // $job=Job::whereSlug('job'->slug)->first();
        // ['job'=> $application->job->slug,
        // $application=Application::whereSlug($slug);
        return view('applications.show')->with(compact('application','job'));
        // dd($jobb);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit($slug,Application $application)
    {
        $job=Job::whereSlug($slug);
        $otherJobs=Job::where('application_id',null)->inRandomOrder()->limit(7)->get();
        return view('applications.edit',compact('application','job','otherJobs'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update($slug, Application $application ,Request $request)
    {
        $job=Job::whereSlug($slug);
       $this->validate($request,[
           'availability'=>'required',
           'charge'=>'required|numeric',
           'duration'=>'required|numeric',
           'time'=>"required",
       ]);
    //    $input=$request->all();
    //    $input['user_id']= $user->Auth::id();

    //    dd($input);
        $application->update([

            'time_available'=>$request->availability,
            'time'=>$request->time,
              'charge'=>$request->charge,
             "duration"=>$request->duration,
              'user_id'=>\Auth::id()]);
            //   dd($application);
        if($application)
       {
           return redirect()->route('job.applications.show',['job'=>$application->job_id,'application'=>$application->id])->with('success','Application Update Successfully');
       }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job,Application $application)
    {
       $application->delete();
       return redirect()-route('job.show',$job)->with('success','Your Application Has Been Deleted');
    }

    public function cancel(Job $job,Application $application)
    {
    //    $application->delete();
    //    return back()->with('success','Your Application Has Been Deleted');
    }

     public function pending(Request $request)
     {

        if($request->ajax()){

            $where=['user_id'=>Auth::user()->id,'approved'=>'No'];
            $data=Application::with('user')->with('job')->where($where)->latest()->get();
              return datatables::of($data)
              ->addIndexColumn()
              ->addColumn('action',function(Application $application){
                //   $application_id=$application->job_id;
                //   $job=Job::where('id',$application_id)->get();
                // $job_id=Job::findOrFail($application_id);
                // $job_slug=Job::where(i)
                // return '<a href="'.route('job.applications.show',['job'=> $application->job->slug, 'application' => $application->slug]).'

                return '<a href="'.route('job.applications.show',['job'=> $application->job_id, 'application' => $application->id]).'
                " class="edit btn btn-success btn-sm">View Application</a>';
              })
              ->rawColumns(['action'])
              ->make(true);
          }
          return view('applications.pending');
     }


     public function failed(Request $request)
     {
        if($request->ajax()){
            $where=['user_id'=>Auth::user()->id,'approved'=>'Failed'];
            $data=Application::with('user')->where($where)->latest()->get();
              return datatables::of($data)
              ->addIndexColumn()
              ->addColumn('action',function($application){
                return '<a href="'.route('job.applications.show',['job'=> $application->job_id, 'application' => $application->id]).'" class="edit btnd btn-success btn-sm">View Application</a>';

              })
              ->rawColumns(['action'])
              ->make(true);
          }
          return view('applications.failed');
     }

public function approved(Request $request, Application $application)
{
    if($request->ajax()){
        $where=['user_id'=>Auth::user()->id,'approved'=>'Approved'];
        $data=Application::where($where)->latest()->get();
          return datatables::of($data)
          ->addIndexColumn()
          ->addColumn('action',function($application){
            return '<a href="'.route('job.applications.show',['job'=> $application->job_id, 'application' => $application->id]).'" class="edit btnd btn-success btn-sm">View Application</a>';

          })
          ->rawColumns(['action'])
          ->make(true);
      }
    return view('applications.approved');
}



     public function applicant(Application $application){
$application=Application::with('user')->findOrFail($application);
//         // $user=User::findOrFail($user);
//       $application=Application::findOrFail($application);
// // dd($user);
dd($application);
        return view('users.applicant',compact('application','user'));
    }

//     $job=Job::with('applications','user')->findOrFail($id);
//     $applications=$job->applications()->latest()->paginate(5);
//    return view('job.applications',compact('job','applications'));
}
