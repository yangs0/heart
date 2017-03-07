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
                    Ta 赞过的话题（{{$topics->total()}}）
                </div>
            </div>
            @endif


            <div class="panel panel-default art-box">
                <div class="panel-heading">
                    最近文章
                </div>

                @if($topics->count())
                    <ul class="list-group">
                        @foreach($topics as $topic)
                            <li class="list-group-item">
                                <span class="at-time" title="{{route('topic.show', $topic->id)}}">{{$topic->created_at->diffForHumans()}}</span>
                                <h5 class="list-group-item-heading">
                                    <a href="#">{{$topic->title}}</a>
                                </h5>
                                <span class="meta">
                                    <a href="#" title="教程"> 教程 </a>
                                    <span> ⋅ </span>144 点赞
                                    <span> ⋅ </span>43 回复
                                </span>
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
