@extends('layouts.default')

@section('content')
    <div class="carousel slide" id="carousel">
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
                    <em>知识库广播</em>
                </div>
                <ul class="ultext">
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-angle-right"></i>
                            原创图谱：程序员牛逼指南
                        </a>
                    </li>
                    <li>
                        <a href="#" target="_blank">
                            <i class="fa fa-angle-right"></i>
                            特邀编辑征集令
                        </a>
                    </li>
                </ul>
            </div>
            <div class="mainbottomtext">
                <div class="mhtitle">
                    <i class="fa fa-ravelry"></i>
                    <em>快速入口</em>
                </div>
                <p>
                    <a href="http://lib.csdn.net/my/structure" target="_blank">我的图谱</a>
                    <a href="http://lib.csdn.net/my/handbook" target="_blank">图鉴墙</a>
                    <a href="http://lib.csdn.net/weekly/history/list" target="_blank">精选周报</a>
                </p>
                <div class="botext">
                    <p>知识库的进步需要你的支持</p>
                    <a class="btn btn-warning" href="http://lib.csdn.net/assemble" target="_blank">参加建库</a>
                    <a class="btn btn-primary" href="http://lib.csdn.net/submit" target="_blank">提交干货</a>
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
                    <div class="pull-left avatar">
                        <img src="/uploads/avatar/default.jpg" alt="" class="img-circle">
                    </div>
                    <div class="theme-about">
                        <a class="title"> Android知识库 </a>
                        <div class="about">8个知识库</div>
                    </div>
                </li>
                <li class="list-group-item  col-md-2 ">
                    <div class="pull-left avatar">
                        <img src="/uploads/avatar/default.jpg" alt="" class="img-circle">
                    </div>
                    <div class="theme-about">
                        <div class="title"> Android知识库 </div>
                        <div class="about">8个知识库</div>
                    </div>
                </li>
                <li class="list-group-item  col-md-2 ">
                    <div class="pull-left avatar">
                        <img src="/uploads/avatar/default.jpg" alt="" class="img-circle">
                    </div>
                    <div class="theme-about">
                        <div class="title"> Android知识库 </div>
                        <div class="about">8个知识库</div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    @include('pages.partials.themes')
    @include('pages.partials.range')
@endsection
