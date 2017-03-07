<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{asset('/assets/css/app.css')}}" rel="stylesheet">
    @yield('styles')
    <script>
        Config = {
            'token': '{{ csrf_token() }}',
            'environment': '{{ app()->environment() }}',
        };

        var ShowCrxHint = '{{isset($show_crx_hint) ? $show_crx_hint : 'no'}}';
    </script>
</head>
<body id="body">
    @include("layouts.partials.nav")
    <div class="main-body" >
        @yield('content')
    </div>
    @include('layouts.partials.foot')

    <script type="text/javascript" src="/assets/js/all.js"></script>


    {{--  <script type="text/javascript" src="/vendor/jquery/jquery.min.js"></script>
     <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>--}}
    {{--
     <script type="text/javascript" src="/vendor/bootstrap/js/bootstrap.min.js"></script>--}}
    <script type="text/javascript" src="/assets/js/helper.js"></script>
    @yield('script')
   {{-- <script type="text/javascript" src="//github.atool.org/canvas-nest.min.js"></script>--}}
</body>
</html>
