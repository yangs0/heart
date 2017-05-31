@extends('layouts.default')
@section('styles')
    <style>
        .message-meta {
            color: #a0a0a0;
            font-size: 14px;
        }
        .normalize-link-color {
            color: inherit;
        }
        .normalize-link-color:hover{
            color: #666;
        }
        .user-a{
            color: #1E9E8A
        }.user-a:hover{
             text-decoration: underline;
         }
        .padding-md .bottom-line{
            border-bottom: 1px solid #eddede;
        }
    </style>
    @stop
@section('content')
    <div class="container"style="margin-bottom: 250px">
        <div class="col-sm-3">
            @include('user.partials.notice_nav')
        </div>

        <div class="col-sm-9">
            <div class="whitebk padding-md">
                <h2>
                    <i class="fa fa-cog"></i>
                    私信
                </h2>
                <div class="divider"></div>
                <ul class="list-group">
                    @foreach($letters as $letter)

                        <li class="list-group-item media bottom-line">
                            <div class="pull-left">
                                <a href="#">
                                    <img class="media-object img-thumbnail avatar" alt="{{$letter->fromUser->avatar}}" src="/uploads/avatars/default.jpg" style="width:48px;height:48px;"></a>
                            </div>
                            <div class="infos">
                                <div class="media-heading">
                                    @if($letter->fromUser->id == Auth::id())
                                        我发送给
                                        <a href="{{route('users.show',$letter->toUser->id)}}" class="user-a">{{$letter->toUser->name}}</a>
                                    @else
                                        <a href="{{route('users.show',$letter->fromUser->id)}}" class="user-a">{{$letter->fromUser->name}}</a>
                                        发送给我
                                    @endif
                                        <span class="at-time">{{$letter->created_at->diffForHumans()}}</span>：
                                </div>
                                <div class="media-body markdown-reply content-body">
                                    <p class="ti-1">{{$letter->msg}}</p>
                                </div>
                                <div class="message-meta">
                                    <p>
                                        <a href="{{route('users.chat',$letter->friend)}}" class="normalize-link-color ">
                                            <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                            查看对话
                                        </a>
                                    </p>
                                </div>
                            </div>
                        </li>
                    @endforeach

                    {{--<li class="list-group-item media bottom-line">
                        <div class="pull-left">
                            <a href="https://laravel-china.org/users/1">
                                <img class="media-object img-thumbnail avatar" alt="Summer" src="/uploads/avatars/default.jpg" style="width:48px;height:48px;"></a>
                        </div>
                        <div class="infos">
                            <div class="media-heading">我发送给
                                <a href="" class="user-a">Summer</a>
                                <span class="meta">⋅ 于 ⋅ <span class="timeago">2017-04-12 23:27:11</span></span>：
                            </div>

                            <div class="media-body markdown-reply content-body">
                                <p>提一个小细节的问题吧，，作者信息（蓝色部分）定位在屏幕上，而专栏推荐（红色部分）没有定位。。那么滚动条下去的时候，作者信息会把专栏推荐覆盖掉，，专栏推荐就只能看到那么一小段，，体验不是很好。。</p>
                            </div>

                            <div class="message-meta">
                                <p>
                                    <a href="https://laravel-china.org/messages/153" class="normalize-link-color ">
                                        <i class="fa fa-commenting-o" aria-hidden="true"></i>
                                        查看对话
                                    </a>
                                </p>
                            </div>
                        </div>
                    </li>--}}
                </ul>
            </div>
        </div>
    </div>

@endsection
