<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" href="<?php echo base_url();?>css/zTreeStyle/zTreeStyle.css" type="text/css">
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/skin_/nav.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/global.js"></script>
<title>底部内容页</title>
</head>

<body>
<div id="container">
	<div id="bd">
    	<div class="sidebar">
        	<div class="sidebar-bg"></div>
            <i class="sidebar-hide"></i>
            <h2><a href="javascript:;"><i class="h2-icon" title="切换到树型结构"></i><span>安全管理</span></a></h2>
            <ul class="nav">
				<?php if($this->session->userdata('username')=='admin'){?>
                <li class="nav-li">
                	<a href="javascript:;" class="ue-clear"><i class="nav-ivon"></i><span class="nav-text">新闻管理</span></a>
                    <ul class="subnav">
                    	<li class="subnav-li" href="index.html" data-id="8">
						<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">新闻视频管理</span></a>
						</li>
                        <li class="subnav-li" href="form.html" data-id="9">
						<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">新闻频道管理</span></a>
						</li>
                        <li class="subnav-li" href="table.html" data-id="10">
						<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">地方新闻管理</span></a>
						</li>
                        <li class="subnav-li" data-id="11">
						<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">自定义设置1</span></a>
						</li>
                    </ul>
                </li>
				<?php }?>
                <li class="nav-li current">
                	<a href="javascript:;" class="ue-clear"><i class="nav-ivon"></i><span class="nav-text">用户信息管理</span></a>
                	<ul class="subnav">
                    	<li class="subnav-li current" href="<?php echo base_url();?>jqmain/right_conter" data-id="1">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">打卡上班</span></a>
						</li>
                        <li class="subnav-li" href="<?php echo base_url();?>jqmain/attendance" data-id="2">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">当月考勤</span></a>
						</li>
						<?php if($this->session->userdata('username')=='admin'){?>
                        <li class="subnav-li" href="" data-id="3">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">公司通信录</span></a>
						</li>
                        <li class="subnav-li" href='' data-id="4">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">工作日报</span></a>
						</li>
						<li class="subnav-li" href='<?php echo base_url();?>jqmain/admin' data-id="15">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">员工列表</span></a>
						</li>
						<li class="subnav-li" href='<?php echo base_url();?>jqmain/attend_user' data-id="16">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">员工考勤表</span></a>
						</li>
						<?php }?>
                    </ul>
                </li>
				<?php if($this->session->userdata('username')=='admin'){?>
                <li class="nav-li">
                	<a href="javascript:;" class="ue-clear"><i class="nav-ivon"></i><span class="nav-text">工作安排</span></a>
                    <ul class="subnav">
                    	<li class="subnav-li" data-id="5">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">工作安排查询1</span></a>
						</li>
                        <li class="subnav-li" data-id="6">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">安排管理1</span></a>
						</li>
                        <li class="subnav-li" data-id="7">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">类型选择1</span></a>
						</li>
                    </ul>
                </li>
                <li class="nav-li last-nav-li">
                	<a href="javascript:;" class="ue-clear"><i class="nav-ivon"></i><span class="nav-text">数据管理</span></a>
                    <ul class="subnav">
                    	<li class="subnav-li" data-id="12">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">工作安排查询2</span></a>
						</li>
                        <li class="subnav-li" data-id="13">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">安排管理2</span></a>
						</li>
                        <li class="subnav-li" data-id="14">
							<a href="javascript:;" class="ue-clear"><i class="subnav-icon"></i><span class="subnav-text">类型选择2</span></a>
						</li>
                    </ul>
                </li>
            </ul>
			<?php }?>
            <div class="tree-list outwindow">
            	<div class="tree ztree"></div>
            </div>
        </div>
        <div class="main">
        	<div class="title">
                <i class="sidebar-show"></i>
                <ul class="tab ue-clear">
                </ul>
                <i class="tab-more"></i>
                <i class="tab-close"></i>
            </div>
            <div class="content">

            </div>
        </div>
    </div>
</div>

<div class="more-bab-list">
	<ul></ul>
    <div class="opt-panel-ml"></div>
    <div class="opt-panel-mr"></div>
    <div class="opt-panel-bc"></div>
    <div class="opt-panel-br"></div>
    <div class="opt-panel-bl"></div>
</div>
</body>
<script type="text/javascript" src="<?php echo base_url();?>js/nav.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/Menu.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.ztree.core-3.5.js"></script>
<script type="text/javascript">
	var menu = new Menu({
		defaultSelect: $('.nav').find('li[data-id="1"]')	
	});

	$(document).click(function(e) {
		if(!$(e.target).is('.tab-more')){
			 $('.tab-more').removeClass('active');
			 $('.more-bab-list').hide();
		}
    });
</script>
</html>
