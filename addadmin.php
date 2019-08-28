<?php
define('GUY','true');
require 'common.inc.php';
if(!isset($_COOKIE['username'])){
	echo'<script type="text/javascript"> alert("非法登录!");location.href="index.php"; </script>';	
	exit;
}
if(@$_GET['action']=='addadmin'){
	$_html=array();
	$_html['name']=trim($_POST['name']);
    $_html['pwd']=trim($_POST['pwd']);	
	if($_html['name']!=null){
	mysql_query("insert into admin (admin,password) values('{$_html['name']}','{$_html['pwd']}')");
	echoalerthistory('添加成功');	
	}else{
		echo'<script type="text/javascript"> alert("用户名不能为空!");location.href="index.php"; </script>';	
	}

}

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
			<div>
						<h3>添加管理员</h3>
						<form role="form" method="post" action="?action=addadmin">
						<div class="form-group">
		<label for="name">用户名：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="name" placeholder="文本输入"><br />
		<hr class="hidden-sm hidden-md hidden-lg">
		<label for="name">密码：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="pwd" placeholder="文本输入"><br />
		<hr class="hidden-sm hidden-md hidden-lg">
<input type="submit" value="添加" class="form-control"><br />
</div>
</form>
</div>


		</div>
	<?php require 'right2.php';?>
	</div>
</div>

<?php
require 'foot.php';
?>
<?php 
mysql_free_result($_result);
mysql_close();
?>
<!-- 引入jQuery核心js文件 -->
		<script src="js/jquery-1.11.0.min.js"></script>
		<!-- 引入BootStrap核心js文件 -->
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
