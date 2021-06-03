<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;
use File;
use App\Jobimage;
use App\Jobvideo;
use App\Application;
use Auth;
use Carbon\Carbon;
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
        $populars=Job::withCount('applications')->orderBy('applications_count')->where([['application_id',null],['due','>',Carbon::now()]])->take(5)->get();
        $tags=Category::inRandomOrder()->get();
        $jobs=Job::with('user')->where([['application_id',null],['due','>',Carbon::now()]])->latest()->paginate(4);
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
               if($user->user_type === "seeker"){
                abort(403,'Please Update Your Profile To A Job Recruiter Or Both! Job Seekers Cannot Post Jobs !');
               }else{
                $job->save();
               }
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
                   return redirect()->route('job.show',$job->slug)->with('success',' Your Job has been submitted');

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
    public function show($slug)
    {
        $job=Job::whereSlug($slug)->first();
        // dd($job);
        $tags=Category::inRandomOrder()->get();
        $sameLocation=Job::where('location','%like%', $job->location)->inRandomOrder()->where([['application_id',null],['due','>',Carbon::now()]])->take(5)->get();
        $otherJobs=Job::where([['application_id',null],['due','>',Carbon::now()],['id','!=',$job->id]])->inRandomOrder()->limit(5)->get();
    return view('job.show')->with(compact('job','otherJobs','tags','sameLocation'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit( $slug)
    {
        $job=Job::whereSlug($slug)->first();
        $this->authorize('update',$job);
        $categories=Category::get();

        return view('job.edit',['job'=>$job,'categories'=>$categories]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $slug)
    {
        $job=Job::whereSlug($slug)->first();
        //    dd($job);

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
            //    $job=Job::whereSlug($slug)->first();
            //    dd($job);

               $user=Auth::user();
               $job->user()->associate(Auth::id());
            //    $job->reference=uniqid();
               $job->title=$request->title;
               $job->slug=SlugService::createSlug(Job::class,'slug',$request->title);
               $job->description=$request->description;
               $job->work_to_do=$request->work;
               $job->location=$request->location;
               $job->address=$request->address;
               $job->due=$request->due;
               $job->update();

            if($request->hasFile('photo')){

                // if($job->images){
                //     unlink('/images/job_image/'.$job->images);
                //     $job->images()->delete('images');
                // }


            $file_path ='images/job_image/'.$job->images;
            if(file::exists($file_path)){
                @unlink($file_path);
                }
                //  dd($file_path);

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

               if($job->update()){

               if($request->category_id){
                $category=Category::find($request->category_id);
             $job->categories()->sync($category);
            }
                   return redirect()->route('job.show',$job->slug)->with('success ','Your Job has been submitted');

               }
               else{
                   return redirect()->route('job.create')->with('failure','FAILED');
               }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($slug)
    {
        $job=Job::whereSlug($slug)->first();
        // $this->authorize('delete',$id);
        // $deleteJob =Job::findOrFail($id);
        // if(file_exists('images/job_image/'))
        // {
        //     @unlink('images/job_image/');
        // }
        // // if($deleteJob->images){
        // //             unlink('images/job_image/'.$deleteJob->Jobimage->images);
        // //             $deleteJob->images()->delete();
        // //         }
        //         // dd($deleteJob);
        // $deleteJob->delete('');
        $job->delete();

        return redirect()->route('job.index')->with('success','Your Question Has been delete');
    }
    public function job($slug)
    {
        $job=Job::whereSlug($slug)->first();
        $jobs=Job::where('user_id',Auth::user()->id)->latest()->paginate(4);
        return view('job.myjobs',compact('jobs'));
    }


    public function myJobs(Request $request)
    {

       if($request->ajax()){
         $data=Job::where('user_id',Auth::user()->id)->latest()->get();
           return datatables::of($data)->addIndexColumn()->addColumn('action',function(Job $job){

            // $job=Job::whereSlug($slug)->first();
            // dd($job);
               $actionBtn='<a href="'.$job->slug.'" class="edit btn btn-success btn-sm">View</a>';
               return $actionBtn;
           })->rawColumns(['action'])->make(true);

        }
       return view('job.myjobs');
    }
    public function approved(Request $request)
    {
        if($request->ajax()){
            $data=Job::where([['user_id',Auth::user()->id],['application_id','!=',null]])->latest()->get();
              return datatables::of($data)->addIndexColumn()->addColumn('action',function(Job $job){

               // $job=Job::whereSlug($slug)->first();
               // dd($job);
                  $actionBtn='<a href="'.$job->slug.'" class="edit btn btn-success btn-sm">View</a>';
                  return $actionBtn;
              })->rawColumns(['action'])->make(true);
          }

          return view('job.approved');
    }
    // public function pending(Request $request)
    // {
    //     if($request->ajax()){
    //         $data=Job::where([['user_id',Auth::user()->id],['application_id',null]])->latest()->get();
    //           return datatables::of($data)->addIndexColumn()->addColumn('action',function(Job $job){

    //            // $job=Job::whereSlug($slug)->first();
    //            // dd($job);
    //               $actionBtn='<a href="'.$job->slug.'" class="edit btn btn-success btn-sm">View</a>';
    //               return $actionBtn;
    //           })->rawColumns(['action'])->make(true);
    //       }

    //       return view('job.pending');
    // }
    public function exipired(){
        // $job=Job::whereSlug($slug)->first();
        $jobs=Job::with('user')->where([['user_id','==',Auth::user()->id],['application_id',null]])->latest()->paginate(10);
        return view('job.expired',compact('jobs'));
    }

    public function expired(){
        // $job=Job::whereSlug($slug)->first();
        $ExpriredJobs=Job::with('user')->where([['application_id',null],['due','>',Carbon::now()]])->latest()->paginate(10);

        // $this->job=$job='Expired';
        //     $this->supdate();
        return view('job.expired',compact('ExpriredJobs'));
    }
    public function applications($slug)
    {
       $job=Job::with('applications','user')->whereSlug($slug)->first();
        $applications=$job->applications()->latest()->paginate(5);
       return view('job.applications',compact('job','applications'));

    }


}
