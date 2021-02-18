@extends('layouts.app')
@section('title', 'Jobsqqqqqqqqqqqqqqqqqqqqqqqqqqqq')
@section('content')
<br>
<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-6">
          <h3>Jobs Posted By <span class="text-primary">{{ $user->name }}</span> </h3>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('job.index') }}">Job</a></li>
            <li class="breadcrumb-item active">{{ $user->name }}'s Jobs</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <br>
  <div class="container-fluid">
    <div class="row">
       <div class="col-lg-8 col-sm-12">

        @foreach ($jobs as $job)

        <div class="card">
            <div class="card-body px-auto pb-0 pt-1" >
                <div class="row">
                    <div class=" col-md-8 col-sm-12 pr-0 mr-0">
                <div class="pb-1 "><h6><a href="{{ $job->url}}">{{Str::limit($job->title, 50)  }}</a></h6></div>


                @if($job->categories->count()===0)

                        <span class="badge badge-pill badge-info">Open</span>
                    @endif
                   <span >
                       @foreach($job->categories as $category)

                    <span><a href="{{ route('category.show',$category->id) }}" class="badge badge-pill badge-light">{{ $category->job }}</a> </span>
                    @endforeach </span>
                         <br>

                         <div class="font-weight-light py-1 text-monospace mx-4 "> {{ Str::limit(strip_tags($job->description,300))}}</div>

                          <div class="text-muted font-weight-light"> <i class="fa fa-clock mr-1"></i>Time Due:  {{ $job->due }}   (USE COUNTDOWN TIMER)</div>

                    <div class="pb-1 text-muted font-weight-light">

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
    <div class="list-group">
        <a href="#" class="list-group-item list-group-item-action">First item</a>
        <a href="#" class="list-group-item list-group-item-action">Second item</a>
        <a href="#" class="list-group-item list-group-item-action">Third item</a>
      </div>
      <ul class="list-group list-group-flush">
        <li class="list-group-item">First item</li>
        <li class="list-group-item">Second item</li>
        <li class="list-group-item">Third item</li>
        <li class="list-group-item">Fourth item</li>
      </ul>
</div>   </div> </div>
{{ $jobs->onEachSide(1)->links() }}
 @stop
 @section('scripts')


 @stop
