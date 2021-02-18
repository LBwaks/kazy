@extends('layouts.app')
@section('pageTitle', 'Home')
@section('content')
<br>
<section class="content-header mt-5">
    <div class="container-fluid">
      <div class="row mb-0">
        <div class="col-sm-6">
          <h1>Profile</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">My Profile</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section> <br>
   <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          <div class="card card-primary card-outline">
            <div class="card-body box-profile">
              <div class="text-center">
                <img class="profile-user-img img-fluid img-circle"
                     src="/images/app/images.jpg"
                     alt="User profile ">
              </div>

              <h3 class="profile-username text-center">{{ Auth::user()->name }}</h3>

at seeker
              <p class="text-muted text-center">{!Main Skill !}</p>

              <ul class="list-group list-group-unbordered mb-3">
                <li class="list-group-item">
                  <b>Jobs Done</b> <a class="float-right">1,322</a>
                </li>
                <li class="list-group-item">
                  <b>Total Bids</b> <a class="float-right">543</a>
                </li>
                <li class="list-group-item">
                  <b>Rating</b> <a class="float-right">########</a>
                </li>
              </ul>
              end at seeker

              <ul class="list-group list-group-unbordered mb-3 pt-2">
                <li class="list-group-item">
                  <span>Jobs Posted</span> <a class="float-right"><span class="badge badge-pill badge-dark">{{ count(auth()->user()->jobs) }}</span></a>
                </li>
                <li class="list-group-item">
                  <span>Approved Bids</span> <a class="float-right"><span class="badge badge-pill badge-dark">446</span></a>
                </li>
                <li class="list-group-item">
                    <span>Jobs Not Approved</span> <a class="float-right"><span class="badge badge-pill badge-dark">56</span></a>
                  </li>
                <li class="list-group-item">
                  <span>Jobs Not Bid</span> <a class="float-right"><span class="badge badge-pill badge-dark">45</span></a>
                </li>
              </ul>


            </div>
            <!-- /.card-body -->
          </div>

            <br>
            <div class="card card-primary">
                <div class="card-header">
                  <h4 class="card-title text-center">Bio Data</h4>
                </div>

                <div class="card-body">
                  <strong><i class="fas fa-book mr-1"></i> Email</strong>

                  <p class="text-muted">
                    {{ Auth::user()->email }}
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i>ID Number </strong>

                  <p class="text-muted">{{ Auth::user()->id_no }}</p>

                  <hr>

                  <strong><i class="fas fa-phone mr-1"></i> Phone Number</strong>

                  <p class="text-muted">
                    {{ Auth::user()->tell}}
                  </p>

                  <hr>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i> Location</strong>

                  <p class="text-muted">{{ Auth::user()->location }} {{ Auth::user()->address }}</p>

                  <hr>
                  <strong><i class="fa fa-calendar mr-1"></i> Date Of Birth</strong>

                  <p class="text-muted">{{ Auth::user()->dob }}</p>
                  <hr>
                  <strong><i class="fas fa-mars mr-1"></i> Gender</strong>

                  <p class="text-muted">{{ Auth::user()->gender }}</p>

                  <hr>
                  <a href="#" class="btn btn-primary btn-block"><b>Update Profile</b></a>
                </div>
                <!-- /.card-body -->
              </div>
              <!-- /.card -->
        </div>

        <div class="col-md-9">
            <div class="card text-center">
<div class="card-header bg-white">
    <h3 class="font-weight-normal">Contact</h3>
</div>
                <div class="card-body">
                    <strong><i class="fas fa-book mr-1"></i> Email</strong>

                  <p class="text-muted">
                    {{ Auth::user()->email }}
                  </p>

                  <strong><i class="fas fa-map-marker-alt mr-1"></i>Phone Number </strong>

                  <p class="text-muted">{{ Auth::user()->tell }}</p>


                <button class=" text-center btn btn-lg btn-outline-primary btn-rounded  waves-effect z-depth-0">Add Contact</button>
                </div>
              </div>
              <br>
          <div class="card text-center">
            <div class="card-header bg-white">
            <h3 class="font-weight-normal">Education</h3>
        </div>
            <div class="card-body">
                <strong><i class="fas fa-book mr-1"></i>Highest Education Level</strong>

                <p class="text-muted">
                  Tukts Technical Training Institute
                </p>
                <strong><i class="fas fa-map-marker-alt mr-1"></i>Other Educationall Achievements </strong>

                <p class="text-muted">Kamusibut Secondary School</p>

                <hr>
            </div>
          </div>
          <br>
          <div class="card text-center">
            <div class="card-header bg-white">
                <h3 class="font-weight-normal">Experience</h3>
            </div>

            <div class="card-body">
             Experience

            </div>
          </div>
          <br>
          <div class="card text-center">
 <div class="card-header bg-white">
            <h3 class="font-weight-normal"> Skills</h3>
        </div>
            <div class="card-body">
                <span class="badge badge-pill badge-primary">Plumbing</span>
                <span class="badge badge-pill badge-secondary">Masonary</span>
                <span class="badge badge-pill badge-success">Electrician</span>
                <span class="badge badge-pill badge-dark">Chef</span>
                <span class="badge badge-pill badge-info">Carpenter</span>

            </div>
          </div>
          <br>
          <div class="card text-center">
            <div class="card-header bg-white">
                <h3 class="font-weight-normal"> CV & Certificates</h3>
            </div>
            <div class="card-body">
                <p class="text-muted">No CV & Certificates</p>

            </div>
          </div>
          <br>
          <div class="card text-center">
            <div class="card-header bg-white">
                <h3 class="font-weight-normal">Jobs Done</h3>
            </div>
            <div class="card-body">
                <p class="text-muted">No Jobs Done</p>

            </div>
          </div>
          <br>
          <div class="card text-center">
            <div class="card-header bg-white">
                <h3 class="font-weight-normal">My Ratings & Reviews</h3>
            </div>
            <div class="card-body">
                <p class="text-muted"></p>

            </div>
          </div>
        </div>

      </div>

    </div>
  </section>
@endsection
