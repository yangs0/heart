
<div class="row">
    <ul class="themes-list">
        @foreach($themes as $theme)
            <li>
                <a href="{{route('theme.show',$theme->id)}}"><img src="{{$theme->cover}}" alt="{{$theme->name}}" ></a>
                <div class="theme-inform">
                    <div class="theme-name">
                        <a href="{{route('theme.show',$theme->id)}}">{{$theme->name}}</a>
                        {{--<span>每周四更新</span>--}}
                    </div>
                    <div class="state">
                        @if($theme->focus_count == 0)
                            <a class="follow-wj cool" href="{{route('theme.show_rooms',$theme->id)}}" style="width: 100px;height: 25px" >冷清</a>
                        @elseif($theme->focus_count <5)
                            <a class="follow-wj " href="{{route('theme.show_rooms',$theme->id)}}" style="width: 100px;height: 25px">闲聊</a>
                        @else
                            <a class="follow-wj following" href="{{route('theme.show_rooms',$theme->id)}}" style="width: 100px;height: 25px">火热</a>
                        @endif

                        <span><span class="count">{{$theme->focus_count}}</span>人正在交流</span>
                    </div>
                    <p class="">{{str_limit($theme->intro,60,'...')}}</p>
                    <div class="big-content">
                        @foreach($theme->topics as $topic)
                            <div class="another-theme">
                                <a href="{{route('topic.show',$topic->id)}}">{{$topic->id.'. '.$topic->title}}</a>
                            </div>
                            @endforeach
                    </div>
                </div>
            </li>
            @endforeach

        {{--<li>
            <a href="#"><img src="http://cs.vmovier.com/Uploads/Series/2015-03-10/54fec581e98ae.jpg@300w.jpg" alt="电影自习室" ></a>
            <div class="theme-inform">
                <div class="theme-name">
                    <a href="/series/45?from=series_list" target="_blank" _hover-ignore="1">电影自习室</a>
                    <span>每周四更新</span>
                </div>
                <div class="state">
                    <a class="follow-wj" href="javascript:;">追剧</a>
                    <span><span class="count">93825</span>人正在追</span>
                </div>
                <p>【电影自习室】是V电影网出品的一档影视教学视频栏目，主要面向初级影视...</p>
                <div class="big-content">
                    <div class="another-theme">
                        <a href="/series/45/85?from=series_list" target="_blank" _hover-ignore="1">85. 番外篇-绿幕搭建和拍摄技巧 上海温哥华电影学院</a>
                    </div>
                    <div class="another-theme">
                        <a href="/series/45/84?from=series_list" target="_blank" _hover-ignore="1">84. 番外篇-导演十步调度法 上海温哥华电影学院</a>
                    </div>
                </div>
            </div>
        </li>--}}
    </ul>
</div>