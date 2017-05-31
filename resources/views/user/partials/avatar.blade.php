@section('styles')
    @parent
    <link rel="stylesheet" href="/assets/css/cropbox.css"/>
@stop
<div class="modal fade" id="imgCrop" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header text-center" style="padding: 10px">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                <b>图片裁剪</b>
            </div>
            <div class="modal-body">
                <div class="imgCrop">
                    <div class="imageBox">
                        <div class="thumbBox"></div>
                        <div class="spinner" style="display: none">Loading...</div>
                    </div>

                    <div class="cropped"></div>
                </div>
                <div class="row upload-action">
                    <div class="col-md-3">
                        <div class="btn btn-primary btn-sm" style="height: 35px"><b style="position: absolute;left: 50px;top: 10px;">选择图片</b>
                            <input id="upload-file" name="upload-file" type="file" value="上传图像" style="opacity:0;filter: alpha(opacity=0); width: 100%;height: 100%;">
                        </div>
                    </div>
                   {{-- <div class="col-md-2">
                        <button class="btn btn-info" id="btnZoomIn">+</button>
                        <button class="btn btn-info" id="btnZoomOut"> - </button>
                    </div>--}}
                    <div class="col-md-2">
                        <button class="btn btn-default" id="btnCrop">裁剪</button>
                    </div>
                    <div class="col-md-2 col-md-offset-1">
                        <button class="btn btn-danger hidden" id="up-img">确认上传</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@section('script')
    @parent
    <script type="text/javascript" src="/assets/js/extends.js"></script>
    <script>
        /*---图片裁剪--*/
        $(window).load(function() {
            var options = {
                thumbBox: '.thumbBox',
                spinner: '.spinner',
                imgSrc: '{{$user->avatar}}'
            }
            var img = '';
            var cropper = $('.imageBox').cropbox(options);
            $('#upload-file').on('change', function(){
                var reader = new FileReader();
                reader.onload = function(e) {
                    options.imgSrc = e.target.result;
                    cropper = $('.imageBox').cropbox(options);
                }
                var durl =this.files[0];
                reader.readAsDataURL(durl);
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
                    url: "/users/avatar",
                    dataType:"json",
                    data: {
                        _token:"{{csrf_token()}}",
                        avatar: img
                    },
                    success:function(result){
                        window.location.reload();
                        console.log(result);
                        //$('#img').attr('src',result.file_path);
                       // $('input[name="avatar"]').val(result.file_path);
                    },
                    error:function(XmlHttpRequest, textStatus, errorThrown){

                    }
                });
                $('button.close').trigger("click");
            })
            
            $("#thumb_avatar").on('click',function () {
                $('#imgCrop').modal('show');
                $(".modal-backdrop").removeClass('fade')
            })
        });

    </script>
@stop