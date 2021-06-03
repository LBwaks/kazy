<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>Kazy-Yangu - @yield('title')</title>
    @include('layouts.partials.meta')
</head>
<body class="hidden-sn grey-skin">
<div id="app">


 @include('layouts.partials.header')
<main>

           <div class="container-fluid" style="">
            @yield('content')
        </div>

     </main>
     @include('layouts.partials.footer')
    </div>
        @yield('scripts')
        @include('layouts.partials.scripts')
<!--Start of Tawk.to Script-->
<script type="text/javascript">
    var Tawk_API=Tawk_API||{}, Tawk_LoadStart=new Date();
    (function(){
    var s1=document.createElement("script"),s0=document.getElementsByTagName("script")[0];
    s1.async=true;
    s1.src='https://embed.tawk.to/605c9ad5067c2605c0bc3225/1f1krpl79';
    s1.charset='UTF-8';
    s1.setAttribute('crossorigin','*');
    s0.parentNode.insertBefore(s1,s0);
    })();
    </script>
    <!--End of Tawk.to Script-->
</body>
</html>

