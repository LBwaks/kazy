@extends('layouts.app')
@section('title', 'Post Job')
@section('content')
@include('layouts.partials.message')
<br>
<section class="content-header mt-5">
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
<form  action="{{ route('job.update',$job->id) }}" method="POST"  enctype="multipart/form-data" class="needs-validation px-4 pb-3 pt-2" novalidate style="border: 1px solid black;"  >
        {{ method_field('PUT') }}
    <h4>Edit Job</h4>
    {{ csrf_field() }}
    <div class="form-group">
    <label for="catergory">Job Title :</label>
    <input type="text" class="form-control" name="title" value="{{ old('title',$job->title) }}" id="title" required>
                </div>
               <div class="form-group form-check form-check-inline">
                    {{ $job->categories->count()? 'Current Job ' : '' }} &nbsp;
                   @foreach ($job->categories as $category)
                       <input type="checkbox" value=" {{ $category->id}}" name="category_id[]" class="form-check-input" checked>
                       <label class="form-check-label mr-3">{{ $category->job }} </label>
                   @endforeach
            </div>

            <div class="form-group form-check form-check-inline">
                {{ $filtered->count()? 'Unpicked Job ' : '' }} &nbsp;
               @foreach ($job->categories as $category)
                   <input type="checkbox" value=" {{ $category->id}}" name="category_id[]" class="form-check-input" >
                   <label class="form-check-label mr-3">{{ $category->job }} </label>
               @endforeach
        </div>
        <div class="form-group">
            {!! Form::label('category_id','Category:') !!}
            {!! Form::select('category_id[]',$category,null,['class'=>'form-control  select2bs4','multiple']) !!}
                </div>
                <select name="" id="">
                    @foreach($jobs as $job)
                        <option value="{{ $job[category_id] }}" {{ $selectedvalue== }}></option>
                    @endforeach
                </select>
    <div class="form-group">
    <label for="location">Time Due:</label>
     <input type="date" class="form-control" name="due"  value="{{ old('due',$job->due) }}" id="due" required>
     <div class="invalid-feedback">Please provide job location.</div>
    </div>

    <div class="form-group">
    <label for="location">Location:</label>
     <input type="text" class="form-control" name="location" value="{{ old('location',$job->location) }}" id="location" required>
     <div class="invalid-feedback">Please provide job location.</div>
    </div>

    <div class="form-group">
    <label for="address">Address :</label>
     <input type="text" class="form-control" name="address" value="{{ old('address',$job->address) }}" id="address" required>
     <div class="invalid-feedback">Please provide job address.</div>
    </div>




     <div class="form-group">
        <label for="description">Description:</label>
    <textarea name="description"  class="form-control" id="editor1" rows="2" required>{{ old('description',$job->description) }}</textarea><br>
    <div class="invalid-feedback">Please provide some description.</div>
</div>
<div class="form-group">
    <p>Custom Image:</p>
    <div class="custom-file">

        <label class="custom-file-label" for="image">Choose Image</label>
        <input type="file" name="photo"   value="{{ old('job_image',$job->job_image)}}" class="custom-file-input" id="customFile" ><br>
</div>
    </div>
    <script>
        $(".custom-file-input").on('change',function(){ var fileName=$(this).val().split("\\").pop();
            $(this).siblings(".custom-file-label").addClass("selected").html(fileName);})
    </script>



    <div class="mt-3">
        <button type="submit"  class="btn btn-info">Edit Job</button>

    </div>

            </form>
       </div>
    </div>
  </div>

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
@stop
@section('scripts')
<script src="{{ asset('js/date.js') }}"></script>
<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"> </script>

<script>
    CKEDITOR.replace('editor1',{
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

