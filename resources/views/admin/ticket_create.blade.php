@extends('admin.default')

@section('content')
    <div class="row-content am-cf">


        <div class="row">

            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title am-fl">新增优惠券</div>
                        <div class="widget-function am-fr">
                            <a href="/admin" class="am-icon-angle-left"></a>
                        </div>
                    </div>
                    <div class="widget-body am-fr">
                        @if($errors->count())
                            <div class="am-alert am-alert-danger" id="my-alert" >
                                <p>{{$errors->first()}}</p>
                            </div>
                        @endif
                        <form class="am-form tpl-form-line-form" method="post" action="{{route('ticket.store')}}" enctype="multipart/form-data">
                            <div class="am-form-group">
                                <label for="user-name" class="am-u-sm-3 am-form-label">标题 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" class="tpl-form-input" id="user-name" name="title" placeholder="请输入标题文字" value="{{old('title')}}">
                                    <small>请填写标题文字3-20字左右。</small>
                                </div>
                            </div>
                            <div class="am-alert am-alert-danger" id="my-alert" style="display: none">
                                <p>开始日期应小于结束日期！</p>
                            </div>
                            <div class="am-form-group">

                                <label for="user-email" class="am-u-sm-3 am-form-label">起止时间 </label>

                                <div class="am-u-sm-3">
                                    <button type="button" class="am-u-sm-6 am-btn am-btn-default am-margin-right" id="my-start" >开始日期</button>
                                    <input id="my-startDate" readonly type="text" value="{{old('start')}}" name="start" >
                                </div>
                                <div class="am-u-sm-4">
                                    <button type="button" class="am-btn am-btn-default am-margin-right" id="my-end" >结束日期</button>
                                    <input id="my-endDate" readonly type="text" value="{{old('end')}}" name="end">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">优惠券价值</label>
                                <div class="am-u-sm-9">
                                    <input type="number" placeholder="输入优惠券价值" name="value" maxlength="8" value="{{old('value')}}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label class="am-u-sm-3 am-form-label">关键字</label>
                                <div class="am-u-sm-9">
                                    <input type="text" placeholder="输入关键字" name="key" value="{{old('key')}}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">描述 </label>
                                <div class="am-u-sm-9">
                                    <input type="text" id="user-weibo" name="describe" placeholder="关于该优惠券的描述" value="{{old('describe')}}">
                                </div>
                            </div>

                            <div class="am-form-group">
                                <label for="user-weibo" class="am-u-sm-3 am-form-label">封面图 <span class="tpl-form-line-small-title">Images</span></label>
                                <div class="am-u-sm-9">
                                    <div class="am-form-group am-form-file">
                                        <div class="tpl-form-file-img">
                                            <img src="" alt="" id="preview" style="max-width: 100%;max-height: 230px;margin-bottom: 20px">
                                        </div>
                                        <button type="button" class="am-btn am-btn-danger am-btn-sm">
                                            <i class="am-icon-cloud-upload"></i> 添加封面图片</button>
                                        <input id="doc-form-file" type="file" name="figure" onchange="change()" value="">
                                    </div>

                                </div>
                            </div>

                            <div class="am-form-group">
                                <div class="am-u-sm-9 am-u-sm-push-3">
                                    <button type="submit" class="am-btn am-btn-primary tpl-btn-bg-color-success ">提交</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@stop
@section('script')
    <script>
        $(function() {
            var startDate = new Date();
            var endDate = new Date(2020,1,1);
            var $alert = $('#my-alert');
            var flag = false;
            $('#my-start').datepicker().
            on('changeDate.datepicker.amui', function(event) {

                if (flag && (event.date.valueOf() > endDate.valueOf())) {
                    $alert.find('p').text('开始日期应小于结束日期！').end().show();
                } else {
                    flag = true;
                    $alert.hide();
                    startDate = new Date(event.date);
                    $('#my-startDate').val($('#my-start').data('date'));
                }
                $(this).datepicker('close');
            });

            $('#my-end').datepicker().
            on('changeDate.datepicker.amui', function(event) {
                if (flag && (event.date.valueOf() < startDate.valueOf())) {
                    $alert.find('p').text('结束日期应大于开始日期！').end().show();
                } else {
                    flag = true;
                    $alert.hide();
                    endDate = new Date(event.date);
                    $('#my-endDate').val($('#my-end').data('date'));
                }
                $(this).datepicker('close');
            });
        });

        function change() {
            var pic = document.getElementById("preview"),
                    file = document.getElementById("doc-form-file");

            var ext=file.value.substring(file.value.lastIndexOf(".")+1).toLowerCase();

            // gif在IE浏览器暂时无法显示
            if(ext!='png'&&ext!='jpg'&&ext!='jpeg'){
                alert("图片的格式必须为png或者jpg或者jpeg格式！");
                return;
            }
            var isIE = navigator.userAgent.match(/MSIE/)!= null,
                    isIE6 = navigator.userAgent.match(/MSIE 6.0/)!= null;

            if(isIE) {
                file.select();
                var reallocalpath = document.selection.createRange().text;

                // IE6浏览器设置img的src为本地路径可以直接显示图片
                if (isIE6) {
                    pic.src = reallocalpath;
                }else {
                    // 非IE6版本的IE由于安全问题直接设置img的src无法显示本地图片，但是可以通过滤镜来实现
                    pic.style.filter = "progid:DXImageTransform.Microsoft.AlphaImageLoader(sizingMethod='image',src=\"" + reallocalpath + "\")";
                    // 设置img的src为base64编码的透明图片 取消显示浏览器默认图片
                    pic.src = 'data:image/gif;base64,R0lGODlhAQABAIAAAP///wAAACH5BAEAAAAALAAAAAABAAEAAAICRAEAOw==';
                }
            }else {
                html5Reader(file);
            }
        }

        function html5Reader(file){
            var file = file.files[0];
            var reader = new FileReader();
            reader.readAsDataURL(file);
            reader.onload = function(e){
                var pic = document.getElementById("preview");
                pic.src=this.result;
            }
        }
    </script>
    @stop