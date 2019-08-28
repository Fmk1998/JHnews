<?php
define('GUY','true');
require 'common.inc.php';
if(!isset($_COOKIE['username'])){
	echo'<script type="text/javascript"> alert("非法登录!");location.href="login.php"; </script>';	
	exit;
}

if(isset($_GET['id']) && !empty($_GET['id']) && is_numeric($_GET['id'])){
	$_result=mysql_query("select * from news where id='{$_GET['id']}'");
	$_rows=mysql_fetch_array($_result);
	define('ROWS',$_rows['uid']);
}else{
	echoalerthistory('非法提交!');
}


function tre($_id,$_num){

$_resultt=mysql_query("select id,class from class where uptypeid='{$_id}'");
while(!!$_roww=mysql_fetch_array($_resultt,MYSQL_ASSOC)){
	if(ROWS==$_roww['id']){
echo "<option value='".$_roww['id']."' selected='selected'>".str_repeat('　',$_num)."|-{$_roww['class']}</option>";}else{
echo "<option value='".$_roww['id']."'>".str_repeat('　',$_num)."|-{$_roww['class']}</option>";	
	}
tre($_roww['id'],$_num+1);
}
}

if(@$_GET['action']=='modify'){
	$_html=array();
	$_html['title']=trim($_POST['title']);
	$_html['uid']=$_POST['uid'];	
	$_html['birth']=trim($_POST['birth']);
	$_html['content']=trim($_POST['content']);
	
	mysql_query("update news set 
	title='{$_html['title']}',uid='{$_html['uid']}',
	birth='{$_html['birth']}',content='{$_html['content']}',date=now() where id='{$_GET['id']}'");	
	echo'<script type="text/javascript"> alert("修改成功！");location.href="addlook.php";</script>';
}
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
	<?php require 'left2.php';?>
		<div class="col-sm-7">
			<h2>江汉大学新闻管理系统</h2>
			<div>
						<h3>修改新闻</h3>
						<form role="form" method="post" action="?action=modify&id=<?php echo $_GET['id'] ?>">
						<div class="form-group">
		<label for="name">所属分类：</label><br />
		<select name="uid">
<?php 
$_results=mysql_query("select id,class from class where typeid=1");

while(!!$_row=mysql_fetch_array($_results,MYSQL_ASSOC)){?>
	<option value="<?php echo $_row['id']?>" <?php 
	if(ROWS==$_row['id']){
	echo 'selected="selected"';
	}
	?>><?php echo $_row['class']?></option>

<?php
tre($_row['id'],1);
}
?>
</select><br />
        <hr class="hidden-sm hidden-md hidden-lg">
		<label for="name">新闻标题：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="title" value="<?php echo $_rows['title']?>" ><br />
		<hr class="hidden-sm hidden-md hidden-lg">
		<label for="name">新闻来源：</label><br />
		<em style="color: red;">*</em><input type="text" class="form-control" name="birth" value="<?php echo $_rows['birth']?>"><br />
		<hr class="hidden-sm hidden-md hidden-lg">
		<label for="name">新闻内容：</label><br />
		<em style="color: red;">*</em><textarea class="form-control" name="content" rows="5" ><?php echo $_rows['content']?></textarea><br />
		<hr class="hidden-sm hidden-md hidden-lg">
		<input class="form-control" type="submit" value="提交"/>
		<input class="form-control" type="reset" value="重置" />
		<hr class="hidden-sm hidden-md hidden-lg">
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
mysql_free_result($_results);
mysql_close();
?>
<!-- 引入jQuery核心js文件 -->
		<script src="js/jquery-1.11.0.min.js"></script>
		<!-- 引入BootStrap核心js文件 -->
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
