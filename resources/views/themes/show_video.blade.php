@extends('layouts.default')

@section('content')
    @include('themes.partials.banner')
    <div class="container">

        @if($topVideos->count())
        <div class="col-sm-12">
            <div class="container-fluid row">
                @foreach($topVideos as $tv)
                    @if ($loop->first)
                    <div class="col-sm-6">
                        <div class="top-wrapper" >
                            <a class="top-banner" href="{{route('topic.show',$tv->id)}}"  title="{{$tv->title}}">
                                <img class="img-scale" src="{{$tv->figure}}" alt="..." width="100%" height="100%">
                                <span class="first-cover"> </span>
                                <div class="fisrt-intro">
                                    <div class="first-detail">
                                        <span class="time">{{$tv->created_at}}</span>
                                        <span class="separator">/</span>
                                        <span class="name">{{$tv->user->name}}</span>
                                    </div>
                                    <p class="first-title">{{$tv->title}}</p>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="col-sm-3 top-wrapper">
                    @else
                        <div class="item-card" style="height: 150px">
                            <a href="{{route('topic.show',$tv->id)}}" style="margin-bottom: 15px"  title="{{$tv->title}}">
                                <img class="" src="{{$tv->figure}}" alt="..." width="100%" height="100%">
                                <div class="art-cover">
                                    <div class="text-infor">
                                        <i class="fa fa-viadeo"></i>
                                        <p class="over-hidden title">{{$tv->title}}</p>
                                        <span class="author">
                                            <span class="overdot inb author-text">{{$tv->user->name}}</span>
                                        </span>
                                    </div>
                                    <span class="ref"></span>
                                </div>
                            </a>
                        </div>
                        @endif

                    @endforeach
                </div>
                <div class="col-sm-3 top-wrapper">
                    <div class="user-card nologined" style="max-height: 290px">
                        <img class="user-card-bg" src="/uploads/images/user-card-bg.jpg?20150330" alt="user-card-bg" width="100%" height="100%">
                        <p class="user-login-title">
                            发布作品，
                            <br>
                            生成个人作品集，
                            <br>
                            与
                            <span style="font-size:22px;">544,670+</span>
                            位创作人一起成长
                        </p>
                        <p class="nologin-bot">
                    </div>
                </div>
            </div>
        </div>
        @endif

        <div class="container-fluid" >

            @foreach($videos as $video)
                <div class="col-sm-3 top-wrapper" style="margin-top: 15px">
                    <div class="item-card">
                        <a href="{{route('topic.show',$video->id)}}"  title="{{$video->title}}">
                            <img class="" src="/uploads/images/58be193f2e9ea.jpg" alt="..." width="100%" height="100%">
                            <div class="art-cover">
                                <div class="text-infor">
                                    <i class="fa fa-viadeo"></i>
                                    <p class="over-hidden title">{{$video->title}}</p>
                                    <span class="author">
                                            <span class="overdot inb author-text">{{$video->user->name}}</span>
                                        </span>
                                </div>
                                <span class="ref"></span>
                            </div>
                        </a>
                    </div>
                </div>
                @endforeach
        </div>
    </div>
@endsection
