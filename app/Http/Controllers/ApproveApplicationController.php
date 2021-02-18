<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Application;
use App\Job;
class ApproveApplicationController extends Controller
{
    public function __invoke(Application $application)
    {
       if($application->job->approvedApplication($application)){
           $application->application->approve($appication);
       }
       if($application->approvedApplication($application)){
           $application->application->approve($application);
       }
       return back();
    }
}
