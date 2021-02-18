@extends('layouts.app')
@section('title', 'Applicant-Details')
@section('content')
<br>
<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Post Job</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Post Job</li>
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
                <img class="profile-user-img img-fluid img-circle"
                     src="/images/app/images.jpg"
                     alt="User profile ">
                     <h3 class="profile-username text-center">Lucas Obwaku</h3>
                     <hr>
              </div>

<div class="row">
    <div class="col-md-8">
        <strong><i class="fas fa-map-marker-alt mr-1"></i>Verified</strong>
<hr>
        <strong><i class="fas fa-map-marker-alt mr-1"></i>Address </strong>

        <p class="text-muted">Nairobi Kahawa West</p>
        <hr>

        <strong><i class="fas fa-map-marker-alt mr-1"></i>Skills </strong>

        <p class="text-muted"><span class="badge badge-pill badge-primary">Plumbing</span>
          <span class="badge badge-pill badge-secondary">Masonary</span>
          <span class="badge badge-pill badge-success">Electrician</span>
          <span class="badge badge-pill badge-dark">Chef</span>
          <span class="badge badge-pill badge-info">Carpenter</span>
      </p>
        <hr>
        <strong><i class="fas fa-map-marker-alt mr-1"></i>Experience</strong>

        <p class="text-muted">3 years experience</p>
        <hr>
        <strong><i class="fas fa-map-marker-alt mr-1"></i>Jobs Done </strong>

        <p class="text-muted">No Job Done</p>


    </div>
    <div class="col-md-4"> <strong><i class="fas fa-map-marker-alt mr-1"></i>Ratings & Reviews</strong>

        <p class="text-muted">5 *******</p>
        <hr></div>
</div>





            </div>
          </div>
        </div>

      </div>
    </div>
  </section>



{{-- {{ $user->name }} --}}


@stop
