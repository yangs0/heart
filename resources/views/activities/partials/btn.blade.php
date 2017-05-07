@if(Auth::check()&& $activity->chatRoom)
    <a type="button" class="btn btn-primary btn-block" style="margin-bottom: 10px;" href="{{route('rooms.show', $activity->chatRoom->id)}}" >room</a>
@elseif(Auth::check() && $activity->user_id == Auth::id())
    <button type="button" class="btn btn-primary btn-block" style="margin-bottom: 10px;" id="createRoom">room</button>
    <button type="button" class="btn btn-warning btn-block" style="margin-bottom: 20px;">edit</button>
@endif



@section('script')
    @parent

    @if(Auth::check() && $activity->user_id == Auth::id())
        <script>
            $("#createRoom").bind('click', function () {
                layer.confirm('也可以这样',{btn:['Yes','No']},function () {
                    $.post('{{route("rooms.create", $activity->id)}}', {'_token': Config.token},function (response) {
                        layer.msg(response.msg,{icon: 1, time:2500});
                        console.log(response);
                        $("#createRoom").unbind().bind('click',function () {
                            window.location.href="/rooms/"+response.data.id
                        })
                    })
                });
            })
        </script>

        @endif


    @stop