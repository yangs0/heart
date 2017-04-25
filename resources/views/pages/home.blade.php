@extends('layouts.default')

@section('content')
    <div class="carousel slide" id="carousel"  data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active">
                <img src="/uploads/banner/1482808080002_2.jpg" alt=""/>
            </div>
            <div class="item">
                <img src="/uploads/banner/1481865834039_39.jpg" alt=""/>
            </div>

        </div>

        <div class="maintext">
            <div class="maintoptext">
                <div class="mhtitle">
                    <i class="fa fa-bullhorn"></i>
                    <em>新鲜事儿</em>
                </div>
                <ul class="ultext">
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-angle-right"></i>
                            原创：程序员牛逼指南
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-angle-right"></i>
                            “遇见未来·时空引力场”
                        </a>
                    </li>
                </ul>
            </div>
            <div class="mainbottomtext">
                <div class="mhtitle">
                    <i class="fa fa-ravelry"></i>
                    <em>快速入口</em>
                </div>
                <p class="site">
                    <a href="http://lib.csdn.net/my/structure" target="_blank">校园区</a>
                    <a href="http://lib.csdn.net/my/handbook" target="_blank">活动区</a>
                    <a href="http://lib.csdn.net/weekly/history/list" target="_blank">交流区</a>
                </p>
                <div class="botext">
                    <p>社区的进步需要你的支持</p>
                    <a class="btn btn-warning" href="http://lib.csdn.net/assemble" >登录</a>
                    <a class="btn btn-primary" href="http://lib.csdn.net/submit">注册</a>
                </div>
            </div>
        </div>

        <a href="#carousel" data-slide="prev" class="carousel-control left"></a>
        <a href="#carousel" data-slide="next" class="carousel-control right"></a>
    </div>
    <div class="theme-nav">
        <div class="container">
            <ul class="list-group theme-list">
                <li class="list-group-item col-md-2 ">
                    <a href="/themes/1">
                        <div class="pull-left avatar">
                            <img src="/uploads/images/1231d123123.png" alt="" class="img-circle">
                        </div>
                        <div class="theme-about">
                            <span class="title"> 叽喳校园 </span>
                            <div class="about">13个话题</div>
                        </div>
                    </a>
                </li>
                <li class="list-group-item col-md-2 ">
                    <a href="/themes/2">
                        <div class="pull-left avatar">
                            <img src="/uploads/images/yeqweasdqw.png" alt="" class="img-circle">
                        </div>
                        <div class="theme-about">
                            <span class="title"> 寝室夜话 </span>
                            <div class="about">7个话题</div>
                        </div>
                    </a>
                </li>
                <li class="list-group-item col-md-2 ">
                    <a href="/themes/3">
                        <div class="pull-left avatar">
                            <img src="/uploads/images/83Q58PICba.jpg" alt="" class="img-circle">
                        </div>
                        <div class="theme-about">
                            <span class="title"> 社会纵横 </span>
                            <div class="about">6个话题</div>
                        </div>
                    </a>
                </li>
                <li class="list-group-item col-md-2 ">
                    <a href="/themes/4">
                        <div class="pull-left avatar">
                            <img src="/uploads/images/87m58PICt.jpg" alt="" class="img-circle">
                        </div>
                        <div class="theme-about">
                            <span class="title"> 毕业情怀 </span>
                            <div class="about">2个话题</div>
                        </div>
                    </a>
                </li>

            </ul>
        </div>
    </div>
   {{-- @include('pages.partials.themes')
    @include('pages.partials.range')--}}
@endsection
