
@section('script')
    @parent
    <script>
        var _html = '<div style="width:90%; margin: 0 auto"><h3>发送私信</h3><a href="#"><small class="pull-right" style="margin-top:-15px">更多记录 <<</small></a><div class="divider" ></div><form class="form" id="letterForm"><div class="form-group"><label for="name" style="margin:8px 0 ">To: {{$user->name}}</label><textarea class="form-control" rows="4" placeholder="内容" style="resize:none" id="letterContent"></textarea><button style="margin-top:10%;" type="button" class="btn btn-block btn-success" onclick="send()">提交</button></div></form></div>';
        function letter() {
            layer.open({
                type: 1,
                title: false,
                area: '350px',
                shadeClose: true,
                content: _html,
            });
        }

        function send() {

            var _content = $("#letterContent").val().trim();
            if (!_content && _content.length < 1){
                layer.msg("私信内容不能为空。",{icon: 5, time:1500});
                return false;
            }

            $.post("{{route('users.letter.send')}}", {content:_content,user_id:"{{$user->id}}",'_token': Config.token},function (response) {
                parent.layer.msg(response.msg,{icon: 1, time:2500});
                parent.layer.closeAll('page');
            })
        }
    </script>
    @stop
