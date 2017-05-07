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

(function($){
    $.fn.serializeJson=function(){
        var serializeObj={};
        var array=this.serializeArray();
        var str=this.serialize();
        $(array).each(function(){
            if(serializeObj[this.name]){
                if($.isArray(serializeObj[this.name])){
                    serializeObj[this.name].push(this.value);
                }else{
                    serializeObj[this.name]=[serializeObj[this.name],this.value];
                }
            }else{
                serializeObj[this.name]=this.value;
            }
        });
        return serializeObj;
    };
})(jQuery);