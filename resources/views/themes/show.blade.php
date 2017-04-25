@extends('layouts.default')

@section('content')
    @include('themes.partials.banner')
    <div class="container">
        <div class="col-sm-9">
            <div class="whitebk setborder">
                <div class="theme-info-box">
                    <div class="media">
                        <a class="pull-left" href="#">
                            <img class="media-object img" src="{{$theme->cover}}"
                                 alt="...">
                        </a>
                        <div class="media-body content">
                            <h4 class="media-heading">{{$theme->name}}</h4>
                            {{$theme->intro}}
                        </div>
                    </div>
                </div>
                <div class="theme-info-ext">
                    <div class="relevant-posts">
                        <h5>编辑推荐</h5>
                        <div class="post-lists row">
                            @foreach($recommend as $topic)
                                <div class="col-sm-6 col-md-4">
                                    <a class="thumbnail" href="{{route('topic.show', $topic->id)}}">
                                        <img class="img-show" src="{{$topic->figure}}" alt="..."  >
                                        <div class="caption">
                                            <p>{{$topic->title}}</p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>


            <div class="topics-list-box whitebk setborder other">
                <div class="topics-list-header">
                    <h4 class="title">热门推荐</h4>
                </div>
                @include('topics.partials.list')
            </div>
        </div>

        <div class="col-md-3 hidden-sm">
            <div class="whitebk setborder" style="position: relative">
                <div class="pro-themes">
                    <div class="rhtitle">新鲜事儿</div>
                    <div class="content">
                        @foreach($newTopics as $topic)
                            <a href="#" target="">
                                <p class="ptext">{{$topic->title}}</p>
                            </a>
                            @endforeach
                    </div>
                    <div class="yellowarro"></div>
                </div>
                <span class="smart"></span>
            </div>

            <div class="whitebk setborder other">
                <div class="drygoods">
                    <div class="title">征集干货</div>
                    <div class="content">
                        <p>把你认为靠谱的站内外文章提交给本知识库吧。帮助大家，多多益善！</p>
                        <a class="drybtn" href="http://lib.csdn.net/submit/git/base" target="_blank">我要提交干货</a>
                        <span>
                        <i class="fa fa-user"></i>
                        已有 {{$celebritiesAll->count()}} 人为本库贡献了干货
                    </span>
                        <!-- <em>最新贡献者：</em>-->
                    </div>
                </div>
            </div>

            <div class="whitebk setborder other">
                <div class="relative-themes">
                    <div class="title">
                        <span style="cursor: default;font-weight: 700;">名人榜</span>

                    </div>
                    <div class="more-list">
                        @include('themes.partials.celebrity')
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>

    </script>
@endsection
