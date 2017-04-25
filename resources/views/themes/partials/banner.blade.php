<div class="jumbotron theme-header" style="background-color: #5C93B0">
    <div class="container theme-show" style="background: rgba(0, 0, 0, 0) url('{{url("/uploads/banner/book_img.png")}}');height:202px;">
        <div class="theme-avatar"><img src="{{$theme->cover}}" alt="..." class="img-circle" width="100" height="100"></div>
        <div class="theme-name">{{$theme->name}}</div>
        <div class="theme-ext">
            <a>
                <em>{{$theme->focus_count}}</em>
                <b> 关注者</b>
                <span class="triggerlayer" >
                    <i class="fa fa-plus"></i>
                    <em> 关注</em>
                </span>
            </a>
        </div>
        <div class="theme-links row">
            <ul class="list-unstyled list-inline">
                <li class="{{navViewActive('theme.show')}}"><a href="{{route('theme.show',$theme->id)}}">推荐</a></li>
                <li class="{{navViewActive('theme.show_topic')}}"><a href="{{route('theme.show_topic',$theme->id)}}">话题</a></li>
                {{--<li class="{{navViewActive('theme.show_video')}}"><a href="{{route('theme.show_video',$theme->id)}}">图片</a></li>--}}
            </ul>
        </div>
    </div>
</div>