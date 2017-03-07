@extends('layouts.default')

@section('content')
    <div class="jumbotron" style="background: rgba(0, 0, 0, 0) url('/uploads/banner/1481865834039_39.jpg') no-repeat scroll center top / cover ;margin-top: -26px;height:200px;position: relative"></div>
    <div class="container">
        {{--<div class="row album-title">
            校园广场
            <span class="album-subtitle">
                <span>汇聚校园精彩主题</span>
            </span>
        </div>--}}

        <div class="container">
            <div class="box-left">
                @include('themes.partials.list')

               {{-- <section class="design-pages">
                    {{$themes->links()}}
                </section>--}}
            </div>

            <div class="box-right" >
                @include('themes.partials.activities')
                <div class="hot-theme-list">
                    <h5 class="title">
                        热门主题
                    </h5>
                    <div class="tags">

                       @foreach($hotThemes as $theme)
                            <a href="#" title="###">{{$theme->name}}</a>
                           @endforeach

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
