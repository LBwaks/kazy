
@extends('layouts.app')
@section('title', 'Jobs')
@section('content')

<br>

<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Jobs</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Jobs</li>
          </ol>
            </nav>
        </div>
      </div>
    </div>
  </section>
  <br>

  <div class="container-fluid">
      <div class="search-box">
<form action="" class="form-inline d-flex justify-content-center md-form form-sm">
    <input type="text"  placeholder="Search Here" class="form-control form-control-sm mr-3 w-75" aria-label="Search">
    <i class="fas fa-search"></i>
</form>
</div>
    <br>
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
                       <span> <i class="fas fa-tags mr-1"></i>@foreach($job->categories as $category)

                        <span><a href="{{ route('category.show',$category->id) }}" class="badge badge-pill badge-light">{{ $category->job }}</a> </span>
                        @endforeach </span>
                             <br>

                             <div class="font-weight-light py-1 text-monospace mx-4 "> {{ Str::limit(strip_tags($job->description,300))}}</div>

                              <div class="text-muted font-weight-light"> <i class="fa fa-clock mr-1"></i>Time Due:  {{ $job->due }}   (USE COUNTDOWN TIMER)</div>

                        <div class="pb-1 text-muted font-weight-light">
                            <i class="fas fa-user-circle  mr-1"></i>
                            <a href="{{ route('users.show',$job->user->name) }}"class="mr-2 font-italic">{{ $job->user->name }}</a>
                            <span class="mr-2"><i class="fa fa-map-marker-alt mr-1"></i>  {{ $job->location }}</span>
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

                       {{-- @if($job->images) --}}
{{-- <div class="job-image">
    <img class=" rounded " src="/images/job_image/{{ $job->firstImage}}" class="img-fluid"  height="175" alt="{{ Str::limit($job->title,50) }}">
</div> --}}

                   {{-- @endif --}}


</div>
                  </div>
                </div>
                </div>


            </div>



<br>
   @endforeach
</div>

<div class="col-lg-4">
    {{-- @include('categories._tag') --}}
    <hr>
    <p>Popular Jobs</p>
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
</div>
   {{ $jobs->onEachSide(1)->links() }}

@stop
@section('scripts')

<script src="{{ asset('js/date.js') }}"></script>

@stop
