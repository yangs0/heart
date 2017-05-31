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
    <link rel="stylesheet" href="{{asset('/assets/css/admin/amazeui.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/assets/css/admin/amazeui.datatables.min.css')}}" />
    <link rel="stylesheet" href="{{asset('/assets/css/admin/app.css')}}">
    <script src="{{asset('/assets/js/admin/jquery.min.js')}}"></script>
    <style>
        .am-dimmer.am-active{
            z-index: 1;
        }
    </style>
    @yield('style')
</head>

<body data-type="widgets">
<script src="{{asset('/assets/js/admin/theme.js')}}"></script>
<div class="am-g tpl-g">
    <!-- 头部 -->
    <header>
        <!-- logo -->
        <div class="am-fl tpl-header-logo">
            <a href="javascript:;"><img src="{{url('/uploads/logo.png')}}" alt=""></a>
        </div>
        <!-- 右侧内容 -->
        <div class="tpl-header-fluid">
            <!-- 侧边切换 -->
            <div class="am-fl tpl-header-switch-button am-icon-list">
                    <span>

                </span>
            </div>

        </div>

    </header>
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
    <!-- 侧边导航栏 -->
    <div class="left-sidebar">
        <!-- 用户信息 -->
        {{--<div class="tpl-sidebar-user-panel">
            <div class="tpl-user-panel-slide-toggleable">
                <div class="tpl-user-panel-profile-picture">
                    <img src="assets/img/user04.png" alt="">
                </div>
                <span class="user-panel-logged-in-text">
              <i class="am-icon-circle-o am-text-success tpl-user-panel-status-icon"></i>
              禁言小张
          </span>
                <a href="javascript:;" class="tpl-user-panel-action-link"> <span class="am-icon-pencil"></span> 账号设置</a>
            </div>
        </div>--}}

        <!-- 菜单 -->
        <ul class="sidebar-nav">

            <li class="sidebar-nav-link">
                <a href="/admin/user">
                    <i class="am-icon-user sidebar-nav-link-logo"></i> 用户管理
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="/admin/topic">
                    <i class="am-icon-table sidebar-nav-link-logo"></i> 话题管理
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="/admin/activity">
                    <i class="am-icon-gift sidebar-nav-link-logo"></i> 活动管理
                </a>
            </li>
            <li class="sidebar-nav-link">
                <a href="/admin/room">
                    <i class="am-icon-gift sidebar-nav-link-logo"></i> 聊天室管理
                </a>
            </li>
        </ul>
    </div>


    <!-- 内容区域 -->
    <div class="tpl-content-wrapper">
        @yield('content')
    </div>
</div>

<script src="{{asset('/assets/js/admin/amazeui.min.js')}}"></script>
<script src="{{asset('/assets/js/admin/amazeui.datatables.min.js')}}"></script>
<script src="{{asset('/assets/js/admin/dataTables.responsive.min.js')}}"></script>
<script src="{{asset('/assets/js/admin/app.js')}}"></script>
@yield('script')
</body>

</html>