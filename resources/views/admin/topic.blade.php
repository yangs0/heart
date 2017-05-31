@extends('admin.default')
@section('content')
    <div class="row-content am-cf">
        <div class="row">
            <div class="am-u-sm-12 am-u-md-12 am-u-lg-12">
                <div class="widget am-cf">
                    <div class="widget-head am-cf">
                        <div class="am-btn-toolbar am-fr">
                        </div>
                        <div class="widget-title  am-cf">话题列表</div>


                    </div>
                    <div class="widget-body am-fr">
                        <div class="am-u-sm-12">
                            <table width="100%" class="am-table am-table-compact am-table-striped tpl-table-black am-table-striped  am-table-compact am-text-nowrap" id="tableSort">
                                <thead>
                                <tr>
                                    <th>#thumb</th>
                                    <th>标题</th>
                                    <th>发布人</th>
                                    <th>投票数</th>
                                    <th>评论数</th>
                                    <th>主题</th>
                                    <th>创建时间</th>
                                    <th>状态</th>
                                    <th>操作</th>
                                </tr>
                                </thead>

                                <tbody>
                                @foreach($topics as $topic)
                                    <tr class="even gradeC">
                                        <td>
                                            <img src="{{$topic->figure}}" class="tpl-table-line-img" alt="" width="50">
                                        </td>
                                        <td class="am-text-middle" title="$topic->title"><a href="{{route('topic.show',$topic->id)}}" target="_blank">{{str_limit($topic->title,20)}}</a></td>
                                        <td class="am-text-middle">{{$topic->user->name}}</td>
                                        <td class="am-text-middle">{{$topic->vote_count}}</td>
                                        <td class="am-text-middle">{{$topic->reply_count}}</td>
                                        <td class="am-text-middle">{{$topic->theme['name']}}</td>
                                        <td class="am-text-middle">{{$topic->created_at}}</td>
                                        <td class="am-text-middle">
                                            @if($topic->is_excellent == 'yes')
                                                <span class="am-badge am-badge-success">优秀</span>
                                                @elseif($topic->is_banned == 'yes')
                                                <span class="am-badge am-badge-danger">封禁</span>
                                                @endif


                                        </td>
                                        <td class="am-text-middle">
                                            <div class="tpl-table-black-operation">
                                                @if($topic->is_excellent == 'no')
                                                    <a href="javascript:;" class="excellent" data-id="{{$topic->id}}">
                                                        <i class="am-icon-eye"></i> 推荐
                                                    </a>
                                                    @else
                                                    <a href="javascript:;" class="excellent" data-id="{{$topic->id}}">
                                                        <i class="am-icon-eye"></i> 取消
                                                    </a>
                                                    @endif
                                                @if($topic->is_banned == 'yes')
                                                        <a href="javascript:;" class="tpl-table-black-operation-del delTicket" data-id="{{$topic->id}}">
                                                            <i class="am-icon-trash"></i> 封禁
                                                        </a>

                                                    @else
                                                        <a href="javascript:;" class="tpl-table-black-operation delTicket" data-id="{{$topic->id}}">
                                                            <i class="am-icon-trash"></i> 解封
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
            <div class="am-modal-hd">确定 封禁 / 解封 该话题?</div>
            <div class="am-modal-bd">
            </div>
            <div class="am-modal-footer">
                <span class="am-modal-btn" data-am-modal-cancel>取消</span>
                <span class="am-modal-btn" data-am-modal-confirm>确定</span>
            </div>
        </div>
    </div>
    <div class="am-modal am-modal-confirm" tabindex="-1" id="my-excellent">
        <div class="am-modal-dialog">
            <div class="am-modal-hd">推荐该话题?</div>
            <div class="am-modal-bd">
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

        $(".excellent").bind('click',function () {
            _self = $(this);
            $('#my-excellent').modal({
                relatedTarget: this,
                onConfirm: function(options) {
                    $.post("{{route('admin.topic.excellent')}}",{id:_self.data('id'),_token:_token},function (response) {
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