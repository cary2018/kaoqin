/**
 * Created by asusa on 2017/7/1/0001.
 */
$(document).ready(function(){
    $("#mySubmit").submit(function(){
        var name = $('#username').val();
        var pass = $('#password').val();
        var action_url = $('form').attr('action');
        if(name == '' || pass == '')
        {
            $('.mess').text('用户名和密码不能为空!');
            return false;
        }
        else
        {
            var bol=true;
            $.ajax({
                type: "POST",
                async:false,    //同步处理,默认true异步
                url: action_url,
                data: {username: name, password: pass},
                success: function (data) {
                    var show = eval('('+data+')');
                    console.log(data);   //data即为后台返回的数据
                    if(show['status']==300)
                    {
                        $('.mess').text(show['mess']);
                        bol = false;
                    }
                    if(show['status']==200)
                    {
                        $('.mess').text(show['mess']);
                        bol = true;
                    }
                }
            });
            return bol;
        }
    });
});