<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Notification;
use App\Notifications\UserComment;
use App\Job;
use App\Comment;
use App\Application;
use App\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;


class CommentsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function _construct()
    {
      $this->middleware('auth');
    }
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($slug)
    {
        $job=Job::whereSlug($slug)->first();
       return view('comments.create', compact('job'));
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
        $this->validate($request,[
            'type'=>'required',
            'subject'=>'required|max:250|min:5',
            'about'=>'required|max:250|min:10',
        ]);

        $user=Auth::user();
           $appplication= Application::where('id',$application);
           $application=$job->application_id;
           $job_id=$job->id;
           $comment=new Comment();
           $comment->user_id=\Auth::id();
           $comment->job_id=$job_id;
           $comment->application_id=$application;
           $comment->type=$request->type;
           $comment->subject=$request->subject;
           $comment->about=$request->about;
           $comment->save();

        //    dd($comment->user->notify(new UserComment($job,$application,Auth::user())));
           if($comment)
           {
            // application->user->notify(new ApprovedApplication($job,$application,Auth::user()));

               return redirect()->route('job.show',$job->slug);
           }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
    public function destroy($id)
    {
        //
    }
}
