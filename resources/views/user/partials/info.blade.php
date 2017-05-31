<div class="user-box">
    <div class="media">
        <div class="media-left">
            <a href="#" id="thumb_avatar"><img class="img-circle media-object img-thumbnail lg" src="{{$user->avatar}}" alt="loading..."></a>
        </div>
        <div class="media-body">
            <h3 class="media-heading" style="font-size: 20px"> {{$user->name}} </h3>
            <div class="item"> 第 {{$user->id}} 位会员 </div>
            <div class="item ">
                注册于
                <span class="number" data-content="2016-10-01 08:56:58" data-original-title="" title="">{{$user->created_at->diffForHumans()}}</span>
            </div>
            <div class="item">
                活跃于
                <span class="number" data-content="2016-10-23 09:19:08" data-original-title="" title="">{{$user->updated_at->diffForHumans()}}</span>
            </div>
        </div>
    </div>
    <hr>
    <div class="user-active-info row">
        <div class="col-xs-4">
            <a href="">
                <span class="item number">{{$user->follower_count}}</span>
                <span class="item about">关注</span>
            </a>
        </div>
        <div class="col-xs-4">
            <a href="">
                <span class="item number">{{$user->reply_count}}</span>
                <span class="item about">评论</span>
            </a>
        </div>
        <div class="col-xs-4">
            <a href="">
                <span class="item number">{{$user->topics_count}}</span>
                <span class="item about">话题</span>
            </a>
        </div>
    </div>
    <hr>
    <div class="user-infos">
        <ul class="list-inline">
            @if(!empty($user->github_name))
                <li class="circle-border" title="{{$user->github_name}}">
                    <a href="{{$user->github_link}}">
                        <i class="fa fa-github-alt"></i>
                        GitHub
                    </a>
                </li>
                @endif
                @if(!empty($user->github_name))
                    <li class="circle-border weibo" title="{{$user->weibo_name}}">
                        <a href="{{$user->weibo_link}}">
                            <i class="fa fa-weibo"></i>
                            Weibo
                        </a>
                    </li>
                @endif

                @if(!empty($user->school))
                    <li class="circle-border weibo" title="{{$user->school}}">
                        <a href="#">
                            <i class="fa fa-home"></i>
                            学校
                        </a>
                    </li>
                @endif
                @if(!empty($user->city))
                    <li class="circle-border weibo" title="{{$user->city}}">
                        <a href="#">
                            <i class="fa fa-address-card-o"></i>
                            城市
                        </a>
                    </li>
                @endif
        </ul>
    </div>
    <hr>
    @if(Auth::check() && Auth::id() === $user->id)
        <a class="btn btn-danger btn-block" href="{{route('users.edit', $user->id)}}"><i class="fa fa-edit"></i> 编辑个人资料</a>
        @include('user.partials.avatar')
    @endif

    @if(Auth::check() && Auth::id() != $user->id)
        <a class="btn btn-default btn-block" data-type="POST" href="javascript:void(0);" onclick="letter()" >
            <i class="fa fa-send-o"></i> 发送私信
        </a>
    <!--{{$isFollowing= Auth::user()->isFollowing($user->id) ? true : false}}-->
        <a class="btn btn-{{ !$isFollowing ? 'warning' : 'danger' }} btn-block" data-type="POST" href="javascript:void(0);" data-url="{{ route('users.doFollow', $user->id) }}" id="follow">
            <i class="fa {{!$isFollowing ? 'fa-plus' : 'fa-minus'}}"></i> {{ !$isFollowing ? '关注用户' : '取消关注' }}
        </a>

        @include('user.partials.send_letter',['user'=>$user])

    @endif

</div>
@section('script')
    @parent
    @if(Auth::check() && Auth::id() != $user->id)
    <script>
        var isFollow = "{{$isFollowing}}";
        $("#follow").bind('click', function () {

            $.ajax({
                type: $(this).data('type'),
                url: $(this).data('url'),
                headers: {
                    'X-CSRF-TOKEN': Config.token
                },
                //async: false,
                data: {},
                dataType: "json",
                success: function(data){
                    if (isFollow){
                        $("#follow").removeClass("btn-danger").addClass("btn-warning");
                        $("#follow").html('<i class="fa fa-plus"></i> 关注用户');
                        isFollow= 0
                    }else{
                        $("#follow").removeClass("btn-danger").addClass("btn-danger");
                        $("#follow").html('<i class="fa fa-minus"></i> 取消关注')
                        isFollow=1
                    }

                },
                error:function (xhr,data) {
                    if (xhr.status == 401){
                        alert("用户尚未登录");
                    }
                }
            });
        });
    </script>
    @endif
@stop
