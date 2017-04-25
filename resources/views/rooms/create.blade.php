@extends('layouts.default')
@section('styles')
    <link href="/css/forum.css" rel="stylesheet">
@stop
@section('content')
    <div class="container">
        <div class="alert whitebk setborder" style="margin:0 15px 15px">我们希望 Laravel China 能够成为拥有浓厚技术氛围的开发者社区，而实现这个目标，需要我们所有人的共同努力：友善，公平，尊重知识和事实。请严格遵守 - </div>

        <div class="col-sm-8">
            <div class="whitebk setborder">
                <div class="set-title">创建宿舍</div>
                <div class="prompt-text">友情提示：可以直接把个人收藏在图谱中的内容提交给知识库哦</div>
                <div class="container-fluid">
                    <form class="form-horizontal create-form" method="post">
                        <div class="form-group">
                            <label class="col-sm-2 control-label">宿舍名：</label>
                            <div class="col-sm-4">
                                <input type="text" class="form-control" placeholder="123456" name="name">
                            </div>
                            <div class="col-sm-6">
                                <p class="ps"><span style="color: red">* </span> 要求：不能重复;格式：第几届:第几栋#哪一座几零几;如：2010:20#C502;也可以是：2010:紫金阁#502</p>

                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">宿舍类型：</label>
                            <div class="col-sm-9">

                                <label class="radio-inline" title="只允许男生访问">
                                    <input name="sex" value="boy" type="radio" >
                                    男
                                </label>
                                <label class="radio-inline" title="只允许女生访问">
                                    <input name="sex" value="girl" type="radio">
                                    女
                                </label>
                                <label class="radio-inline" title="男生女生配">
                                    <input name="sex" value="no" type="radio" checked>
                                    不限
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">限制人数：</label>
                            <div class="col-sm-3">
                                <input type="number" min="1" max="12" class="form-control " name="count" value="1">
                            </div>
                            <p class="ps"><span style="color: red">* </span> 宿舍成员人数，不包括访客。</p>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">图像：</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="img" placeholder="一张代表宿舍的图片">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">介绍：</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="img" placeholder="一句话介绍下宿舍吧">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-sm-2 control-label">通知：</label>
                            <div class="col-sm-9">
                                <textarea  class="form-control" name="rule" rows="4" placeholder="初来乍到，请多多指教"></textarea>
                            </div>
                        </div>


                        <div class="form-group">
                            <div class="col-sm-offset-3 col-sm-3">
                                <input class="btn btn-primary btn-block" type="submit" value="提交">
                            </div>
                            <div class="col-sm-3">
                                <input class="btn btn-primary btn-block" type="reset" value="取消">
                            </div>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-md-4 hidden-sm">
            <div class="whitebk setborder">
                <div class="r-box">
                    <div class="do-title">
                        高素质的我们
                    </div>

                    <ul class="list list-unstyled">
                        <li>请传播美好的事物，这里拒绝低俗、诋毁、谩骂等相关信息</li>
                        <li>请尽量分享技术相关的话题，谢绝发布社会, 政治等相关新闻</li>
                        <li>这里绝对不讨论任何有关盗版软件、音乐、电影如何获得的问题</li>
                    </ul>
                </div>
            </div>
            <div class="whitebk setborder other">
                <div class="r-box">
                    <div class="do-title">
                        志同道合的我们
                    </div>

                    <ul class="list-unstyled list">
                        <li>分享生活见闻, 分享知识</li>
                        <li>接触新技术, 讨论技术解决方案</li>
                        <li>为自己的创业项目找合伙人, 遇见志同道合的人</li>
                        <li>自发线下聚会, 加强社交</li>
                        <li>发现更好工作机会</li>
                        <li>甚至是开始另一个神奇的开源项目</li>
                    </ul>
                </div>
            </div>

        </div>
    </div>

@endsection
