<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <title>@yield('title')</title>
    @include('layouts.partials.meta')

</head>
<body class="hidden-sn grey-skin">

            @yield('content')
<div id="app">
            @include('layouts.partials.header')
            <main>
                <section class="content">
           <div class="container-fluid">
        </div>

        </section>
     </main>
     @include('layouts.partials.footer')
    </div>
        @yield('scripts')
        @include('layouts.partials.scripts')

</body>
</html>

