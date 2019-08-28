<?php
define('GUY','true');
require 'common.inc.php';
global $_system;

if(isset($_POST['key'])){
	$_key=trim($_POST['key']);
}else{
	echo '<script type="text/javascript">alert("非法访问!");location.href="index.php";</script>';
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
$_pagenums=$_system['pagenums'];
$_pageopen=($_page-1)*$_pagenums;
$_result=mysql_query("select id from news where title like '%$_key%'");
$_nums=mysql_num_rows($_result);
$_pages=ceil($_nums/$_pagenums);
$_results=mysql_query("select id,title,date from news  where title like '%$_key%' order by date DESC limit $_pageopen,$_pagenums");

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
			      <ul style="font-size:30px;">
				  <?php 
while(!!$_rows=mysql_fetch_array($_results)){
?>
<li><span><?php echo $_rows['date'] ?></span><a href="sqlgunnews.php?id=<?php echo $_rows['id'] ?>"><?php echo $_rows['title'] ?></a></li>
<?php }?>
</ul>



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
