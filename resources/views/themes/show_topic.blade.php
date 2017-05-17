@extends('layouts.default')

@section('content')
    @include('themes.partials.banner')
    <div class="container">
        <div class="col-sm-8">

            <div class="topics-list-box whitebk setborder">
                <div class="topics-list-header">
                    <h4 class="title">相关推荐</h4>
                </div>
                @include('topics.partials.list')
                <section class="design-pages text-center">{{$topics->links()}}</section>
            </div>

            <div class="whitebk setborder other">

            </div>
        </div>

        <div class="col-md-4 hidden-sm">


            <div class="whitebk setborder row">
                <div class="sidebar-item">本月热门文章</div>
                <ul class="favorite-list">
                    @foreach($hotTopics as $topic)
                        <li>
                            <h3>
                                <a class="overdot inb" href="{{route('topic.show',$topic->id)}}" title="{{$topic->title}}"><i class="fa fa-fire"></i>{{$topic->title}}</a>
                            </h3>
                            <span class="favorite-info">
                                <span class="favorite-info-time pull-right" title="{{$topic->created_at}}">{{$topic->created_at->diffForHumans()}}</span>
                                <span style="padding-left:20px;"></span>
                                <a class="overdot inb" href="{{route('users.show', $topic->user->id)}}">{{$topic->user->name}}</a>
                            </span>
                        </li>
                        @endforeach
                </ul>
            </div>

            <div class="whitebk setborder other row">
                <h4 class="post-right-title">精彩点评</h4>
                <ul class="ori-list">

                    <li>
                        <a class="ori-title" href="/51095?from=index_comment" title="干货 | 北野武惯用的电影技巧，你值得一看" _hover-ignore="1">干货 | 北野武惯用的电影技巧，你值得一看</a>
                        <a class="en-wrap ori-intro" href="/51095?from=index_comment" _hover-ignore="1">
                            喜欢他的《那年夏天宁静的海》，里面有大量的长镜头和由点到面的镜头表达，看多了好莱坞电影，属于东方文化的那种暗流涌动的情感表达都被忽视了，谢谢北野武拍出具有东方美学的电影
                            <span></span>
                        </a>
                        <div class="ori-user">
                            <a class="name odt" href="/personal/1249255?from=index_comment">BeautifulOnes</a>
                            评论于 今天 18:53
                        </div>
                    </li>
                </ul>
            </div>
        </div>
    </div>
@endsection
