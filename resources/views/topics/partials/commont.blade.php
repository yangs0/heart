<div class="comment" id="comment">
    <h2 class="comment-title">
        影片点评
        <span class="num">已有{{$replies->total()}}条点评</span>
        <div class="go-comment gc">快速评论</div>
    </h2>
    <ul class="com-list">

        @foreach($replies as $reply)
            <li>
                <div class="media">
                    <a class="pull-left" href="#">
                        <img class="media-object" src="{{$reply->user->avatar}}"
                             alt="...">
                    </a>
                    <div class="media-body com-text">
                        <h4 class="media-heading title"><a href="">{{$reply->user->name}}</a></h4>
                        <div class="intro">
                            {{$reply->content}}
                        </div>
                        <div class="ope">
                            <span class="time"> {{$reply->created_at->diffForHumans()}}</span>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
    </ul>
    <section class="design-pages-circle small text-center">
        {{$replies->fragment('comment')->links()}}
    </section>
    <div class="divider"></div>
    <div class="replay">
        <div class="media">
            <a class="pull-left" href="#">
                <img class="media-object img-thumbnail" src="/uploads/avatars/default.jpg"
                     alt="...">
            </a>
            <div class="media-body com-text">
                <textarea name="content" id="content" data-type="{{$info['type']}}" data-url="{{route('replies.store')}}" data-id="{{$info['id']}}" rows="3"  class="form-control" ></textarea>
                <div class="media-bottom reply-btn">
                    <button class="btn btn-info"><i class="fa fa-send"></i> 发表点评</button>
                </div>
            </div>
        </div>
    </div>
</div>

@section('script')
    @parent
    <script>
        $(".reply-btn .btn").bind('click', function () {
            var reply = $("#content");
            $.ajax({
                type: "post",
                url: reply.data('url'),
                headers: {
                    'X-CSRF-TOKEN': Config.token
                },
                data: {
                    type: reply.data('type'),
                    morph_id : reply.data('id'),
                    content : reply.val()
                },
                dataType: "json",
                success: function(result){
                    if (result.status == 200){
                        $(".com-list").append('<li><div class="media"><a class="pull-left" href="/users/'+result.data.user_id+'">' +
                                '<img class="media-object" src="{{Auth::user()->avatar}}" alt="..."></a>' +
                                '<div class="media-body com-text"><h4 class="media-heading title"><a href="{{route('users.show',Auth::id())}}">{{Auth::user()->name}}</a></h4>' +
                                '<div class="intro">'+result.data.content+'</div>' +
                                '<div class="ope"><span class="time">1秒前</span></div></div></div></li>');
                        $("#content").val('');
                    }
                },
                error:function (xhr,data) {
                    if (xhr.status == 401){
                        alert("用户尚未登录");
                    }
                }
            });

            var btn = $(this).button('loading');
            setTimeout(function () {
                btn.button('reset');
            }, 3300);
        });

        $(".go-comment").bind('click', function () {
            $("#content").focus();
            var h = $(document).height()-$(window).height();
            $(document).scrollTop(h);

        })



    </script>
    @stop