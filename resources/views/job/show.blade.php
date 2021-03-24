@extends('layouts.app')
@section('title', 'Job Details')
@section('content')


<section class="content-header">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Job Details</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item "><a  href="{{ route('job.index') }}">Jobs</a></li>
            <li class="breadcrumb-item active">Job Details</li>
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

 <div class="card " style="background-color: rgba(76, 67, 54, 0.1)">
    <div class="card-body">
        {{-- <div class="container"> --}}
        <div class="row">

           <div class="col-md-9 mb-3">
            <div class="card "style="background-color: #ebebe0">
                <div class="card-header bg-white text-center"> <span class="h2-responsive">Job Details</span> </div>
                <div class="card-body ml-md-5 ">


<div>
<span class="font-weight-bold h5-responsive">{{ $job->title }}  </span>

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
<h5 class=""> <u>Time Due:</u> </h5><span class="text-muted">{{ $job->due }}</span>

</div>
<br>
<div>
<h5 class=""><u>Categories</u></h5>
@if($job->categories->count()===0)
<span class="badge badge-pill badge-info">Open</span>
                 @endif
                <span class="text-muted">
                    @foreach($job->categories as $category)

                 <span><a href="{{ route('category.show',$category->id) }}" class="badge badge-lg badge-pill badge-light">{{ $category->job }}</a> ,</span>
                 @endforeach
                </span>
</div>
<br>
<div>
<h5 class=""> <u>Job Reference</u> </h5>
<span class="text-muted h6-responsive"> #{{ $job->reference }}</span>
</div>
                                 <br>
                               <div>
                                 <h5 class=""><u>Job Description</u> </h5>
                            <span class="text-muted h6-responsive"> {!!$job->description !!}</span>
                            <span class="text-muted h6-responsive"> {{$job->description}}</span>
                          </div>
                          <br>
                          <div>
                            <h5 class=""><u>Things To Do</u> </h5>
                       <span class="text-muted h6-responsive"> {!!$job->work_to_do !!}</span>

                     </div>
                     <br>
                         <span>


                            <h5 class=""><u>Job Image(s)</u> </h5>
                      @if(count($job->images))

<br><br>
@foreach ($job->images as $image)
<a href="/images/job_image/{{ $image->images ? $image->images :''}}" data-lightbox="photos"><img class="img-fluid" width="400" height="400" src="/images/job_image/{{ $image->images ? $image->images :''}}" alt="{{ Str::limit($job->title,50) }}"></a>
{{-- <img class="img-fluid" width="400" height="400" src="/images/job_image/{{ $image->images ? $image->images :''}}" alt="{{ Str::limit($job->title,50) }}"> --}}

@endforeach
@else
<span class="text-muted h6-responsive"> This Job Has No images!</span>
@endif

                          </span>

                          <span>

                            @if(count($job->videos))
                            <br><br>
                            <h5 class=""><u>Job Video(s)</u> </h5>

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

<span class="float-md-right float-sm-left">
    @can('update',$job)
    <a href="{{ route('applications',$job->id) }}" class="btn btn btn-outline-info"><span class="badge badge-pill badge-dark">{{ $job->applications->count() }}</span>  Applications</a>
<a href="{{ route('job.edit',$job->id) }}" class="btn btn btn-outline-info">Edit</a>
@endcan</span>

<span class="float-md-right float-sm-left">
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
            </div>
           </div>
<br>
           <div class="col-md-3 sm-mt-3">
            <div class="card ">
                <div class="card-header text-center">Jobs You May like</div>
                <div class="card-body">

               <ul class="list-group list-group-flush">
              @foreach($otherJobs as $job)
              <a href="{{ $job->url}}" class="list-group-item list-group-item-action">{{ $job->title}}</a>

              @endforeach

              </ul>
                </div>
            </div>
            <br>
            @foreach($sameLocation as $location)
            Hello world
            <a href="
            {{-- {{ $job->url}} --}}
            " class="list-group-item list-group-item-action">{{ $location->location}}</a>

            @endforeach
            <div class="card ">
                <h4 class="card-header text-center">Job Tags</h4>
                <div class="card-body">


                    <ul class="list-group">
                        @foreach($tags as $category)

                        <li class="list-group-item d-flex justify-content-between align-items-center">
                            <a href="{{ route('category.show',$category->id) }}" class="text-black-50" >{{ $category->job }}</a>
                            <span class="badge badge-primary badge-pill">{{ $category->jobs->count() }}</span>
                          </li>
                         @endforeach

                      </ul>
                </div>
            </div>
            <br>
           </div>
         </div>
         {{-- </div> --}}
        </div></div>

        @stop
        @section('scripts')
        <script src="{{ asset('plugins/lightbox/js/lightbox.min.js') }}"> </script>
        @stop
