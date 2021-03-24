@extends('layouts.app')
@section('pageTitle', 'Home')
@section('content')

<section class="content-header">
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
<div class="card">
    <div class="card-header text-center bg-light"><h2>Update User Profile</h2></div>
    <div class="card-body">

              @if($errors->any())
              <div class="alert alert-danger">
                  <ul>@foreach($errors->all() as $error)
                   <li>{{ $error }}</li>

                  @endforeach</ul>
              </div>
              @endif

              <form method="POST" action="{{ route('register') }}" class="needs-validation" enctype="multipart/form-data" novalidate>
                @csrf
                <div class="row">
                    <div class="col-md-6">
                        <div class="card">
                            <div class="card-body">
                                <div class="form-group">
                                    <img src="/images/profile/60112c654ea6e.jpg" height="250" width="250" class="img-fluid" alt="User Profile">
                                    <br>
                                    <label for="profile">Profile Image</label>

                                    <div class="input-group">
                                      <div class="custom-file">
                                        <input type="file" value="{{ old('profile_image') }}" class="custom-file-input @error('profile_image') is-invalid @enderror" name="profile_image" id="profile_image">
                                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                                      </div>

                                    </div>
                                  </div>
                            </div>
                        </div>
                        <br>
                        <div class="card">
                        <div class="card-body">
                        <div class="form-group">
                            <label>User Type:</label>
                            <div class="form-check">
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="user_type"
                                  id="recruiter"
                                  value="recruiter"
                                  checked
                                />
                                <label class="form-check-label" for="recruiter"> Job Recruiter <span class="text-danger">(Wants to post job)</span> </label>
                              </div>
                              <br>
                              <div class="form-check">
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="user_type"
                                  id="seeker"
                value="seeker"
                                />
                                <label class="form-check-label" for="seeker">Job Seeker <span class="text-primary">(looking for job)</span> </label>
                              </div>

                <br>

                              @error('user_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>
                        </div>
                    </div>
<br>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="highest_education">Highest Education Level</label>
            <input id="highest_education"  type="text" class="form-control @error('highest_education') is-invalid @enderror" name="highest_education" value="{{ old('highest_education') }}" required autocomplete="highest_education" autofocus>

            @error('highest_education')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    <div class="form-group">
        <label for="other_education">Other Educational Achievements</label>
        <input id="other_education"  type="text" class="form-control @error('other_education') is-invalid @enderror" name="other_education" value="{{ old('other_education') }}" required autocomplete="other_education" autofocus>

        @error('other_education')
        <span class="invalid-feedback" role="alert">
            <strong>{{ $message }}</strong>
        </span>
    @enderror
</div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="experience">Experience</label>
            <input id="experience"  type="text" class="form-control @error('experience') is-invalid @enderror" name="experience" value="{{ old('experience') }}" required autocomplete="experience" autofocus>

            @error('experience')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="skill">Skills</label>
            <input id="skill"  type="text" class="form-control @error('skill') is-invalid @enderror" name="skill" value="{{ old('skill') }}" required autocomplete="skill" autofocus>

            @error('skill')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
</div>
<br>
<div class="card">
    <div class="card-body">
        <div class="form-group">
            <label for="skill">CV & Certificates </label>
            <div class="custom-file">
                <input type="file" class="custom-file-input" id="customFile">
                <label class="custom-file-label" for="customFile">Choose file</label>
              </div>
            @error('skill')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
    </div>
</div>
<br>

                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <label for="name">Name</label>
                            <input id="name"  type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>

                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                          <div class="form-group">
                            <label for="email">Email</label>
                            <input id="email" type="email"  class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"autofocus>

                            @error('email')
                              <span class="invalid-feedback" role="alert">
                                  <strong>{{ $message }}</strong>
                              </span>
                          @enderror
                         </div>

                         <div class="form-group">
                            <label for="tell">Phone Number</label>
                            <input id="tell" type="text"  class="form-control @error('tell') is-invalid @enderror" name="tell" value="{{ old('tell') }}" required autocomplete="tell" autofocus>


                            @error('tell')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>

                          <div class="form-group">
                            <label for="id_no">ID Number</label>
                            <input id="id_no" type="text"  class="form-control @error('id_no') is-invalid @enderror" name="id_no" value="{{ old('id_no') }}" required autocomplete="id_no" autofocus>


                            @error('id_no')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                          <div class="form-group">
                            <label for="dob">Date Of Birth</label>
                            <input id="dob" type="date"  class="form-control @error('dob') is-invalid @enderror" name="dob" value="{{ old('dob') }}" required   autofocus>


                            @error('dob')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        <div class="form-group">
                            <label>Gender:</label>
                            <div class="form-check">
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="gender"
                                  id="male"
                                  value="male"
                                  checked
                                />
                                <label class="form-check-label" for="male"> Male </label>
                              </div>
                              <br>
                              <div class="form-check">
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="gender"
                                  id="female"
                value="female"
                                />
                                <label class="form-check-label" for="female">Female </label>
                              </div>

        <br>
                              <div class="form-check">
                                <input
                                  class="form-check-input"
                                  type="radio"
                                  name="gender"
                                  id="other"
                                  value="other"

                                />
                                <label class="form-check-label" for="other"> Other </label>
                              </div>
                              @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                          </div>

                          {{-- <div class="form-group">
                            <label for="gender">Gender</label>
                            <input id="gender" type="text"  class="form-control @error('gender') is-invalid @enderror" name="gender" value="{{ old('gender') }}" required autocomplete="gender" autofocus>


                            @error('gender')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div> --}}

                          <div class="form-group">
                            <label for="location">Location</label>
                            <input id="location" type="text"  class="form-control @error('location') is-invalid @enderror" name="location" value="{{ old('location') }}" required autocomplete="location" autofocus>


                            @error('location')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                          <div class="form-group">
                            <label for="address">Address</label>
                            <input id="address" type="text"  class="form-control @error('address') is-invalid @enderror" name="address" value="{{ old('address') }}" required autocomplete="address" autofocus>

                            @error('address')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div>
                        {{-- <div class="form-group">
                            <label for="address">Image</label>
                            <input id="profile_image" type="text"  class="form-control @error('profile_image') is-invalid @enderror" name="profile_image" value="{{ old('profile_image') }}" required autocomplete="profile_image" autofocus>

                            @error('profile_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        </div> --}}



                    </div>
                </div>
                {{-- <div class="row">
                    <div class="col-md-4">
                        <div class="form-group">
                            <button name="user_type" class="btn btn-primary"> RECRUITER</button>
                             @error('name')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button name="user_type" class="btn btn-primary"> SEEKER</button>
                             @error('name')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                     </div>
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <button name="user_type" class="btn btn-primary"> BOTH</button>
                             @error('name')
                             <span class="invalid-feedback" role="alert">
                                 <strong>{{ $message }}</strong>
                             </span>
                         @enderror
                        </div>
                    </div>
                </div> --}}




                <div class="row">

                  <div class="col-8">
                    <button type="submit" class="btn btn-primary">
                        {{ __('Update User Details') }}
                    </button>
                  </div>

                </div>
              </form>

    </div>
</div>
  @endsection
