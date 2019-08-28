<?php
define('GUY','true');
require 'common.inc.php';
if(!isset($_COOKIE['username'])){
	echo'<script type="text/javascript"> alert("非法登录!");location.href="index.php"; </script>';	
	exit;
}
if(@$_GET['action']=='addclass'){
	$_html=array();
	$_html['name']=trim($_POST['name']);	
	if($_POST['typeid']=='one'){
	mysql_query("insert into class (class,typeid,uptypeid) values('{$_html['name']}',1,0)");
	echoalerthistory('添加成功');	
	}else{
	$_result=mysql_query("select id,typeid from class where class='{$_POST['typeid']}'");	
	$_rows=mysql_fetch_array($_result,MYSQL_ASSOC);
	$_html['uptypeid']=$_rows['id'];
	$_html['typeid']=$_rows['typeid']+1;
	mysql_query("insert into class (class,typeid,uptypeid) values('{$_html['name']}','{$_html['typeid']}','{$_html['uptypeid']}')");	
	echoalerthistory('添加成功');
	}

}

if(@$_GET['action']=='modify'){
	if(empty($_POST['name'])){
		echoalerthistory('请填写新的分类名!');
	}
	$_html=array();
	$_html['name']=trim($_POST['name']);	
	if($_POST['typeid']=='one'){
	echoalerthistory('您没有选择要修改的分类名');	
	}else{
	$_result=mysql_query("select id from class where class='{$_POST['typeid']}'");	
	$_rows=mysql_fetch_array($_result,MYSQL_ASSOC);
	$_html['id']=$_rows['id'];
	mysql_query("update class set class='{$_html['name']}' where id='{$_html['id']}'");	
	echoalerthistory('修改成功');
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
						<h3>添加新闻分类(可无限分类 )</h3>
						<form role="form" method="post" action="?action=addclass">
						<div class="form-group">
		<label for="name">添加分类名：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="name" placeholder="文本输入"><br />
		<hr class="hidden-sm hidden-md hidden-lg">
		<label for="name">所属　分类：</label>
		<select name="typeid">
<option value="one">做为一级分类</option>
<?php
$_result=mysql_query("select id,class from class where typeid=1");
while (!!$_rows=mysql_fetch_array($_result,MYSQL_ASSOC)) { ?>
<option value="<?php echo $_rows['class']?>"><?php echo $_rows['class']?></option>
<?php tree($_rows['id'],1);
}
?>
</select><br />
		<hr class="hidden-sm hidden-md hidden-lg">
<input type="submit" value="添加" class="form-control"><br />
</div>
</form>
</div>

<div>
						<h3>修改新闻分类</h3>
						<form role="form" method="post" action="?action=modify">
						<div class="form-group">
		<label for="name">修改分类名：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="name" placeholder="文本输入"><br />
		<hr class="hidden-sm hidden-md hidden-lg">
		<label for="name">所属　分类：</label>
		<select name="typeid">
<option value="one">做为一级分类</option>
<?php
$_result=mysql_query("select id,class from class where typeid=1");
while (!!$_rows=mysql_fetch_array($_result,MYSQL_ASSOC)) { ?>
<option value="<?php echo $_rows['class']?>"><?php echo $_rows['class']?></option>
<?php tree($_rows['id'],1);
}
?>
</select><br />
		<hr class="hidden-sm hidden-md hidden-lg">
<input type="submit" value="修改" class="form-control"><br />
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
