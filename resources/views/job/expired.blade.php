@extends('layouts.app')
@section('title', 'My Jobs')
@section('content')
<br>
<section class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jobs With Approved Applications</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('job.index') }}">Jobs</a></li>
            <li class="breadcrumb-item active">Jobs With Approved Applications</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
  @include('layouts.partials.message')
  <br>
  <div class="table-responsive">
  <table class="table table-sm table-bordered table-striped">
    <thead>
      <tr>
        <th>Title</th>
        <th>Location</th>
        <th>Address</th>
        <th>Deadline</th>

      </tr>
    </thead>
    <tbody>
        @forelse ($ExpriredJobs as $job )
        <tr>
            <td>{{ Str::limit($job->title,50 )}}</td>
            <td>{{ $job->location }}</td>
            <td>{{ $job->address }}</td>
            @if($job->due >  Carbon\Carbon::now())
<td>{{ $job->due }}</td>
            @else
            <td>Expired</td>
            @endif
            <td><a href="{{ route('job.edit',$job->slug) }}" class="edit btn btn-warning btn-sm">Add Time</a></td>
            <td><a href="{{ $job->url}}" class="edit btn btn-success btn-sm">View</a></td>
          </tr>
        @empty
        <tr>
            <td>No Pending Jobs</td>

          </tr>
        @endforelse

    </tbody>
  </table>
  {{ $ExpriredJobs->onEachSide(1)->links() }}
  </div>

         </div>

   @stop
   @section('scripts')
   @stop
{{-- @extends('layouts.app')
@section('title', 'My Jobs')
@section('content')
<br>
<section class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Jobs With Approved Applications</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('job.index') }}">Jobs</a></li>
            <li class="breadcrumb-item active">Jobs With Approved Applications</li>
          </ol>
        </div>
      </div>
    </div>
  </section>
  <div class="container">
  @include('layouts.partials.message')
  <br>

<table class="table table-bordered table-striped myJobs">
    <thead>
        <tr>
            <th>No</th>
            <th>title</th>
            <th>location</th>
            <th>address</th>

            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

         </div>

   @stop
   @section('scripts')
   <script src="{{ asset('plugins/dataTables/jquery.dataTables.min.js') }}"></script>
   <script  src="{{ asset('plugins/dataTables/DataTables-1.10.23/js/dataTables.bootstrap4.min.js') }}"></script>
    <script  src="{{ asset('plugins/dataTables/Responsive-2.2.7/js/dataTables.responsive.min.js') }}"></script>
    <script  src="{{ asset('plugins/dataTables/Responsive-2.2.7/js/responsive.bootstrap4.min.js') }}"></script>
    <script  src="{{ asset('plugins/dataTables/Buttons-1.6.5/js/buttons.bootstrap4.min.js') }}"></script>

<script>
    $(document).ready( function () {
    $('.myJobs').DataTable({
    processing:true,
    serverSide:true,
    ajax:"{{ route('pending-jobs') }}",
    columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        { data:'title',name:'title'},
        {data:'location',name:'location'},
         { data:'address',name:'address'},

        {data:'action',name:'action',orderable:true,searchable:true},
        ]
    });
});
</script>

   @stop --}}
