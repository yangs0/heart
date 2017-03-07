@extends('layouts.default')

@section('content')
    <div class="container">
        @include('activities.partials.banner')
    </div>

    <div class="container">
        <div class="order-button row">
            <a href="{{url('/theme')}}" class="active">全部活动</a>
            <a href="{{url('/theme')}}" class="">正在进行</a>
            <a href="{{url('/theme')}}" class="">往期活动</a>
        </div>
        <div class="">
            <div class="col-sm-4 projects-card">
                <div class="thumbnail">
                    <a class="no-pjax" href="#" >
                        <img src="./img/b0.jpg">
                    </a>
                    <div class="caption album-text">
                        <h3>
                            <a href="/activity/169?from=activity_all" title="Addicted丨New·夜新媒体影像颁奖盛典" target="_blank" _hover-ignore="1">Addicted丨New·夜新媒体影像颁奖盛典</a>
                            <span class="mark mark-activity-3">已结束</span>
                        </h3>
                        <div class="activity-time odt" title="活动时间：2017年1月13日">
                            <i class="fa fa-clock-o"></i>
                            活动时间：2017年1月13日
                        </div>
                        <div class="activity-address odt" title="雍和宫糖果星光现场">
                            <i class="fa fa-map-marker"></i>
                            雍和宫糖果星光现场
                        </div>
                    </div>
                </div>

            </div>

            <div class="col-sm-4 projects-card">
                <div class="thumbnail">
                    <a class="no-pjax" href="#" >
                        <img src="./img/b0.jpg">
                    </a>
                    <div class="caption album-text">
                        <h3>
                            <a href="/activity/169?from=activity_all" title="Addicted丨New·夜新媒体影像颁奖盛典" target="_blank" _hover-ignore="1">Addicted丨New·夜新媒体影像颁奖盛典</a>
                            <span class="mark mark-activity-3">已结束</span>
                        </h3>
                        <div class="activity-time odt" title="活动时间：2017年1月13日">
                            <i class="fa fa-clock-o"></i>
                            活动时间：2017年1月13日
                        </div>
                        <div class="activity-address odt" title="雍和宫糖果星光现场">
                            <i class="fa fa-map-marker"></i>
                            雍和宫糖果星光现场
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-4 projects-card">
                <div class="thumbnail">
                    <a class="no-pjax" href="#" >
                        <img src="./img/b0.jpg">
                    </a>
                    <div class="caption album-text">
                        <h3>
                            <a href="/activity/169?from=activity_all" title="Addicted丨New·夜新媒体影像颁奖盛典" target="_blank" _hover-ignore="1">Addicted丨New·夜新媒体影像颁奖盛典</a>
                            <span class="mark mark-activity-3">已结束</span>
                        </h3>
                        <div class="activity-time odt" title="活动时间：2017年1月13日">
                            <i class="fa fa-clock-o"></i>
                            活动时间：2017年1月13日
                        </div>
                        <div class="activity-address odt" title="雍和宫糖果星光现场">
                            <i class="fa fa-map-marker"></i>
                            雍和宫糖果星光现场
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
@endsection
