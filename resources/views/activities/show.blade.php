@extends('layouts.default')
@section('styles')
    <meta name="title" content="{{$activity->title}}" />
    <meta name="description" content="{{$activity->intro}}" />
    <link href="{{asset('/assets/css/share.min.css')}}" rel="stylesheet">
    <link href="{{asset('/assets/css/jquery.sinaEmotion.css')}}" rel="stylesheet">
    <style>
        .s_btn{
            border-color: #00B5AD;
            background-color: #FFF;color: #00B5AD
        }
        .s_btn:hover{
            background-color: #00B5AD;color: #FFF
        }
        h1,h2,h3,h4,h5{
            font-weight: bold;
        }
    </style>
    @stop
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
                            <img src="{{$activity->cover}}" class="img-responsive " alt="...">
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
                                <a><i class="fa fa-whatsapp go-comment"></i></a>
                                <span><b>|</b></span>
                                <span data-initialized="true" class="social-share">
                                    <a href="#" class="icon-wechat fa fa-wechat"></a>
                                    <a class="icon-weibo fa fa-weibo" href="#"> </a>
                                    <a href="#" class="icon-qq fa fa-qq"></a>
                                    <a href="" class="icon-qzone fa fa-star"></a>
                                </span>
                                <span><b>|</b></span>
                                <a><i class="glyphicon glyphicon-open"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <!--{{$now = \Carbon\Carbon::now()}}-->
        @if(Auth::check())
            @if($activity->end->gt($now) )
                <div class="whitebk other text-center">
                    <div style="padding: 30px 20px">
                        <div class="btn-group">
                            <a href="javascript:void(0)" data-url="{{route('activities.part', $activity->id)}}" data-type="POST" id="part" class="btn btn-info s_btn">
                                <i class="fa fa-thumbs-up" aria-hidden="true"></i>
                                我要参加
                            </a>
                        </div>
                        <div class="voted-users">
                            <div class="user-lists"> </div>
                            @if(count($participants))
                                @foreach($participants as $participant)
                                    <a class="voted-template" href="{{route('users.show',$participant->id)}}" data-userid="">
                                        <img class="img-thumbnail avatar avatar-middle" src="{{$participant->avatar}}" title="{{$participant->name}}" style="width:48px;height:48px;margin: 5px">
                                    </a>
                                @endforeach
                            @else
                                <div class="vote-hint">
                                    成为第一个参与的人吧
                                    <img class="emoji" title=":bowtie:" alt=":bowtie:" src="https://dn-phphub.qbox.me/assets/images/emoji/bowtie.png" align="absmiddle">
                                </div>
                            @endif

                        </div>
                    </div>
                </div>
            @endif
        @endif

            <div class="whitebk other">
                @include('topics.partials.commont', ['info'=>['type'=>'activity', 'id'=>$activity->id]])
            </div>
        </div>
        <div class="col-md-3"  style="margin-left: 20px">
           @include('activities.partials.btn', ['activity'=>$activity])

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
                        <div class="text-right pull-right">

                            @if($activity->start->gt($now))
                                <span class="label label-info">未开始</span>
                            @elseif($activity->start->lt($now) && $activity->end->gt($now) )
                                <span class="label label-danger">进行中</span>
                            @else
                                <span class="label label-default">已结束</span>
                            @endif
                        </div>
                        时间地点

                    </h2>
                    <div class="activity-time odt" title="活动时间：{{$activity->start->toDateTimeString()." - ".$activity->end->toDateTimeString()}}">
                        <i class="fa fa-clock-o"></i>
                        活动时间：

                        <br>&emsp;S:&emsp;{{$activity->start->toDateTimeString()}}
                        <br>&emsp;E:&emsp;{{$activity->end->toDateTimeString()}}
                    </div>
                    <div class="activity-address odt" title="活动地点： {{$activity->place}}">
                        <i class="fa fa-map-marker"></i>
                        &nbsp;活动地点：{{$activity->place}}
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop

@section('script')
    <script type="text/javascript" src="/assets/js/jquery.share.min.js"></script>
    <script type="text/javascript" src="/assets/js/social-share.min.js"></script>
    <script>
        $("#part").bind('click', function () {
            $.ajax({
                type: $(this).data('type'),
                url: $(this).data('url'),
                headers: {
                    'X-CSRF-TOKEN': Config.token
                },
                data: {},
                dataType: "json",
                success: function(data){
                    window.location.reload();
                },
                error:function (xhr,data) {
                    if (xhr.status == 401){
                        alert("用户尚未登录");
                    }
                }
            });
        });
    </script>
@stop