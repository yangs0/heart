@extends('admin.default')
@section('content')
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="am-btn-toolbar am-fr">
                            <div class="am-btn-group am-btn-group-xs">
                                <a href="{{route('ticket.create')}}" class="am-btn am-btn-default am-btn-success"><span class="am-icon-plus"></span> 新增</a>
                                {{--<button type="button" class="am-btn am-btn-default am-btn-secondary"><span class="am-icon-save"></span> 保存</button>
                                <button type="button" class="am-btn am-btn-default am-btn-warning"><span class="am-icon-archive"></span> 审核</button>
                                <button type="button" class="am-btn am-btn-default am-btn-danger"><span class="am-icon-trash-o"></span> 删除</button>--}}
                            </div>
                        </div>
                        <div class="widget-title  am-cf">优惠券列表</div>


                    </div>
                    <div class="widget-body  am-fr">


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
                                    <th>封面图</th>
                                    <th>标题</th>
                                    <th>描述</th>
                                    <th>价值</th>
                                    <th>关键字</th>
                                    <th>起止时间</th>
                                    <th>领取数</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>
                                @foreach($tickets as $ticket)
                                    <tr class="even gradeC">
                                        <td>
                                            <img src="{{Storage::url($ticket->figure)}}" class="tpl-table-line-img" alt="" width="50">
                                        </td>
                                        <td class="am-text-middle">{{$ticket->title}}</td>
                                        <td class="am-text-middle">{{$ticket->describe}}</td>
                                        <td class="am-text-middle">￥ {{$ticket->value/100}}</td>
                                        <td class="am-text-middle">{{$ticket->key}}</td>
                                        <td class="am-text-middle">{{$ticket->start->toDateString()}} - {{$ticket->end->toDateString()}}</td>
                                        <td class="am-text-middle">{{$ticket->count}}</td>
                                        <td class="am-text-middle">
                                            <div class="tpl-table-black-operation">
                                                <a href="javascript:;">
                                                    <i class="am-icon-eye"></i> 查看
                                                </a>
                                                <a href="javascript:;" class="tpl-table-black-operation-del delTicket" data-id="{{$ticket->id}}">
                                                    <i class="am-icon-trash"></i> 删除
                                                </a>
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
            <div class="am-modal-hd">删除优惠券</div>
            <div class="am-modal-bd">
                你，确定该优惠券的使用？ <small>删除优惠券后，用户领取记录也将清除</small>
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
        var _self = null;
        $(".delTicket").bind('click',function () {
            _self = $(this);
            $('#my-confirm').modal({
                relatedTarget: this,
                onConfirm: function(options) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('ticket.del')}}",
                        data: {id:_self.data('id')},
                        dataType: "json",
                        success: function(response){
                            console.log(_self);
                            _self.parent().parent().parent().remove();
                        },
                        error:function (data) {
                            alert(data.msg);
                            window.location.reload();
                        }
                    });
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