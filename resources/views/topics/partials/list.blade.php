<div class="topics-list-content">
    <ul class="topics-list list-unstyled">
        @foreach($topics as $topic)
            <li class="clearfix-s" style="position: relative">
                <a class="topics-img " target="_blank" href="{{route('topic.show', $topic->id)}}" title="{{$topic->title}}">
                    <img src="{{$topic->figure}}" class="img-responsive img-thumbnail" alt="{{$topic->title}}" >
                </a>
                <div class="topic-main">
                    <h1>
                        <a href="{{route('topic.show',$topic->id)}}" title="{{$topic->title}}">{{$topic->title}}</a>
                    </h1>
                    <div class="topic-intro">
                        <a href="{{route('topic.show', $topic->id)}}" >{{$topic->intro}}</a>
                    </div>
                    <div class="topic-more clearfix">
                                    <span class="time">
                                        <span>{{$topic->type}}</span>
                                    </span>
                        <span class="time">{{$topic->created_at->diffForHumans()}}</span>
                        <div class="about">
                            <span><i class="fa fa-commenting-o"></i> {{$topic->reply_count}}</span>
                            <span><i class="fa fa-heart-o"></i> {{$topic->vote_count}}</span>
                            <span><i class="fa fa-share-alt"></i> {{$topic->collect_count}}</span>
                        </div>
                    </div>
                </div>
            </li>
            @endforeach
    </ul>

</div>