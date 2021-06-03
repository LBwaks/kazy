@extends('layouts.app')
@section('title', 'Jobs Per Categories')
@section('content')
<br>
<section class="content-header ">
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
  @include('layouts.partials.search')
    <br>
  <div class="card ">
    <div class="card-body">
<div class="row">
    <div class="col-lg-8 col-sm-12">

          @forelse ($category_jobs as $job)

          <div class="card  text-dark" style="background-color: rgba(96, 125, 135, 0.1)">
            <div class="card-body px-auto pb-0 pt-1" >
                <div class="row">
                    <div class=" col-md-8 col-sm-12 pr-0 mr-0">
                <div class="pb-1 "><h6><a href="{{ $job->url}}">{{Str::limit($job->title, 50)  }}</a></h6></div>


                @if($job->categories->count()===0)

                        <span class="badge badge-pill badge-info">Open</span>
                    @endif
                   <span> <i class="fas fa-tags fa-lg mr-1"></i>@foreach($job->categories as $category)

                    <span><a href="{{ route('category.show',$category->slug) }}" class="badge badge-pill badge-secondary">{{ $category->job }}</a> </span>
                    @endforeach </span>
                         <br>

                         <div class="font-weight-light py-1 text-monospace mx-4 "> {{ Str::limit(strip_tags($job->description,300))}}</div>

                          <div class="text-muted font-weight-light"> <i class="fa fa-clock mr-1"></i>Deadline:  {{ $job->due->diffForHumans() }} </div>

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

<div class="card  text-dark" style="background-color: rgba(96, 125, 135, 0.1)">
    <div class="card-body px-auto pb-0 pt-1" >
        <p class="text-center">Sorry No Jobs For This Category!</p>
    </div>
</div>
 @endforelse
{{ $category_jobs->onEachSide(1)->links() }}

</div>

<div class="col-lg-4">
    @if(count($populars)>0)


    <div class="card">
        <div class="card-header text-center">Popular Jobs </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
                @foreach($populars as $job)
<a href=" {{ $job->url}}" class="list-group-item list-group-item-action">{{Str::limit($job->title, 90)  }}</a>

                @endforeach

                  </ul>
        </div>
    </div>
<br>
@endif

@if(count($otherJobs)>0)
<div class="card ">
    <div class="card-header text-center">Other Jobs You May like</div>
    <div class="card-body">

   <ul class="list-group list-group-flush">
  @foreach($otherJobs as $job)
  <a href="{{ $job->url}}" class="list-group-item list-group-item-action">{{ $job->title}}</a>

  @endforeach

  </ul>
    </div>
</div>
@endif

</div>
</div>

</div>
</div>
@endsection

