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
                <div class="panel panel-default" >
                    <div class="panel-heading breadcrumb">
                        <a href="">个人中心</a> <em>/</em>
                        Ta 发表的回复（{{$topics->total()}}）
                    </div>
                </div>
            @endif


            <div class="panel panel-default replies-box">
                <div class="panel-heading">
                    最近文章
                </div>

                @if($topics->count())
                    <ul class="list-group">
                        @foreach($topics as $topic)
                            <li class="list-group-item">
                                <span class="at-time">at 2013.10.2</span>
                                <h5 class="list-group-item-heading">
                                    <a href="">终于发布了，非常适合学习理解 Laravel 的项目--图书管理系统</a>
                                </h5>
                                <p class="reply-content">学习学习</p>
                            </li>
                        @endforeach
                    </ul>
                    <section class="text-center">
                        {{$topics->links()}}
                    </section>
                @else
                    <div class="panel-body">
                        <div class="empty-content">暂时还没有内容。。。。</div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection
