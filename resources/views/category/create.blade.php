@extends('layouts.app')
@section('pageTitle', 'Home')
@section('content')
<br>

<section class="content-header mt-5">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1> Create Categories</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Create Categories</li>
          </ol>
            </nav>
        </div>
      </div>
    </div>
  </section>
  <br>
<form  action="{{ route('category.store') }}" method="POST"   class="needs-validation px-4 pb-3 pt-2" novalidate style="border: 1px solid black;"  >
    <h4>Create New Job.</h4>
    {{ csrf_field() }}


    <div class="form-group">
    <label for="location">Job Category:</label>
     <input type="text" class="form-control" name="category" value="{{ old('category') }}" id="category" required>
     <div class="invalid-feedback">Please provide job catergory.</div>
    </div>

    <div class="form-group">
    <label for="address">Job Type:</label>
     <input type="text" class="form-control" name="job"  id="job" value="{{ old('job') }}" required>
     <div class="invalid-feedback">Please provide job type.</div>
    </div>





    <div class="mt-3">
        <button type="submit"  class="btn btn-info">Submit</button>

    </div>
    </form>
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
@endsection

