<div class="carousel slide car-act" id="activity"  data-ride="carousel">
    <ol class="carousel-indicators">
        @foreach($proActivity as $proAct)
        <li data-target="#activity" data-slide-to="{{$loop->index}}" class=" @if ($loop->first) active @endif"></li>
        @endforeach
    </ol>
    <div class="carousel-inner " >
        @foreach($proActivity as $proAct)
            <div class="item   @if ($loop->first) active @endif ">
                <a href="{{route("activities.show", $proAct->id)}}"><img src="{{$proAct->cover}}" alt="..." /></a>
                <div class="carousel-caption design hidden-sm hidden-xs" >
                    <h4>
                        <a href="{{route("activities.show", $proAct->id)}}" title="{{$proAct->title}}">{{$proAct->title}}</a>
                    </h4>
                    <div class="activity-intro">{{$proAct->intro}}</div>
                    <div class="activity-click-btn">
                        <a class="play-btn" href="{{route("activities.show", $proAct->id)}}">
                            点击查看
                        </a>
                    </div>
                </div>
            </div>

        @endforeach

            {{--<div class="item">
                <img src="/uploads/banner/1481865834039_39.jpg" alt=""/>
                <div class="carousel-caption design" >
                    <h4>
                        <a href="http://www.xinpianchang.com/activity/independence/ts-travel2?from=activity_banner" title="#创作吧！少年#Pro 最好的时光在路上_系列" target="_blank">#创作吧！少年#Pro 最好的时光在路上</a>
                    </h4>
                    <div class="activity-intro">22222222222222#创作吧！少年#Pro，面向所有爱旅行爱影像的小伙伴征集旅拍作品。用镜头记录下途中美丽的风景，用影像存留下最美好的时光。最好的时光，在路上！</div>
                    <div class="activity-click-btn">
                        <a class="play-btn" href="http://www.xinpianchang.com/activity/independence/ts-love_letter?from=activity_banner">
                            点击查看
                        </a>
                    </div>
                </div>
            </div>--}}
    </div>
</div>