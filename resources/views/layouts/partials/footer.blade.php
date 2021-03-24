<footer class="page-footer font-small unique-color-dark ">

    <!-- Social buttons -->
    <div class="primary-color">
        <div class="container">
            <!--Grid row-->
            <div class="row py-2 d-flex align-items-center">

                <!--Grid column-->
                <div class="col-md-6 col-lg-5 text-center text-md-left mb-4 mb-md-0">
                    <h6 class="mb-0 white-text">Get connected with us on social networks!</h6>
                </div>
                <!--Grid column-->

                <!--Grid column-->
                <div class="col-md-6 col-lg-7 text-center text-md-right">
                    <!--Facebook-->
                    <a class="fb-ic ml-0">
                        <i class="fab fa-facebook white-text mr-4"> </i>
                    </a>
                    <!--Twitter-->
                    <a class="tw-ic">
                        <i class="fab fa-twitter white-text mr-4"> </i>
                    </a>
                    <!--Google +-->
                    <a class="gplus-ic">
                        <i class="fab fa-google-plus white-text mr-4"> </i>
                    </a>
                    <!--Linkedin-->
                    <a class="li-ic">
                        <i class="fab fa-linkedin white-text mr-4"> </i>
                    </a>
                    <!--Instagram-->
                    <a class="ins-ic">
                        <i class="fab fa-instagram white-text mr-lg-4"> </i>
                    </a>
                </div>
                <!--Grid column-->

            </div>
            <!--Grid row-->
        </div>
    </div>
    <!-- Social buttons -->

    <!--Footer Links-->
    <div class="container mt-3 mb-1 text-center text-md-left">
        <div class="row mt-1">

            <!--First column-->
            <div class="col-md-3 col-lg-4 col-xl-3 mb-4">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Kazy-Yangu</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>A Juakali Job Platform that helps Juakali artisan connect to people who need their services while also
                    helping people get artisan to solve their problem.</p>
            </div>
            <!--/.First column-->

            <!--Second column-->
            <div class="col-md-2 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Products</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="#!">Home</a>
                </p>
                <p>
                    <a href="#!">Jobs</a>
                </p>
                <p>
                    <a href="#!">Post Job</a>
                </p>
                <p>
                    {{-- <a href="#!">Bootstrap Angular</a> --}}
                </p>
            </div>
            <!--/.Second column-->

            <!--Third column-->
            <div class="col-md-3 col-lg-2 col-xl-2 mx-auto mb-4">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Useful links</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <a href="#!">Sign In</a>
                </p>
                <p>
                    <a href="#!">Contact Us</a>
                </p>
                <p>
                    <a href="#!">About Us</a>
                </p>
                <p>
                    <a href="#!">FAQ</a>
                </p>
            </div>
            <!--/.Third column-->

            <!--Fourth column-->
            <div class="col-md-4 col-lg-3 col-xl-3">
                <h6 class="text-uppercase font-weight-bold">
                    <strong>Contact</strong>
                </h6>
                <hr class="deep-purple accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
                <p>
                    <i class="fas fa-home"></i></i> Eldoret, Daima Towers, Keenya</p>
                <p>
                    <i class="fa fa-envelope mr-3"></i> info@kazyYangu.com</p>
                <p>
                    <i class="fa fa-phone mr-3"></i> + 01 234 567 88</p>
                <p>
                    <i class="fa fa-print mr-3"></i> + 01 234 567 89</p>
            </div>
            <!--/.Fourth column-->

        </div>
    </div>
    <!--/.Footer Links-->

    <!-- Copyright -->
    <div class="footer-copyright text-center py-3">© 2021 Copyright:
        <a href="https://kazy-Yangu.com"> Kazy-Yangu</a>
    </div>
    <!-- Copyright -->

</footer>
{{-- <footer class="page-footer footer font-small unique-color-dark mt-auto py-3">
    <div class="container-fluid">
 <div class="row">
  <div class="col-sm-4 col-md-5 col-lg-4">
            <ul class="footer-nav mx-auto pt-3 pb-0">
            <center>
                <li><a href="about.php">About Us</a></li>
                <li><a href="contact.php">Contact Us</a></li>
                 </center>
            </ul>
        </div>
        <div class="col-sm-4 col-md-2 col-lg-4" >
        <div class=" pt-3 pb-0 mx-auto">
      <center><div id="copyright" >  </div> </center>
        <script src="{{ asset('js/date.js') }}" ></script>


        </div>
    </div>

         <div class="col-sm-4 col-md-5 col-lg-4 clearfix" >
            <ul class=" float-sm-left float-md-right float-lg-right pt-3 pb-0">
            <center>
                <a  class="px-4 py-5" href="#"><i class="fab fa-facebook"></i></a>

                <a  class="px-4 py-5" href="#"><i class="fab fa-twitter"></i></a>
                </center>
            </ul>
        </div>
    </div>
</div>
</footer> --}}

{{-- @if (notify()->ready())
    <script>
        swal({
            title: "{!! notify()->message() !!}",
            text: "{!! notify()->option('text') !!}",
            type: "{{ notify()->type() }}",
            @if (notify()->option('timer'))
                timer: {{ notify()->option('timer') }},
                showConfirmButton: false
            @endif
        });
    </script>
@endif --}}
