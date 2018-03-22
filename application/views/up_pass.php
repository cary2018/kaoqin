<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/skin_/form.css" />
<link href="<?php echo base_url();?>umeditor/themes/default/_css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.select.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/nav.js"></script>
<title>添加系统变量</title>
</head>

<body>
<div id="container">
	<div id="hd">
    </div>
    <div id="bd">
        <form action="/jqmain/up_pass" class="layui-form" method="post">
    	<div id="main">
            <h2 class="subfild">
            	<span>修改密码</span>
                <span><a href="javascript:;" onclick="reload()">刷新</a></span>
            </h2>
            <div class="subfild-content base-info">
            	<div class="kv-item ue-clear">
                	<label><span class="impInfo">*</span>新密码</label>
                	<div class="kv-item-content">
                    	<input type="password" name="password" placeholder="请输入新密码" />
                    </div>
                </div>
                <div class="kv-item ue-clear">
                    <label><span class="impInfo"></span>确认新密码</label>
                    <div class="kv-item-content">
                        <input type="password" name="password2" placeholder="确认输入新密码" />
                    </div>
                </div>
            </div>
            
            <div class="buttons">
                <input class="button" type="submit" name="submit" value="确认修改" />
                <input class="button" type="button" value="返回" onclick="history.go(-1)">
            </div>
        </div>
        </form>
    </div>
</div>
</body>

<script type="text/javascript">
	$('select').select();
	showRemind('input[type=text],textarea','color5');
	UM.getEditor('content');
</script>
</html>
