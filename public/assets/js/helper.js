/**
 * Created by ten_year on 17-2-27.
 */

function doAjax(data) {
    console.log(Config);//$(this).data()
    $.ajax({
        type: $(this).data('type'),
        url: $(this).data('url'),
        headers: {
            'X-CSRF-TOKEN': Config.token
        },
        data: data ? data :{},
        dataType: "json",
        success: function(data){
            console.log(data);
        },
        error:function (xhr,data) {
            if (xhr.status == 401){
                alert("用户尚未登录");
            }
        }
    });
}