@extends('admin.default')
@section('content')
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="am-btn-toolbar am-fr">
                        </div>
                        <div class="widget-title  am-cf">活动列表</div>


                    </div>
                    <div class="widget-body am-fr">
                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black am-table-striped  am-table-compact am-text-nowrap" id="tableSort">
                                <thead>
                                <tr>
                                    <th>#thumb</th>
                                    <th>标题</th>
                                    <th>发布人</th>
                                    <th>参与数</th>
                                    <th>开始时间 </th>
                                    <th>结束时间</th>

                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($activities as $activity)
                                    <tr class="even gradeC">
                                        <td>
                                            <img src="{{$activity->cover}}" class="tpl-table-line-img" alt="" width="50">
                                        </td>
                                        <td class="am-text-middle" title="$topic->title"><a href="{{route('activities.show', $activity->id)}}" target="_blank">{{str_limit($activity->title,20)}}</a></td>
                                        <td class="am-text-middle">{{$activity->user->name}}</td>
                                        <td class="am-text-middle">{{$activity->part_count}}</td>
                                        <td class="am-text-middle">{{$activity->start}}</td>
                                        <td class="am-text-middle">{{$activity->end}}</td>
                                        <td class="am-text-middle">
                                            @if($activity->is_banned == 'yes')
                                            <span class="am-badge am-badge-warning">封禁</span>
                                            @else
                                                <span class="am-badge am-badge-success">正常</span>
                                            @endif
                                            <!--{{$now = \Carbon\Carbon::now()}}-->
                                                @if($activity->start->gt($now))
                                                    <span class="am-badge am-badge-success">报名中</span>
                                                @elseif($activity->start->lt($now) && $activity->end->gt($now) )
                                                    <span class="am-badge am-badge-danger">进行中</span>
                                                @else
                                                    <span class="am-badge am-badge-secondary">已结束</span>
                                                @endif
                                        </td>
                                        <td class="am-text-middle">
                                            <div class="tpl-table-black-operation">
                                                @if($activity->is_banned == 'no')
                                                    <a href="javascript:;" class="tpl-table-black-operation-del delTicket" data-id="{{$activity->id}}">
                                                        <i class="am-icon-trash"></i> 封禁
                                                    </a>
                                                @else
                                                    <a href="javascript:;" class="tpl-table-black-operation delTicket" data-id="{{$user->id}}">
                                                        <i class="am-icon-trash"></i> 解封
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach


                                {{--<tr class="even gradeC">
                                    <td>
                                        <img src="assets/img/k.jpg" class="tpl-table-line-img" alt="">
                                    </td>
                                    <td class="am-text-middle">我建议WEB版本文件引入问题</td>
                                    <td class="am-text-middle">罢了</td>
                                    <td class="am-text-middle">2016-09-26</td>
                                    <td class="am-text-middle">
                                        <div class="tpl-table-black-operation">
                                            <a href="javascript:;">
                                                <i class="am-icon-pencil"></i> 编辑
                                            </a>
                                            <a href="javascript:;" class="tpl-table-black-operation-del">
                                                <i class="am-icon-trash"></i> 删除
                                            </a>
                                        </div>
                                    </td>
                                </tr>--}}
                                <!-- more data -->
                                </tbody>
                            </table>
                        </div>
                        {{--<div class="am-u-lg-12 am-cf">

                            <div class="am-fr">
                                <ul class="am-pagination tpl-pagination">
                                    <li class="am-disabled"><a href="#">«</a></li>
                                    <li class="am-active"><a href="#">1</a></li>
                                    <li><a href="#">2</a></li>
                                    <li><a href="#">3</a></li>
                                    <li><a href="#">4</a></li>
                                    <li><a href="#">5</a></li>
                                    <li><a href="#">»</a></li>
                                </ul>
                            </div>
                        </div>--}}
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">确定 封禁 / 解封 该活动?</div>
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
                    $.post("{{route('admin.user.banned')}}",{id:_self.data('id'),_token:_token},function (response) {
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