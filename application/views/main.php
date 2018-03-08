<?php
error_reporting(0); //抑制所有错误信息
@header("content-Type: text/html; charset=utf-8"); //语言强制

$stime = date("Y-n-j H:i:s")." &nbsp;星期" . mb_substr( "日一二三四五六",date("w"),1,"utf-8" );

//ajax调用实时刷新
if ($_GET['act'] == "rt")
{
	$arr=array('stime'=>"$stime");
	$jarr=json_encode($arr); 
	echo $_GET['callback'],'(',$jarr,')';
	exit;
}
?>
<script language="JavaScript" type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript"> 
<!--
$(document).ready(function(){getJSONData();});
function getJSONData()
{
	setTimeout("getJSONData()", 1000);
	$.getJSON('?act=rt&callback=?', displayData);
}
function displayData(dataJSON)
{
	$("#stime").html(dataJSON.stime);
}
-->
</script>

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/skin_/main.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.dialog.css" />
<script language="JavaScript" type="text/javascript" src="http://lib.sinaapp.com/js/jquery/1.7/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/global.js"></script>
<title>广西精桥网络科技员工考勤管理系统</title>
</head>
<?php

error_reporting(0); //抑制所有错误信息

$stime = date("Y-n-j H:i:s");

//ajax调用实时刷新
if ($_GET['act'] == "rt")
{
	$arr=array('stime'=>"$stime");
	$jarr=json_encode($arr); 
	echo $_GET['callback'],'(',$jarr,')';
	exit;
}
?>
<script type="text/javascript"> 
<!--
$(document).ready(function(){getJSONData();});
function getJSONData()
{
	setTimeout("getJSONData()", 1000);
	$.getJSON('?act=rt&callback=?', displayData);
}
function displayData(dataJSON)
{
	$("#stime").html(dataJSON.stime);
}
-->
</script>

<body>
<div id="container">
	<div id="hd">
    	<div class="hd-top">
            <h1 class="logo"></h1>
            <div class="user-info">
                <a href="javascript:;" class="user-avatar"><span></span></a>
                <span class="user-name"><?php echo $this->session->userdata('username');?></span>
            </div>
            <div style="text-align: center;float: left;line-height:49px;color:#fff;width:50%;font-size:28px;">
                <span><div id="stime"><?php echo $stime;?></div></span>
            </div>
            <div class="setting ue-clear">

                <ul class="setting-main ue-clear">
                	<li><a href="javascript:;">桌面</a></li>
                    <li><a href="javascript:;">设置</a></li>
                    <li><a href="javascript:;">帮助</a></li>
                    <li><a href="javascript:;" class="close-btn exit"></a></li>
                </ul>
            </div>
        </div>
        <div class="hd-bottom">
        	<i class="home"><a href="javascript:;"></a></i>
        	<div class="nav-wrap">
                <ul class="nav ue-clear">
                    <li style='width:100%;padding-left:10px;font-size:20px;'><a href="javascript:;">广西精桥网络科技有限公司</a></li>
                </ul>
            </div>
            <div class="nav-btn">
            	<a href="javascript:;" class="nav-prev-btn"></a>
                <a href="javascript:;" class="nav-next-btn"></a>
            </div>
        </div>
    </div>
    <div id="bd">
        <iframe width="100%" height="100%" id="mainIframe" src="<?php echo base_url();?>jqmain/jqnav" frameborder="0"></iframe>
    </div>
    
    <div id="ft" class="ue-clear">
    	<div class="ft1 ue-clear">
        	<i class="ft-icon1"></i>
            <span>广西精桥网络科技有限公司</span>
        </div>
    </div>
</div>

<div class="exitDialog">
	<div class="content">
    	<div class="ui-dialog-icon"></div>
        <div class="ui-dialog-text">
        	<p class="dialog-content">你确定要退出系统？</p>
            <p class="tips">如果是请点击“确定”，否则点“取消”</p>
            
            <div class="buttons">
                <input type="button" class="button long2 ok" value="确定" />
                <input type="button" class="button long2 normal" value="取消" />
            </div>
        </div>
        
    </div>
</div>

</body>
<script type="text/javascript" src="<?php echo base_url();?>js/core.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.dialog.js"></script>
<script type="text/javascript">
$("#bd").height($(window).height()-$("#hd").outerHeight()-26);

$(window).resize(function(e) {
    $("#bd").height($(window).height()-$("#hd").outerHeight()-26);

});

$('.exitDialog').Dialog({
	title:'提示信息',
	autoOpen: false,
	width:400,
	height:200
});

$('.exit').click(function(){
	$('.exitDialog').Dialog('open');
});

$('.exitDialog input[type=button]').click(function(e) {
    $('.exitDialog').Dialog('close');
	
	if($(this).hasClass('ok')){
		window.location.href = "<?php echo base_url();?>login/logout";
	}
});

(function(){
	var totalWidth = 0, current = 1;
	
	$.each($('.nav').find('li'), function(){
		totalWidth += $(this).outerWidth();
	});
	
	$('.nav').width(totalWidth);
	
	function currentLeft(){
		return -(current - 1) * 93;	
	}
	
	$('.nav-btn a').click(function(e) {
		var tempWidth = totalWidth - ( Math.abs($('.nav').css('left').split('p')[0]) + $('.nav-wrap').width() );
        if($(this).hasClass('nav-prev-btn')){
			if( parseInt($('.nav').css('left').split('p')[0])  < 0){
				current--;
				Math.abs($('.nav').css('left').split('p')[0]) > 93 ? $('.nav').animate({'left': currentLeft()}, 200) : $('.nav').animate({'left': 0}, 200);
			}
		}else{

			if(tempWidth  > 0)	{
				
			   	current++;
				tempWidth > 93 ? $('.nav').animate({'left': currentLeft()}, 200) : $('.nav').animate({'left': $('.nav').css('left').split('p')[0]-tempWidth}, 200);
			}
		}
    });
	
	$.each($('.skin-opt li'),function(index, element){
		if((index + 1) % 3 == 0){
			$(this).addClass('third');	
		}
		$(this).css('background',$(this).attr('attr-color'));
	});
	
	$('.setting-skin').click(function(e) {
        $('.skin-opt').show();
    });
	
	$('.skin-opt').click(function(e) {
        if($(e.target).is('li')){
			alert($(e.target).attr('attr-color'));	
		}
    });
	
	$('.hd-top .user-info .more-info').click(function(e) {
       $(this).toggleClass('active'); 
	   $('.user-opt').toggle();
    });
	
	$('.logo-icon').click(function(e) {
         $(this).toggleClass('active'); 
	     $('.system-switch').toggle();
    });
	
	hideElement($('.user-opt'), $('.more-info'), function(current, target){

		$('.more-info').removeClass('active'); 
	});
	
	hideElement($('.skin-opt'), $('.switch-bar'));
	
	hideElement($('.system-switch'), $('.logo-icon'), function(current, target){

		$('.logo-icon').removeClass('active'); 
	});
	
})();

</script>

</html>
