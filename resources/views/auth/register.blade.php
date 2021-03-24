@extends('layouts.app')

@section('content')


<div class="register-page">
<div class="register-box">
  <div class="register-logo">
    <a href="../../index2.html"><b>Kazi</b>Yangu</a>
  </div>

  <div class="card">
    <div class="card-body register-card-body">
      <p class="login-box-msg">Register a new membership</p>
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
            </div>
            <div class="col-md-6">
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

                <div class="form-group">
                    <label for="profile">Profile Image</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" value="{{ old('profile_image') }}" class="custom-file-input @error('profile_image') is-invalid @enderror" name="profile_image" id="profile_image">
                        <label class="custom-file-label" for="exampleInputFile">Choose file</label>
                      </div>

                    </div>
                  </div>

                  <div class="form-group">
                    <label for="password">Password</label>
                    <input id="password" type="password"  class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">


                  @error('password')
                                            <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                    </div>
                  <div class="form-group">
                    <label for="confirm_password">Confirm Password</label>
                    <input id="password-confirm"  type="password" class="form-control" name="password_confirmation" required autocomplete="new-password">

                </div>
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
          <div class="col-7">
            <div class="form-check">
                <input class="form-check-input" type="checkbox" name="terms" id="remember">

                <label class="form-check-label" for="terms">
                    I agree to the <a href="#">terms</a>
                </label>
                <div class="invalid-feedback">Check this checkbox to continue.</div>
            </div>

          </div>

          <div class="col-5">
            <button type="submit" class="btn btn-primary">
                {{ __('Register') }}
            </button>
          </div>

        </div>
      </form>

      <div class="social-auth-links text-center">
        <p>- OR -</p>
        <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i>
          Sign up using Facebook
        </a>
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i>
          Sign up using Google+
        </a>
      </div>

      <a href="{{ route('register') }}" class="text-center">I already have a membership</a>
    </div>

  </div>
</div>
<br>
</div>
<script>

    (function() {
      'use strict';
      window.addEventListener('load', function() {

        var forms = document.getElementsByClassName('needs-validation');

        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>
<br>
@endsection
