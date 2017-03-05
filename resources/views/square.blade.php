@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="row album-title">
            校园广场
            <span class="album-subtitle">
                <span>汇聚校园精彩主题</span>
            </span>

        </div>

        <div class="container-fluid">
            <div class="box-left">
                <div class="order-button row">
                    <a href="{{url('/themes')}}" class="active">全部主题</a>
                    <a href="{{url('/theme')}}" class="">我关注的</a>
                </div>

                <div class="row">
                    <ul class="theme-list">
                        @foreach($themes as $theme)
                            <li>
                                <a href="{{route('theme.show', $theme->id)}}"><img src="http://cs.vmovier.com/Uploads/Series/2015-03-10/54fec581e98ae.jpg@300w.jpg" alt="{{$theme->title}}" ></a>
                                <div class="theme-inform">
                                    <div class="theme-name">
                                        <a href="{{route('theme.show', $theme->id)}}">{{$theme->name}}</a>
                                    </div>
                                    <div class="state">
                                        @if(in_array($theme->id, $focusIds))
                                            <a class="following" href="javascript:;"> 取消关注</a>
                                            @else
                                            <a class="" href="javascript:;">关注</a>
                                            @endif

                                        <span><span class="count">{{$theme->focus_count}}</span>人正在关注</span>
                                    </div>
                                    <p>{{ str_limit($theme->intro, 110, '...')}}</p>
                                    <div class="big-content">
                                        @foreach($theme->topics as $topic)
                                            <div class="another-theme">
                                                <a href="{{route('topic.show',$topic->id)}}" >{{$topic->title}}</a>
                                            </div>
                                        @endforeach
                                    </div>
                                </div>
                            </li>
                        @endforeach

                    </ul>
                </div>
                <div class="theme-page">
                    {{$themes->links()}}
                </div>
            </div>

            <div class="box-right" >
                <div class="activity-list">
                    <h5 class="title">
                        精彩活动
                    </h5>
                    <ul class="list-unstyled activity-items">
                        <li><a href="#"><img src="./img/5879cfe6c4f24.jpg" alt=""></a></li>
                        <li><a href="#"><img src="./img/5879cfe6c4f24.jpg" alt=""></a></li>
                        <li><a href="#"><img src="./img/5879cfe6c4f24.jpg" alt=""></a></li>
                    </ul>
                </div>
                <div class="hot-theme-list">
                    <h5 class="title">
                        热门主题
                    </h5>
                    <div class="tags">
                        @foreach($hotThemes as $ht)
                            <a href="{{route('theme.show', $ht->id)}}" title="{{$ht->name}}">{{$ht->name}}</a>
                            @endforeach
                    </div>
                </div>
            </div>


        </div>
    </div>
@endsection
