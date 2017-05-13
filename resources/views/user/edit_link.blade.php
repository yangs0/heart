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
                    第三方关联设置
                </h2>
                <div class="divider"></div>
                <div class="alert alert-warning"> 绑定多个第三方账号，允许你使用任意一个第三方账号登录同一个 Laravel China 账号。 </div>
                <form class="form-horizontal" method="POST" action="https://laravel-china.org/users/6180/update_email_notify" accept-charset="UTF-8">
                    <input name="_token" value="CxLyskSjmC1R47eUPMhExadV6tsczUC5vocbV7Dz" type="hidden">
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputEmail3">绑定Github账号</label>
                        <div class="col-sm-9">
                        @if(Auth::user()->socialAccount)
                            <span style="color:#1E9E8A;">已绑定</span>
                        @else


                                <a class="btn btn-info" role="button" href="/login/github">
                                    <i class="fa fa-github-alt"></i>
                                    GitHub
                                </a>
                                <span class="padding-sm">点击进行账号绑定</span>

                        @endif
                        </div>
                    </div>
                    <div class="form-group">
                        <label class="col-sm-3 control-label" for="inputEmail3">绑定Github账号</label>
                        <div class="col-sm-9">
                            <a class="btn btn-default login-btn" href="https://laravel-china.org/auth/oauth?driver=wechat">
                                <i class="fa fa-weixin"></i>
                                WeChat
                            </a>
                            <span class="padding-sm">点击进行账号绑定</span>
                        </div>
                    </div>
                    <br>
                    <br>
                </form>
            </div>
        </div>
    </div>

@endsection
