<?php
define('GUY','true');
require 'common.inc.php';
if(!isset($_COOKIE['username'])){
	echo'<script type="text/javascript"> alert("非法登录!");location.href="index.php"; </script>';	
	exit;
}

if(@$_GET['del']=='del'){
	mysql_query("delete from news where id='{$_GET['id']}'");
	echo'<script type="text/javascript"> alert("删除记录成功!");location.href="addlook.php"; </script>';	
}

if(isset($_GET['page'])){
	$_page=$_GET['page'];
	if(empty($_page)|| !is_numeric($_page)||$_page<0|| ($_page>0 && $_page<1)){
		$_page=1;
	}else{
		$_page=intval($_page);
	}	
}else{
	$_page=1;
}
$_pagenum=10;
$_results=mysql_query("select id from news");
$_nums=mysql_num_rows($_results);
$_pages=ceil($_nums/$_pagenum);
$_pageopen=($_page-1)*$_pagenum;
$_result2=mysql_query("select * from news order by date DESC limit $_pageopen,$_pagenum");
?>

<!DOCTYPE html>
<html>
<head>
		<meta charset="utf-8">
		<!--声明文档兼容模式，表示使用IE浏览器的最新模式-->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<!--设置视口的宽度(值为设备的理想宽度)，页面初始缩放值<理想宽度/可见宽度>-->
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
		<title>江汉大学新闻管理系统</title>
		<!-- 引入Bootstrap核心样式文件 -->
		<link href="css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php 
require 'head.php';
?>

<div class="container-fluid" style="margin-top: 20px;">
			<div class="row">
			  <?php require 'left.php';?>
			    <div class="col-sm-9">
			      <h2>江汉大学新闻管理系统</h2>
			     <table height="500" width="1200" border="1px solid black" style="text-align:center;"> 
<tr>
<th style="width:50px;text-align:center;">编号</th><th style="width:100px;text-align:center;">新闻分类</th><th style="text-align:center;">新闻标题</th><th style="text-align:center;">新闻来源</th><th>发布时间</th><th style="width:100px;text-align:center;">操作</th>
</tr>
<?php 
while(!!$_row2s=mysql_fetch_array($_result2,MYSQL_ASSOC)){
?>
<tr>
<td><?php echo $_row2s['id'] ?></td><td><?php 
$_result2s=mysql_query("select class from class where id='{$_row2s['uid'] }'");
$_row2=mysql_fetch_array($_result2s);
echo $_row2['class']?></td><td><?php echo $_row2s['title'] ?></td><td><?php echo $_row2s['birth'] ?></td><td><?php echo $_row2s['date'] ?></td><td><a href="modifynews.php?id=<?php echo $_row2s['id']?>">修改</a>　<a href="?id=<?php echo $_row2s['id']?>&del=del">删除</a></td>
</tr>
<?php 	
}?>
</table>
</div>
</div>
</div>

<div class="container-fluid ">
<div class="col-sm-4">&nbsp;</div>
<div class="col-sm-5">
<ul class="pagination pagination-lg navbar-center">

	<li><a><?php echo $_page?>/<?php echo $_pages?>页</a></li>
<li><a>共<?php echo $_nums?>条新闻</a></li>
<?php 
if($_page==1){?>
<li><a>首页</a></li>
<li><a>上一页</a></li>	
<?php }else{?>
<li><a href="?page=1">首页</a></li>
<li><a href="?page=<?php echo $_page-1?>">上一页</a></li>	
<?php }
?>

<?php 
if($_page==$_pages|| $_nums==0){?>
<li><a>下一页</a></li>
<li><a>尾页</a></li>	
<?php }else{?>
<li><a href="?page=<?php echo $_page+1?>">下一页</a></li>
<li><a href="?page=<?php echo $_pages?>">尾页</a></li>				
<?php }
?>
</ul></div>
</div>
		
<?php
require 'foot.php';
?>
<?php 
mysql_free_result($_results);
mysql_close();
?>
<!-- 引入jQuery核心js文件 -->
		<script src="js/jquery-1.11.0.min.js"></script>
		<!-- 引入BootStrap核心js文件 -->
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
