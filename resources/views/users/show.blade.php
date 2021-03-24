@extends('layouts.app')
@section('title', 'Users Jobs')
@section('content')
<br>
<section class="content-header">
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
  <div class="search-box">
    <form action="" class="form-inline d-flex justify-content-center md-form form-sm">
        <input type="text"  placeholder="Search Here" class="form-control form-control-sm mr-3 w-75" aria-label="Search">
        <i class="fas fa-search"></i>
    </form>
    </div>
    <br>
  <div class="container">
    <div class="card ">
        <div class="card-body">
    <div class="row">
       <div class="col-lg-12 col-sm-12">

        @foreach ($jobs as $job)

        <div class="card  text-dark" style="background-color: rgba(96, 125, 135, 0.1)">
            <div class="card-body px-auto pb-0 pt-1" >
                <div class="row">
                    <div class=" col-md-8 col-sm-12 pr-0 mr-0">
                <div class="pb-1 "><h6><a href="{{ $job->url}}">{{Str::limit($job->title, 50)  }}</a></h6></div>


                @if($job->categories->count()===0)

                        <span class="badge badge-pill badge-info">Open</span>
                    @endif
                   <span> <i class="fas fa-tags fa-lg mr-1"></i>@foreach($job->categories as $category)

                    <span><a href="{{ route('category.show',$category->id) }}" class="badge badge-pill badge-secondary">{{ $category->job }}</a> </span>
                    @endforeach </span>
                         <br>

                         <div class="font-weight-light py-1 text-monospace mx-4 "> {{ Str::limit(strip_tags($job->description,300))}}</div>

                          <div class="text-muted font-weight-light"> <i class="fa fa-clock mr-1"></i>Deadline:  {{ $job->due }}   (USE COUNTDOWN TIMER)</div>

                    <div class="pb-1 text-muted font-weight-light">
                        <i class="fas fa-user-circle  mr-1"></i>
                        <a href="{{ route('users.show',$job->user->name) }}"class="mr-2 font-italic">{{ $job->user->name }}</a>
                        <span class="mr-2"><i class="fa fa-map-marker-alt  mr-1"></i>  {{ $job->location }}</span>
                         <span class="mr-2"><i class="fa fa-clock mr-1"></i> {{ $job->created_date }}</span>
                        </div>



            </div>


            <div class="col-md-4 my-2 mr-0">
                <div class="view overlay zoom">

                    @foreach ($job->images as $image)
@if ($job->images->first()==$image)
<img class="img-fluid" width="400" height="400" src="/images/job_image/{{ $image->images }}" alt="{{ Str::limit($job->title,50) }}">

@endif

                    @endforeach




</div>
              </div>
            </div>
            </div>


        </div>



<br>
@endforeach
{{ $jobs->onEachSide(1)->links() }}
</div>

  </div>
  </div>
</div>
<br>
 </div>

 @stop
 @section('scripts')


 @stop
