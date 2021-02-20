<!DOCTYPE html>
<html lang="en">
  <head>
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="shortcut icon" href="{{ asset('icon.png') }}">
    @stack('plugin-styles')
    @include('asset.css')
    @stack('styles')
  </head>
  <body class="bg-gray-100">
    @yield('content')

    @yield('modal')
    @include('asset.js')
    @stack('scripts')
  </body>
</html>