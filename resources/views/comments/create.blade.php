@extends('layouts.app')
@section('title', 'Application')
@section('content')

<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Comments && Complaints</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('job.index') }}">Jobs</a></li>
            <li class="breadcrumb-item active">Comments && Complaints</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<br>

<form action="{{ route('job.comments.store',['job'=>$job->slug,'application'=>$job->application_id]) }}" method="POST" class="text-center border border-light p-5 p-4 needs-validation novalidate">
@csrf
    @if($errors->any())
    <div class="alert alert-danger">
        <ul>@foreach($errors->all() as $error)
         <li>{{ $error }}</li>

        @endforeach</ul>
    </div>
    @endif

    <div class="form-group">
    <select class="browser-default custom-select mb-4" name="type" required>

        <option value="comments">Comments</option>
        <option value="complaints">Complaints</option>
        <option value="review">Review</option>
    </select>

</div>
    <div class="form-group">
    <input type="text" id="defaultContactFormSubject" name="subject" class="form-control mb-4" placeholder="Subject" required>
    <div class="invalid-feedback">Please Provide Subject.</div>
</div>


    <!-- Message -->
    <div class="form-group">
        <textarea class="form-control rounded-0" name="about" required id="exampleFormControlTextarea2" rows="3" placeholder="Message"></textarea>

        <div class="invalid-feedback">Please Provide subject description.</div>
    </div>



    <!-- Send button -->
    <button class="btn btn-info " type="submit">Submit</button>

</form>

@stop
@section('scripts')
@stop
