<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title>后台管理中心</title>
    <meta name="keywords" content="index">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="renderer" content="webkit">
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="icon" type="image/png" href="/favicon.png">
    <link rel="apple-touch-icon-precomposed" href="assets/i/app-icon72x72@2x.png">
    <meta name="apple-mobile-web-app-title" content="Amaze UI" />
    {{--<script src="assets/js/echarts.min.js"></script>--}}
    <link rel="stylesheet" href="{{asset('/css/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/amazeui.datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/css/app.css')}}">
    <script src="{{asset('/js/jquery.min.js')}}"></script>

</head>

<body data-type="login">
<script src="{{asset('/js/theme.js')}}"></script>
<div class="am-g tpl-g">
    <!-- 风格切换 -->
    <div class="tpl-skiner">
        <div class="tpl-skiner-toggle am-icon-cog">
        </div>
        <div class="tpl-skiner-content">
            <div class="tpl-skiner-content-title">
                选择主题
            </div>
            <div class="tpl-skiner-content-bar">
                <span class="skiner-color skiner-white" data-color="theme-white"></span>
                <span class="skiner-color skiner-black" data-color="theme-black"></span>
            </div>
        </div>
    </div>
    <div class="tpl-login">
        <div class="tpl-login-content">
            <div class="tpl-login-logo">
                <img src="{{url('/images/logoa.png')}}" alt="">
            </div>

            @if($errors->count())
                <div class="am-alert am-alert-danger" id="my-alert" >
                    <p>账号或密码不正确！{{$errors->first()}}</p>
                </div>
            @endif
            <form class="am-form tpl-form-line-form {{ $errors->count() ? ' am-form-error' : '' }}" method="POST" action="{{ route('login') }}">

                <div class="am-form-group ">
                    <input type="text" class="tpl-form-input" id="user-name" name="account" placeholder="请输入账号">
                </div>

                <div class="am-form-group">
                    <input type="password" class="tpl-form-input" name="password" id="user-name" placeholder="请输入密码">

                </div>

                <div class="am-form-group">

                    <button type="submit" class="am-btn am-btn-primary  am-btn-block tpl-btn-bg-color-success  tpl-login-btn">提交</button>

                </div>
            </form>

        </div>
    </div>
</div>
<script src="{{asset('/js/amazeui.min.js')}}"></script>
<script src="{{asset('/js/app.js')}}"></script>

</body>
</html>