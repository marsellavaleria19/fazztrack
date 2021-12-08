<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        @stack('before-style')
        @include('includes.style')
        @stack('after-style')
        @stack('before-script')
        @include('includes.script')
        @stack('after-script')
        <title>@yield('title')</title>
    </head>
    <body>   
       <div class="content">
            @include('sweetalert::alert')
            @yield('container')
       </div> 
    </body>
</html>