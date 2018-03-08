<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="/css/style.css" />
<link rel="stylesheet" type="text/css" href="/css/WdatePicker.css" />
<link rel="stylesheet" type="text/css" href="/css/skin_/table.css" />
<link rel="stylesheet" type="text/css" href="/css/jquery.grid.css" />
<script type="text/javascript" src="/js/jquery.js"></script>
<script type="text/javascript" src="/laydate/laydate.js"></script>
<title>员工列表</title>
</head>

<body>
<div id="container">
	<div id="hd"></div>
    <div id="bd">
    	<div id="main">
            <form method="get" action="/jqmain/attend_user" id="serform">
                <div class="kv-item ue-clear">
                    <label>选择用户:</label>
                    <div class="kv-item-content">
                        <select name="uid" onchange="changeuser()" >
                            <option value="">全部</option>
                            <?php foreach ($user AS $val) :?>
                                <option value="<?php echo $val->id ?>" <?php if($val->id == $this->input->get_post('uid')){?> selected = "selected"<?php }?>><?php echo $val->username ; ?></option>
                            <?php endforeach;?>
                        </select>
                    </div>
                    <label><span class="impInfo">*</span>起始时间</label>
                    <div class="kv-item-content">
                        <input id="date" readonly type="text" value="<?php echo $this->input->get_post('start_date') ?>" name="start_date" style="width:130px;"/>
                    </div>
                    <label><span class="impInfo">*</span>结束时间</label>
                    <div class="kv-item-content">
                        <input id="date2" readonly type="text" value="<?php if($this->input->get_post('end_date')){echo $this->input->get_post('end_date');}else{echo date('Y-m-d H:i:s');} ?>" name="end_date" style="width:130px;"/>
                    </div>
                    <input type="submit" name="submit" class="button" value="搜索"/>
                </div>
            </form>
            <div class="table">
            	<div class="opt ue-clear add">
                    <i class="icon"></i>
                   <h2><span class="text"><a href="javascript:;" onclick="reload()">刷新</a></span></h2>
                </div>
                <table class="ui-table">
                    <tr>
                        <th class="table-txt" >序号</th>
                        <th class="table-txt" >星期</th>
                        <th class="table-txt" >用户名</th>
                        <th class="table-txt" >上班</th>
                        <th class="table-txt" >下班</th>
                        <th class="table-txt" >上班IP</th>
                        <th class="table-txt" >下班IP</th>
                        <th class="table-txt" >备注</th>
                    </tr>
                    <?php $i=1;?>
                    <?php foreach ($list as $val) : ?>
                        <tr>
                            <td class="table-txt"><?php echo $i++ ; ?></td>
                            <td class="table-txt"><?php echo date('N',$val->up_work)==7 ? '星 期 天' : '星 期 '.date('N',$val->up_work) ; ?></td>
                            <td class="table-txt"><?php echo $val->username; ?></td>
                            <td class="table-txt"><?php echo date('Y-m-d H:i:s',$val->up_work); ?></td>
                            <td class="table-txt"><?php echo $val->do_work == 0 ? '' : date('Y-m-d H:i:s',$val->do_work); ?></td>
                            <td class="table-txt">
                                <?php echo $val->ip_upwork;?>
                                <!-- <a href="<?php echo base_url()?>jqmain/edit?id=<?php echo $val->id;?>">修改</a>
                                <a href="<?php echo base_url()?>jqmain/del?id=<?php echo $val->id;?>">删除</a>-->
                            </td>
                            <td class="table-txt">
                                <?php echo $val->ip_dowork;?>
                            </td>
                            <td class="addes table-txt" alt="<?php echo $val->id;?>" id="addesc<?php echo $val->id;?>"><?php echo $val->description==''?'添加':$val->description;?></td>
                        </tr>
                    <?php endforeach ;?>
                </table>
                <div class="pagination">
                    <?php echo $page; ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="description" style="display:none;opacity: 0.4;filter: alpha(opacity=40);position:absolute;margin:0;top:0;width:100%;height:200%;z-index:15;background:#000;"></div>
<div id="explain" style="display:none;z-index: 25;background:#fff;position:absolute;width:300px;margin: 0 auto 0;left:150px;top:150px;text-align: center;">
    <span id="showtext"></span>
    <span class="hmess"><input class="button" type="button" id="hhgy"  value="确定" /></span>
    <span class="hmess"><input class="button" type="button" id="close"  value="关闭" /></span>
</div>
<script>
    //执行一个laydate实例
    laydate.render({
        elem: '#date' //指定元素
        ,type: 'datetime'
    });
    //执行一个laydate实例
    laydate.render({
        elem: '#date2' //指定元素
        ,type: 'datetime'
    });
</script>
<script type="text/javascript">
     $(function(){
            var item = $("tr"); 
            for(var i=0;i<item.length;i++)
            { 
                if(i%2==0){ 
                    item[i].style.backgroundColor="#B0DBEF";
                }
            }
            //$("#tb tbody tr:even").css("backgroundColor","#888");
            $("#close").click(function(){
                $("#description").hide();
                $("#explain").hide();
            });
            $(".addes").click(function()
            {
                var ord = $(this);
                var id = ord.attr('alt');
                var mess = ord.text();
                if(mess != '添加')
                {
                    var showtext = '<textarea placeholder="备注内容" id="content" name="description" alt="'+id+'" style="width:200px;height:120px;">'+mess+'</textarea>';
                }
                else
                {
                    var showtext = '<textarea placeholder="备注内容" id="content" name="description" alt="'+id+'" style="width:200px;height:120px;"></textarea>';
                }
                $("#showtext").html(showtext);
                $("#description").show();
                $("#explain").show();
            });

            $("#hhgy").click(function()
            {
                var uid = $("#content").attr('alt');
                var ymess = $("#addesc"+uid).text();
                var mess = $("#content").val();
                $("#description").hide();
                $("#explain").hide();
                //alert(ymess);
                if(mess != '' && ymess != mess)
                {
                    $.post('/jqmain/ajax_up',{
                        uid:uid,
                        mess:mess
                    },function(data,status){
                        var object = eval('('+data+')');
                        $('#addesc'+uid).html(object.mess);
                        //alert(object.result+'----'+object.oval+status);
                    });
                }
            })
        });
    //刷新
    function reload(){
        window.location.reload();
    }

    //搜索
    function changeuser(){
        $("#serform").submit();
    }
</script>
</body>
</html>