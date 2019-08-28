<?php
define('GUY','true');
require 'common.inc.php';
if(!isset($_COOKIE['username'])){
	echo'<script type="text/javascript"> alert("非法登录!");location.href="login.php"; </script>';	
	exit;
}
if(@$_GET['action']=='add'){
	$_html=array();
	$_html['name']=trim($_POST['name']);
	$_html['pagenums']=$_POST['pagenums'];	
	$_html['newsnums']=$_POST['newsnums'];	
	$_html['hotnums']=$_POST['hotnums'];			
	$_html['copy']=trim($_POST['copy']);
	
	mysql_query("update system set name='{$_html['name']}',
	pagenums='{$_html['pagenums']}',
	newsnums='{$_html['newsnums']}',
	hotnums='{$_html['hotnums']}',
	copy='{$_html['copy']}'");	
	echoalert('添加修改成功!');
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
			<h2>添加系统参数</h2>
			<form role="form" method="post" action="?action=addclass">
						<div class="form-group">
						<?php  
						$_result=mysql_query("select * from system");
                        $_rows=mysql_fetch_array($_result);
                        ?>
		<label for="name">网站　名称：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="name" value="<?php echo $_rows['name']?>"><br />
		<hr class="hidden-sm hidden-md hidden-lg">
		<label for="name">每页新闻数：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="pagenums" value="<?php echo $_rows['pagenums']?>"><br />
		<hr class="hidden-sm hidden-md hidden-lg">
		<label for="name">最新新闻数：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="newsnums" value="<?php echo $_rows['newsnums']?>"><br />
		<hr class="hidden-sm hidden-md hidden-lg">
		<label for="name">热门新闻数：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="hotnums" value="<?php echo $_rows['newsnums']?>"><br />
		<hr class="hidden-sm hidden-md hidden-lg">
		<label for="name">底部　版权：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="copy" value="<?php echo $_rows['copy']?>"><br />
		<hr class="hidden-sm hidden-md hidden-lg">
<input type="submit" value="提交" class="form-control"><br />
</div>
</form>
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
