@extends('layouts.default')
@section('styles')
    <link href="{{asset('/assets/css/jquery.sinaEmotion.css')}}" rel="stylesheet">
    <style type="text/css">
        *{margin:0;padding:0;}

        /*screen start*/
        .screen{width:100%;height:100%;position:absolute;left:0;top:0;display:none;}
        .screen .s_dm{}
        .screen .s_dm .s_close{width:100px;height:40px;display:block;border:0;text-align:center;line-height:40px;text-decoration:none;font-size:21px;color:#c0c0c0;font-family:"微软雅黑";position:absolute;top:20px;right:20px;z-index:3;}
        .screen .s_dm .s_close:hover{color:#fff;}
        .screen .s_dm .s_show{position:relative;z-index:2;}
        .screen .s_dm .s_show div{line-height:36px;font-size:24px;font-weight:bold;position:absolute;top:0;left:0;}
        .screen .send{width:100%;height:80px;background:#000;position:absolute;bottom:0;z-index:2;}
        .screen .send .s_con{width:100%;height:80px;text-align:center;line-height:80px;}
        .screen .send .s_con .s_txt{height:40px;border:0;font-size:18px;font-family:"微软雅黑";padding-left:12px;border-radius:3px 0 0 3px;outline:none;}
        .screen .send .s_con .s_btn{width:100px;height:40px;background:#088;border:0;font-size:18px;font-family:"微软雅黑";color:#fff;cursor:pointer;border-radius:0 3px 3px 0;outline:none;}
        .screen .send .s_con .s_btn:hover{background:#006c6c;}
        .s-face{cursor:pointer;}
        .screen .s_dm .mask{width:100%;height:100%;position:absolute;top:0;left:0;background:#000;opacity:0.5;filter:alpha(opacity=50);z-index:1;}
        /*end screen*/
        .system-msg{
            background-color: #aaa;
            padding: 3px 15px;
            color: #FFF;
            font-size: 12px;
            border-radius: 10px;
        }
    </style>
    @stop
@section('content')
    <div class="container" style="margin-bottom: 100px">
        <div class="col-sm-3" style="padding-right: 0">
           <div class="panel panel-default">
               <div class="panel-heading" style="font-weight: bold;color: #999">Online <small>(<span id="num">0</span>)</small></div>
               <div class="panel-body">
                   <ul class="list-inline avatar-list" >

                       {{--  <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                         <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                         <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                         <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                         <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>
                         <li><img src="/uploads/avatars/default.jpg" alt="" class="img-circle avatar"></li>--}}
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
                            <div class="bubble-item clearfix {{showFr($user->id, $message->user->id)}}">
                                <a href="#"><img src="{{$message->user->avatar}}" alt="..." class="user_face"></a>
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
                <a class="btn btn-warning btn-block clearMsg">清除消息</a>
                <a class="btn btn-success btn-block" id="click_screen">弹幕窗口</a>
                {{--<a class="btn btn-success btn-block" href="/dorm/1/edit">约吧</a>
                <a class="btn btn-info btn-block" href="/dorm/1/edit">宿舍DIY</a>--}}
            </div>
        </div>
    </div>
    <div class="screen">
        <!--s_dm start-->
        <div class="s_dm">
            <a href="#" class="s_close">退出弹幕</a>
            <div class="mask"></div>
            <div class="s_show">

            </div>
        </div>
        <!--end s_dm-->
        <!--send start-->
        <div class="send ">
            <div class="s_con ">
                <div class="container" style="margin-top: 20px">
                    <div class="col-xs-10 col-xs-offset-1 col-sm-9 col-sm-offset-1">
                        <div class="input-group">
                            <a class="input-group-addon s-face"><i class="fa fa-drupal"></i></a>
                            <input type="text" class="form-control s_txt"/>
                            <span class="input-group-btn">
                                <button class="btn btn-info btn-block s_btn" type="button">Go!</button>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--end send-->
    </div>
@endsection

@section('script')
    <script src="https://cdn.bootcss.com/socket.io/1.5.0/socket.io.min.js"></script>
    <script type="text/javascript" src="/assets/js/jquery.sinaEmotion.js"></script>
    <script>
        $(function(){
            //点击展开
            $("#click_screen").click(function(){
                $(".screen").toggle(600);

            });
            $(".s_close").click(function(){
                $(".screen").toggle(600);

            });

            //发表评论
            $(".s_btn").click(function(){
                var text=$(".s_txt").val().trim();
                if(text.length == 0){
                    alert('要发布的内容不能为空');
                    return false;
                }

                $(".s_show").append("<div>"+text+"</div>");
                init_screen();

                $('.s_txt').val('').focus();
                $.post('{{route("chat.msg")}}',{msg:text, 'room':"{{$room->id}}"});
                var btn = $(this).button('loading');
                setTimeout(function () {
                    btn.button('reset');
                }, 2300);
            });

            $(".s_txt").keydown(function(){
                var code = window.event.keyCode;

                //alert(code);

                if(code == 13)//回车键按下时，输出到弹幕

                {
                    var text=$(".s_txt").val();
                    $(".s_txt").val("");
                    $(".s_show").append("<div>"+text+"</div>");
                    init_screen();
                }
            });

            $('.face').bind({
                click: function(event){
                    if(! $('#sinaEmotion').is(':visible')){
                        $(this).sinaEmotion("#common");
                        event.stopPropagation();
                    }
                }
            });
            $('.s-face').bind({
                click: function(event){
                    if(! $('#sinaEmotion').is(':visible')){
                        $(this).sinaEmotion(".s_txt");
                        event.stopPropagation();
                    }
                }
            });
            $('.bubble').parseEmotion();
        });

        //初始化弹幕
        function init_screen(){
            var _top=0;

            $(".s_show").find("div").show().each(function(){
                var _left=$(window).width()-$(this).width();
                var _height=$(window).height();

                //设定文字的初始化位置
                _top=_top+80;
                if(_top>_height-100){
                    _top=80;
                }

                var time=15000;
                /*if($(this).index()%2==0){
                    time=15000;
                }*/


                $(this).css({left:_left,top:_top});
                $(this).animate({left:"-"+_left+"px"},time,function(){
                    $(this).remove();
                });
            });
            $(".s_show").find("div:last").css({color:getRandomColor()}).parseEmotion();
            toBottom();
        }

        //随机获取颜色值
        function getRandomColor(){
            return '#'+(function(h){
                        return new Array(7-h.length).join("0")+h
                    })((Math.random()*0x1000000<<0).toString(16))
        }




        var __USER__ = "{{$user->id}}";
        var _ROOM_ = 'chat_{{$room->id}}';

        socket.emit('joinRoom', {avatar:"{{$user->avatar}}",'id':"{{$user->id}}",'name':'{{$user->name}}',room:_ROOM_});
        socket.on('chat-Room:{{$room->id}}', function (data) {
            if(data != null){
                if (__USER__ == data.user.id){
                    $('.bubble').append(chat_str(data , true));
                }else{
                    $('.bubble').append(chat_str(data , false));
                }
                $('.bubble .article:last').parseEmotion();
            }
           toBottom();
            //show_tb();

           //console.log($(".chat-panel")[0].scrollHeight);
        });

        socket.on('system:'+_ROOM_, function (data) {
            $(".bubble").append('<div class="bubble-item text-center" > <span class="system-msg">'+data+'</span> </div>')
        });
        socket.on('onlineUser:'+_ROOM_, function (data) {
            console.log(data);
            var user_str = '';
            var num = 0;
            $.each(data, function (a,user) {
                num++;
                user_str += '<li class="user_'+user.id+'"><a href="/users/'+user.id+'"><img src="'+user.avatar+'" alt="'+user.name+'" class="img-circle avatar"></a></li>';
            })
            $("#num").html(num);
            $('.avatar-list').html(user_str);
        });


        $("#send").bind('click', function () {

            var Ipt = $('#common');
            var msg = Ipt.val().trim();
            if(msg.length == 0){
                alert('要发布的内容不能为空');
                return false;
            }
            Ipt.val('').focus();
            $.post('{{route("chat.msg")}}',{msg:msg, 'room':"{{$room->id}}"});
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
            return  str + '"><img src="'+data.user.avatar+'" alt="" class="user_face">'+
                    '<span class="triangle right"></span>'+
                    '<div class="article">'+data.msg+'</div></div>';
        }

        function toBottom() {
            $('#tb').hide();
            $('.chat-panel').scrollTop( $('.chat-panel')[0].scrollHeight );
            //$(".chat-panel")[0].scrollTop = $(".chat-panel")[0].scrollTopMax;
           // document.getElementById('msg_end').scrollIntoView(false);
        }
        $('.clearMsg').bind('click', function () {
            $('.bubble').html('');
        });

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

