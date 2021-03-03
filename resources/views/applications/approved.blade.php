@extends('layouts.app')
@section('title', 'Approved Applications')
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
            <li class="breadcrumb-item active">Approved Applications</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
<br>
  <div class="container">
      <div class="row">
          <div class="col-md-12">
            <table class="table table-bordered table-striped
            approved">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Charge</th>
                        <th>Duration</th>
                        <th>Time</th>
                        <th> Approved</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>

                </tbody>
            </table>
          </div>
      </div>
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
 $('.approved').DataTable({
 processing:true,
 serverSide:true,
 ajax:"{{ route('approved') }}",
 columns:[
     {data:'DT_RowIndex',name:'DT_RowIndex'},
     { data:'charge',name:'charge'},
     {data:'duration',name:'duration'},
      { data:'time',name:'time'},
      { data:'approved',name:'approved'},
     {data:'action',name:'action',orderable:true,searchable:true},
     ]
 });
});
</script>

@stop
