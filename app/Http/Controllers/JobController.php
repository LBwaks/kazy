<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Job;
use App\Category;
use App\Jobimage;
use App\Application;
use Auth;
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
        $jobs=Job::with('user')->latest()->paginate(4);
        $job_image=Jobimage::with('images');
        return view('job.index',compact('jobs','job_image'));
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
            'title'=>'required|max:255|min:25',
            'description'=>'required|min:100',
            'location'=>'required',
            'address'=>'required',
            'due'=>'required',
            'photo.*'=>'sometimes','mimes:jpeg,png,jpg|max:2048|nullable',
               ]);
               $job=new Job();
               $user=Auth::user();
               $job->user()->associate(Auth::id());
               $job->reference=uniqid();
               $job->title=$request->title;
               $job->slug=str::slug($request->title);
            //    $job->slug=SlugService::createSlug(Job::class,'slug',$request->title);
               $job->description=$request->description;
               $job->location=$request->location;
               $job->address=$request->address;
               $job->due=$request->due;
               $job->save();
            if($request->hasFile('photo')){
                $files=$request->file('photo');
                foreach($files as $file){
                    $name=uniqid($user->id."_").".".$file->getClientOriginalExtension();
                       $file->move('images/job_image/',$name);
                    //    $photos[]=$name;
//   $job->images()->create(['images'->$name]);
$job_image= new Jobimage();
$job_image->job_id=$job->id;
$job_image->images=$name;
$job_image->save();
                }

                // $job->images()->images=$request->$name;
                // $job->images()->create(['images'->$name]);
                // $job->job_image=json_encode($photos);
            }
// $job->images()->create(['images'-> $name]);
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

        return view('job.show')->with(compact('job'));

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
    public function applications($id)
    {
       $job=Job::with('applications','user')->findOrFail($id);
        $applications=$job->applications()->latest()->paginate(5);
       return view('job.applications',compact('job','applications'));

    }


}
