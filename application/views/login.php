<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE7" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/skin_/login.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/check_form.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.select.js"></script>
<title>精桥科技考勤系统_用户登录</title>
</head>

<body>
<div id="container">
    <div id="bd">
	   <form id="mySubmit" onsubmit="return mySubmit(false)" action="<?php echo base_url()?>login/check_user" class="layui-form" method="post">
    	<div id="main">
        	<div class="login-box">
                <div id="logo"></div>
                <h1></h1>
                <div style="top:188px;left:176px;color:red;position: absolute;"><span class="mess"></span></div>
                <div class="input username" >
                    <label for="username">用户名</label>
                    <span></span>
                    <input type="text" id="username" name="username" />
                </div>
                <div class="input psw" id="psw">
                    <label for="password">密&nbsp;&nbsp;&nbsp;&nbsp;码</label>
                    <span></span>
                    <input type="password" id="password" name="password" />
                </div>
                <div id="btn" class="loginButton">
                    <input type="submit" id="submit" class="button" value="登 录"  />
                </div>
            </div>
        </div>
		</form>
    </div>
</div>

</body>

<script type="text/javascript">
	var height = $(window).height() > 445 ? $(window).height() : 445;
	$("#container").height(height);
	var bdheight = ($(window).height() - $('#bd').height()) / 2 - 20;
	$('#bd').css('padding-top', bdheight);
	$(window).resize(function(e) {
        var height = $(window).height() > 445 ? $(window).height() : 445;
		$("#container").height(height);
		var bdheight = ($(window).height() - $('#bd').height()) / 2 - 20;
		$('#bd').css('padding-top', bdheight);
    });
	$('select').select();
</script>

</html>
