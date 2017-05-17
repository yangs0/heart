<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="site" content="http://www.yangs0.cn/" />
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name', 'Laravel') }}</title>
    <!-- Styles -->
    <link href="{{asset('/vendor/bootstrap/css/bootstrap.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/app.css')}}" rel="stylesheet">

    @yield('styles')
    <script>

        Config = {
            'token': '{{ csrf_token() }}',
            'environment': '{{ app()->environment() }}',
        };

       /* var ShowCrxHint = 'isset($show_crx_hint) ? $show_crx_hint : 'no'';*/
    </script>
</head>
<body id="body">
    @include('flash::message')

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
    <script type="text/javascript" src="/vendor/layer/layer.js"></script>
    <style>
        .navbar-default .navbar-nav > .open > a{
            background-color: #37474F !important;
            color: #666!important;
        }
    </style>
    @yield('script')
    @if(session()->has('flash_return_msg'))
        <script>
            @if(session('flash_return_msg')['status'] == 'success')
                layer.msg('{{session('flash_return_msg')['msg']}}', {time: 3500, icon:6});

            @elseif(session('flash_return_msg')['status'] == 'fail')
               layer.msg('{{session('flash_return_msg')['msg']}}', {time: 3500, icon:5});
            @elseif(session('flash_return_msg')['status'] == 'warning')
                 layer.msg('{{session('flash_return_msg')['msg']}}', {time: 3500, icon:7});
                @endif
        </script>

    @endif
   {{-- <script type="text/javascript" src="//github.atool.org/canvas-nest.min.js"></script>--}}
</body>
</html>
