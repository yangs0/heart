<div class="list-group">
    <a href="{{route('users.topic', $user->id)}}" class="list-group-item">
        <i class="text-md fa fa-list-ul"></i>
        Ta 发布的文章
    </a>
    <a href="{{route('users.comment', $user->id)}}" class="list-group-item">
        <i class="text-md fa fa-comment"></i>
        Ta 发表的评论
    </a>
   {{-- <a href="#" class="list-group-item">
        <i class="text-md fa fa-eye"></i>
        Ta 关注的用户
    </a>--}}
    <a href="{{route('users.vote', $user->id)}}" class="list-group-item">
        <i class="text-md fa fa-thumbs-up"></i>
        Ta 赞过的话题
    </a>
</div>