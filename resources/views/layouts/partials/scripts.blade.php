
<script type="text/javascript" src="{{ asset("plugins/popper/popper.js") }}"></script>
<script type="text/javascript" src="{{ asset('plugins/mdb/js/mdb.min.js') }}"></script>
<script src="{{ asset('js/date.js') }}"></script>
  <!-- Your custom scripts (optional) -->
  <script type="text/javascript">
   $(document).ready(function() {

  // SideNav Button Initialization
  $(".button-collapse").sideNav();
   // SideNav Scrollbar Initialization
    var sideNavScrollbar = document.querySelector('.custom-scrollbar');
    var ps = new PerfectScrollbar(sideNavScrollbar);
});


  </script>

