@extends('layouts.app')
@section('title', 'Pending Applications')
@section('content')

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
            <li class="breadcrumb-item active">Pending Applications</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<br>
<H1>Hello world</H1>
@stop
@section('scripts')
@stop
