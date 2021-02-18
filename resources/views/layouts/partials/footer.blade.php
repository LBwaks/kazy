<footer class="page-footer font-small unique-color-dark">
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
</footer>

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
