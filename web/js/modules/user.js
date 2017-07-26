layui.define('layer',function(exports){ //提示：模块也可以依赖其它模块，如：layui.define('layer', callback);
    var obj = {
        login: function(){
            $('#actBtn').click(function(){
                var url = $(this).attr('data-url');
                $.post(url,$('#Form').serializeArray(),function(d){

                },'json');
            });
        },

        register: function(){
            $('#actBtn').click(function(){
                var url = $(this).attr('data-url');
                $.post(url,$('#Form').serializeArray(),function(d){
                    if(d.done == true){
                        layer.msg('注册成功',function(){
                            window.location.href = d.data;
                        });
                    }else{
                        layer.msg(d.error);
                    }
                },'json');
            });
        }
    };

    exports('user', obj);
});