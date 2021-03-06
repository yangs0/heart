@extends('layouts.default')

@section('content')
    {{--layer.msg('捕获就是从页面已经存在的元素上，包裹layer的结构', {time: 5000, icon:6});--}}
    <div class="carousel slide" id="carousel"  data-ride="carousel">
        <ol class="carousel-indicators">
            <li data-target="#carousel" data-slide-to="0" class="active"></li>
            <li data-target="#carousel" data-slide-to="1"></li>
            <li data-target="#carousel" data-slide-to="2"></li>
            <li data-target="#carousel" data-slide-to="3"></li>
        </ol>
        <div class="carousel-inner">
            <div class="item active" >
                <img src="/uploads/banner/home_page01.jpg" alt="" style="width: 100%;height: 100%"/>
            </div>
            <div class="item" >
                <img src="/uploads/banner/home_page02.jpg" alt="" style="width: 100%;height: 100%"/>
            </div>
            <div class="item">
                <img src="/uploads/banner/home_page03.jpg" alt="" style="width: 100%;height: 100%"/>
            </div>
            <div class="item">
                <img src="/uploads/banner/home_page04.jpg" alt="" style="width: 100%;height: 100%"/>
            </div>
        </div>

        <div class="maintext hidden-xs hidden-sm">
            <div class="maintoptext">
                <div class="mhtitle">
                    <i class="fa fa-bullhorn"></i>
                    <em>新鲜事儿</em>
                </div>
                <ul class="ultext">
                    @foreach($rencentTopics as $topic)
                        <li>
                            <a href="{{route('topic.show', $topic->id)}}">
                                <i class="fa fa-angle-right"></i>
                                {{trans("topic.".$topic->type)}}：{{$topic->title}}
                            </a>
                        </li>
                        @endforeach
                   {{-- <li>
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
                    </li>--}}
                </ul>
            </div>
            <div class="mainbottomtext">
                <div class="mhtitle">
                    <i class="fa fa-ravelry"></i>
                    <em>快速入口</em>
                </div>
                <p class="site">
                    <a href="http://lib.csdn.net/my/structure" target="_blank">主题区</a>
                    <a href="http://lib.csdn.net/my/handbook" target="_blank">活动区</a>
                  {{--  <a href="http://lib.csdn.net/weekly/history/list" target="_blank">交流区</a>--}}
                </p>
                @if(!Auth::check())
                    <style>
                        .maintext .mainbottomtext{
                            margin-top: 40px;
                        }
                    </style>
                    <div class="botext">
                        <p>社区的进步需要你的支持</p>
                        <a class="btn btn-warning" href="http://lib.csdn.net/assemble" >登录</a>
                        <a class="btn btn-primary" href="http://lib.csdn.net/submit">注册</a>
                    </div>
                    @endif

            </div>
        </div>

        <a href="#carousel" data-slide="prev" class="carousel-control left"></a>
        <a href="#carousel" data-slide="next" class="carousel-control right"></a>
    </div>
    <div class="theme-nav hidden-xs hidden-sm">
        <div class="container">
            <ul class="list-group theme-list">
                @foreach($themes as $theme)

                    <li class="list-group-item col-md-2 ">
                        <a href="{{route('theme.show', $theme->id)}}">
                            <div class="pull-left avatar">
                                <img src="{{$theme->cover}}" alt="" class="img-circle" width="40" height="40">
                            </div>
                            <div class="theme-about">
                                <span class="title"> {{$theme->name}} </span>
                                <div class="about">{{$theme->topics_count}}个话题</div>
                            </div>
                        </a>
                    </li>
                    @endforeach
                {{--<li class="list-group-item col-md-2 ">
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
                </li>--}}
            </ul>
        </div>
    </div>
    @include('pages.partials.content')
   {{--@include('pages.partials.themes')
    @include('pages.partials.range')--}}
@endsection
