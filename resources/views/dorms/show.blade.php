@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="col-sm-3">
            <div class="thumbnail dorm-logo" >
                <div class="logo">
                    <img src="/uploads/avatar/default.jpg" alt="" class="img-responsive img-thumbnail">
                </div>
                <div class="caption" >
                    <p class="name">Jquery</p>
                </div>
            </div>

            <div class="thumbnail dorm-rule">
                <h5>通知：</h5>
                <div class="content">
                    hhhh
                </div>
            </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-default" >
                <div class="panel-heading ">
                    <h3 class="panel-title">面板标题</h3>
                </div>
                <div class="panel-body chat-panel">
                    <div class="bubble">
                        <div class="bubble-item clearfix fr">
                            <a href="#"><img src="/uploads/avatar/default.jpg" alt=""></a>
                            <span class="triangle"></span>
                            <div class="article">哈哈哈哈哈哈哈哈</div>
                        </div>

                        <div class="bubble-item clearfix fr">
                            <a href="#"><img src="/uploads/avatar/default.jpg" alt=""></a>
                            <span class="triangle"></span>
                            <div class="article">哈哈哈哈哈哈哈哈</div>
                        </div>
                    </div>
                </div>
                <a class="c-t" id="tb" >
                    <span class="lab fa fa-arrow-down" onclick="javascript:void(0)" ></span>
                </a>
                <div class="panel-footer">
                    <div class="clearfix">
                        <div class="col-xs-10">
                            <input type="text" class="form-control" placeholder="在这输入聊天信息吧" id="common">
                        </div>
                        <div class="col-xs-2">

                            <button class="btn btn-success" id="send">发送消息</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row chat-members">
                <div class="member">
                    <img src="/uploads/avatar/default.jpg" alt="" class="img-thumbnail img-circle">
                    <span class="label label-info">舍长</span>
                    <span class="label label-success">onLine</span>
                </div>

                <div class="member">
                    <a href="#" title="..."><img src="/uploads/avatar/default.jpg"  alt="...." class="img-thumbnail img-circle"></a>
                    <span class="label label-warning">成员</span>
                </div>

            </div>
        </div>
        <div class="col-sm-1">
            <div class="dorm-options row">
                <a class="btn btn-warning btn-block">清除记录</a>
                <a class="btn btn-success btn-block" href="/dorm/1/edit">约吧</a>
                <a class="btn btn-info btn-block" href="/dorm/1/edit">宿舍DIY</a>
            </div>
        </div>
    </div>
@endsection

{{--@section('script')
    <script src="https://cdn.bootcss.com/socket.io/1.5.0/socket.io.min.js"></script>
    <script>
        var __USER__ = "{{Auth::id()}}";
        var socket = io('http://127.0.0.1:3000');

        socket.on('test-channel:a', function (data) {
            if(data != null){
                if (__USER__ == data.user.id){
                    $('.bubble').append(chat_str(data.msg , true));
                }else{
                    $('.bubble').append(chat_str(data.msg , false));
                }
            }
            //toBottom();
            show_tb();

           console.log($(".chat-panel"));
        });

        $("#send").bind('click', function () {

            var Ipt = $('#common');
            var msg = Ipt.val().trim();
            if(msg.length == 0){
                alert('要发布的内容不能为空');
                return false;
            }
            Ipt.val('').focus();
            $.post('/api/chat',{_token:"{{csrf_token()}}",msg:msg, 'dorm':"{{$dorm->id}}"});
            var btn = $(this).button('loading');
            setTimeout(function () {
                btn.button('reset');
            }, 2300);
        });

        function chat_str(data, is_rigth = false) {
            var str = '<div class="bubble-item clearfix ';

            if(is_rigth){
                str += 'fr';
            }
            return  str + '"><img src="/img/a6.jpg" alt="">'+
                    '<span class="triangle right"></span>'+
                    '<div class="article">'+data+'</div></div>';
        }

        function toBottom() {
            $(".chat-panel")[0].scrollTop = $(".chat-panel")[0].scrollTopMax;
           // document.getElementById('msg_end').scrollIntoView(false);
        }


        function show_tb() {
            if($(".chat-panel")[0].scrollTop < ($(".chat-panel")[0].scrollTopMax - 120)){
                $('#tb').show().children('.lab').html("1");
            }else{
                toBottom();
            }
            /*var currentHight = $(".chat-panel")[0].scrollHeight;
             alert(currentHight);
             alert($(".chat-panel")[0].scrollTop);*/
        }

        $('#tb').bind('click',  function () {
            toBottom();
            $(this).hide().children('.lab').html("0");
        });
        //toBottom();  //到聊天面板打底部
    </script>
    @stop--}}

