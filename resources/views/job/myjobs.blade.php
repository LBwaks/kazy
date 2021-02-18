@extends('layouts.app')
@section('title', 'My Jobs')
@section('content')
<br>
<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>My Jobs</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('job.index') }}">Job</a></li>
            <li class="breadcrumb-item active">My Jobs</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <div class="container">
  @include('layouts.partials.message')

  <br>
  <div class="search-box">
    <form action="" class="form-inline d-flex justify-content-center md-form form-sm">
        <input type="text"  placeholder="Search Here" class="form-control form-control-sm mr-3 w-75" aria-label="Search">
        <i class="fas fa-search"></i>
    </form>
    </div>
  <br>

  @foreach ($jobs as $job)

  <div class="card">
      <div class="card-body px-auto pb-0 pt-1" >
          <div class="row">
              <div class=" col-md-8 col-sm-12 pr-0 mr-0">
          <div class="pb-1 "><h6><a href="{{ $job->url}}">{{$job->title  }}</a></h6></div>


          @if($job->categories->count()===0)

                  <span class="badge badge-pill badge-info">Open</span>
              @endif
             <span >@foreach($job->categories as $category)

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

      <div class="clearfix">
        <span class="float-left"> <a href="
            {{ route('applications',$job->id) }}
            " class="btn btn-outline-info btn-sm ml-auto">View Bids <span class="badge badge-pill badge-dark">{{ $job->applications->count() }}</span></a></span>

            <span class="float-right">
            @can('update',$job)
    <a href="{{ route('job.edit',$job->slug) }}" class="btn btn-sm btn-outline-info">Edit</a>
    @endcan</span>
    <span class="float-right">  @can('delete',$job)
    <form action="{{ route('job.destroy',$job->slug) }}" method="POST">
    {{ method_field('delete') }}
    @csrf
    <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"> Delete</button>
    </form>
    @endcan</span>

      </div>
  </div>



<br>
@endforeach

{{-- @foreach ($jobs as $job)




                        <div>
                            <span class="font-weight-bolder"style="font-size:1.3em">{{ $job->title }}  </span>

                        </div>
                        <br>
                        <div>
                                        <span>
                                        <span class="text-muted"><i class="fas fa-map-marker-alt mr-1"></i> {{ $job->location }} - {{ $job->address }} ,
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

                                             <span><a href="{{ route('categories.show',$category->id) }}" class="badge badge-pill badge-light">{{ $category->job }}</a> </span>
                                             @endforeach
                                            </span>
                        </div>

                                                             <br>
                                                             <h5 class="font-weight-bolder"> Job Description</h5>
                                                              <span class="text-muted"> {{ strip_tags($job->description) }}</span>
                                                      <br><br>

                                                                      <span>
                        @if($job->job_image)
                        <h5 class="font-weight-bolder">Job Image(s)</h5>
                        <br><br>
                        <img class="img-fluid" width="300" height="350" src="/images/job_image/{{ $job->job_image ? $job->job_image :''}}" alt="{{ Str::limit($job->title,50) }}">
                        @endif
                                                      </span>


                           <div class="row">
                               <div class="col-md-6">
                                <a href="{{ route('jobs.bids',$job->id) }}" class="btn btn-outline-info btn-sm ml-auto">View Bids</a>
                                <button type="button"class="btn btn-info btn-sm">Bids <span class="badge badge-pill badge-dark">{{ $job->bids->count() }}</span></button>
                               </div>
                               <div class="col-md-6">



                               </div>
                           </div>

                          <div class="clearfix">
                            <span class="float-left"> <a href="{{ route('jobs.bids',$job->id) }}" class="btn btn-outline-info btn-sm ml-auto">View Bids</a></span>

                            <span class="float-left">  <button type="button"class="btn btn-info btn-sm">Bids <span class="badge badge-pill badge-dark">{{ $job->bids->count() }}</span></button></span>


                            <span class="float-right">
                                @can('update',$job)
    <a href="{{ route('jobs.edit',$job->id) }}" class="btn btn-sm btn-outline-info">Edit</a>
    @endcan</span>
    <span class="float-right">  @can('delete',$job)
        <form action="{{ route('jobs.destroy',$job->id) }}" method="POST">
            {{ method_field('delete') }}
            @csrf
            <button type="submit" class="btn btn-sm btn-outline-danger" onclick="return confirm('Are you sure?')"> Delete</button>
         </form>
        @endcan</span>

                          </div>








         <hr>
<br><br>
   @endforeach --}}

         </div>
   {{ $jobs->onEachSide(1)->links() }}
   @stop
   @section('scripts')

   <script src="{{ asset('js/date.js') }}"></script>


   @stop
