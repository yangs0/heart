@section('styles')
    @parent
    <style>
        #myTab a{
            color: #666;
            font-size: 16px;
            border-bottom: 2px solid #FFF;
        }
         #myTab .active a{
            color: #E74B3B;
            background-color: #fff;
            border-bottom: 2px solid #E74B3B;
        }
        #hotComment li a.media-heading,#hotComment li a.user{
            color: #666;
        }
        #hotComment li a.media-heading:hover{
            color: #00B5AD;
        }
        #hotComment li a.user:hover{
            color: #ff5638;
        }
        .test{
            line-height: inherit;
            margin-top: inherit;
            display: inline-block;
            float: left;
            text-align: center;
        }
        .user-name{
            font-weight: 700;color: #333
        }
        .user-name:hover{
            color: #c95865;
        }
    </style>
    @stop


<div class="container mt-20">

    <div class="post-lists col-sm-8 row">

        <h3 class="left-title">话题 <small>推荐</small></h3>
         <div class="clearfix"></div>
        @foreach($topics as $topic)
            <div class="col-sm-6 col-md-4">
                <a class="thumbnail" href="{{route('topic.show', $topic->id)}}">
                    <img src="{{$topic->figure}}" alt="..." style="height: auto; max-height: 130px">
                    <div class="caption">
                        <p>{{$topic->title}}</p>
                    </div>
                </a>
            </div>
            @endforeach

    </div>


    <div class="chat-list col-sm-4" >
        <h3 class="left-title"> 正在 <small>发生</small></h3>
        <ul id="myTab" class="nav whitebk text-center">
            <li class="active col-sm-6">
                <a href="#home" data-toggle="tab">
                    动态                 </a>
            </li>
            <li class="col-sm-6">
                <a href="#ios" data-toggle="tab">热议</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content whitebk" style="margin-top: 0">
            <div class="tab-pane fade in active" id="home">
                <ul class="list-unstyled ">
                    @foreach($rencentTopics as $notice)
                        <li class="media" style="padding:20px 0 10px;margin:0 15px;border-bottom: 1px dashed #ccc">
                            <a class="pull-left" href="{{route('users.show', $notice->user_id)}}">
                                <img class="media-object img-thumbnail img-circle" src="{{$notice->user->avatar}}" alt="..." style="width: 45px;height: 45px">
                            </a>
                            <div class="media-body">
                                <h5 class="media-heading"><a href="">{{$notice->user->name}}</a>
                                        <small style="color: #aaa"> 创建了新话题</small>
                                </h5>
                                        <a style="color: #565656" href="{{route('topic.show', $notice->id)}}">{{$notice->title}}</a>


                                <span class="pull-right" style="color: #565656; font-size: 12px">3 ago</span>

                            </div>
                        </li>
                        @endforeach
                </ul>
            </div>
            <div class="tab-pane fade" id="ios">
                <ul class="list-unstyled " id="hotComment">

                    @foreach($hotTopics as $topic)
                        <li class="media" style="padding:20px 0 10px;margin:0 25px;border-bottom: 1px dashed #ccc">
                            <div class="media-body">
                                <h5><a class="media-heading" href="{{route('topic.show', $topic->id)}}" >{{$topic->title}}</a></h5>
                                <div>
                                    <span class="pull-right" style="color: #565656; font-size: 12px"><i class="fa fa-comment-o"></i> {{$topic->reply_count}}</span>
                                    <span  style="color: #898989; font-size: 12px"><i class="fa fa-user-o"></i> <a href="" class="user">{{$topic->user->name}}</a></span>
                                </div>
                            </div>
                        </li>
                        @endforeach

                </ul>
            </div>
        </div>
    </div>
</div>

<div class="container mt-20">
    <h3 class="left-title"> 活动 <small>专区</small></h3>

    @foreach($activities as $activity)
        <div class="col-sm-4 projects-card">
            <div class="thumbnail">
                <a class="no-pjax" href="{{route("activities.show", $activity->id)}}" >
                    <img src="{{$activity->cover}}">
                </a>
                <div class="caption album-text">
                    <h3>
                        <a href="{{route("activities.show", $activity->id)}}" title="{{$activity->title}}">{{$activity->title}}</a>
                    <!--{{$now = \Carbon\Carbon::now()}}-->
                        @if($activity->start->gt($now))
                            <span class="mark mark-activity-1">未开始</span>
                        @elseif($activity->start->lt($now) && $activity->end->gt($now) )
                            <span class="mark mark-activity-0">进行中</span>
                        @else
                            <span class="mark mark-activity-3">已结束</span>
                        @endif
                    </h3>
                    <div class="activity-time odt" title="活动时间：2017年1月13日">
                        <i class="fa fa-clock-o"></i>
                        活动时间：{{$activity->start->toDateString()}} | {{$activity->end->toDateString()}}
                    </div>
                    <div class="activity-address odt" title="雍和宫糖果星光现场">
                        <i class="fa fa-map-marker"></i>
                        {{$activity->place}}
                    </div>
                </div>
            </div>
        </div>
        @endforeach

</div>

<div class="container mt-20 hidden-xs hidden-sm">
    <h3 class="left-title"> 活跃 <small>用户</small></h3>
    @foreach($users as $user)
        <div class="col-sm-4 ">
            <div class="media whitebk" style="padding: 20px;margin-bottom: 20px" >
                <a class="pull-left" href="{{route('users.show', $user->id)}}">
                    <img class="media-object img-circle img-thumbnail" src="{{$user->avatar}}"
                         alt="...">
                </a>
                <div class="media-body" >
                    <a class="media-heading user-name" href="{{route('users.show', $user->id)}}">{{$user->name}}</a>
                    <p style="margin-bottom: 0"> <small class="city">{{$user->city}}</small></p>
                    <small class="intro" style="color: #888">{{ $user->intro?: '该用户很懒什么也没写'}}</small>
                </div>
            </div>
        </div>
        @endforeach
</div>