<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/WdatePicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/skin_/form.css" />
<link href="<?php echo base_url();?>umeditor/themes/default/_css/umeditor.css" type="text/css" rel="stylesheet">
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.select.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/WdatePicker.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/nav.js"></script>
<title>修改用户信息</title>
</head>

<body>
<div id="container">
	<div id="hd">
    </div>
    <div id="bd">
        <form action="<?php echo base_url()?>jqmain/upedit" class="layui-form" method="post">
    	<div id="main">
            <h2 class="subfild">
            	<span>基本信息</span>
                <span><a href="javascript:;" onclick="reload()">刷新</a></span>
            </h2>
            <div class="subfild-content base-info">
            	<div class="kv-item ue-clear">
                	<label><span class="impInfo">*</span>用户名</label>
                	<div class="kv-item-content">
                    	<?php echo $val[0]->username;?>
                    </div>
                </div>
                <div class="kv-item ue-clear">
                    <label><span class="impInfo">*</span>密码</label>
                    <div class="kv-item-content">
                        <input type="password" name="password"  />
                    </div>
                </div>
                <div class="kv-item ue-clear">
                    <label><span class="impInfo">*</span>确认密码</label>
                    <div class="kv-item-content">
                        <input type="password" name="password2"  />
                    </div>
                </div>
                <div class="kv-item ue-clear">
                    <label><span class="impInfo"></span>身份证号码</label>
                    <div class="kv-item-content">
                        <input type="text" name="id_unmber" value="<?php echo $val[0]->id_unmber ;?>" />
                    </div>
                </div>
                <div class="kv-item ue-clear">
                    <label><span class="impInfo"></span>家庭住址</label>
                    <div class="kv-item-content">
                        <input type="text" name="address" value="<?php echo $val[0]->address;?>" />
                    </div>
                </div>
                <div class="kv-item ue-clear">
                    <label><span class="impInfo"></span>联系电话</label>
                    <div class="kv-item-content">
                        <input type="text" name="phone" value="<?php echo $val[0]->phone;?>"  />
                    </div>
                </div>
                <div class="kv-item ue-clear">
                	<label>性 别</label>
                	<div class="kv-item-content">
                    	<span class="choose">
                            <span class="checkboxouter">
                                <input type="radio" <?php echo $val[0]->sex ==1 ? 'checked':'';?> name="sex" value='1' />
                                <span class="radio"></span>
                            </span>
                            <span class="text">男</span>
                        </span>
                    	<span class="choose">
                            <span class="checkboxouter">
                                <input type="radio" <?php echo $val[0]->sex ==0 ? 'checked':'';?> name="sex" value='0' />
                                <span class="radio"></span>
                            </span>
                            <span class="text">女</span>
                        </span>
                    </div>
                </div>
                <div class="kv-item ue-clear">
                	<label>状 态</label>
                	<div class="kv-item-content">
                    	<span class="choose">
                            <span class="checkboxouter">
                                <input type="radio" <?php echo $val[0]->state ==1 ? 'checked':'';?> name="state" value='1' />
                                <span class="radio"></span>
                            </span>
                            <span class="text">在职</span>
                        </span>
                    	<span class="choose">
                            <span class="checkboxouter">
                                <input type="radio" <?php echo $val[0]->state ==0 ? 'checked':'';?> name="state" value='0' />
                                <span class="radio"></span>
                            </span>
                            <span class="text">离职</span>
                        </span>
                    </div>
                </div>
                <div class="kv-item ue-clear time">
                	<label><span class="impInfo">*</span>入职时间</label>
                	<div class="kv-item-content">
                    	<input type="text" placeholder="入职时间" name='entry' value="<?php echo $val[0]->entry !=0 ? date('Y-m-d H:i:s',$val[0]->entry):'';?>" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" />
                        <i class="time-icon"></i>
                    </div>
                </div>
                <div class="kv-item ue-clear time">
                	<label><span class="impInfo"></span>离职时间</label>
                	<div class="kv-item-content">
                    	<input type="text" placeholder="离职时间" name='quit_time' value="<?php echo $val[0]->quit_time !=0 ? date('Y-m-d H:i:s',$val[0]->quit_time):'';?>" onfocus="WdatePicker({dateFmt:'yyyy-MM-dd HH:mm:ss'})" />
                        <i class="time-icon"></i>
                    </div>
                </div>
                <div class="kv-item ue-clear">
                    <label><span class="impInfo"></span>邮箱</label>
                    <div class="kv-item-content">
                        <input type="text" name="email" value="<?php echo $val[0]->email;?>"  />
                    </div>
                </div>
            </div>
            <div class="subfild-content remarkes-info">
            	<div class="kv-item ue-clear">
                	<label><span class="impInfo"></span>备注内容</label>
                	<div class="kv-item-content">
                    	<textarea placeholder="备注内容" name="description" id="content" style="width:800px;height:50px;"><?php echo $val[0]->description;?></textarea>
                        <input type="hidden" name="uid" value="<?php echo $val[0]->id;?>" />
                    </div>
                </div>
            </div>
            
            <div class="buttons">
                <input class="button" type="submit" value="确认修改" />
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
