<?php
define('GUY','true');
require 'common.inc.php';
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
			      <form class="form-horizontal" action="user.php" method="POST">
  <div class="form-group">
    <label for="inputEmail3" class="col-sm-2 control-label">username</label>
    <div class="col-sm-10">
      <input type="text" name="username" class="form-control" id="inputEmail3" placeholder="username">
    </div>
  </div>
  <div class="form-group">
    <label for="inputPassword3" class="col-sm-2 control-label">Password</label>
    <div class="col-sm-10">
      <input type="password" name="password" class="form-control" id="inputPassword3" placeholder="Password">
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <div class="checkbox">
        <label>
          <input name="remember" type="checkbox"> Remember me
        </label>
      </div>
    </div>
  </div>
  <div class="form-group">
    <div class="col-sm-offset-2 col-sm-10">
      <button type="submit" class="btn btn-default">Sign in</button>
    </div>
  </div>
</form>
			    </div>
			  </div>
		</div>
		
		<?php require 'foot.php';?>
		<!-- 引入jQuery核心js文件 -->
		<script src="js/jquery-1.11.0.min.js"></script>
		<!-- 引入BootStrap核心js文件 -->
		<script src="js/bootstrap.min.js"></script>
</body>
</html>
