@extends('layouts.app')
@section('title', 'Applicant-Details')
@section('content')
<br>
<section class="content-header">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Applicant Details</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a  href="{{ route('job.index') }}">Jobs</a></li>
            <li class="breadcrumb-item"><a  href="">Job Details</a></li>
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Job Applications</a></li>
            <li class="breadcrumb-item active">Applicant Details</li>
          </ol>
            </nav>
        </div>
      </div>
    </div>
  </section>
  <br>
  <section class="content">
    <div class="container">
      <div class="row">
        <div class="col-md-12">

          <div class="card card-primary card-outline mx-auto">
            <div class="card-body box-profile">
              <div class="text-center">
                {{-- <div class="text-center">
                    <img height="250" width="250" class="img-fluid rounded"
                         src="{{ asset('/images/profile/'.Auth::user()->avatar)}}"
                         alt="{{Str::limit(auth::user()->name, 5)}}">
                  </div> --}}
                  @if($user->avatar === null)
                  <h3 class="profile-username text-center"> {{$user->name}} </h3>
                  @else
                  <img class="profile-user-img img-fluid img-circle"
                  src="{{ asset('/images/profile/'.$user->avatar)}}"
                  alt="{{Str::limit($user->name, 5)}}">
                  <h3 class="profile-username text-center"> {{$user->name}} </h3>
                  @endif


                     <hr>
              </div>

<div class="row">
    <div class="col-md-8">
        {{-- <strong><i class="fas fa-check-circle mr-1"></i>Verified</strong>
        <p class="text-muted">{{$user->verified}}</p>
<hr> --}}
        <strong><i class="fas fa-map-marker-alt mr-1"></i>Address </strong>

        <p class="text-muted">{{$user->location}}, {{$user->address}}</p>
        <hr>

        <strong><i class="fas fa-cogs mr-1"></i>Skills </strong>

        <p class="text-muted"><span class="badge badge-pill badge-primary">{{$user->skills}}</span>

      </p>
        <hr>
        <strong><i class="fas fa-briefcase mr-1"></i>Experience</strong>

        <p class="text-muted">{{$user->experience}}</p>
        <hr>
        <strong><i class="fas fa-tasks mr-1"></i>Jobs Done </strong>

        <p class="text-muted">No Job Done</p>


    </div>
    {{-- <div class="col-md-4"> <strong><i class="fas fa-star mr-1"></i>Ratings & Reviews</strong>

        <p class="text-muted">5 *******</p>
        <hr></div> --}}
</div>





            </div>
          </div>
        </div>

      </div>
    </div>
  </section>

<br>


@stop
