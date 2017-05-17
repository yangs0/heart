@if(Auth::check() && $activity->chatRoom  && $activity->end > \Carbon\Carbon::now())
    <a type="button" class="btn btn-warning btn-block" style="margin-bottom: 10px;" href="{{route('rooms.show', $activity->chatRoom->id)}}" >进入房间</a>
@elseif(Auth::check() && $activity->user_id == Auth::id() && $activity->end > \Carbon\Carbon::now())
    <button type="button" class="btn btn-primary btn-block" style="margin-bottom: 10px;" id="createRoom"> 创建房间 </button>
@endif

@section('script')
    @parent

    @if(Auth::check() && $activity->user_id == Auth::id())
        <script>
            $("#createRoom").bind('click', function () {
                layer.confirm('确认申请房间？ 房间有效期为活动截止前',{btn:['Yes','No']},function () {
                    $.post('{{route("rooms.create", $activity->id)}}', {'_token': Config.token},function (response) {
                        layer.msg(response.msg,{icon: 1, time:2500});
                        console.log(response);
                        $("#createRoom").unbind().bind('click',function () {
                            window.location.href="/rooms/"+response.data.id
                        }).removeClass('btn-primary').addClass('btn-warning').html('进入房间');
                    })
                });
            })
        </script>
        @endif
    @stop