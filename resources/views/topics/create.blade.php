@extends('layouts.default')
@section('styles')
    <link rel="stylesheet" href="/assets/css/bootstrapValidator.css"/>
    <link rel="stylesheet" href="/assets/css/mditor.css"/>
    @stop
@section('content')

    {{dump($errors)}}
    <div class="container">
        <div class="alert whitebk setborder" style="margin:0 15px 15px">我们希望 Laravel China 能够成为拥有浓厚技术氛围的开发者社区，而实现这个目标，需要我们所有人的共同努力：友善，公平，尊重知识和事实。请严格遵守 - </div>

        <div class="col-sm-9">
            <div class="whitebk setborder">
                <div class="set-title">创建话题</div>
                <div class="prompt-text">友情提示：可以直接把个人收藏在图谱中的内容提交给知识库哦</div>
                <div class="container-fluid">
                    <form id="create_form" action="{{route('topic.store')}}" method="post" class="create-form" enctype="multipart/form-data" >
                        {{csrf_field()}}
                        <div class="form-group">
                            <label for="">分类：</label>
                            <select class="selectpicker form-control" required="require" name="type">
                                <option value="" disabled="" selected="">请选择分类</option>
                                <option value="original">原创</option>
                              {{--  <option value="question">提问</option>--}}
                                <option value="reprint">转载</option>
                                <option value="video">视频</option>
                            </select>
                        </div>

                        <div class="form-group" id="source" >
                            <div class="group">
                                <label class="col-xs-3 col-sm-2 control-label text-left">来源信息：</label>
                                <div class="col-xs-9 col-sm-3">
                                    <input type="text" class="form-control" value="" placeholder="信息来源" name="source">
                                </div>
                            </div>
                           <div class="group">
                               <div class="col-sm-5 col-xs-12">
                                   <input type="text" class="form-control" value="" placeholder="URL链接" name="sourceUrl" data-bv-group=".group">
                               </div>
                               <div class="clearfix"></div>
                           </div>
                        </div>

                        <div class="form-group" id="image">
                            <label for="" class="col-xs-2">封面：</label>
                            <div class="col-xs-10">
                                <input type="file" name="figure">
                            </div>
                            <div class="clearfix"></div>
                        </div>

                        <div class="form-group">
                            <label for="">标题：</label>
                            <input type="text" class="form-control" placeholder="请填写标题" name="title" value="" >
                        </div>

                        <div class="form-group" id="summary">
                            <label for="">概述：</label>
                            <input type="text" class="form-control" placeholder="简单的说明一下你写的内容吧" name="summary" value="" >
                        </div>

                        <div class="form-group">
                            <label for="">主题：</label>
                            <select class="selectpicker form-control" name="theme" value="">
                                <option value="" disabled="" selected="">请选择分类</option>
                                <option value="1">招聘</option>
                                <option value="4">问答</option>
                                <option value="5">分享</option>
                                <option value="6">教程</option>
                            </select>
                        </div>

                        <div class="form-group" id="mditor-text">
                            <label for="">内容：</label>
                            <textarea id="editor" name="content" class="form-control" cols="30" rows="10"  placeholder="请使用 Markdown 格式书写 ;-)，代码片段黏贴时请注意使用高亮语法"></textarea>
                        </div>
                        <div class="form-group">
                            <button class="btn btn-primary" type="submit">创建话题</button>
                        </div>
                    </form>
                </div>

            </div>
        </div>

        <div class="col-md-3 hidden-sm">

            <div class="whitebk setborder">
                <div class="kn_sub_right">
                    <p>
                        我已向知识库提交
                        <a class="blue usCnt" href="http://lib.csdn.net/subHistory" target="_blank">0条内容</a>
                    </p>
                    <p>
                        我在提交知识的排名
                        <a class="yellow cur-default">潜力巨大</a>
                    </p>

                </div>
            </div>
            <div class="whitebk setborder other">
                <div class="relative-themes">
                    <div class="title">
                        <span style="cursor: default;font-weight: 700;">话题光荣榜</span>
                        <!--<a href="#" class="more">
                            更多
                            <i class="fa fa-angle-right"></i>
                        </a>-->
                    </div>
                    <div class="more-list">
                        <ul class="list-unstyled">
                            <li class="clearfix">
                                <div class="l">
                                    <a href="http://lib.csdn.net/base/agile" target="_blank">
                                        <img src="/uploads/avatar/default.jpg" alt="..." data-bd-imgshare-binded="1" class="img-circle">
                                    </a>
                                </div>
                                <div class="r">
                                    <a class="htitle" href="http://lib.csdn.net/base/agile" target="_blank">敏捷</a>
                                    <p>
                                        <em>2545 </em>
                                        关注者
                                        <em>144 </em>
                                        条收录
                                    </p>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="l">
                                    <a href="http://lib.csdn.net/base/agile" target="_blank">
                                        <img src="/uploads/avatar/default.jpg" alt="..." data-bd-imgshare-binded="1" class="img-circle">
                                    </a>
                                </div>
                                <div class="r">
                                    <a class="htitle" href="http://lib.csdn.net/base/agile" target="_blank">敏捷</a>
                                    <p>
                                        <em>2545 </em>
                                        关注者
                                        <em>144 </em>
                                        条收录
                                    </p>
                                </div>
                            </li>

                            <li class="clearfix">
                                <div class="l">
                                    <a href="http://lib.csdn.net/base/agile" target="_blank">
                                        <img src="/uploads/avatar/default.jpg" alt="..." data-bd-imgshare-binded="1" class="img-circle">
                                    </a>
                                </div>
                                <div class="r">
                                    <a class="htitle" href="http://lib.csdn.net/base/agile" target="_blank">敏捷</a>
                                    <p>
                                        <em>2545 </em>
                                        关注者
                                        <em>144 </em>
                                        条收录
                                    </p>
                                </div>
                            </li>

                        </ul>
                    </div>
                </div>
            </div>

        </div>
    </div>
    @stop

