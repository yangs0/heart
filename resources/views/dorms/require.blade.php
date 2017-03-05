@extends('layouts.default')

@section('content')
    <div class="container">
        <div class="browser-window panel">
            <div class="top-bar">
                <div class="circles">
                    <a href="#"><div class="circle circle-red"></div></a>
                    <div class="circle circle-yellow"></div>
                    <div class="circle circle-green"></div>
                    <div class="cir-title">
                        宿舍人员管理
                    </div>
                </div>

            </div>

            <table class="table table-hover dorm-user-member">
                <thead>
                <tr>
                    <th width="80"> #thumb</th>
                    <th>昵称</th>
                    <th>性别</th>
                    <th>城市</th>
                    <th width="350">留言</th>
                    <th>状态</th>
                    <th>操作</th>

                </tr>
                </thead>
                <tbody>
                <tr class="">
                    <td  ><img src="./img/a8.jpg" class="img-circle" width="35" height="35" alt=""></td>
                    <td >Bangalore</td>
                    <td class="sex">♀</td>
                    <td>dddddd</td>
                    <td style="word-break: break-all">请求加入</td>
                    <td><span class="label label-warning">访客</span></td>
                    <td class="options"> <a href="" title="允许入宿"><i class="fa  fa-check-square-o"></i></a>
                        <a href="" title="驱逐"><i class="fa fa-power-off"></i></a></td>


                </tr>
                <tr class="warning">
                    <td width="80" ><img src="./img/a8.jpg" class="img-circle" width="35" height="35" alt=""></td>
                    <td >Bangalore</td>
                    <td class="sex">♂</td>
                    <td>北京市</td>
                    <td style="word-break: break-all">请求加入</td>
                    <td><span class="label label-success">成员</span></td>
                    <td class="options">
                        <a href="" title="驱逐"><i class="fa fa-power-off"></i></a>
                    </td>
                </tr>
                <tr class="success">
                    <td width="80" ><img src="./img/a8.jpg" class="img-circle" width="35" height="35" alt=""></td>
                    <td >Bangalore</td>
                    <td class="sex">♀</td>
                    <td>dddddd</td>
                    <td style="word-break: break-all">请求加入</td>
                    <td><span class="label label-danger">申请中</span></td>
                    <td class="options">
                        <a href="" title="允许访问"><i class="fa fa-check"></i></a>
                        <a href="" title="拒绝访问"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                <tr class="">
                    <td width="80" ><img src="./img/a8.jpg" class="img-circle" width="35" height="35" alt=""></td>
                    <td >Bangalore</td>
                    <td class="sex">♀</td>
                    <td>dddddd</td>
                    <td style="word-break: break-all">请求加入</td>
                    <td ><span class="label label-danger">申请中</span></td>
                    <td class="options">
                        <a href="" title="允许访问"><i class="fa fa-check"></i></a>
                        <a href="" title="拒绝访问"><i class="fa fa-times"></i></a>
                    </td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection

@section('script')
    <script src="/js/cropbox.js"></script>
    <script src="/js/forum.js"></script>
    <script>
        /*---图片裁剪--*/
        $(window).load(function() {
            var options = {
                thumbBox: '.thumbBox',
                spinner: '.spinner',
                imgSrc: '/img/a5.jpg'
            }
            var img = '';
            var cropper = $('.imageBox').cropbox(options);
            $('#upload-file').on('change', function(){
                var reader = new FileReader();
                reader.onload = function(e) {
                    options.imgSrc = e.target.result;
                    cropper = $('.imageBox').cropbox(options);
                }
                reader.readAsDataURL(this.files[0]);
                this.files = [];
            })
            $('#btnCrop').on('click', function(){
                img = cropper.getDataURL();
                $('#up-img').removeClass('hidden');
                $('.cropped').html('');
                $('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:64px;margin-top:4px;border-radius:64px;box-shadow:0px 0px 12px #7E7E7E;" ><p>64px*64px</p>');
                $('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:128px;margin-top:4px;border-radius:128px;box-shadow:0px 0px 12px #7E7E7E;"><p>128px*128px</p>');
                $('.cropped').append('<img src="'+img+'" align="absmiddle" style="width:180px;margin-top:4px;border-radius:180px;box-shadow:0px 0px 12px #7E7E7E;"><p>180px*180px</p>');
            })
            $('#btnZoomIn').on('click', function(){
                cropper.zoomIn();
            })
            $('#btnZoomOut').on('click', function(){
                cropper.zoomOut();
            })

            $('#up-img').on('click', function(){
                $.ajax({
                    type:"post",
                    url: "/api/uploads/avatar",
                    dataType:"json",
                    data: {
                        avatar: img
                    },
                    success:function(result){
                        $('#img').attr('src',result.file_path);
                        $('input[name="avatar"]').val(result.file_path);
                        $('#imgCrop').modal('hide');
                        $('#imgBtn').html('图片上传成功');
                    },
                    error:function(XmlHttpRequest, textStatus, errorThrown){
                        alert("图片上传失败，请刷新页面重新尝试..");
                    }
                });
            })
        });
        var mditor = new Mditor("#editor",{
            height:300,
            fixedHeight:true
        });
    </script>
@stop
