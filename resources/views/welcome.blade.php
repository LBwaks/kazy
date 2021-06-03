@extends('layouts.app')
@section('title', 'Kazi Yangu')
@section('content')


    <div class="hommme">
<section class="py-7 py-md-0 bg-hero " id="home">
    <div class="container">
        <div class="row vh-100 vh-md-100">

            <div class="col-md-8 col-sm-10 col-12 mx-auto my-auto text-center">
                <h1 class="heading-black text-capitalize">Kazi-Yangu</h1>
                <p class="lead py-3">Kazi-Yangu is a job-listing platform that helps job recruiters find the most right skilled persons to work on their jobs and job seekers find the perfect jobs for their skills.
                     Sign up for free.</p>
                <a href="{{ route('login') }}"class="btn btn-primary d-inline-flex flex-row align-items-center">
                    Get started now
                    <em class="ml-2" data-feather="arrow-right"></em>
                </a>
            </div>
        </div>

    </div>
</section>

<!-- features section -->
<section class="pt-6 pb-7" id="features">
    <div class="container">

        <div class="row mt-5">
            <div class="col-md-10 mx-auto">
                <div class="row feature-boxes">
                    <div class="col-md-6 box" >

                        <a href="{{ route('job.index') }}" class="btn btn-outline-primary">Get Jobs</a>
                        <p class="text-muted">Get all jobs details uploaded by job recruiters.The jobs that have already been approved won't be listed here. All jobs that have meet their deadline also wont'appear here.</p>
                    </div>
                    <div class="col-md-6 box">

                        <a href="{{ route('job.create') }}" class="btn btn-outline-primary">Post Jobs</a>
                        <p class="text-muted">Registered job recruiters can upload details about their jobs. You have to be registered for you to be able to upload your job details. </p>
                    </div>


                </div>
            </div>
        </div>

    </div>
</section>
</div>


@stop
@section('scripts')

<script src="{{ asset('js/date.js') }}"></script>

@stop




