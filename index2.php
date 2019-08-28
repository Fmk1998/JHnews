<?php
header('content-type:text/html;charset=utf-8;');
define('GUY','true');
require 'common.inc.php';
if(!isset($_COOKIE['username'])){
	echo'<script type="text/javascript"> alert("非法登录!");location.href="login.php"; </script>';	
	exit;
}
global $_system;
?>
<!DOCTYPE>
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
	<?php require 'left2.php';?>
		<div class="col-sm-7">
			<h2>江汉大学新闻管理系统</h2>
			<div class="fakeimg"><img src="img/whxy_head.jpg" width="800" height="400"/></div>
		</div>
	<?php require 'right2.php';?>
	</div>
</div>

<?php
require 'foot.php';
?>

<!-- 引入jQuery核心js文件 -->
		<script src="js/jquery-1.11.0.min.js"></script>
		<!-- 引入BootStrap核心js文件 -->
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
