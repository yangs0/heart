@extends('layouts.default')
@section('styles')
    <meta name="title" content="{{$topic->title}}" />
    <meta name="description" content="{{$topic->summary}}" />
    <link href="{{asset('/assets/css/share.min.css')}}" rel="stylesheet">
    <style>
        h1,h2,h3,h4,h5{
            font-weight: bold;
        }
    </style>
    @stop
@section('content')
    <div class="container">
        <div class="col-sm-8 row">
            <div class="whitebk topic-box">
                <div class="row">
                    <h3 class="title">{{$topic->title}}</h3>
                    <section class="summary">{{$topic->summary}}</section>
                </div>
                <div class="row">
                    <article class="content">
                        <div class="headImg">
                            <img src="{{$topic->figure}}" class="img-responsive " alt="...">
                        </div>
                        <p>
                            <span class="img-center-box" style="display:block;"></span>
                        </p>
                        {!! $topic->resolved_content !!}
                    </article>
                    <div class="article-footer">

                        <span>原创作品，作者：{{$user->name}}</span>
                        <span>，如若转载，请联系作者并注明出处：</span>
                        <span>{{url()->current()}}</span>

                    {{--<span>转载文章，</span>
                    <span>转载来源：{{$topic->source}}，</span>
                    <span>转载地址：{{$topic->sourceUrl}}</span>
                 --}}
                        <div class="text-right support" >
                            觉得该文章写得不错 ? 那么
                            <button class="btn btn-danger btn-sm">￥打赏</button>
                            支持一下吧！
                            {{--<div class="social-share" data-initialized="true">
                                <a href="#" class="social-share-icon icon-weibo"></a>
                                <a href="#" class="social-share-icon icon-qq"></a>
                                <a href="#" class="social-share-icon icon-qzone"></a>
                            </div>--}}
                        </div>
                    </div>
                    <div class="article-foot-tags">
                        {{--<a href="{{route('theme.show', $topic->theme->id)}}">{{$topic->theme->name}}</a>--}}
                    </div>

                </div>
                <div class="row">
                    <div class="divider"></div>
                    <div class="footer">
                        <!--<div class="row text-center likes">
                            <button class="btn btn-primary">
                                <i class="glyphicon glyphicon-thumbs-up"></i> Like <span class="count">(3)</span>
                            </button>
                        </div>-->
                        <div class="options">

                            <div class="col-sm-12 text-right" >

                                @if(Auth::check())

                                    <!--{{$isVote = \Auth::user()->isVoting($topic->id)}}-->
                                    <a href="javascript:void(0)" data-url="{{route('topics.doVote', $topic->id)}}" data-type="POST" id="vote">
                                        <i class="fa {{$isVote?'fa-heart':'fa-heart-o '}}"></i>
                                    </a>
                                    @else
                                    <a href="javascript:void(0)" ><i class="fa fa-heart-o"></i></a>
                                    @endif
                                <a><i class="fa fa-whatsapp go-comment"></i></a>
                                <span><b>|</b></span>
                                <span data-initialized="true" class="social-share">
                                    <a href="#" class="icon-wechat fa fa-wechat"></a>
                                    <a class="icon-weibo fa fa-weibo" href="#"> </a>
                                    <a href="#" class="icon-qq fa fa-qq"></a>
                                    <a href="" class="icon-qzone fa fa-star"></a>
                                </span>
                                <span><b>|</b></span>
                                <a><i class="glyphicon glyphicon-open"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="whitebk other">
                @include('topics.partials.commont', ['info'=>['type'=>'topic', 'id'=>$topic->id]])
            </div>
        </div>
        <div class="col-md-4 whitebk" style="margin-left: 20px">
            {{--<div class="user-options-box col-sm-offset-1 col-sm-10">
                <button class="btn btn-block btn-grey" id="collect">收藏文章</button>
            </div>--}}

            @include('topics.partials.author')

            <div class="more-posts">
                <h5>您可能感兴趣的文章</h5>
                <ul class="more-posts-list">
                    @foreach($mayCareTopics as $topic)
                        <li class="item"><a href="{{route('topic.show', $topic->id)}}">{{$topic->title}}</a></li>
                    @endforeach
                </ul>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script type="text/javascript" src="/assets/js/jquery.share.min.js"></script>
    <script type="text/javascript" src="/assets/js/social-share.min.js"></script>
    <script>
        @if(Auth::check())

         var isVote = "{{$isVote}}";
        $("#vote").bind('click', function () {
            $.ajax({
                type: $(this).data('type'),
                url: $(this).data('url'),
                headers: {
                    'X-CSRF-TOKEN': Config.token
                },
                data: {},
                dataType: "json",
                success: function(data){
                    if (isVote){
                        $("#vote i").removeClass("fa-heart").addClass("fa-heart-o");

                        isVote= 0
                    }else{
                        $("#vote i").removeClass("fa-heart-o").addClass("fa-heart");
                        isVote=1
                    }
                },
                error:function (xhr,data) {
                    if (xhr.status == 401){
                        alert("用户尚未登录");
                    }
                }
            });
        });
        @endif


    </script>
    @stop
