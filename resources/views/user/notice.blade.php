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
        .padding-md li{

        }
        .padding-md li.bottom-line{
            padding-bottom: 5px;
          /*  padding-top: 10px;
            margin-top: 10px;*/
            margin-top: 0;
            margin-bottom: 1px;
            border-bottom: 1px solid #ededed;
        }
        .list-group-item.media .infos{
            margin-left:50px;
            margin-top: 10px;
        }
        /*.unRead{


        }
        */
        .unRead:hover{
            background-color: #fff8dc;
        }
        .markBell{
            color: #666;
            cursor:pointer;
            font-weight: 700;
        }
        .markBell:hover{
            cursor: pointer;
            color: #c95865
        }
    </style>
    @stop
@section('content')
    <div class="container" style="margin-bottom: 240px">
        <div class="col-sm-3">
            @include('user.partials.notice_nav')
        </div>

        <div class="col-sm-9">
            <div class="whitebk padding-md">
                <h2>
                    <i class="fa fa-cog"></i>
                    通知
                </h2>
                <a class="markBell"><small class="pull-right" style="margin-top:-15px"><i class="fa fa-bell-slash"></i> 全部标记为已读</small></a>
                <div class="divider"></div>
                <ul class="list-group">
                    @foreach($notices as $notice)

                        <li class="list-group-item media bottom-line notic-li {{readActiveClass($notice->is_read)}}" data-id="{{$notice->id}}">
                            <div class="pull-left">
                                <a href="{{route('users.show',$notice->fromUser->id)}}">
                                    <img class="media-object img-thumbnail img-circle" src="{{$notice->fromUser->avatar}}" style="width:38px;height:38px;"></a>
                            </div>
                            <div class="infos">
                                <div class="media-heading">

                                    @if($notice->type == 'follow')
                                        用户 <a href="">{{$notice->fromUser->name}}</a>  {{trans("notice.".$notice->type)}}
                                        @if( $notice->line_id == Auth::id())你
                                            @else
                                            <a href="{{route('users.show',$notice->line_id)}}">{{\App\Models\User::find($notice->line_id)->name}}</a>
                                            @endif
                                    @elseif($notice->type == 'topic')
                                        你关注的用户 <a href="">{{$notice->fromUser->name}}</a> {{trans("notice.".$notice->type)}}
                                        <a href="{{route('topic.show',$notice->line_id)}}">{{\App\Models\Topic::find($notice->line_id)->title}}</a>
                                    @elseif($notice->type == 'activity')
                                        你关注的用户 <a href="">{{$notice->fromUser->name}}</a> {{trans("notice.".$notice->type)}}
                                        <a href="{{route('topic.show',$notice->line_id)}}">{{\App\Models\Activity::find($notice->line_id)->title}}</a>
                                    @endif
                                    <small style="color: palevioletred" class="newTag">{{readActive($notice->is_read)}}</small>
                                        <span class="at-time">{{$notice->created_at->diffForHumans()}}</span>
                                </div>
                            </div>
                        </li>
                        @endforeach
                    {{--<li class="list-group-item media bottom-line notic-li">
                        <div class="pull-left">
                            <a href="https://laravel-china.org/users/1">
                                <img class="media-object img-thumbnail img-circle" src="/uploads/avatars/default.jpg" style="width:38px;height:38px;"></a>
                        </div>
                        <div class="infos">
                            <div class="media-heading">
                                <a href="">CRQM</a> • 你关注的用户发布了新话题 <a href="" class="">绿色地球，招聘 PHP 工程师</a> <span class="at-time">13天前</span>
                            </div>
                        </div>
                    </li>--}}
                </ul>
            </div>
        </div>
    </div>

@endsection

@section('script')

    <script>

        $("body").on("click",".unRead", function () {
            var _self = $(this);
            $.post("{{route('users.notice.read')}}",{id:_self.data('id'),'_token': Config.token},function (response) {
                _self.removeClass('unRead').find('.newTag').remove();
            })
        }).on('click','.markBell', function () {
            $.post("{{route('users.notice.read')}}",{id:0,'_token': Config.token},function (response) {
                $(".unRead").removeClass('unRead').find('.newTag').remove();
            })
        })
    </script>
    @stop
