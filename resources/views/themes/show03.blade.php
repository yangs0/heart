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
                                    <a class="thumbnail">
                                        <img class="img-show" src="/uploads/images/5879cfe6c4f24.jpg" alt="..."  >
                                        <div class="caption">
                                            <p>【独家】拉勾的野心不止招聘，还要做一整套HR SaaS</p>
                                        </div>
                                    </a>
                                </div>
                                @endforeach
                        </div>
                    </div>
                </div>
            </div>
            <div class="topics-list-box whitebk setborder">
                <div class="topics-list-header">
                    <h4 class="title">相关推荐</h4>
                </div>
                @include('topics.partials.list')
            </div>
        </div>

        <div class="col-md-3 hidden-sm">
            <div class="whitebk setborder row">

            </div>
        </div>
    </div>
@endsection
