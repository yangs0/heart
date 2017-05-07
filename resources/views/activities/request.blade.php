<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>参与请求</title>
    <!-- Styles -->
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link href="./css/font-awesome.css" rel="stylesheet">
    <link href="./css/style.css" rel="stylesheet">

</head>
<body>
<nav class="navbar navbar-default top-nav" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-list">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"> LOGO</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="nav-list">
            <ul class="nav navbar-nav">

                <li><a href="#">校园区</a></li>
                <li><a href="#">宿舍区</a></li>
                <li>
                    <form action="" class="navbar-form navbar-left" >
                        <div class="input-group search-input">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            <input type="text" class="form-control trans-input" placeholder="站内搜索">
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right ">
                <li><a href="#"><i class="fa fa-bell"></i></a></li>
                <li><a href="/login" class="nva-options" ><button class="btn btn-success nav-l-r btn-block" href="/login" ><i class="fa fa-hand-o-right"> </i> 登 录 </button></a></li>
                <li ><a href="/register" class="nva-options"><button class="btn btn-info nav-l-r btn-block"> Join <i class="fa fa-hand-o-left"> </i></button></a></li>

                <!--<li><img src="{{ empty(Auth::user()->avatar) ? '/img/a5.jpg':Auth::user()->avatar}}" alt="" class="avatar img-circle"></li>

                <li class="dropdown user-action">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                        {{ \Auth::user()->nick_name }} <span class="caret"></span>
                    </a>
                    <div class="list-group dropdown-menu">
                        <a href="{{route('users.show',Auth::id())}}" class="list-group-item">
                            <i class="text-md fa fa-user"></i>
                            个人页面
                        </a>
                        <a href="{{route('users.edit', Auth::id())}}" class="list-group-item">
                            <i class="text-md fa fa-edit"></i>
                            编辑资料
                        </a>
                        <a href="{{route('topic.create')}}" class="list-group-item">
                            <i class="text-md fa fa-book"></i>
                            发表文章
                        </a>
                        <a href="{{ url('/logout') }}" class="list-group-item">
                            <i class="text-md fa fa-sign-out"></i>
                            Logout
                        </a>
                    </div>
                </li>-->
            </ul>
        </div><!-- /.navbar-collapse -->
    </div><!-- /.container-fluid -->
</nav>

<div class="container">
    <div class="browser-window panel">
        <div class="top-bar">
            <div class="circles">
                <a href="#"><div class="circle circle-red"></div></a>
                <div class="circle circle-yellow"></div>
                <div class="circle circle-green"></div>
                <div class="cir-title">
                    参与请求列表
                </div>
            </div>

        </div>

        <table class="table table-hover dorm-user-member">
            <thead>
            <tr>
                <th width="80"> #thumb</th>
                <th>昵称</th>
                <th>性别</th>
                <th>城市</th>
                <th width="350">留言</th>
                <th>状态</th>
                <th>操作</th>

            </tr>
            </thead>
            <tbody>
            <tr class="">
                <td  ><img src="./img/a8.jpg" class="img-circle" width="35" height="35" alt=""></td>
                <td >Bangalore</td>
                <td class="sex">♀</td>
                <td>dddddd</td>
                <td style="word-break: break-all">请求加入</td>
               <td><span class="label label-warning">访客</span></td>
                <td class="options"> <a href="" title="允许入宿"><i class="fa  fa-check-square-o"></i></a>
                    <a href="" title="驱逐"><i class="fa fa-power-off"></i></a></td>


            </tr>
            <tr class="warning">
                <td width="80" ><img src="./img/a8.jpg" class="img-circle" width="35" height="35" alt=""></td>
                <td >Bangalore</td>
                <td class="sex">♂</td>
                <td>北京市</td>
                <td style="word-break: break-all">请求加入</td>
                <td><span class="label label-success">成员</span></td>
                <td class="options">
                    <a href="" title="驱逐"><i class="fa fa-power-off"></i></a>
                </td>
            </tr>
            <tr class="success">
                <td width="80" ><img src="./img/a8.jpg" class="img-circle" width="35" height="35" alt=""></td>
                <td >Bangalore</td>
                <td class="sex">♀</td>
                <td>dddddd</td>
                <td style="word-break: break-all">请求加入</td>
                <td><span class="label label-danger">申请中</span></td>
                <td class="options">
                    <a href="" title="允许访问"><i class="fa fa-check"></i></a>
                    <a href="" title="拒绝访问"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            <tr class="">
                <td width="80" ><img src="./img/a8.jpg" class="img-circle" width="35" height="35" alt=""></td>
                <td >Bangalore</td>
                <td class="sex">♀</td>
                <td>dddddd</td>
                <td style="word-break: break-all">请求加入</td>
                <td ><span class="label label-danger">申请中</span></td>
                <td class="options">
                    <a href="" title="允许访问"><i class="fa fa-check"></i></a>
                    <a href="" title="拒绝访问"><i class="fa fa-times"></i></a>
                </td>
            </tr>
            </tbody>
        </table>

    </div>
</div>


<footer class="main-footer">
    <div class="container">
        <div class="row">
            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">More About Me</h4>
                    <div class="content about-self">
                        I`m a student, I want to become a full stack developer.
                        This is a personal blog . Hope you like it !
                        <div class="web-link">
                            <a  target="_blank" style="padding-right:8px" href="https://github.com/yangs1" title="我的github, 哈哈，其实这里没什么东西">
                                <i class="fa fa-github-alt" aria-hidden="true"></i>
                            </a>
                            <a  target="_blank" style="padding-right:8px" href="http://wpa.qq.com/msgrd?v=3&uin=553974235&site=qq&menu=yes"  title="有事可以联系下站长">
                                <i class="fa fa-qq" aria-hidden="true"></i>
                            </a>
                            <a  target="_blank" style="padding-right:8px" href="http://weibo.com/laravelnews"  title="">
                                <i class="fa fa-weibo" aria-hidden="true"></i>
                            </a>
                            <a  target="_blank" style="padding-right:8px" href="" data-original-title="" title="">
                                <i class="fa fa-wechat" aria-hidden="true"></i>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">学习的网址</h4>
                    <div class="content tag-cloud">
                        <a href="http://www.bootcss.com/" title="Bootstrap中文网"  target="_blank">Bootstrap</a>
                        <a href="https://laravel-china.org/" title="Laravel China 中国最大的 Laravel 和 PHP 开发者社区" target="_blank">Laravel-china</a>
                        <a href="https://www.laravist.com/" title="Laravist"  target="_blank">Laravist</a>
                        <a href="https://segmentfault.com/" title="segmentfault"  target="_blank">segmentFault</a>
                    </div>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="widget">
                    <h4 class="title">赞助商</h4>
                    <div class="content friend-links">
                        <a href="https://www.upyun.com/" title="腾讯云"  target="_blank">腾讯云</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</footer>
<div class="copyright">
    <div class="container">
        <div class="row">
            <div class="col-sm-12">
                <span>Copyright © <a href="http://expo.bootcss.com">优站精选</a></span>|<span>
                    <a href="http://www.miibeian.gov.cn/" target="_blank">京ICP备11008151号</a>
                </span>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript" src="./js/jquery.min.js"></script>
<script type="text/javascript" src="./js/bootstrap.js"></script>

   <!-- <script type="text/javascript" src="//github.atool.org/canvas-nest.min.js"></script>-->
</body>
</html>
