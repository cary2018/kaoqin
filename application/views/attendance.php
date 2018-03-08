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
    <div id="hd">
        
    </div>
    <div class="table">
        <span style="padding:20px;"><a href="javascript:;" onclick="reload()">刷新</a></span>
    </div>
    <div id="bd">
        <div id="main">
            <table class="ui-table">
                <tr>
                    <th class="table-txt" width="100">星期</th>
                    <th class="table-txt" width="200">上班时间</th>
                    <th class="table-txt" width="200">下班时间</th>
                    <th ></th>
                </tr>
                <?php foreach ($list as $val) : ?>
                    <tr>
                        <td class="table-txt"><?php echo date('N',$val->up_work)==7 ? '星 期 天' : '星 期 '.date('N',$val->up_work) ; ?></td>
                        <td class="table-txt"><?php echo date('Y-m-d H:i:s',$val->up_work); ?></td>
                        <td class="table-txt"><?php if($val->do_work !=0 ){ echo date('Y-m-d H:i:s',$val->do_work);} ?></td>
                        <td></td>
                    </tr>
                <?php endforeach ;?>
            </table>
            <div class="pagination">
                <?php echo $page; ?>
            </div>
        </div>
    </div>
</div>
</body>
<script type="text/javascript">
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
</html>
