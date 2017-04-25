@extends('layouts.default')
@section('style')<link href="{{asset('/assets/css/jquery.sinaEmotion.css')}}" rel="stylesheet">@stop
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
                        Ta 发表的回复（{{$user->reply_count}}）
                    </div>
                </div>
            @endif


            <div class="panel panel-default replies-box">
                <div class="panel-heading">
                    最近评论
                </div>

                @if($replies->count())
                    <ul class="list-group">
                        @foreach($replies as $reply)
                            <li class="list-group-item">
                                <span class="at-time">{{$reply->created_at->diffForHumans()}}</span>
                                <h5 class="list-group-item-heading over-hidden">
                                    <a href="{{$reply->replable->getUrl()}}" title="{{$reply->replable->title}}">{{$reply->replable->title}}</a>
                                </h5>
                                <p class="reply-content over-hidden">{{$reply->content}}</p>
                            </li>
                        @endforeach
                    </ul>
                    <section class="text-center">
                        {{$replies->links()}}
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

@section('script')
    <script type="text/javascript" src="/assets/js/jquery.sinaEmotion.js"></script>
    <script>
        $(document).ready(function() {
            $(".list-group").parseEmotion();
        });
    </script>
    @stop
