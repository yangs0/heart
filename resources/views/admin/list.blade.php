@extends('admin.default')

@section('content')
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-fl">
                            <img src="{{Storage::url($ticket->figure)}}" class="tpl-table-line-img" alt="" width="50">
                            <small>&emsp;价值: ￥{{$ticket->value/100}}</small>
                        </div>
                        <div class="widget-function am-fr">
                            <a href="/admin" class="am-icon-angle-left"></a>
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
                                    <th>优惠券码</th>
                                    <th>领取人</th>
                                    <th>状态</th>
                                    <th>领取时间</th>
                                    <th>使用时间</th>
                                    <th>操作</th>
                                </tr>
                                </thead>
                                <tbody>

                                @foreach($coupons as $coupon)
                                    <tr class="even gradeC">
                                        <td>{{$coupon->code}}</td>
                                        <td>{{$coupon->user->nickname}}</td>
                                        <td>@if($coupon->status == 1) <span class="am-badge am-badge-success">已使用</span>  @elseif($coupon->created_at->gt($ticket->end)) <span class="am-badge am-badge-danger">已过期</span> @else <span class="am-badge am-badge-primary">未使用</span> @endif</td>
                                        <td>{{$coupon->created_at}}</td>
                                        <td>{{$coupon->used_at}}</td>
                                        <td>
                                            <div class="tpl-table-black-operation">
                                                @if($coupon->status == 0 && ($coupon->created_at->lt($ticket->end)))
                                                <a href="javascript:;" data-id="{{$coupon->id}}" class="useCoupon">
                                                    <i class="am-icon-viacoin"></i> 使用
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
            <div class="am-modal-hd">Use Coupon</div>
            <div class="am-modal-bd">
                你，确定该优惠券的使用？
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
        var _self
        $(".useCoupon").bind('click',function () {
            _self = $(this);
            $('#my-confirm').modal({
                relatedTarget: this,
                onConfirm: function(options) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('ticket.use')}}",
                        data: {id:_self.data('id')},
                        dataType: "json",
                        success: function(response){
                            console.log(response);
                            _self.parent().parent().parent().find('td').eq(2).html('<span class="am-badge am-badge-success">已使用</span>');
                            _self.parent().parent().parent().find('td').eq(4).html(response.data.used_at);
                            _self.parent().remove();
                        },
                        error:function (data) {
                            alert("操作异常");
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
                aaSorting: [[ 1, "desc" ]],
                columnDefs: [
                    {type: 'chinese-string', targets: '_all'}
                ],
                aoColumnDefs: [ { "bSortable": false, "aTargets": [ 0 ] }]

            });
        });



    </script>
    @stop