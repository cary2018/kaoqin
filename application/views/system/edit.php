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
        <form action="/systems/edit" class="layui-form" method="post">
    	<div id="main">
            <h2 class="subfild">
            	<span>基本信息</span>
                <span><a href="javascript:;" onclick="reload()">刷新</a></span>
            </h2>
            <div class="subfild-content base-info">
            	<div class="kv-item ue-clear">
                	<label><span class="impInfo">*</span>系统变量名</label>
                	<div class="kv-item-content">
                    	<input type="text" name="item" placeholder="变量名,建议大写英文字母" disabled style="cursor:not-allowed;background:#eee;" value="<?php echo $list[0]->item;?>" />
                    	<input type="hidden" name="id" value="<?php echo $list[0]->id;?>" />
                    </div>
                    <span class="kv-item-tip">例：SYS_UP_WORK</span>
                </div>
                <div class="kv-item ue-clear">
                    <label><span class="impInfo"></span>路由地址</label>
                    <div class="kv-item-content">
                        <input type="text" name="route" value="<?php echo $list[0]->route;?>" />
                    </div>
                    <span class="kv-item-tip">例： /user/index</span>
                </div>
                <div class="kv-item ue-clear time">
                	<label><span class="impInfo"></span>参数值</label>
                	<div class="kv-item-content">
                    	<input type="text" placeholder="参数值" name='data' value="<?php echo $list[0]->data;?>" />
                    </div>
                    <span class="kv-item-tip">注：可输入字符串，或时间格式</span>
                </div>
                <div class="kv-item ue-clear">
                	<label>类 型</label>
                	<div class="kv-item-content">
                    	<span class="choose">
                            <label style="line-height:16px;cursor:pointer;">
                                <span class="checkboxouter">
                                    <input type="radio" <?php if($list[0]->type == 0){echo 'checked';} ?> name="type" value='0' />
                                    <span class="radio"></span>
                                </span>
                                <span class="text">系统变量</span>
                            </label>
                        </span>
                    	<span class="choose">
                            <label style="line-height:16px;cursor:pointer;">
                                <span class="checkboxouter">
                                    <input type="radio" <?php if($list[0]->type == 1){echo 'checked';}?> name="type" value='1' />
                                    <span class="radio"></span>
                                </span>
                                <span class="text">后台菜单</span>
                            </label>
                        </span>
                    </div>
                </div>
            </div>
            <div class="subfild-content remarkes-info">
            	<div class="kv-item ue-clear">
                	<label><span class="impInfo"></span>备注内容</label>
                	<div class="kv-item-content">
                    	<textarea placeholder="备注内容" name="description" id="content" style="width:800px;height:50px;"><?php echo $list[0]->description;?></textarea>
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
