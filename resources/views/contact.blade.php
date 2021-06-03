@extends('layouts.app')
@section('title', 'Contact Us')
@section('content')

<section class="content-header">
    <div class="container">
      <div class="row mb-0">
        <div class="col-sm-5">
          <h1> Contact Us</h1>
        </div>
        <div class="col-sm-7">
            <nav aria-label=" breadcrumb">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a  href="{{ url('/home') }}">Home</a></li>
            <li class="breadcrumb-item active">Contact Us</li>
          </ol>
            </nav>
        </div>
      </div>
    </div>
  </section>

<div class="container">
    <section class="mb-4" style="background-color: Beige">


    <h2 class="h1-responsive font-weight-bold text-center my-4">Contact us</h2>

    <p class="text-center w-responsive mx-auto mb-5">Do you have any questions? Please do not hesitate to contact us directly. Our team will come back to you within
        a matter of hours to help you.</p>

    <div class="row">


        <div class="col-md-9 mb-md-0 mb-5">
            @if($errors->any())
  <div class="alert alert-danger">
      <ul>@foreach($errors->all() as $error)
       <li>{{ $error }}</li>

      @endforeach</ul>
  </div>
  @endif
            <form  action="{{ route('contact') }}" method="POST" id="contact-form"  class="needs-validation px-4 pb-3 pt-2" novalidate >
                {{ csrf_field() }}
                <!--Grid row-->
                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" class="form-control"  id="name" name="name" value="{{ old('name') }}" id="name" required>
                            <div class="invalid-feedback">Please provide your name.</div>
                            <label for="name" class="">Your name</label>
                        </div>
                    </div>

                    <!--Grid column-->
                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="email" id="email" class="form-control" name="email" value="{{ old('email') }}" id="email" required>
                         <div class="invalid-feedback">Please provide your email.</div>
                            <label for="email" class="">Your email</label>
                        </div>
                    </div>
                    <!--Grid column-->




                    <div class="col-md-12">
                        <div class="md-form mb-0">
                            <input type="text" class="form-control" id="subject" name="subject" value="{{ old('subject') }}" id="subject" required>
                            <div class="invalid-feedback">Please provide your subject.</div>
                            <label for="subject" class="">Subject</label>
                        </div>
                    </div>
                </div>

                <div class="row">

                    <!--Grid column-->
                    <div class="col-md-12">

                        <div class="md-form">
                            <textarea class="form-control md-textarea" id="message" required value="{{ old('message') }}" name="message" rows="2" id="message"></textarea>
                            <label for="message">Your message</label>
                        </div>

                    </div>
                </div>
                <!--Grid row-->

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

            <div class="text-center text-md-left">
                <a class="btn btn-primary" onclick="document.getElementById('contact-form').submit();">Send</a>
            </div>
            <div class="status"></div>
        </div>

        <div class="col-md-3 text-center">
            <ul class="list-unstyled mb-0">
                <li><i class="fas fa-map-marker-alt fa-2x"></i>
                    <p>Eldoret, Daima Towers, Kenya</p>
                </li>

                <li><i class="fas fa-phone mt-4 fa-2x"></i>
                    <p>+ 01 234 567 89</p>
                </li>

                <li><i class="fas fa-envelope mt-4 fa-2x"></i>
                    <p>kazi-yangu@gmail.com</p>
                </li>
            </ul>

        </div>

    </div>

</section>

</div>



@endsection

