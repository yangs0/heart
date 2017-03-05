@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="col-sm-3">
            @include('user.partials.edit_nav')
        </div>

        <div class="col-sm-9">
            <div class="whitebk padding-md">
                <h2>
                    <i class="fa fa-cog" aria-hidden="true"></i>
                    修改密码
                </h2>
                <div class="divider"></div>
                <form class="form-horizontal" action="{{route('users.update', $user->id)}}" method="post">
                    {{method_field('PUT')}}
                    {{csrf_field()}}
                    <div class="form-group">
                        <label class="col-sm-2 control-label">邮箱：</label>
                        <div class="col-sm-6">
                            <input type="text" class="form-control"  disabled value="{{$user->email}}">
                        </div>
                        <div class="col-sm-4">
                            <div class="ps"><span style="color: red">* </span> 邮箱唯一，一旦注册不能修改</div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">新密码：</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password">
                            @if($errors->has('password'))
                                <small class="help-block" style="display: block;">{{ $errors->first('password') }}</small>
                            @endif
                        </div>
                        <div class="col-sm-4">
                            <div class="ps"><span style="color: red">* </span> 新密码</div>
                        </div>
                    </div>

                    <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                        <label class="col-sm-2 control-label">确认密码：</label>
                        <div class="col-sm-6">
                            <input type="password" class="form-control" name="password_confirm" value="">
                        </div>
                        <div class="col-sm-4">
                            <div class="ps"><span style="color: red">* </span> 确认密码,必须和新密码一致</div>
                        </div>
                    </div>

                    <div class="form-group">
                        <div class="col-sm-offset-2 col-sm-3">
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

@endsection
