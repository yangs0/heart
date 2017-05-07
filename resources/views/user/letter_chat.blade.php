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
        .ti-1{
            text-indent:1em;
        }
        .li-content{
            max-height: 800px;
            overflow-y:auto;
        }
    </style>
    <link href="{{asset('/assets/css/jquery.sinaEmotion.css')}}" rel="stylesheet">
    @stop
@section('content')
    <div class="container">
        <div class="col-sm-3">
            <div class="padding-md whitebk">
                <div class="list-group text-center">
                    <a class="list-group-item active" href="{{route('users.letter')}}">
                        <i class="text-md fa fa-list-alt" ></i>
                        私信
                    </a>
                    <a class="list-group-item " href="{{route('users.notice')}}">
                        <i class="text-md fa fa-link" ></i>
                        通知
                    </a>
                </div>
            </div>
        </div>

        <div class="col-sm-9">
            <div class="whitebk padding-md">
                <div>
                    <a class="normalize-link-color" href="{{route('users.letter')}}">
                        <i class="fa fa-arrow-left" aria-hidden="true"></i>
                        返回
                    </a>
                </div>
                <div class="divider"></div>
                <ul class="list-group">

                   <div class="li-content">
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
                                           <span class="at-time">{{$letter->created_at->diffForHumans()}}</span>:
                                       {{--<span class="meta">⋅ 于 ⋅ <span class="timeago">{{$letter->created_at}}</span></span>--}}
                                   </div>
                                   <div class="media-body markdown-reply content-body">
                                       <p class="ti-1">{{$letter->msg}}</p>
                                   </div>
                               </div>
                           </li>
                           @endforeach
                   </div>

                    <li class="list-group-item media">
                        <a class="pull-left" href="#">
                            <img class="media-object img-thumbnail" src="/uploads/avatars/default.jpg"
                                 alt="...">
                        </a>
                        <div class="media-body com-text commonArea">
                            <textarea placeholder="" name="content" id="content"  rows="3"  class="form-control" style="resize: none;"></textarea>
                            <div class="media-bottom reply-btn">
                                <a class="sbtn btn face"><i class="fa fa-drupal"></i></a>
                                <button class="btn btn-info send"><i class="fa fa-send"></i> 发表点评</button>
                            </div>
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('script')
    @parent
    <script type="text/javascript" src="/assets/js/jquery.sinaEmotion.js"></script>
    @if(Auth::check())
        <script>
            $('.face').bind({
                click: function(event){
                    if(! $('#sinaEmotion').is(':visible')){
                        $(this).sinaEmotion("#content");
                        event.stopPropagation();
                    }
                }
            });

            $(".reply-btn .btn.send").bind('click', function () {
                var reply = $("#content");
                var _content = $("#content").val().trim();
                if (!_content && _content.length < 1){
                    layer.msg("私信内容不能为空。",{icon: 5, time:1500});
                    return false;
                }
                $.post("{{route('users.letter.send')}}", {content:_content,user_id:"{{$toUser->id}}",'_token': Config.token},function (response) {
                    layer.msg(response.msg,{icon: 1, time:2500});
                })
               $(".list-group .li-content")
                       .append('<li class="list-group-item media bottom-line">' +
                               '<div class="pull-left">' +
                               '<a href="{{route('users.show',$toUser->id)}}"><img class="media-object img-thumbnail avatar" src="{{$toUser->avatar}}" style="width:48px;height:48px;"></a></div><div class="infos">' +
                               '<div class="media-heading">我发送给<a href="{{route('users.show',$toUser->id)}}" class="user-a">{{$toUser->name}}</a>' +
                               '<span class="at-time">1秒前</span>' +
                               '：</div><div class="media-body markdown-reply content-body">' +
                               '<p class="ti-1">'+_content+'</p></div></div></li>');
                $(".list-group .li-content .list-group-item:last").parseEmotion();

                var btn = $(this).button('loading');
                setTimeout(function () {
                    btn.button('reset');
                }, 3300);
            });


            $(document).ready(function() {
                $(".bottom-line").parseEmotion();
            });
        </script>

    @else
        <script>
            $(function () {

                $(".commonArea #content").attr('disabled',true).attr('placeholder','请先登录账号')
                $(".commonArea .reply-btn").hide()
            })
        </script>
    @endif

@stop
