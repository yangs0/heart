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
                <li class="active">推荐</li>
                <li >话题</li>
                <li>问答</li>
                <li>视频</li>
            </ul>
        </div>
    </div>
</div>