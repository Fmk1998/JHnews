<?php
define('GUY','true');
require 'common.inc.php';
if(isset($_GET['id'])){
	$_html['id']=$_GET['id'];
	if(empty($_html['id']) || !is_numeric($_html['id']) || $_html['id']<0 || ($_html['id']>0 && $_html['id']<1)){
	echo '<script type="text/javascript">alert("非法访问!");location.href="index.php";</script>';
	exit;
	}else{
	$_html['id']=intval($_html['id']);	
	}
}else{
	echo '<script type="text/javascript">alert("非法访问!");location:index.php;</script>';
	exit;	
}
$_result=mysql_query("select title,hits from news where id='{$_html['id']}'");
$_rows=mysql_fetch_array($_result);
$_html['title']=$_rows['title'];
$_html['hits']=$_rows['hits'];

global $_system;
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

<?php require 'head.php';?>
			
		<div class="container-fluid" style="margin-top: 20px;">
			<div class="row">
			  <?php require 'left.php';?>
			    <div class="col-sm-9">
			      <h2>江汉大学新闻管理系统</h2>
			      <dl>
<?php 
$_result=mysql_query("select title,birth,date,content from news where id='{$_html['id']}'");
$_rows=mysql_fetch_array($_result);
$_a='/onmousemove="(.*)"/';
$_b='';
?>
<dt><?php echo $_rows['title']?></dt>
<dd class="dd1"><?php echo $_rows['date']?></dd>
<dd class="dd1"><?php echo $_rows['birth']?></dd>
<dd class="dd2"><?php echo preg_replace($_a,$_b,$_rows['content'])?></dd>
</dl>
<?php 
mysql_query("update news set hits='{$_html['hits']}'+1 where id='{$_html['id']}'")
?>
			    </div>
			  </div>
		</div>


<?php
require 'foot.php';
?>
<?php 
mysql_close();
?>
<!-- 引入jQuery核心js文件 -->
		<script src="js/jquery-1.11.0.min.js"></script>
		<!-- 引入BootStrap核心js文件 -->
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
