@extends('layouts.app')
@section('title', 'Application')
@section('content')

<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Application Details</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('job.index') }}">Job</a></li>
            <li class="breadcrumb-item active">Applications Details</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<br>
<div class="card " style="background-color: rgba(76, 67, 54, 0.1)">
    <div class="card-body">
        {{-- <div class="container"> --}}
        <div class="row">

           <div class="col-md-12 mb-3">
            <div class="card "style="background-color: #ebebe0">
            <div class="card-header bg-white text-center"> <span class="h2-responsive">Applications Details</span> </div>
            <div class="card-body ml-md-5 ">



                <div>
                    <h5 class=""> <u>Job:</u> </h5><span ><a class="font-weight-bold h5-responsive text-dark" href="{{ $job->url}}">{{$job->title}}</a></span>

                    </div>
<br>

<div>
    <h5 class=""> <u>Charge:</u> </h5><span class="text-muted">Ksh {{$application->charge}}</span>

    </div>
<br>
    <div>
        <h5 class=""> <u>Duration:</u> </h5><span class="text-muted">{{$application->duration}} {{$application->time}} (s)</span>

        </div>
<br>
        <div>
            <h5 class=""> <u>Status:</u> </h5><span class="text-dark">
                @if($application->approved==='No')
<b>Pending</b>
@else
 <b>{{$application->approved}}</b>
                @endif
               </span>

            </div>

<br>
<div>
    <h5 class=""> <u>My Availability:</u> </h5><span class="text-muted">{{$application->time_available}}</span>

    </div>




</div>
<div class="card-footer  ">
<div class="clearfix">
    @if($application->approved !=='Approved')

    <span class="float-md-left float-sm-left">

        <a href="{{ route('job.applications.edit',['job'=> $application->job_id, 'application' => $application->id]) }}" class="btn  btn-outline-primary mx-md-5">
            Edit
           </a>
    </span>
    @endif


    <span class="float-md-right float-sm-left"> <form action="{{ route('job.applications.destroy',['job'=>$application->job_id,'application'=>$application->id]) }}" method="POST">
        {{ method_field('delete') }}
        @csrf
        <button type="submit" class="btn btn-outline-danger mx-md-5" onclick="return confirm('Are you sure you want to delete')">Delete</button>
        </form></span>
</div>





     </div>
</div></div>
        </div>
        </div>
    </div>
</div>

@stop
@section('scripts')
@stop
