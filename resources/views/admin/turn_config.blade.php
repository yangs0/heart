@extends('admin.default')
@section('style')
    <style>
        .am-table-hover>tbody>tr td.tdt:hover{
            background-color: #c4eeff;
            cursor: pointer;
        }
        .am-table-hover>tbody>tr:hover>td, .am-table-hover>tbody>tr:hover>th{
            background-color: rgba(255, 235, 240, 0.39);
        }
    </style>
    @stop
@section('content')
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="widget-title  am-fl">
                            大转盘
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
                            <div>
                                <div class="tpl-table-black-operation" style="float: right">
                                    <a href="javascript:;"  class="clearLog">
                                        <i class="am-icon-recycle"></i> 清空历史
                                    </a>
                                </div>
                            </div>
                            <div><small >1.目前最高支持 7 个等级,若不起用可将概率和库存设为 0</small></div>
                            <div><small>2.概率计算：当前概率除以所有概率之和</small></div>
                            <table class="am-table am-table-bordered am-table-striped am-table-hover">
                                <thead>
                                <tr>
                                    <th></th>
                                    <th class="am-text-center am-text-middle">级别</th>
                                    <th class="am-text-center am-text-middle">库存</th>
                                    <th class="am-text-center am-text-middle">奖品</th>
                                    <th class="am-text-center am-text-middle">概率</th>
                                    <th class="am-text-center" style="font-size: 12px">开放条件 <br><small>(转盘运行次数)</small></th>
                                    <th class="am-text-center am-text-middle">获奖次数</th>
                                </tr>
                                </thead>
                                <tbody>
                             {{--<th>三等奖</th>
                                    <th>四等奖</th>
                                    <th>五等奖</th>
                                    <th>六等奖</th>
                                    <th>七等奖</th>--}}
                                @foreach($turns as $turn)
                                    <tr class="" data-id="{{$turn->id}}">
                                        <td>{{$turn->field}}</td>
                                        <td class="tdt" data-type="name">{{$turn->name}}</td>
                                        <td class="tdt" data-type="counts">{{$turn->counts}}</td>
                                        <td class="tdt" data-type="prize">{{$turn->prize}}</td>
                                        <td class="tdt" data-type="chance">{{$turn->chance}}</td>
                                        <td class="tdt" data-type="limit">{{$turn->limit}}</td>
                                        <td>{{$turn->times}}</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                            <p>当前运行次数:{{$turns->pluck("times")->sum()}}</p>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="am-modal am-modal-confirm" tabindex="-1" id="my-confirm">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">清除历史记录？</div>
            <div class="am-modal-bd">
                你，确定清除？ <small>清除历史记录后，获奖记录将被清空.</small>
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <span class="am-modal-btn" data-am-modal-confirm>确定</span>
            </div>
        </div>
    </div>
    @stop

@section("script")
    <script src="{{asset('/js/layer/layer.js')}}"></script>
    <script>

        var _self = null;
        var data =null;
        $(".tdt").bind("click", function () {
            _self = $(this);

            layer.prompt({title: '请输入要修改的值', formType: 3,value:_self.text()}, function(val, index){
                data = {id:_self.parent().data('id'),field:_self.data('type'),value:val};
                if (_self.data('type') != 'prize' && _self.data('type') != 'name'){
                    if (isNaN(val)){
                        layer.msg('请输入数字。。', {icon: 5,time:1000});
                        return false;
                    }
                }
                $.ajax({
                    type: "POST",
                    url: "{{route('turn.update')}}",
                    data: data,
                    dataType: "json",
                    success: function(response){
                        _self.text(val);
                        layer.msg('操作成功。。', {icon: 1,time:2500});
                    },
                    error:function (data) {
                        layer.msg('操作失败,请确定字段类型或者长度是否合适。', {icon: 5,time:2500});
                        console.log(data);
                    }
                });
                layer.close(index);
            });
        })

        $(".clearLog").bind('click', function () {
            $('#my-confirm').modal({
                relatedTarget: this,
                onConfirm: function(options) {
                    $.ajax({
                        type: "POST",
                        url: "{{route('turn.clear')}}",
                        data: {A:1},
                        dataType: "json",
                        success: function(response){
                            window.location.reload();
                        },
                        error:function (data) {

                        }
                    });
                },
                // closeOnConfirm: false,
                onCancel: function() {
                    // alert('算求，不弄了');
                }
            });
        })
    </script>
    @stop