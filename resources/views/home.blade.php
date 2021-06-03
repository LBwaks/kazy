@extends('layouts.app')
@section('title', 'Home')
@section('content')

{{-- <section class="home-section section-hero overlay bg-image"

id="home-section">
<br>
    <div class="container">
      <div class="row d-flex mt-5">
        <h1 class="text-white font-weight-lighter">Kazy-Yangu Jobs</h1>
        <div class="col-md-12 align-items-center justify-content-center">
          <div class="mb-5 text-center mt-5">
            <h1 class="text-white font-weight-light"></h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Cupiditate est, consequuntur perferendis.</p>
          </div>

          <form method="post" class="search-jobs-form">
            <div class="row mb-5">
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <input type="text" class="form-control form-control-lg" placeholder="Job title, Company...">
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <select class="selectpicker"
                 {{-- data-style="btn-white btn-lg"
                 data-width="100%" data-live-search="true" title="Select Region">
                  <option>Anywhere</option>
                  <option>San Francisco</option>
                  <option>Palo Alto</option>
                  <option>New York</option>
                  <option>Manhattan</option>
                  <option>Ontario</option>
                  <option>Toronto</option>
                  <option>Kansas</option>
                  <option>Mountain View</option>
                </select>
              </div>
              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <input type="text" class="form-control form-control-lg" placeholder="Job Location, Huruma...">
              </div>

              <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
                <button type="submit" class="btn btn-primary btn-lg btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>Search Job</button>
              </div>
            </div>

          </form>

          <div class="row py-4">
            <div class="col-12 md-6 col-sm-6 text-center">
                <a href="{{ route('job.index') }}" class="btn btn-lg btn-outline-white btn-rounded btn-block waves-effect z-depth-0">Go to Jobs</a>


          </div>
          <div class="col-12 md-6 col-sm-6 text-center">

            <a href="{{ route('job.create') }}" class="btn btn-lg btn-outline-white btn-rounded btn-block waves-effect z-depth-0">Post Jobs</a>



          </div>
          </div>
        </div>


      </div>


    </div>

    <a href="#next" class="scroll-button smoothscroll">
      <span class=" icon-keyboard_arrow_down"></span>
    </a>

  </section> --}}
   <div class="home-content  mb-0 d-flex flex-column justify-content-center align-items-center">


       <div class="cover-header ">
        <h1 class="px-3 pt-3 ">Kazy-Yangu Jobs </h1>
        <h4 class="px-3 pt-3 "> A platform that helps you connect to the most skilled personell for your job!</h4>
       </div>
       <br>
       <br>
       <div class="find  w-75
       justify-content-center  py-md-4 px-md-5 align-content-center">
       <form method="get" action="{{ route('find') }}"class="search-jobs-form">
        @csrf
        <div class="row mb-5">
          <div class="col-12 col-sm-6 col-md-6 col-lg-4 mb-4 mb-lg-0">
            <input type="text" class="form-control form-control-lg" placeholder="Job title" name="title" value="{{ request()->input('query') }}">
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <select id="" class="form-control form-control-lg mb-2 mr-sm-5"  name="category">
                {{-- <option selected="true" disabled="disabled">Choose Location</option> --}}
                @foreach ($categories as $category)
                <option value="{{ $category->id }}" >{{ $category->job }}</option>
                @endforeach

        </select>
          </div>
          <div class="col-12 col-sm-6 col-md-6 col-lg-3 mb-4 mb-lg-0">
            <input type="text" class="form-control form-control-lg" placeholder="Job Location" name="location" value="{{ request()->input('query') }}">
          </div>

          <div class="col-12 col-sm-6 col-md-6 col-lg-2 mb-4 mb-lg-0">
            <button type="submit" class="btn btn-primary btn-block text-white btn-search"><span class="icon-search icon mr-2"></span>   <i class="fas fa-search"></i></button>
          </div>
        </div>

      </form>


                {{-- <form class="form-inline d-flex flex-md-row flex-column align-items-center justify-content-around ">
                    <div class="form-group flex-fill">
                        <input type="text" id="" class="form-control mb-2 mr-md-5" placeholder=" Job eg. Plumber" name="" />
                    </div>
                             <div class="form-group flex-fill">
                                <input type="text" id="" class="form-control mb-2 mr-md-5" placeholder="Location" name="" />
                            </div>
                    <div class="form-group flex-fill category-select">
                        <select id="" class="form-control mb-2 mr-sm-5"  name="">

                            <option value="">Plumbing</option>
                            <option value="">Plumbing</option>
                            <option value="">Plumbing</option>
                            <option value="">Carpenter</option>

                    </select>
                    </div>


                    <div class="form-group">

                                  <button type="submit" class="btn btn-primary mb-2">Search</button>
                                </div>
                            </form> --}}


    </div>

    </div>
<br>
               @stop
               @section('scripts')
               <script src="{{ asset('plugins/select2/js/bootstrap-select.min.js') }}"></script>
               <script>
                    $(function () {
                        var selectPickerInit = function() {
                $('.selectpicker').selectpicker();
            }
            selectPickerInit();
                    })
               </script>


               @stop
