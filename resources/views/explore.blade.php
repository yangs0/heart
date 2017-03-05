@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="col-sm-11 col-md-8 ">
            <div class="row album-title">
                校园广场
                <span class="album-subtitle">
                    <span>汇聚校园精彩主题</span>
                </span>

            </div>
            <!--<div class="row">
                <div class="header-section">
                    <i class="glyphicon glyphicon-signal"></i>
                    最新动态
                    <div class="pull-right set">
                        <i class="glyphicon glyphicon-cog"></i>
                        设置
                    </div>
                </div>
                <div class="divider"></div>
            </div>-->

            <div class="row topics-list-box">
                <div class="topics-list-tabs">
                    @if($filter[0] == 'hot')
                        <a class="" href="{{route('explore')}}" title="">最新推荐</a>
                        <a class="active" href="{{route('explore',['filter'=>'hot'])}}" title="">热门排行</a>
                        <a class="" href="{{route('explore',['filter'=>'other'])}}" title="">随便看看</a>
                    @elseif($filter[0] == 'other')
                        <a class="" href="{{route('explore')}}" title="">最新推荐</a>
                        <a class="" href="{{route('explore',['filter'=>'hot'])}}" title="">热门排行</a>
                        <a class="active" href="{{route('explore',['filter'=>'other'])}}" title="">随便看看</a>
                    @else
                        <a class="active" href="{{route('explore')}}" title="">最新推荐</a>
                        <a class="" href="{{route('explore',['filter'=>'hot'])}}" title="">热门排行</a>
                        <a class="" href="{{route('explore',['filter'=>'other'])}}" title="">随便看看</a>
                    @endif

                </div>

                <div class="topics-list-content">
                    @if($filter[0] == 'hot')
                        <div class="sort-button row">
                            排序：
                            @if(isset($filter[1]) && $filter[1] == 'year')
                                <a href="{{route('explore',[ 'filter'=>$filter[0].'-'.'week'])}}" class="">本周</a>
                                <a href="{{route('explore',['filter'=>$filter[0].'-'.'month'])}}" class="">本月</a>
                                <a href="{{route('explore',['filter'=>$filter[0].'-'.'year'])}}" class="active">本年</a>
                            @elseif(isset($filter[1]) && $filter[1] == 'month')
                                <a href="{{route('explore',['filter'=>$filter[0].'-'.'week'])}}" class="">本周</a>
                                <a href="{{route('explore',['filter'=>$filter[0].'-'.'month'])}}" class="active">本月</a>
                                <a href="{{route('explore',['filter'=>$filter[0].'-'.'year'])}}" class="">本年</a>
                            @else
                                <a href="{{route('explore',['filter'=>$filter[0].'-'.'week'])}}" class="active">本周</a>
                                <a href="{{route('explore',['filter'=>$filter[0].'-'.'month'])}}" class="">本月</a>
                                <a href="{{route('explore',['filter'=>$filter[0].'-'.'year'])}}" class="">本年</a>
                            @endif
                        </div>
                    @endif
                    <ul class="topics-list list-unstyled">
                        @foreach($topics as $topic)
                            <li class="clearfix">
                                <a class="topics-img" href="{{$topic->head_img}}" title="{{$topic->title}}">
                                    <img src="{{$topic->head_img}}" alt="{{$topic->title}}">
                                </a>
                                <div class="topic-main">
                                    <h1>
                                        <a href="" title="{{$topic->title}}">{{$topic->title}}</a>
                                    </h1>
                                    <div class="topic-intro">
                                        <a target="_blank" href="/50947?from=index_new_intro">{{$topic->summary}}</a>
                                    </div>
                                    <div class="topic-more clearfix">
                                        <span class="time">
                                            <span><a href="{{route('theme.show', $topic->theme_id)}}">{{$topic->theme->name}}</a></span>
                                        </span>
                                        <span class="time">{{$topic->created_at->diffForHumans()}}</span>
                                        <div class="about">
                                            <span><i class="fa fa-commenting-o"></i> {{$topic->reply_count}}</span>
                                            <span><i class="fa fa-heart-o"></i> {{$topic->vote_count}}</span>
                                            <span><i class="fa fa-share-alt"></i> {{$topic->collect_count}}</span>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        @endforeach
                    </ul>
                      <div class="text-center">
                          {{$topics->links()}}
                      </div>
                </div>
            </div>
        </div>

        <div class="col-md-4">
            <div class="clearfix"></div>
            <div class="row">
                <div class="col-md-offset-1 col-md-11">
                    <div class="alert alert-info text-center square-btn">
                        <a class="btn btn-primary" style="margin: 20px 0" href="{{url('/theme')}}">
                            进入校园广场
                        </a>
                        <p> 来这里发现更多有趣话题 </p>
                    </div>
                    <div class="right-box hidden-xs hidden-sm">
                        <h5 class="title">
                            三日热门
                        </h5>
                        <ul class="list-unstyled hot-post-items">
                            @foreach($hotTopics as $topic)
                                @if($loop->index < 2)
                                    <li>
                                        <div class="item">
                                            <a href="{{route('topic.show', $topic->id)}}">
                                                <span class="range-label top top{{$loop->index}}"><b>Top {{++$loop->index}}</b></span>
                                                <img src="{{$topic->head_img}}" class="img-responsive img-rounded" alt="">
                                                <div class="article-title">
                                                    <div class="article-wrapper">{{$topic->title}}</div>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                @else
                                    <li>
                                        <div class="row item">
                                            <div class="col-sm-6">
                                                <span class="range-label"><b>Top {{++$loop->index}}</b></span>
                                                <img src="{{$topic->head_img}}" alt="" class="img-responsive img-rounded art-img" >
                                            </div>
                                            <div class="col-sm-6">
                                                <div class="row article-title-other">
                                                    {{$topic->title}}
                                                </div>
                                                <div class="row article-title-time"> {{$topic->created_at->diffForHumans()}}</div>
                                            </div>
                                        </div>
                                    </li>
                                @endif
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div>

            {{--<div class="row">
                <div class="col-md-offset-1 col-md-11">
                    <div class="hot-theme-list">
                        <h5 class="title">
                            今日热文
                        </h5>
                        <div class="tags" _hover-ignore="1">
                            <a href="/channel/study" title="电影自习室" _hover-ignore="1">电影自习室</a>
                            <a href="/channel/Idea" title="创意" _hover-ignore="1">创意</a>
                            <a href="/channel/Travel" title="旅行" _hover-ignore="1">旅行</a>
                            <a href="/channel/Ad" title="广告">广告</a>
                            <a href="/channel/Love" title="爱情" _hover-ignore="1">爱情</a>
                            <a href="/channel/Lifeness" title="生活" _hover-ignore="1">生活</a>
                            <a href="/channel/Sports" title="运动">运动</a>
                            <a href="/channel/Inspiration" title="励志">励志</a>
                            <a href="/channel/Fiction" title="科幻">科幻</a>
                            <a href="/channel/Trailer" title="预告">预告</a>
                        </div>
                    </div>
                </div>
            </div>--}}
        </div>
    </div>
@endsection
