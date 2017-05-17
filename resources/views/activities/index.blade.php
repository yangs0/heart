@extends('layouts.default')

@section('content')
    <div class="container">
        @include('activities.partials.banner')
    </div>

    <div class="container">
        <div class="order-button row">
            <a href="{{route('activities.display','all')}}" class="{{navViewActiveByParams('activities.display', 'all')}}">全部活动</a>
            <a href="{{route('activities.display','ing')}}" class="{{navViewActiveByParams('activities.display', 'ing')}}">正在进行</a>
            <a href="{{route('activities.display','ed')}}" class="{{navViewActiveByParams('activities.display', 'ed')}}">往期活动</a>
        </div>
        <div class="">
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
                                    <span class="mark mark-activity-1">报名中</span>
                                @elseif($activity->start->lt($now) && $activity->end->gt($now) )
                                    <span class="mark mark-activity-0">进行中</span>
                                    @else
                                    <span class="mark mark-activity-3">已结束</span>
                                @endif
                            </h3>
                            <div class="activity-time odt" title="活动时间：{{$activity->start->toDateString()}} | {{$activity->end->toDateString()}}">
                                <i class="fa fa-clock-o"></i>
                                活动时间：{{$activity->start->toDateString()}} | {{$activity->end->toDateString()}}
                            </div>
                            <div class="activity-address odt" title=" {{$activity->place}}">
                                <i class="fa fa-map-marker"></i>
                                {{$activity->place}}
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach


        </div>
    </div>
@endsection
