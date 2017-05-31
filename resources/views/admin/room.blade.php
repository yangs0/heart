@extends('admin.default')
@section('content')
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="am-btn-toolbar am-fr">
                        </div>
                        <div class="widget-title  am-cf">聊天室列表</div>


                    </div>
                    <div class="widget-body am-fr">


                     {{-- <div class="am-u-sm-12 am-u-md-12 am-u-lg-3">
                           <div class="am-input-group am-input-group-sm tpl-form-border-form cl-p">
                               <input type="text" class="am-form-field ">
                               <span class="am-input-group-btn">
                                           <button class="am-btn  am-btn-default am-btn-success tpl-table-list-field am-icon-search" type="button"></button>
                                       </span>
                           </div>
                       </div>--}}

                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black am-table-striped  am-table-compact am-text-nowrap" id="tableSort">
                                <thead>
                                <tr>
                                    <th>房间编号</th>
                                    <th>所属活动</th>
                                    <th>结束时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($rooms as $room)
                                    <tr class="even gradeC">

                                        <td class="am-text-middle"><a href="{{route('rooms.show',$room->id)}}">{{$room->name}}</a></td>
                                        <td class="am-text-middle"><a href="{{route('activities.show',$room->activity->id)}}">{{str_limit($room->activity->title,20)}}</a></td>
                                        <td class="am-text-middle">{{$room->end_at}}</td>
                                        <td class="am-text-middle">

                                        <!--{{$now = \Carbon\Carbon::now()}}-->
                                            @if($room->end_at->gt($now))
                                                <span class="am-badge am-badge-secondary">已结束</span>
                                            @else
                                                @if($room->is_banned == 'yes')
                                                    <span class="am-badge am-badge-warning">封禁</span>
                                                @else
                                                    <span class="am-badge am-badge-success">正常</span>
                                                @endif
                                                <span class="am-badge am-badge-danger">进行中</span>
                                            @endif
                                        </td>
                                        <td class="am-text-middle">
                                            <div class="tpl-table-black-operation">
                                             @if($room->end_at->lt($now))
                                                @if($room->is_banned == 'no')
                                                <a href="javascript:;" class="tpl-table-black-operation-del delTicket" data-id="{{$room->id}}">
                                                    <i class="am-icon-trash"></i> 封禁
                                                </a>
                                                    @else
                                                    <a href="javascript:;" class="tpl-table-black-operation delTicket" data-id="{{$room->id}}">
                                                        <i class="am-icon-trash"></i> 解封
                                                    </a>
                                                    @endif
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">确定 封禁 / 解封 该聊天室?</div>
            <div class="am-modal-bd">
                {{--你，确定该优惠券的使用？ <small>删除优惠券后，用户领取记录也将清除</small>--}}
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <span class="am-modal-btn" data-am-modal-confirm>确定</span>
            </div>
        </div>
    </div>
    @stop

@section('script')
    <script>
        var _token = '{{csrf_token()}}';
        var _self = null;

        $(".delTicket").bind('click',function () {
            _self = $(this);
            $('#my-confirm').modal({
                relatedTarget: this,
                onConfirm: function(options) {
                    $.post("{{route('admin.room.banned')}}",{id:_self.data('id'),_token:_token},function (response) {
                        window.location.reload()
                    })
                },
                // closeOnConfirm: false,
                onCancel: function() {
                    // alert('算求，不弄了');
                }
            });
        })



        $(function() {
            jQuery.extend(jQuery.fn.dataTableExt.oSort, {
                "chinese-string-asc": function(s1, s2) {
                    return s1.localeCompare(s2);
                },

                "chinese-string-desc": function(s1, s2) {
                    return s2.localeCompare(s1);
                }
            });

            $('#tableSort').DataTable({
                responsive: true,

                searching: true,
                bPaginate: true,
                aaSorting: [[ 6, "desc" ]],
                columnDefs: [
                    {type: 'chinese-string', targets: '_all'}
                ],
                aoColumnDefs: [ { "bSortable": false, "aTargets": [ 0 ] }]

            });
        });



    </script>
    @stop