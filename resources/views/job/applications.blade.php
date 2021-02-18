@extends('layouts.app')
@section('title', 'Job Applications')
@section('content')
<br>
<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Job Applications</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Jobs</li>
          </ol>
            </nav>
        </div>
      </div>
    </div>
  </section>
<br>

<div class="card-body pb-0">
  <div class="row d-flex align-items-stretch">
    @foreach ($applications as $application)
    <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
        <div class="card border border-dark bg-lighht mt-3 mb-2">
          <div class="card-header text-muted border-bottom-0 bg-light">
            Job Application
          </div>
          <div class="card-body pt-0">
            <div class="row">
              <div class="col-7">
                <h2 class="lead"><b>{{ $application->user->name }}</b></h2>
                <p class="text-muted text-sm"><b>Charge: </b>{{$application->charge}} </p>
                <p class="text-muted text-sm"><b>Duration: </b>{{$application->duration}} {{ $application->time }} </p>
                <p class="text-muted text-sm"><b>Time Applied: </b>{{ $application->created_date }} </p>
                <p class="text-muted text-sm"><b>Accredited: </b>YES </p>

              </div>
              <div class="col-5 text-center">
                  <img src="{{ asset($application->user->profile_image) }}" alt="{{$application->user->name}}"
                 class="img-circle img-fluid">
              </div>
              <div class="modal" id="myModal">
                <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                  <div class="modal-content">


                    <div class="modal-header">
                      <h4 class="modal-title">Modal Heading</h4>
                      <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>


                    <div class="modal-body">

                        {{ $application->user->name }}
                      {{ $application->user->location }}
                      {{ $application->user->address }}
                      {{ $application->user->email }}
                    </div>


                    <div class="modal-footer">
                      <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="card-footer">
            <div class="text-right">
                <!-- Button to Open the Modal -->
{{-- <button type="button" class="btn btn-sm btn-primary" data-toggle="modal" data-target="#myModal">
    <i class="fas fa-user"></i> View Applicant Profile
  </button> --}}

  <!-- The Modal -->

              <a href="{{ route('applicant',$application->user->name) }}" class="btn btn-sm bg-primary">
                View Applicant Profile
              </a>
              <a href="{{ route('approve',$application->id) }}" class="btn btn-sm btn-primary">
                <i class="fas fa-user"></i> Approve
              </a>
            </div>
          </div>
        </div>
      </div>

    @endforeach
  </div>
</div>


@stop
@section('scripts')

@stop
