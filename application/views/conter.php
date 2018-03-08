<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=emulateIE7" />
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
    <link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/skin_/table.css" />
    <script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
    <script type="text/javascript" src="<?php echo base_url();?>js/nav.js"></script>
    <title>打卡上下班</title>
</head>

<body>
<div id="container">
    <div id="hd"></div>
    <div id="bd">
        <div id="main">
            <div class="table">
                <div class="opt ue-clear">
                	<span class="optarea">
                        <a href="javascript:;" class="add">
                            欢 迎 使 用 广 西 精 桥 网 络 科 技 考 勤 系 统 
                        </a>
                    </span>
                    <span><a href="javascript:;" onclick="reload()">刷新</a></span>
                </div>
            </div>
            <div class="search-box ue-clear">
                <div class="search-button" >
                    <?php
                         if($to_work == 'go_to_work')
                        {
                            echo '<span class="hmess"><input class="button" type="button" id="hhgy"  value="上班" /></span>';
                        }else{
                             echo '<span class="hmess"><a href="javascript:;" class="button hhgy" >上班</a></span>';
                         }
                    ?>

                    <?php
                        if($off_work == 'go_off_work'){
                            echo '<span class="mess"><input class="button" type="button" id="ghgy" value="下班" /></span>';
                        }else{
                            echo '<span class="mess"><a href="javascript:;" class="button ghgy" >下班</a></span>';
                        }
                    ?>
                </div>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
    $(document).ready(function(){
        //上班事件
        $("#hhgy").click(function(){
            var action_url = '<?php echo base_url().'jqmain/to_work' ?>';
            var bol=true;
            $.ajax({
                type: "POST",
                async:false,    //同步处理,默认true异步
                url: action_url,
                success: function (data) {
                    var show = eval('('+data+')');
                    console.log(data);   //data即为后台返回的数据
                    if(show['status']==200)
                    {
						alert(show['mess']);
                        $('.hmess').html('<a href="javascript:;" class="button hhgy" >上班</a>');
                        bol = false;
                    }
                    if(show['status']==300)
                    {
                        alert(show['mess']);
                        $('.mess').text(show['mess']);
                        bol = true;
                    }
                }
            });
            return bol;

        });
        //下班事件
        $("#ghgy").click(function(){
            var action_url = '<?php echo base_url().'jqmain/off_work' ?>';
            var bol=true;
            $.ajax({
                type: "POST",
                async:false,    //同步处理,默认true异步
                url: action_url,
                success: function (data) {
                    var show = eval('('+data+')');
                    console.log(data);   //data即为后台返回的数据
                    if(show['status']==200)
                    {
                        alert(show['mess']);
                        $('.mess').html('<a href="javascript:;" class="button ghgy" >下班</a>');
                        bol = false;
                    }
                    if(show['status']==300)
                    {
                        alert(show['mess']);
                        //$('.mess').text(show['mess']);
                        bol = true;
                    }
                }
            });
            return bol;
        });
    });
</script>
</html>
