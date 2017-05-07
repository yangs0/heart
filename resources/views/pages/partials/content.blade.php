@section('styles')
    @parent
    <style>
        #myTab a{
            color: #666;
            font-size: 16px;
            border-bottom: 2px solid #FFF;
        }
         #myTab .active a{
            color: #E74B3B;
            background-color: #fff;
            border-bottom: 2px solid #E74B3B;
        }
        #hotComment li a.media-heading,#hotComment li a.user{
            color: #666;
        }
        #hotComment li a.media-heading:hover{
            color: #00B5AD;
        }
        #hotComment li a.user:hover{
            color: #ff5638;
        }
        .test{
            line-height: inherit;
            margin-top: inherit;
            display: inline-block;
            float: left;
            text-align: center;
        }
    </style>
    @stop


<div class="container mt-20">

    <div class="post-lists col-sm-8 row">

        <h4 class="left-title"> User</h4>
        <div class="clearfix"></div>
        <div class="col-sm-6 col-md-4">
            <a class="thumbnail" href="#">
                <img src="/uploads/images/83Q58PICba.jpg" alt="..." style="height: auto; max-height: 130px">
                <div class="caption">
                    <p>【独家】拉勾的野心不止招聘，还要做一整套HR SaaS</p>
                </div>
            </a>
        </div>

        <div class="col-sm-6 col-md-4">
            <a class="thumbnail">
                <img src="/uploads/images/83Q58PICba.jpg" alt="..." style="height: auto;max-height: 130px">
                <div class="caption">
                    <p>【独家】拉勾的野心不止招聘，还要做一整套HR SaaS</p>
                </div>
            </a>
        </div>
        <div class="col-sm-6 col-md-4">
            <a class="thumbnail">
                <img src="/uploads/images/83Q58PICba.jpg" alt="..." style="height: auto;max-height: 130px">
                <div class="caption">
                    <p>【独家】拉勾的野心不止招聘，还要做一整套HR SaaS</p>
                </div>
            </a>
        </div>
    </div>


    <div class="chat-list col-sm-4" >
        <h4 class="left-title"> User</h4>
        <ul id="myTab" class="nav whitebk text-center">
            <li class="active col-sm-6">
                <a href="#home" data-toggle="tab">
                    动态                 </a>
            </li>
            <li class="col-sm-6">
                <a href="#ios" data-toggle="tab">热议</a>
            </li>
        </ul>
        <div id="myTabContent" class="tab-content whitebk" style="margin-top: 0">
            <div class="tab-pane fade in active" id="home">
                <ul class="list-unstyled ">
                    <li class="media" style="padding:20px 0 10px;margin:0 15px;border-bottom: 1px dashed #ccc">
                        <a class="pull-left" href="#">
                            <img class="media-object img-thumbnail img-circle" src="/uploads/images/83Q58PICba.jpg" alt="..." >
                        </a>
                        <div class="media-body">
                            <h5 class="media-heading">媒体标题 <small style="color: #aaa">在 <a href="">主题</a> 创建了新话题</small></h5>

                            <div style="color: #565656">sssssddd</div>
                            <span class="pull-right" style="color: #565656; font-size: 12px">3 ago</span>

                        </div>
                    </li>
                </ul>
            </div>
            <div class="tab-pane fade" id="ios">
                <ul class="list-unstyled " id="hotComment">
                    <li class="media" style="padding:20px 0 10px;margin:0 25px;border-bottom: 1px dashed #ccc">
                        <div class="media-body">
                            <h5><a class="media-heading" href="#" >《风从海上来》温岭城市宣传片</a></h5>
                           <div>
                               <span class="pull-right" style="color: #565656; font-size: 12px"><i class="fa fa-comment-o"></i> 3</span>
                               <span  style="color: #898989; font-size: 12px"><i class="fa fa-user-o"></i> <a href="" class="user">lalal</a></span>
                           </div>
                        </div>
                    </li>
                </ul>
            </div>

        </div>



    </div>
</div>

<div class="container mt-20">
    <h4 class="left-title"> User</h4>
    <div class="col-sm-4 projects-card">
        <div class="thumbnail">
            <a class="no-pjax" href="#" >
                <img src="#">
            </a>
            <div class="caption album-text">
                <h3>
                    <a href="#" title="#">#</a>
                    <span class="mark mark-activity-1">未开始</span>
                    {{--<!--{{$now = \Carbon\Carbon::now()}}-->
                        @if($activity->start->gt($now))
                            <span class="mark mark-activity-1">未开始</span>
                        @elseif($activity->start->lt($now) && $activity->end->gt($now) )
                            <span class="mark mark-activity-0">进行中</span>
                        @else
                            <span class="mark mark-activity-3">已结束</span>
                        @endif--}}
                </h3>
                <div class="activity-time odt" title="活动时间：2017年1月13日">
                    <i class="fa fa-clock-o"></i>
                    活动时间：#######
                </div>
                <div class="activity-address odt" title="雍和宫糖果星光现场">
                    <i class="fa fa-map-marker"></i>
                    #####
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container mt-20">
    <h4 class="left-title"> User</h4>
    <div class="col-sm-4 ">
        <div class="media whitebk" style="padding: 20px" >
            <a class="pull-left" href="#">
                <img class="media-object img-circle img-thumbnail" src="/uploads/avatars/default.jpg"
                     alt="媒体对象">
            </a>
            <div class="media-body" >
                <span class="media-heading" style="font-weight: 700">媒体标题</span>
                <p style="margin-bottom: 0"> <small class="city">北京市</small></p>
                <small class="intro grey">student, student, more student.</small>
            </div>
        </div>
    </div>
    <div class="col-sm-4 ">
        <div class="media whitebk" style="padding: 20px" >
            <a class="pull-left" href="#">
                <img class="media-object img-circle img-thumbnail" src="/uploads/avatars/default.jpg"
                     alt="媒体对象">
            </a>
            <div class="media-body" >
                <span class="media-heading" style="font-weight: 700">媒体标题</span>
                <p style="margin-bottom: 0"> <small class="city">北京市</small></p>
                <small class="intro grey">student, student, more student.</small>
            </div>
        </div>
    </div>
    <div class="col-sm-4 ">
        <div class="media whitebk" style="padding: 20px" >
            <a class="pull-left" href="#">
                <img class="media-object img-circle img-thumbnail" src="/uploads/avatars/default.jpg"
                     alt="媒体对象">
            </a>
            <div class="media-body" >
                <span class="media-heading" style="font-weight: 700">媒体标题</span>
                <p class="city" style="margin-bottom: 0"> <small >北京市</small></p>
                <small class="intro grey">student, student, more student.</small>
            </div>
        </div>
    </div>
</div>