@section('script')
    <script type="text/javascript" src="/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="/assets/js/mditor.js"></script>
    <script type="text/javascript" src="/assets/js/mditor_config.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#create_form').bootstrapValidator({
                message: 'This value is not valid',
               /* container: 'tooltip',*/
                feedbackIcons: {
                    valid: 'fa fa-check',
                    invalid: 'fa fa-times',
                    validating: 'fa fa-refresh'
                },
                fields: {
                    type: {
                        message: 'The type is not valid',
                        validators: {
                            notEmpty: {
                                message: '为了更好的分类，请选择一个话题类型吧'
                            },
                        }
                    }
                }
            })
            .on('success.form.bv', function(e) {
               console.log("ok");
                // Get the form instance
                var $form = $(e.target);
                // Get the BootstrapValidator instance
                var bv = $form.data('bootstrapValidator');

                // Use Ajax to submit form data
            }).on('status.field.bv', function(e, data) {
                // I don't want to add has-success class to valid field container
                data.element.parents('.form-group').removeClass('has-success');
                // I want to enable the submit button all the time
                data.bv.disableSubmitButtons(false);
            }).on('error.field.bv', function(e, data) {
                data.bv.disableSubmitButtons(false);
            });
           // console.log(domm.data('bootstrapValidator').isValid());


            var select_type = $("select[name='type']");
            var source = $('#source');
            var mditor_t = $('#mditor-text');
            var img = $("#image");
            var summary = $("#summary");

            select_type.bind("change", function () {
                var type_v = select_type.val();
                switch (type_v){
                   /* case 'question':
                        source.hide(500);
                        img.hide(500);
                        summary.hide(500);
                        mditor_t.show(1000);
                        set_validator(M_C_2);
                        break*/
                    case 'reprint':
                         source.show(500);
                         mditor_t.show(1000);
                        img.show(500);
                        summary.show(500);
                        set_validator(M_C_3);
                        break;
                    case 'video':
                        source.show(500);
                         mditor_t.hide(1000);
                        img.show(500);
                        summary.show(500);
                        set_validator(M_C_4);
                        break;
                    default:
                        source.hide(500);
                         mditor_t.show(1000);
                        img.show(500);
                        summary.show(500);
                        set_validator(M_C_1);
                        break;
                }
            });
            select_type.trigger("change");


            function set_validator(config) {
                if ($('#create_form').data('bootstrapValidator') != undefined){
                    $("#create_form").data('bootstrapValidator').destroy();
                    $('#create_form').data('bootstrapValidator', null);
                }
                $('#create_form').bootstrapValidator({
                    message: 'This value is not valid',
                   /* container: 'tooltip',*/
                    feedbackIcons: {
                        valid: 'fa fa-check',
                        invalid: 'fa fa-times',
                        validating: 'fa fa-refresh'
                    },
                    fields: config
                }).on('success.form.bv', function(e) {
                            //console.log(domm.data('bootstrapValidator').validate());
                            // Get the form instance
                            var $form = $(e.target);
                            // Get the BootstrapValidator instance
                            var bv = $form.data('bootstrapValidator');
                            // Use Ajax to submit form data
                        }).on('status.field.bv', function(e, data) {
                    // I don't want to add has-success class to valid field container
                    data.element.parents('.form-group').removeClass('has-success');
                    // I want to enable the submit button all the time
                    data.bv.disableSubmitButtons(false);
                }).on('error.field.bv', function(e, data) {
                    data.bv.disableSubmitButtons(false);
                });
            }
        });

        var mditor = new Mditor("#editor",{
            height:300,
            fixedHeight:true
        });

        //oMenuIcon.val([1,2]).trigger("change");
    </script>
    @stop