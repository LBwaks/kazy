@extends('layouts.app')
@section('title', 'Job Details')
@section('content')
<br>

<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Job Detail</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item "><a  href="{{ route('job.index') }}">Jobs</a></li>
            <li class="breadcrumb-item active">Job Detail</li>
          </ol>
            </nav>
        </div>
      </div>
    </div>
  </section>
  <br>
  <div class="alert alert-warning alert-dismissible fade show" role="alert">
    <div class="text-center"><strong>Please Complete Your Profile!</strong></div>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>
 @include('layouts.partials.message')

     <div class="container">
        <div class="row">

           <div class="col-md-9 border border-secondary">


<div>
<span class="font-weight-bolder h5-responsive">{{ $job->title }}  </span>

</div>
<br>
<div>
            <span>  <a href="{{ route('users.show',$job->user->name) }}">{{ $job->user->name }}</a>
            <span class="text-muted"> -- <i class="fas fa-map-marker-alt mr-1"></i> {{ $job->location }},
            <i class="fa fa-clock mr-1"></i>{{ $job->created_date }}</span>
            </span>
</div>
<br>
<div>
<h5 class="font-weight-bolder">  Time Due:</h5><span class="text-muted">{{ $job->due }}   (USE COUNTDOWN TIMER)</span>

</div>
<br>
<div>
<h5 class="font-weight-bolder">Categories</h5>
@if($job->categories->count()===0)
<span class="badge badge-pill badge-info">Open</span>
                 @endif
                <span class="text-muted">
                    @foreach($job->categories as $category)

                 <span><a href="{{ route('category.show',$category->id) }}" class="badge badge-pill badge-light">{{ $category->job }}</a> </span>
                 @endforeach
                </span>
</div>
<br>
<div>
<h5 class="font-weight-bolder">Job Reference </h5>
<span class="text-muted h6-responsive"> #{{ $job->reference }}</span>
</div>
                                 <br>
                               <div>
                                 <h5 class="font-weight-bolder"> Job Description</h5>
                            <span class="text-muted h6-responsive"> {!!$job->description !!}</span>
                            <span class="text-muted h6-responsive"> {{strip_tags(str_replace('&nbsp;', ' ',$job->description))}}</span>
                          </div>
                          <br>

                         <span>


                            <h5 class="font-weight-bolder">Job Image(s)</h5>
                      @if(count($job->images))

<br><br>
@foreach ($job->images as $image)

<img class="img-fluid" width="400" height="400" src="/images/job_image/{{ $image->images ? $image->images :''}}" alt="{{ Str::limit($job->title,50) }}">

@endforeach
@else
<span class="text-muted h6-responsive"> This Job Has No images!</span>
@endif

                          </span>

                          <span>

                            @if(count($job->videos))
                            <br><br>
                            <h5 class="font-weight-bolder">Job Video(s)</h5>

      @foreach ($job->videos as $video)

      <video class="img-fluid" width="800" height="400" controls>
        <source src="/video/job_video/{{ $video->videos ? $video->videos :''}}" alt="{{ Str::limit($job->title,50) }}" type="video/mp4">
        <source src="/video/job_video/{{ $video->videos ? $video->videos :''}}" alt="{{ Str::limit($job->title,50) }}" type="video/ogg">
        Your browser does not support HTML5 video.
      </video>

      @endforeach

      @endif
                          </span>
<br>
<br>
<div class="clearfix">

<span class="float-left">

    {{-- @can('create',$job) --}}
    <a href="{{ route('job.applications.create',$job->id) }}" class="btn btn-outline-info btn">Apply This Job</a>
    {{-- @endcan --}}
 </span>

<span class="float-right">
    @can('update',$job)
    <a href="{{ route('applications',$job->id) }}" class="btn btn btn-outline-info"><span class="badge badge-pill badge-dark">{{ $job->applications->count() }}</span>  Applications</a>
<a href="{{ route('job.edit',$job->id) }}" class="btn btn btn-outline-info">Edit</a>
@endcan</span>
<span class="float-right">
     @can('delete',$job)
<form action="{{ route('job.destroy',$job->id) }}" method="POST">
{{ method_field('delete') }}
@csrf
<button type="submit" class="btn btn btn-outline-danger" onclick="return confirm('Are you sure?')"> Delete</button>
</form>
@endcan
</span>

</div>



           </div>
           <div class="col-md-3">
               Similar Jobs title
               <ul class="list-group list-group-flush">
              @foreach($sameTitle as $job)

                   <li class="list-group-item"> <a href="" > {{ $job->title}}</a></li>
              @endforeach

              </ul>
              <br>
Jobs From same location
              <ul class="list-group list-group-flush">
                <li class="list-group-item">First item</li>
                <li class="list-group-item">Second item</li>
                <li class="list-group-item">Third item</li>
                <li class="list-group-item">Fourth item</li>
              </ul>
              Jobs with same tags
              <ul class="list-group list-group-flush">
                <li class="list-group-item">First item</li>
                <li class="list-group-item">Second item</li>
                <li class="list-group-item">Third item</li>
                <li class="list-group-item">Fourth item</li>
              </ul>
           </div>
         </div>   </div></div>

@endsection
