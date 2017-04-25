<ul class="list-unstyled">

    @foreach($celebritiesAll->take(5) as $celebrity)
        <li class="clearfix">
            <div class="l">
                <a href="http://lib.csdn.net/base/agile" >
                    <img src="{{$celebrity->avatar}}" alt="..."  class="img-circle">
                </a>
            </div>
            <div class="r">
                <a href="{{route('users.show', $celebrity->id)}}" class="aname">{{$celebrity->name}}</a>
                <p>
                    <em>{{$celebrity->follower_count}} </em>
                    关注者
                    <em>{{$celebrity->topics_count}} </em>
                    个话题
                </p>
            </div>
        </li>
        @endforeach





</ul>