@extends('layouts.default')
@section('styles')
    <link rel="stylesheet" href="/assets/css/bootstrapValidator.css"/>
@stop
@section('content')
    <div class="container">
        <div class="col-sm-3">
            @include('user.partials.edit_nav')
        </div>
        <div class="col-sm-9">
            <div class="whitebk padding-md">
                <h2>
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    编辑个人资料
                </h2>
                <div class="divider"></div>
                <form class="form-horizontal" action="{{route('users.update', $user->id)}}" method="post" id="edit_info">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">邮箱：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control "  disabled value="{{$user->email}}">
                        </div>
                        <div class="col-sm-4">
                            <div class="ps"><span style="color: red">* </span> 邮箱唯一，一旦注册不能修改</div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">昵称：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control"  value="{{$user->name}}"  name="name">
                            @if($errors->has('name'))
                                <small class="help-block" style="display: block;" data-bv-validator="stringLength" data-bv-for="city" data-bv-result="INVALID">{{ $errors->first('name') }}</small>
                                @endif
                        </div>
                        <div class="col-sm-4">
                            <div class="ps"><span style="color: red">* </span> 写一个帅气的昵称</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">性别：</label>
                        <div class="col-sm-6">
                            <label class="radio-inline">
                                <input name="sex" value="boy" type="radio" {{$user->sex == 'boy'? 'checked':''}}>
                                男
                            </label>
                            <label class="radio-inline">
                                <input name="sex" value="girl" type="radio" {{$user->sex == 'girl'? 'checked':''}}>
                                女
                            </label>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('city') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">所在城市：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="city" value="{{$user->city}}">
                            @if($errors->has('city'))
                                <small class="help-block" style="display: block;" data-bv-validator="stringLength" data-bv-for="city" data-bv-result="INVALID">{{ $errors->first('city') }}</small>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <div class="ps"><span >* </span> 所在城市，让同城的伙伴找到你吧！</div>
                        </div>
                    </div>
                    <div class="form-group{{ $errors->has('school') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">所在学校：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control" name="school" value="{{$user->school}}">
                            @if($errors->has('school'))
                                <small class="help-block" style="display: block;" data-bv-validator="stringLength" data-bv-for="city" data-bv-result="INVALID">{{ $errors->first('school') }}</small>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <div class="ps"><span >* </span> 所在学校，让身边的伙伴找到你吧！</div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('intro') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">自我介绍：</label>
                        <div class="col-sm-6">
                            <textarea  class="form-control" name="intro"  placeholder="一句话介绍一下自己.">{{$user->intro}}</textarea>
                            @if($errors->has('intro'))
                                <small class="help-block" style="display: block;" data-bv-validator="stringLength" data-bv-for="city" data-bv-result="INVALID">{{ $errors->first('intro') }}</small>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <div class="ps"><span>* </span> 写一句个性签名，介绍下自己吧</div>
                        </div>
                    </div>

                    <hr>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">微博用户名：</label>
                        <div class="col-sm-8">
                            <input  class="form-control" name="weibo_name"  placeholder="微博用户名."  value=""/>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="col-sm-2 control-label">微博个人网址：</label>
                        <div class="col-sm-8">
                            <input  class="form-control" name="weibo_link"  placeholder="微博个人网址."  value=""/>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-3 col-sm-3">
                            <input class="btn btn-primary btn-block" type="submit" value="提交">
                        </div>
                        <div class="col-sm-3">
                            <input class="btn btn-primary btn-block" type="reset" value="取消" id="reset">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script type="text/javascript" src="/assets/js/bootstrapValidator.js"></script>
    <script type="text/javascript" src="/assets/js/mditor_config.js"></script>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#edit_info').bootstrapValidator({
                message: 'This value is not valid',
                /* container: 'tooltip',*/
                feedbackIcons: {
                    valid: 'fa fa-check',
                    invalid: 'fa fa-times',
                    validating: 'fa fa-refresh'
                },
                fields: {
                    name: {
                        message: 'The type is not valid',
                        validators: {
                            notEmpty: {
                                message: '写一个霸气的昵称吧，帅气的你怎么能没昵称呢？'
                            },
                        }
                    },
                    city: {
                        message: 'The type is not valid',
                        validators: {
                            stringLength: {
                                max:10,
                                message: '你确定有那么长名称的城市吗？（我读书少别骗我）'
                            },
                        }
                    },
                    school: {
                        message: 'The type is not valid',
                        validators: {
                            stringLength: {
                                max:10,
                                message: '少来，那么长名称的学校哪里有。'
                            },
                        }
                    },
                    intro:{
                        validators: {
                            stringLength: {
                                max:50,
                                message: '兄弟，你的自我介绍有点长了哦'
                            },
                        }
                    }
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

        //oMenuIcon.val([1,2]).trigger("change");
    </script>
@stop