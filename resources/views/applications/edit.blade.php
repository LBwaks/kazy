@extends('layouts.app')
@section('title', 'Edit Application')
@section('content')
<br>
<section class="content-header">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Edit This Job</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a  href="{{ route('job.index') }}">Jobs</a></li>
            <li class="breadcrumb-item"><a  href="{{ route('job.applications.show',['job'=>$application->job_id,'application'=>$application->id]) }}">Job Application</a></li>
            <li class="breadcrumb-item active">Edit This Job</li>
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
        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                @foreach ($errors->all() as $error)
               <li>{{ $error }}</li>
                @endforeach
            </ul>
            </div>
@endif
        <form action="{{ route('job.applications.update',['job'=>$application->job_id,'application'=>$application->id]) }}" method="POST" class="needs-validation application m-2 p-3" novalidate>
            {{ method_field('PUT') }}
            @csrf

            <h2 class="text-center">Edit This Application</h2>
            <div class="form-group">
                <label for="charge">Charge(ksh):</label>
                <input type="text" class="form-control" name="charge" placeholder="Enter Charge" id="charge" value="{{ old('charge',$application->charge) }} " required>
                <div class="invalid-feedback">Please Enter Charge Amount.</div>
              </div>
              <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                        <label for="duration">Duration:</label>
                        <input type="number" class="form-control"  name="duration" placeholder="Enter Duration , eg 5" id="duration" value="{{ old('duration',$application->duration) }}"required>
                        <div class="invalid-feedback">Please Enter Expected Duration To Take.</div>
                      </div>
                  </div>
                  <div class="col-md-6">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="time" id="time-1" value="hour" {{$application->time =='hour' ? 'checked' : ''}}
                        />
                        <label class="form-check-label" for="time-1"> Hour(s) </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="time"id="time-3"value="day"{{ $application->time =='day' ? 'checked' : '' }} />
                        <label class="form-check-label" for="time-3"> Day(s) </label>
                      </div>


                      <div class="form-check">
                        <input   class="form-check-input"
                          type="radio" name="time" id="time-2" value="week"{{ $application->time =='week' ? 'checked' : '' }} />
                        <label class="form-check-label" for="time-2"> Week(s) </label>
                      </div>
                  </div>
              </div>
              <div class="form-group">
                <label>Date and time range:</label>

                <div class="input-group">
                  <div class="input-group-prepend">
                    <span class="input-group-text"><i class="far fa-clock"></i></span>
                  </div>
                  <input type="text" name="availability" value="{{ old('time_available',$application->time_available) }}"class="form-control float-right" id="availabilitytime">
                </div>
                <div class="invalid-feedback">Please Availability Time.</div>
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
        <br>
    </div>
    <div class="col-md-4">
        @if(count($otherJobs)>0)


        <div class="card ">
            <div class="card-header text-center">Other Jobs You May like</div>
            <div class="card-body">

           <ul class="list-group list-group-flush">
          @foreach($otherJobs as $job)
          <a href="{{ $job->url}}" class="list-group-item list-group-item-action">{{ Str::limit($job->title,60)}}</a>

          @endforeach

          </ul>
            </div>
        </div>
        @endif
        <br>
    </div>
</div>






      </div>
    </div>

    @stop
    @section('scripts')
    <script src="{{asset('plugins/moment/moment.min.js') }}"></script>
    <script src="{{asset('plugins/daterangepicker/daterangepicker.js') }}"></script>
 <script>
     $('#availabilitytime').daterangepicker({
      timePicker: true,
      timePickerIncrement: 30,
      locale: {
        format: 'MM/DD/YYYY hh:mm A'
      }
    })
 </script>


    @stop

