@extends('layouts.app')
@section('title', 'My Jobs')
@section('content')
<br>
<section class="content-header">
    <div class="container">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>My Jobs</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a href="{{ route('job.index') }}">Jobs</a></li>
            <li class="breadcrumb-item active">My Jobs</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
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
            <th> Deadline</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>

    </tbody>
</table>

         </div>
   {{-- {{ $jobs->onEachSide(1)->links() }} --}}
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
    ajax:"{{ route('job.myjobs') }}",
    columns:[
        {data:'DT_RowIndex',name:'DT_RowIndex'},
        { data:'title',name:'title'},
        {data:'location',name:'location'},
         { data:'address',name:'address'},
         { data:'due',name:'due'},
        {data:'action',name:'action',orderable:true,searchable:true},
        ]
    });
});
</script>

   @stop
