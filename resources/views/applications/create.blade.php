@extends('layouts.app')
@section('title', 'Apply Job')
@section('content')
<br>

<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Apply This Job</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Apply This Job</li>
          </ol>
            </nav>
        </div>
      </div>
    </div>
  </section>
  <br>
<div class="container">
<div class="row">
    <div class="col-md-8">
        <form action="{{ route('job.applications.store',$job->id) }}" method="POST" class="needs-validation application m-2" novalidate>
            @csrf
            <h2 class="text-center">Apply For This Job</h2>
            <div class="form-group">
                <label for="charge">Charge(ksh):</label>
                <input type="text" class="form-control" name="charge" placeholder="Enter Charge" id="charge" required>
                <div class="invalid-feedback">Please Enter Charge Amount.</div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="duration">Duration:</label>
                        <input type="number" class="form-control"  name="duration" placeholder="Enter Duration" id="duration" required>
                        <div class="invalid-feedback">Please Enter Expected Duration To Take.</div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="time"
                          id="time-1"
                          value="hour"
                          checked
                        />
                        <label class="form-check-label" for="time-1"> Hour(s) </label>
                      </div>
                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="time"
                          id="time-3"
value="day"
                        />
                        <label class="form-check-label" for="time-3"> Day(s) </label>
                      </div>


                      <div class="form-check">
                        <input
                          class="form-check-input"
                          type="radio"
                          name="time"
                          id="time-2"
                          value="week"

                        />
                        <label class="form-check-label" for="time-2"> Week(s) </label>
                      </div>
                  </div>
              </div>

 {{-- @can('create',$job) --}}
              <button type="submit" class="btn  btn-sm btn-primary">Submit</button>
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
        </form>
    </div>
    <div class="col-md-4">
        <p>Similar Jobs</p>
        <p> Jobs You May Like</p>
    </div>
</div>






      </div>
    </div>

    @stop
    @section('scripts')




    @stop

