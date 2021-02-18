@extends('layouts.app')
@section('title', 'Pending Bids')
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
      <div class="row">
          <div class="col-md-10">
              {!! $dataTable->table() !!}
          </div>
      </div>
  </div>
  {!! $dataTable->scripts() !!}
  @stop
