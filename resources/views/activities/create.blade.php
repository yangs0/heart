@extends('layouts.default')
@section('styles')
    <link rel="stylesheet" href="/assets/css/bootstrapValidator.css"/>
    <link rel="stylesheet" href="/assets/css/mditor.css"/>
@stop
@section('content')
    <div class="container">
        <div class="col-sm-offset-2 col-sm-8">
            <div class="whitebk setborder">
                <div class="f_header fs_header">
                    <div class="f_text_no_logo">
                        <h2 class="f_title fs_title">约吧，小活动</h2>
                        <p class="f_describe fs_describe">随时随地，随心所欲，创建自己的小活动，召唤小伙伴一起来玩吧。</p>
                    </div>
                </div>
                <form action="{{route('activities.store')}}" method="POST" class="f_body fs_body" id="activities" enctype="multipart/form-data">
                    {{csrf_field()}}
                    <div class="f_component">
                        <p class="f_cTitle fs_cTitle"></p>
                        <p class="f_sectionDescribe fs_sectionDescribe" style="text-align:left"></p>
                    </div>
                    <div class="f_component form-group">
                        <p class="f_cTitle">
                            活动 · 小标题
                            <span class="f_cValidate red">*</span>
                        </p>
                        <p class="f_cDescribe fs_cDescribe">精彩的活动，需要有一个精彩的标题哦</p>
                        <input class="form-control" value="" name="title" type="text" placeholder="小活动，大标题">
                    </div>

                    <div class="f_component form-group" >
                        <p class="f_cTitle fs_cTitle">活动 · 封面</p>
                        <p class="f_cDescribe fs_cDescribe">可以选择一张代表性的封面哦。 </p>
                        <input type="file" name="cover">
                    </div>

                    <div class="f_component form-group">
                        <p class="f_cTitle fs_cTitle">活动 · 介绍</p>
                        <p class="f_cDescribe fs_cDescribe">给活动一个简明的介绍吧。</p>
                        <input class="form-control" value="" type="text" name="intro">
                    </div>
                    <div class="f_component form-group" >
                        <p class="f_cTitle fs_cTitle">活动 · 地址</p>
                        <p class="f_cDescribe fs_cDescribe">线上线下，随时随地。 </p>
                        <input class="form-control" value="" name="place" type="text" placeholder="如：××××××学校门口">
                    </div>
                    <div class="f_component form-group" >
                        <p class="f_cTitle fs_cTitle">活动 · 日期</p>
                        <p class="f_cDescribe fs_cDescribe">给活动一个日期，聚集你的小伙伴吧。</p>
                        <input class="form-control" value="" name="date" type="text" placeholder="如：2017年1月1日 | 2017.01.01-2017.01.02 ">
                    </div>

                    <div class="f_component form-group">
                        <p class="f_cTitle fs_cTitle">
                            活动 · 内容
                            <span class="f_cValidate red">*</span>
                        </p>
                        <p class="f_cDescribe fs_cDescribe">召集小伙伴们，组织一场精彩的活动吧</p>
                        <textarea id="editor" name="content" class="form-control" placeholder="精彩打活动内容"></textarea>
                    </div>
                    <div class="f_component">
                        <button class="btn btn-primary col-xs-offset-4 col-xs-3"type="submit">提交</button>
                        <div class="clearfix"></div>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script type="text/javascript" src="/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="/assets/js/mditor.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#activities').bootstrapValidator({
                message: 'This value is not valid',
                /* container: 'tooltip',*/
                feedbackIcons: {
                    valid: 'fa fa-check',
                    invalid: 'fa fa-times',
                    validating: 'fa fa-refresh'
                },
                fields: {
                    title: {
                        message: 'The type is not valid',
                        validators: {
                            notEmpty: {
                                message: '精彩的活动，需要有一个精彩的标题哦'
                            },
                            stringLength: {
                                min: 5,
                                max:30,
                                message: '太短的标题(<5)不够精彩,太长的标题(>30)看了乏味'
                            },
                        }
                    },
                    cover: {
                        message: 'The image is not valid',
                        validators: {
                            file: {
                                extension: 'png,gif,jpg,jpeg',
                                type: 'image/png,image/gif,image/jpeg',
                                maxSize: 3*1024*1024,
                                message: '请上传正确的图片格式(png,gif,jpg,jpeg)，且图片不要大于3M.'
                            },
                            notEmpty: {
                                message: '请为活动设置一张封面吧'
                            }
                        }
                    },
                    content: {
                        message: 'The type is not valid',
                        validators: {
                            notEmpty: {
                                message: '亲，写点活动内容吧！'
                            },
                            stringLength: {
                                min: 15,
                                message: '这，活动内容有点简陋懒哦！！'
                            },
                        }
                    },

                }
            }).on('success.form.bv', function(e) {
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
        });

        var mditor = new Mditor("#editor",{
            height:300,
            fixedHeight:true
        });

        //oMenuIcon.val([1,2]).trigger("change");
    </script>
    @stop