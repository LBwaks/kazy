@extends('layouts.app')
@section('title', 'Edit Job')
@section('content')
@include('layouts.partials.message')
<br>
<section class="content-header">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1>Edit  Job</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item"><a  href="{{ route("job.index") }}">Jobs</a></li>
            <li class="breadcrumb-item"><a  href="{{ route('job.show',$job->id) }}">Job Details</a></li>
            <li class="breadcrumb-item active">Edit Job</li>
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
<form  action="{{ route('job.update',$job->slug) }}" method="POST"  enctype="multipart/form-data" class="needs-validation px-4 pb-3 pt-2" novalidate   >
        {{ method_field('PUT') }}
    <h2 class="text-center">Edit This Job</h2>
    {{ csrf_field() }}
    <div class="form-group">
    <label for="catergory">Job Title :</label>
    <input type="text" class="form-control" name="title" value="{{ old('title',$job->title) }}" id="title" required>
                </div>

        <div class="form-group">
        <label for="category">Job Category:</label>
                <select name="category_id[]" class="custom-select mb-3 select2bs4 "  multiple="multiple">
                    @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        @if($job->categories->contains('id',$category->id)) selected @endif
                         {{-- {{ $job->category_id == $category->id ? 'selected' : '' }} --}}
                         >{{ $category->job }}</option>
                    @endforeach
                  </select>
        </div>
    <div class="form-group">
    <label for="location">Time Due:</label>
     <input type="date" class="form-control" name="due"
       value="{{ Carbon\Carbon::parse($job->due)->format('d-m-Y')}}"
       {{-- {{ $job->due->format('d-m-Y') }} --}}
      id="due" required>
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
    <textarea name="description"  class="form-control" id="editor1" rows="3" required>{{ old('description',$job->description) }}</textarea><br>
    <div class="invalid-feedback">Please provide some description.</div>
</div>

<div class="form-group">
    <label for="work">What needs to be done:</label>
<textarea name="work"  class="form-control" id="editor2" rows="3" required>{{ old('work_to_do',$job->work_to_do) }}</textarea><br>
<div class="invalid-feedback">Please provide what needs to be done.</div>
</div>


@if(count($job->images))
<p>This Job  Image(s):</p>

@foreach ($job->images as $image)
<a href="/images/job_image/{{ $image->images ? $image->images :''}}" data-lightbox="photos"><img class="img-fluid" width="350" height="350" src="/images/job_image/{{ $image->images ? $image->images :''}}" alt="{{ Str::limit($job->title,50) }}"></a>
{{-- <img class="img-fluid" width="400" height="400" src="/images/job_image/{{ $image->images ? $image->images :''}}" alt="{{ Str::limit($job->title,50) }}"> --}}

@endforeach
@else
<span class="text-muted h6-responsive"> This Job Has No images!</span>
@endif

<br>
<br>
<div class="form-group">
    <p>Change Job's  Image:</p>
    <div class="custom-file">

        <label class="custom-file-label" for="image">Choose Image</label>
        <input type="file" name="photo[]"   value="" class="custom-file-input" id="customFile" ><br>
</div>
    </div>
    <span>

        @if(count($job->videos))

        <h5 class=""><u>Job Video(s)</u> </h5>

@foreach ($job->videos as $video)

<video class="img-fluid" width="800" height="400" controls>
<source src="/video/job_video/{{ $video->videos ? $video->videos :''}}" alt="{{ Str::limit($job->title,50) }}" type="video/mp4">
<source src="/video/job_video/{{ $video->videos ? $video->videos :''}}" alt="{{ Str::limit($job->title,50) }}" type="video/ogg">
Your browser does not support HTML5 video.
</video>

@endforeach

@endif
      </span>
    <div class="form-group">
        <p>Job's Video:</p>
        <div class="custom-file">

            <label class="custom-file-label" for="image">Choose video</label>
            <input type="file" name="video[]"   value="{{ old('videos',$job->videos)}}" class="custom-file-input" id="customFile" ><br>
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
</div>
</div>
@stop
@section('scripts')

<script src="{{ asset('plugins/select2/js/select2.full.min.js') }}"></script>
<script src="{{ asset('plugins/ckeditor/ckeditor.js') }}"> </script>
<script src="{{ asset('plugins/lightbox/js/lightbox.min.js') }}"> </script>

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

