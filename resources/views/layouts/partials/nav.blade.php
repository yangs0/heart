<nav class="navbar navbar-default top-nav" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#nav-list">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/"> LOGO</a>
        </div>

        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="nav-list">
            <ul class="nav navbar-nav">

                <li><a href="{{url('/themes')}}">主题</a></li>
                <li><a href="{{url('activities')}}">活动</a></li>
                <li>
                    <form action="" class="navbar-form navbar-left" >
                        <div class="input-group search-input">
                                <span class="input-group-btn">
                                    <button class="btn btn-default" type="submit"><i class="fa fa-search"></i></button>
                                </span>
                            <input type="text" class="form-control trans-input" placeholder="站内搜索">
                        </div>
                    </form>
                </li>
            </ul>
            <ul class="nav navbar-nav navbar-right ">

                @if(\Auth::guest())
                    <li><a href="/login" class="nva-options" ><button class="btn btn-success nav-l-r btn-block" href="/login" ><i class="fa fa-hand-o-right"> </i> 登 录 </button></a></li>
                    <li ><a href="/register" class="nva-options"><button class="btn btn-info nav-l-r btn-block"> Join <i class="fa fa-hand-o-left"> </i></button></a></li>
                @else
                    <li class="dropdown user-action">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            <i class="fa fa-plus"></i>
                        </a>
                        <div class="list-group dropdown-menu">

                            <a href="{{route('topic.create')}}" class="list-group-item">
                                <i class="text-md fa fa-book"></i>
                                发表文章
                            </a>
                            <a href="{{route('activities.create')}}" class="list-group-item">
                                <i class="text-md fa fa-compass"></i>
                                创建活动
                            </a>
                        </div>
                    </li>
                    <li>
                    <!--{{$count_letters= Auth::user()->letters()->where("is_read",'0')->count()}}-->
                    <!--{{$count_notices = Auth::user()->notices()->where("is_read",'0')->count()}}-->
                        @if($count_letters)
                        <a href="{{route('users.letter')}}"><i class="fa fa-bell"></i>
                            <span class="" style="padding:3px 6px;font-size:8px;border-radius:100%;background-color: #c95865;margin-left: -5px">{{$count_notices+$count_letters}}</span>
                        </a>
                            @elseif($count_notices)
                            <a href="{{route('users.notice')}}"><i class="fa fa-bell"></i>
                                <span class="" style="padding:3px 6px;font-size:8px;border-radius:100%;background-color: #c95865;margin-left: -5px">{{$count_notices}}</span>
                            </a>
                            @else
                            <a href="{{route('users.letter')}}" id="bell-a"><i class="fa fa-bell"></i>
                            </a>
                        @endif
                    </li>
                    <li><img src="{{ empty($avatar = Auth::user()->avatar) ? '/img/a5.jpg':$avatar}}" alt="" class="avatar img-circle"></li>

                    <li class="dropdown user-action">
                        <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
                            {{ \Auth::user()->name }} <span class="caret"></span>
                        </a>
                        <div class="list-group dropdown-menu">
                            <a href="{{route('users.show',Auth::id())}}" class="list-group-item">
                                <i class="text-md fa fa-user"></i>
                                个人页面
                            </a>

                            <a href="{{route('users.edit')}}" class="list-group-item">
                                <i class="text-md fa fa-edit"></i>
                                编辑资料
                            </a>

                            @if(Auth::user()->is_admin == 'yes')
                                <a href="{{asset('/admin/user')}}" class="list-group-item">
                                    <i class="text-md fa fa-cogs"></i>
                                    管理中心
                                </a>
                            @endif
                            <a href="{{ url('/logout') }}" class="list-group-item">
                                <i class="text-md fa fa-sign-out"></i>
                                Logout
                            </a>
                        </div>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
