@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="col-sm-9 row">
            <div class="whitebk topic-box">
                <div class="row">
                    <h3 class="title">{{$activity->title}}</h3>
                    <section class="summary"></section>
                </div>
                <div class="row">
                    <article class="content">
                        <div class="headImg">
                        </div>
                        <p>
                            <span class="img-center-box" style="display:block;"></span>
                        </p>
                        {!! $activity->resolved_content !!}
                    </article>
                </div>
                <div class="post-con clearfix">
                    <span class="author"> 发布于</span>
                    <span class="time" title="{{$activity->created_at}}">{{$activity->created_at->diffForHumans()}}</span>
                    <div class="channel">
                        <a href="/activity/cateid/52" title="更多活动">更多活动</a>
                    </div>
                </div>
                <div class="row">
                    <div class="divider"></div>
                    <div class="footer">
                        <!--<div class="row text-center likes">
                            <button class="btn btn-primary">
                                <i class="glyphicon glyphicon-thumbs-up"></i> Like <span class="count">(3)</span>
                            </button>
                        </div>-->
                        <div class="options">
                            <div class="col-sm-12 text-right">
                                <a href="javascript:void(0)" ><i class="fa  fa-heart"></i></a>
                                <a href="javascript:void(0)" ><i class="fa fa-heart-o"></i></a>
                                <a><i class="fa fa-whatsapp go-comment"></i></a>
                                <span><b>|</b></span>
                                <a><i class="fa fa-wechat"></i></a>
                                <a><i class="fa fa-weibo"></i></a>
                                <a><i class="fa fa-qq"></i></a>
                                <span><b>|</b></span>
                                <a><i class="glyphicon glyphicon-open"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="whitebk other">
                @include('topics.partials.commont', ['info'=>['type'=>'activity', 'id'=>$activity->id]])
            </div>
        </div>
        <div class="col-md-3"  style="margin-left: 20px">
            <div class="whitebk">
                <div class="right-box">
                    <h2 class="comment-title">
                        活动简介
                    </h2>
                    <div class="activity-content">{{$activity->intro}}</div>
                </div>
            </div>
            <div class="whitebk other">
                <div class="right-box">
                    <h2 class="comment-title">
                        时间地点
                    </h2>
                    <div class="activity-time odt" title="活动时间：{{$activity->date}}">
                        <i class="fa fa-clock-o"></i>
                        活动时间：{{$activity->date}}
                    </div>
                    <div class="activity-address odt" title=" {{$activity->place}}">
                        <i class="fa fa-map-marker"></i>
                        {{$activity->place}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
