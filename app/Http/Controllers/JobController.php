<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;
use App\Jobimage;
use App\Jobvideo;
use App\Application;
use Auth;
use DataTables;
use Illuminate\Support\Arr;
use Illuminate\Support\Str;
use Cviebrock\EloquentSluggable\Services\SlugService;
class JobController extends Controller
{
    public function __construct()
 {
     $this->middleware('auth',['except'=>['index','show']]);
 }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $populars=Job::inRandomOrder()->with('applications')
        // take(5)
        ->get();
        // $applications=$job->applications()->latest()->paginate(5);

        $popular_jobs= Application::inRandomOrder()->where('job_id','>',5)->take(5)->get();
        $tags=Category::inRandomOrder()->get();
        $jobs=Job::with('user')->where('application_id',null)->latest()->paginate(4);
        return view('job.index',compact('jobs','tags','populars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $category=Category::pluck('job','id');
        return view('job.create',compact('category'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,[
            'title'=>'required|max:255|min:10',
            'description'=>'required|min:100',
            'work'=>'required|min:50',
            'location'=>'required',
            'address'=>'required',
            'due'=>'required|date',
            'photo.*'=>'sometimes','mimes:jpeg,png,jpg|max:2048|nullable',
            'video.*'=>'sometimes','mimetypes:video/avi,video/mpeg,video/quicktime|max:12048|nullable',
               ]);
               $job=new Job();
               $user=Auth::user();
               $job->user()->associate(Auth::id());
               $job->reference=uniqid();
               $job->title=$request->title;
            //    $job->slug=str::slug($request->title);
               $job->slug=SlugService::createSlug(Job::class,'slug',$request->title);
               $job->description=$request->description;
               $job->work_to_do=$request->work;
               $job->location=$request->location;
               $job->address=$request->address;
               $job->due=$request->due;
               $job->save();
            if($request->hasFile('photo')){
                $files=$request->file('photo');
                foreach($files as $file){
                    $name=uniqid($user->id."_").".".$file->getClientOriginalExtension();
                       $file->move('images/job_image/',$name);
                $job_image= new Jobimage();
                $job_image->job_id=$job->id;
                $job_image->images=$name;
                $job_image->save();
                }
            }
            if($request->hasFile('video')){
                $files=$request->file('video');
                foreach($files as $file){
                    $name=uniqid($user->id."_").".".$file->getClientOriginalExtension();
                       $file->move('video/job_video/',$name);
                $job_video= new Jobvideo();
                $job_video->job_id=$job->id;
                $job_video->videos=$name;
                $job_video->save();
                }
            }

               if($job->save()){

               if($request->category_id){
                $category=Category::find($request->category_id);
             $job->categories()->sync($category);
            }
                   return redirect()->route('job.show',$job->id)->with('success','Your Job has been submitted');

               }
               else{
                   return redirect()->route('job.create')->with('failure','FAILED');
               }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Job $job)
    {
        $tags=Category::inRandomOrder()->get();
        $sameLocation=Job::where('id',$job)->get();
   $otherJobs=Job::where('application_id',null)->inRandomOrder()->limit(5)->get();
    return view('job.show')->with(compact('job','otherJobs','tags','sameLocation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Job $job)
    {
        $this->authorize('update',$job);
        $categories=Category::latest()->get();
        $jc=array();
        foreach($job->categories as $c){
            $jc[]=$c->id;
        }
        $filtered=Arr::except($categories,$jc);
        return view('job.edit',['job'=>$job,'categories'=>$categories, 'filtered'=>$filtered]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Job $job)
    {
        $this->authorize('delete',$job);
        $job->delete();
        return redirect()->route('job.index')->with('success','Your Question Has been delete');
    }
    public function job(Job $job)
    {

        $jobs=Job::where('user_id',Auth::user()->id)->latest()->paginate(4);
        return view('job.myjobs',compact('jobs'));
    }



    public function myJobs(Job $job,Request $request)
    {
       if($request->ajax()){
         $data=Job::where('user_id',Auth::user()->id)->latest()->get();
           return datatables::of($data)
           ->addIndexColumn()
           ->addColumn('action',function(Job $job){
               $actionBtn='<a href="'.$job->id.'" class="edit btn btn-success btn-sm">View</a>';
               return $actionBtn;
           })
           ->rawColumns(['action'])
           ->make(true);
       }
       return view('job.myjobs');
    }
    public function applications($id)
    {
       $job=Job::with('applications','user')->findOrFail($id);
        $applications=$job->applications()->latest()->paginate(5);
       return view('job.applications',compact('job','applications'));

    }


}
