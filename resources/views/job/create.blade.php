@extends('layouts.app')
@section('title', 'Post Job')
@section('content')
@include('layouts.partials.message')
<br>

<section class="content-header ">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Post Job</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Post Job</li>
          </ol>
            </nav>
        </div>
      </div>
    </div>
  </section>
  <br>
  <div class="card " style="background-color: rgba(76, 67, 54, 0.1)">
    <div class="card-body px-0 mx-0">
<div class="container-fluid">
    <div class="row">
       <div class="col-md-8 mx-auto">

           @if($errors->any())
           <div class="alert alert-danger">
               <ul>@foreach($errors->all() as $error)
                <li>{{ $error }}</li>

               @endforeach</ul>
           </div>
           @endif
           <h3 class="text-center">Fill Job Details</h3>
{!!Form::open(['method'=>'POST','route'=>'job.store','class'=>'p-4 needs-validation ','novalidate','files'=>true]) !!}

<div class="form-group">
{!! Form::label('title','Job Title:') !!}
{!! Form::text('title',old('title'),['class'=>'form-control','required'=>'yes','id'=>'title']) !!}

<div class="invalid-feedback">Please fill out title field.</div>
</div>



<div class="form-group">
{!! Form::label('category_id','Job Category:') !!}
{!! Form::select('category_id[]',$category,null,['class'=>'form-control  select2bs4','multiple']) !!}
    </div>
    <div class="form-group">
        {!! Form::label('description','Description About This Job:') !!}
        {!! Form::textarea('description',old('description'),['id'=>'editor1'],['class'=>'form-control','rows'=>'2','required'=>'yes','id'=>'description']) !!}
        <div class="invalid-feedback">Please fill out description field.</div>
    </div>
    <div class="form-group">
        {!! Form::label('work','What needs to be done:') !!}
        {!! Form::textarea('work',old('work'),['id'=>'editor2'],['class'=>'form-control','rows'=>'3','required'=>'yes','id'=>'description']) !!}
        <div class="invalid-feedback">Please fill out description field.</div>
    </div>

        <div class="form-group">
    {!! Form::label('due','Deadline:') !!}
    {!! Form::date('due',old('due'),['class'=>'form-control','required'=>'yes','id'=>'due']) !!}
    <div class="invalid-feedback">Please fill out time due field.</div>
        </div>


        <div class="form-group">
            {!! Form::label('location','Job Location:') !!}
            {!! Form::text('location',old('location'),['class'=>'form-control','required'=>'yes','id'=>'location']) !!}
            <div class="invalid-feedback">Please fill out location field.</div>
                </div>
                <div class="form-group">
                    {!! Form::label('address','Job Address:') !!}
                    {!! Form::text('address',old('address'),['class'=>'form-control','required'=>'yes','id'=>'address'])!!}
                    <div class="invalid-feedback">Please fill out address field.</div>
                        </div>


        <p class="mb-1">Job's Image:<span class="text-primary">(Not Complusary)</span> </p>
        <div class="custom-file">
            {!! Form::label('image','Jobs Image',['class'=>'custom-file-label']) !!}
            {!! Form::file('photo[]',['class'=>'custom-file-input','multiple'=>'multiple']) !!}

        </div>
        <br>
        <br>
        <p class="mb-1">Job's Video:<span class="text-primary">(Not Complusary)</span> </p>
        <div class="custom-file">
            {!! Form::label('video','Jobs Video',['class'=>'custom-file-label']) !!}
            {!! Form::file('video[]',['class'=>'custom-file-input','multiple'=>'multiple']) !!}

        </div>


                                        <script>

                                            $(".custom-file-input").on("change", function() {
                                              var fileName = $(this).val().split("\\").pop();
                                              $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
                                            });
                                            </script>


                                        <div class="mt-3 mb-0 text-center">
                                            {!! Form::submit('Post Job',['class'=>'btn btn-outline-info btn btn-block ']) !!}
                                        </div>


{!!Form::close()!!}

<script>

    (function() {
      'use strict';
      window.addEventListener('load', function() {
        var forms = document.getElementsByClassName('needs-validation');
        var validation = Array.prototype.filter.call(forms, function(form) {
          form.addEventListener('submit', function(event) {
            if (form.checkValidity() === false) {
              event.preventDefault();
              event.stopPropagation();
            }
            form.classList.add('was-validated');
          }, false);
        });
      }, false);
    })();
    </script>

</div>
</div>
</div>
</div>
</div>
@stop
@section('scripts')
<script src="{{ asset('js/date.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"> </script>

<script>
    function preview(input){
        var file=$('input[type=file]').get(0).files[0];
        if(file){
         var reader=new FileReader();
         reader.onload=function(){
             $('#previewing').attr('src',reader.result);
         }
         reader.readAsDataURL(file);
        }
    }
    </script>
    <script>
    CKEDITOR.replace('editor1',{
        height:200,
        baseFloatIndex:10005
    });
    CKEDITOR.replace('editor2',{
        height:200,
        baseFloatIndex:10005
    });

    $(function () {
$('.select2bs4').select2({
    theme: 'bootstrap4'
});
$('.select2bs4').select2({
				theme: 'bootstrap4'
			})


});
</script>

@stop

