<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Job;
use Auth;
use App\Notifications\ApprovedApplication;
class ApproveApplicationController extends Controller
{
    public function __invoke(Job $job, Application $application)
    {
       if($application->job->approvedApplication($application)){
           $application->application->approvedApplication($application);
       }
       if($application->approved($application)){
           $application->application->approved($application);
           $otherApplications=Application::where([['job_id',$application->job_id],['user_id',$application->user_id]])->where('id','!=',$application->id);
        //    foreach($otherApplications as $app ){
        //        $app->update('approved','failed');
        //    }
        $otherApplications->update('approved','failed');
        dd( $otherApplications);
       }


    //    $application->user->notify(new ApprovedApplication($job,$application,Auth::user()));
       return back();
    }
}
