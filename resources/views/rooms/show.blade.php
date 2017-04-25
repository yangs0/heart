@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="col-sm-3" style="padding-right: 0">
           <div class="panel panel-default">
               <div class="panel-heading" style="font-weight: bold;color: #999">Online</div>
               <div class="panel-body">
                   <ul class="list-inline avatar-list" >

                       <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                       <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                       <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                       <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                       <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                       <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                   </ul>
               </div>
           </div>
        </div>
        <div class="col-sm-8">
            <div class="panel panel-default" >
                {{--<div class="panel-heading ">
                    <h3 class="panel-title">面板标题</h3>
                </div>--}}
                <div class="panel-body chat-panel">
                    <div class="bubble">
                        @foreach($messages as $message)
                            <div class="bubble-item clearfix {{showFr(Auth::id(), $message->user->id)}}">
                                <a href="#"><img src="{{$message->user->avatar}}" alt="..."></a>
                                <span class="triangle"></span>
                                <div class="article">{{$message->message}}</div>
                            </div>
                        @endforeach
                    </div>

                </div>

                <div class="panel-footer">
                    <a class="c-t pull-right" id="tb" >
                        <span class="lab fa fa-arrow-down" onclick="javascript:void(0)" ></span>
                    </a>
                    <div class="clearfix">
                        <div class="col-xs-10" style="height: 65px;">
                            <textarea class="form-control" placeholder="在这输入聊天信息吧" id="common" style="height: 100%;resize:none;"></textarea>
                        </div>
                        <div class="col-xs-2 row" style="height: 60px;">
                            <a class="sbtn btn face pull-left" style="width: 20px;margin-left: -10px;margin-top: 14px"><i class="fa fa-drupal"></i></a>
                            <button class="btn btn-success pull-right" id="send"  style="width: 80px;margin-right: -20px;margin-top: 14px">发送消息</button>
                        </div>
                    </div>
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

@section('script')
    <script src="https://cdn.bootcss.com/socket.io/1.5.0/socket.io.min.js"></script>
    <script>
        var __USER__ = "{{Auth::id()}}";
        var socket = io('http://127.0.0.1:3000');

        socket.on('test-channel:a', function (data) {
            if(data != null){
                if (__USER__ == data.user.id){
                    $('.bubble').append(chat_str(data , true));
                }else{
                    $('.bubble').append(chat_str(data , false));
                }
            }
           //toBottom();
            show_tb();

           //console.log($(".chat-panel")[0].scrollHeight);
        });

        $("#send").bind('click', function () {

            var Ipt = $('#common');
            var msg = Ipt.val().trim();
            if(msg.length == 0){
                alert('要发布的内容不能为空');
                return false;
            }
            Ipt.val('').focus();
            $.post('{{route("chat.msg")}}',{msg:msg, 'dorm':"1"});
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
            return  str + '"><img src="'+data.user.avatar+'" alt="">'+
                    '<span class="triangle right"></span>'+
                    '<div class="article">'+data.msg+'</div></div>';
        }

        function toBottom() {
            $('#tb').hide();
            $('.chat-panel').scrollTop( $('.chat-panel')[0].scrollHeight );
            //$(".chat-panel")[0].scrollTop = $(".chat-panel")[0].scrollTopMax;
           // document.getElementById('msg_end').scrollIntoView(false);
        }


        function show_tb() {
            if($(".chat-panel")[0].scrollTop < ($(".chat-panel")[0].scrollHeight*6/7-120)){
                $('#tb').show();//.children('.lab').html("1")
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
    @stop

