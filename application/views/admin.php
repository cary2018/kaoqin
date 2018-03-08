<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="X-UA-Compatible" content="IE=emulateIE7" />
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/style.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/WdatePicker.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/skin_/table.css" />
<link rel="stylesheet" type="text/css" href="<?php echo base_url();?>css/jquery.grid.css" />
<script type="text/javascript" src="<?php echo base_url();?>js/jquery.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>js/nav.js"></script>
<title>员工列表</title>
</head>

<body>
<div id="container">
	<div id="hd"></div>
    <div id="bd">
    	<div id="main">
             
            <div class="table">
            	<div class="opt ue-clear">
                	<span class="optarea">
                        <a href="<?php echo base_url()?>/jqmain/adduser" class="add">
                            <i class="icon"></i>
                            <span class="text">添加</span>
                            <span class="text"><a href="javascript:;" onclick="reload()">刷新</a></span>
                        </a>
                    </span>
                                <form method="post" action="<?php echo base_url();?>jqmain/admin" id="serform">
                <div class="kv-item ue-clear">
                    <label>在职状态:</label>
                    <div class="kv-item-content">
                        <select name="staid" onchange="changeuser()" >
                            <option value="">全部</option>
                                <option value="1" <?php if( $this->input->get_post('staid')==1){?> selected = "selected"<?php }?>>在职</option>
                                <option value="0" <?php if( $this->input->get_post('staid')!='' && $this->input->get_post('staid')==0){?> selected = "selected"<?php }?>>离职</option>
                        </select>
                    </div>
                </div>
            </form>
                </div>
                <table class="ui-table">
                    <tr>
                        <th class="table-txt" >序号</th>
                        <th class="table-txt" >用户名</th>
                        <th class="table-txt" >性别</th>
                        <th class="table-txt" >身份证号码</th>
                        <th class="table-txt" >家庭住址</th>
                        <th class="table-txt" >入职时间</th>
                        <th class="table-txt" >离职时间</th>
                        <th class="table-txt" >联系电话</th>
                        <th class="table-txt" >在职状态</th>
                        <th class="table-txt" >操作</th>
                    </tr>
					<?php $i=1;?>
                    <?php foreach ($list as $val) : ?>
                        <tr>
                            <td class="table-txt"><?php echo $i++; ?></td>
                            <td class="table-txt">
                                <a href="<?php echo base_url()?>jqmain/edit?id=<?php echo $val->id;?>"><?php echo $val->username; ?></a>
                            </td>
                            <td class="table-txt"><?php echo $val->sex ==1 ? '男':'女'; ?></td>
                            <td class="table-txt"><?php echo $val->id_unmber; ?></td>
                            <td class="table-txt"><?php echo $val->address; ?></td>
                            <td class="table-txt"><?php echo $val->entry !=0 ? date('Y-m-d H:i:s',$val->entry):''; ?></td>
                            <td class="table-txt"><?php echo $val->quit_time !=0 ? date('Y-m-d H:i:s',$val->quit_time):''; ?></td>
                            <td class="table-txt"><?php echo $val->phone; ?></td>
                            <td class="table-txt"><img src="<?php echo base_url().'img/';?><?php echo $val->state ==1 ? 'yes':'no'; ?>.gif"></td>
                            <td class="table-txt">
                                <a href="<?php echo base_url()?>jqmain/edit?id=<?php echo $val->id;?>">修改</a>/
                                <!--<a href="<?php echo base_url()?>jqmain/del?id=<?php echo $val->id;?>">删除</a>-->
                            </td>
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
<script type="text/javascript">
    //搜索
    function changeuser(){
        $("#serform").submit();
    }
     $(function(){
            var item = $("tr"); 
            for(var i=0;i<item.length;i++){ 
                if(i%2==0){ 
                    item[i].style.backgroundColor="#B0DBEF";
                } 
            } 
            //$("#tb tbody tr:even").css("backgroundColor","#888"); 
  
        });
</script>
</body>
</html>
