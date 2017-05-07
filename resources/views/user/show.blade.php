@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="col-md-3">
            @include('user.partials.info')

            <div class="user-action">
                @include('user.partials.actions')
            </div>
        </div>
        <div class="col-md-9">

            @if($user->intro)
            <div class="panel panel-default m-b10" >
                <div class="panel-heading text-center">
                    学习，学习，再学习
                </div>
            </div>
            @endif


            <div class="panel panel-default art-box">
                <div class="panel-heading">
                    最近文章
                </div>

                @if(!$topics->isEmpty())
                    <ul class="list-group ">
                        @foreach($topics as $topic)
                            <li class="list-group-item">
                                <span class="at-time" title="{{route('topic.show', $topic->id)}}">{{$topic->created_at->diffForHumans()}}</span>
                                <h5 class="list-group-item-heading">
                                    <a href="{{route('topic.show',$topic->id)}}">{{$topic->title}}</a>
                                </h5>
                            </li>
                        @endforeach
                    </ul>
                   @else
                    <div class="panel-body">
                        <div class="empty-content">暂时还没有内容。。。。</div>
                    </div>
                @endif
                @include('user.partials.send_letter')
            </div>

            <div class="panel panel-default replies-box">
                <div class="panel-heading">
                    最新评论
                </div>
                <ul class="list-group">
                    <li class="list-group-item">
                        <span class="at-time">at 2013.10.2</span>
                        <h5 class="list-group-item-heading">
                            <a href="">终于发布了，非常适合学习理解 Laravel 的项目--图书管理系统</a>
                        </h5>
                        <p class="reply-content">学习学习</p>
                    </li>
                    <li class="list-group-item">
                        <span class="at-time">at 2013.10.2</span>
                        <h5 class="list-group-item-heading">
                            <a href="">终于发布了，非常适合学习理解 Laravel 的项目--图书管理系统</a>
                        </h5>
                        <p class="reply-content">学习学习</p>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection
