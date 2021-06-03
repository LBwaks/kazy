
@extends('layouts.app')
@section('title', 'Search Results')
@section('content')

<section class="content-header mt-4">
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



    <br>
    <div class="container">
    <div class="card ">
        <div class="card-body">
    <div class="row">
       <div class="col-lg-12 col-sm-12">
           <h3 class="text-center">{{ $jobs->count() }} Search Result(s) </h3>

    @forelse ($jobs as $job)

            <div class="card  text-dark" style="background-color: rgba(96, 125, 135, 0.1)">
                <div class="card-body px-auto pb-0 pt-1" >
                    <div class="row">
                        <div class=" col-md-8 col-sm-12 pr-0 mr-0">
                    <div class="pb-1 "><h6><a href="{{ $job->url}}">{{Str::limit($job->title, 50)  }}</a></h6></div>




                    <span> </i>@foreach($job->categories as $category)
                        @if($category->job !== 'Open')
                        <span><a href="{{ route('category.show',$category->id) }}" class="badge badge-pill badge-secondary">{{ $category->job }}</a> </span>
                        {{-- <br> --}}
                        @endif
                        @endforeach </span>




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
@empty
<div class="card" style="background-color: rgba(96, 125, 135, 0.1)">
    <div class="card-body text-center">
        <p> No Results for  </p>
    </div>
</div>
<br>
   @endforelse
   <p>{{$jobs->count()}} of {{ $jobs->total() }} Search result(s)</p>
   {{ $jobs->
//    withQueryString()->
   appends(request()->query->all())->
   onEachSide(1)->links() }}
</div>


</div>


</div>
</div>
<br>
</div>
@stop
@section('scripts')

<script src="{{ asset('js/date.js') }}"></script>

@stop
