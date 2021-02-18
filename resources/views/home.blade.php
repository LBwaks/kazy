@extends('layouts.app')
@section('pageTitle', 'Home')
@section('content')

<section class="home-section section-hero overlay bg-image " style="background-image: url('/images/app/1615431.jpg');" id="home-section">
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
                <select class="selectpicker" data-style="btn-white btn-lg" data-width="100%" data-live-search="true" title="Select Region">
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

  </section>
   {{-- <div class="home-content mt-5 mb-0">

        <div class="cover">
       <div class="cover-header ">
        <h1 class="px-3 pt-3 ">Kazi Yangu Jobs </h1>
        <p class="px-3 pt-3 "> A platform that helps you connect to the most skilled personell for your job!</p>
       </div>
       <br>
       <br>
       <div class="find d-flex justify-content-center  py-md-4 px-md-5">
           <div class="card">
               <div class="card-body search-box w-100">
                <form class="form-inline d-flex flex-md-row flex-column align-items-center justify-content-around ">
                    <div class="form-group">
                        <input type="text" id="" class="form-control mb-2 mr-md-5" placeholder=" Job eg. Plumber" name="" />
                    </div>
                             <div class="form-group">
                                <input type="text" id="" class="form-control mb-2 mr-md-5" placeholder="Location" name="" />
                            </div>
                    <div class="form-group category-select">
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
                            </form>
               </div>
           </div>

    </div>
    </div>
    </div> --}}

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
