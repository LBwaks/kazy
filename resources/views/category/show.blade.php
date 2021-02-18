@extends('layouts.app')
@section('title', 'Job Categories')
@section('content')
<br>
<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>{{ $category->job }} Jobs</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item "><a  href="{{ route('job.index') }}">Jobs</a></li>
            <li class="breadcrumb-item active">{{ $category->job }}</li>
          </ol>
            </nav>
        </div>
      </div>
    </div>
  </section>
  <br>

<div class="row">
    <div class="col-lg-8 col-sm-12">
            {{-- @foreach ($category->jobs as $job)

            <div class="container">
                <div class="row">
                   <div class="col-lg-12">

               <div class="card">
                               <div class="card-header bg-light text-muted border-bottom-0">

                                  <div class="user-block">


                                           <a href="{{ route('users.show',$job->user->name) }}">{{ $job->user->name }}</a>



                                     </div>
                               </div>
                               <div class="card-body px-auto">
                                 <div class="row">
                                   <div class=" col-md-7">

              <p> <strong></i> Category:</strong>
               @if($job->categories->count()===0)
                                    Open
                                @endif
                               <span class="text-muted">@foreach($job->categories as $category)

                                <span><a href="{{ route('categories.show',$category->id) }}">{{ $category->job }}</a> </span>
                                @endforeach </span></p>
                               <hr>

                               <p><strong> About the job:</strong>
                               <span class="text-muted"> {{ Str::limit($job->description ,300)}}</span></p>

                               <hr>
                               <p><strong> Location:</strong>
                               <span class="text-muted">{{ $job->location }}</span></p>
        <hr>

                              <p> <strong> Due Time:</strong>
                               <span class="text-muted">{{ $job->due }}</span></p>

                                   </div>
                                   <div class="col-md-5 py-2 text-center ">
                                     <div class="view overlay zoom">
                                        @if($job->job_image)

                                        <img class="img-fluid" src="/images/job_image/{{ $job->job_image ? $job->job_image :''}}" height="230" alt="{{ Str::limit($job->title,50) }}">
                                    @endif


               </div>
                                   </div>
                                 </div>
                               </div>
                               <div class="card-footer bg-light">

                                <div class="clearfix">
                                    <span class="float-left"> <a href="{{ $job->url}}" class="btn btn-outline-info btn-sm">Bid this job </a></span>

                                  </div>
                               </div>
                             </div>

                   </div>
                 </div>   </div></div>



          @endforeach
          ********************** --}}
          @foreach ($category->jobs as $job)

          <div class="card">
              <div class="card-body px-auto pb-0 pt-1" >
                  <div class="row">
                      <div class=" col-md-8 col-sm-12 pr-0 mr-0">
                  <div class="pb-1 "><h6><a href="{{ $job->url}}">{{Str::limit($job->title, 50)  }}</a></h6></div>

                     <span >@foreach($job->categories as $category)

                      <span><a href="{{ route('category.show',$category->id) }}" class="badge badge-pill badge-light">{{ $category->job }}</a> </span>
                      @endforeach </span>
                           <br>

                           <div class="font-weight-light py-1 text-monospace mx-4 "> {{ Str::limit(strip_tags($job->description,300))}}</div>

                            <div class="text-muted font-weight-light"> <i class="fa fa-clock mr-1"></i>Time Due:  {{ $job->due }}   (USE COUNTDOWN TIMER)</div>

                      <div class="pb-1 text-muted font-weight-light">
                          <i class="fas fa-user-circle  mr-1"></i>
                          <a href="{{ route('users.show',$job->user->name) }}"class="mr-2 font-italic">{{ $job->user->name }}</a>
                          <span class="mr-2"><i class="fa fa-map-marker-alt mr-1"></i>  {{ $job->location }} , {{ $job->address }}</span>
                           <span class="mr-2"><i class="fa fa-clock mr-1"></i> {{ $job->created_date }}</span>
                          </div>


              </div>
              <div class="col-md-4 my-2 mr-0">
                  <div class="view overlay zoom">
                     @if($job->job_image)
<div class="job-image">
  <img class=" rounded " src="/images/job_image/{{ $job->job_image ? $job->job_image :''}}" class="img-fluid"  height="175" alt="{{ Str::limit($job->title,50) }}">
</div>

                 @endif


</div>
                </div>
              </div>
              </div>


          </div>
<br>

 @endforeach
</div>

<div class="col-lg-4">
    Most Applied Jobs
    <hr>
    <ul class="list-group list-group-flush">
        <li class="list-group-item">First item</li>
        <li class="list-group-item">Second item</li>
        <li class="list-group-item">Third item</li>
        <li class="list-group-item">Fourth item</li>
      </ul>


      Almost closed Job
      <ul class="list-group list-group-flush">
        <li class="list-group-item">First item</li>
        <li class="list-group-item">Second item</li>
        <li class="list-group-item">Third item</li>
        <li class="list-group-item">Fourth item</li>
      </ul>
</div>
</div>
@endsection

