<?php

namespace App\Http\Controllers;

use App\Application;
use App\DataTables\PendingDataTable;
use App\Job;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Job $job,Application $application)
    {
        // $job=Job::findOrFail($job);
        return view('applications.create',compact('job'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Job $job,Application $application,Request $request)
    {

        $request->validate([
            'charge'=>'required|numeric',
            'duration'=>'required|numeric',
            'time'=>'required'
        ]);
        $duration='duration'.' '.'time';
        $user=Auth::user();
        dd($application->job_id,
             $application->user_id,
             $job->id,
             $user->id );
    //     if($user->id !== $job->user_id){
    //         if( $application->job_id === $job->id && $application->user_id ===$user ){

    //             abort(403,'You have Already Applied For This Job');
    //         }
    //         else{
    //             $application=$job->applications()->create([



    //                 'time'=>$request->time,
    //                   'charge'=>$request->charge,
    //                  "duration"=>$request->duration,
    //                   'user_id'=>\Auth::id()]);

    //         }

    //     if($application)
    //     {
    //         // $user=$job->user;
    //         // $user->notify(new NewBid($bid));
    //         // return redirect()->route('bids.myBids')->with('success','Bid Successful!');

    //     }
    //     else{
    //         return redirect()->route('jobs.show')->with('failure','FAILED');
    //     }
    // }else{
    //     abort(403,'You Cannot Apply  Your Own Job');
    // }


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(Application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(Application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(Application $application)
    {
        //
    }
     public function pending(PendingDataTable $datatable)
     {
        dd($datatable->render('applications.pending'));
     }





     public function applicant(Application $application, User $user){
        $user=User::findOrFail($user);
        // $application=Application::where('user_',$user->name)->get();

        return view('users.applicant',compact('user'));
    }
}
