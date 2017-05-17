@extends('admin.default')
@section('style')
    <style>
        th, td { white-space: nowrap; }
    </style>
    @stop
@section('content')
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-fl">
                            获奖日志
                        </div>
                    </div>
                    <div class="widget-body  am-fr">

                        {{--<div class="am-u-sm-12 am-u-md-6 am-u-lg-6">
                            <div class="am-form-group">
                                <div class="am-btn-toolbar">
                                    <div class="am-btn-group am-btn-group-xs">
                                        <button type="button" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>
                                        <button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>
                                    </div>
                                </div>
                            </div>
                        </div>--}}


                        <div class="am-u-sm-12">

                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black am-table-striped  am-table-compact am-text-nowrap" id="tableSort">
                                <thead>
                                <tr>

                                    <th width="30px">获奖人</th>
                                    <th>联系电话</th>
                                    <th>学院</th>
                                    <th>专业</th>
                                    <th>年级</th>
                                    <th>奖项</th>
                                   <th>奖品</th>
                                    <th>奖品码</th>
                                    <th>获奖日期</th>
                                    <th>状态</th>
                                    <th>领取时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($logs as $log)
                                    <tr class="even gradeC">

                                        <td>{{$log->user->name}}</td>
                                        <td>{{$log->user->phone}}</td>
                                        <td>{{$log->user->college}}</td>
                                        <td>{{$log->user->major}}</td>
                                        <td>{{$log->user->grade}}级</td>
                                        <td>{{$log->turn->name}}</td>
                                        <td>{{$log->turn->prize}}</td>
                                        <td>{{$log->code}}</td>
                                        <td>{{$log->created_at->toDateString()}}</td>
                                        <td>@if($log->isGet == 1) <span class="am-badge am-badge-success">已领取</span>@else <span class="am-badge am-badge-warning">未领取</span>@endif</td>
                                        <td>{{empty($log->geted_at)? '':$log->geted_at->toDateString()}}</td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                @if($log->isGet == 0)
                                                    <a href="javascript:;" data-id="{{$log->id}}" class="getPrize" onclick="setGet(this)">
                                                        <i class="am-icon-viacoin"></i> 领取
                                                    </a>
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
            <div class="am-modal-hd">Get Prize</div>
            <div class="am-modal-bd">
                确定该奖品已领取 ？
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <span class="am-modal-btn" data-am-modal-confirm>确定</span>
            </div>
        </div>
    </div>
    @stop

@section("script")
    <script>
        function setGet(self) {
            _self = $(self);
            $('#my-confirm').modal({
                relatedTarget: this,
                onConfirm: function(options) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('logs.use')}}",
                        data: {id:_self.data('id')},
                        dataType: "json",
                        success: function(response){
                            var d = new Date();
                            var str = d.getFullYear()+"-"+(d.getMonth()+1)+"-"+d.getDate();
                            _self.parent().parent().parent().find('td').eq(9).html('<span class="am-badge am-badge-success">已领取</span>');
                            _self.parent().parent().parent().find('td').eq(10).html(str);
                            _self.parent().remove();
                        },
                        error:function (data) {
                            alert("操作异常");
                            // window.location.reload();
                        }
                    });
                },
                // closeOnConfirm: false,
                onCancel: function() {
                    // alert('算求，不弄了');
                }
            });
        }

        $(function() {
            jQuery.extend(jQuery.fn.dataTableExt.oSort, {
                "chinese-string-asc": function(s1, s2) {
                    return s1.localeCompare(s2);
                },

                "chinese-string-desc": function(s1, s2) {
                    return s2.localeCompare(s1);
                }
            });

            /*$('#tableSort').DataTable({
                //responsive: true,
                scrollX: true,
                searching: true,
                bPaginate: true,
                aaSorting: [[ 7, "desc" ]],
                columnDefs: [
                    {type: 'chinese-string', targets: '_all'}
                ],
                aoColumnDefs: [ { "bSortable": false, "aTargets": [ 0 ] }],
            });*/

        });



    </script>
    @stop