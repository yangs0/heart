<div class="author-box">
    <div class="author-avatar">
        <a href="{{route('users.show',$user->id)}}"><img src="{{$user->avatar}}" alt="" class="img-responsive img-circle img-thumbnail"></a>
    </div>
    <div class="author-info">
        <div class="about">
            <a class="name" href="#">{{$user->name}}</a>
            <span class="title">作者</span>
        </div>
        <div class="intro">{{ $user->intro?: '该用户很懒什么也没写'}}</div>
        <div class="posts-count"> <i class="glyphicon glyphicon-hdd"></i> 共发表 {{$user->topics_count}} 篇</div>
    </div>
    <div class="divider"></div>
    <div class="recent-posts">
        <h5>最近文章</h5>
        <ul class="post-lists list-unstyled">
            @foreach($user->topics as $topic)
                <li class="item">
                    <div class="row">
                        <div class="col-sm-12">
                           {{$topic->title}}
                        </div>
                    </div>
                    <div class="row info">
                        <div class="col-sm-offset-8 col-sm-4">
                            {{$topic->created_at->diffForHumans()}}
                        </div>
                        {{--<div class="col-sm-8 tags-list">
                            <i class="fa fa-link"></i>
                            <span><a href="#"> 电商</a><span>·</span></span>
                            <span><a href="#" >媒体</a><span>·</span></span>
                            <span><a href="#" >微软</a></span>
                            <span><a href="#" ></a></span>
                        </div>--}}
                    </div>
                </li>
                @endforeach
        </ul>
    </div>
    <div class="row more">
        <a class="btn btn-block btn-primary" href="{{route('users.show', $user->id)}}">查看更多</a>
    </div>
</div>