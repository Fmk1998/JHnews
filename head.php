<div class="container-fluid">
			<div class="col-md-4">
				<img src="img/whxy_badge.png" height="100"/>
			</div>
			<div class="col-md-5">
				<img src="" />
			</div>
			<div class="col-md-3" style="padding-top:20px;font-size: 20px;">
				<ol class="list-inline">
					<li><a href="login.php">登录</a></li>
					<li><a href="register.php">注册</a></li>
					<li><a href="exit.php?action=exit">退出</a></li>
				</ol>
			</div>
		</div>
			
		<div class="row" style="margin-top: 20px;">
			<nav class="navbar navbar-inverse">
			  <div class="container-fluid">
			    <!-- Brand and toggle get grouped for better mobile display -->
			    <div class="navbar-header" >
			      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
			        <span class="sr-only">Toggle navigation</span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			        <span class="icon-bar"></span>
			      </button>
			      <a class="navbar-brand" href="index.php" style="font-size: 20px;">首页</a>
			    </div>
			
			    <!-- Collect the nav links, forms, and other content for toggling -->
			    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
			      <ul class="nav navbar-nav">
			        <li class="active"><a href="sqlgunallnews.php">全部新闻<span class="sr-only">(current)</span></a></li>
			        <?php 
$_result=mysql_query("select id,class from class where typeid='1'");
while (!!$_rows=mysql_fetch_array($_result)) {?>
<li><a href="sqlgunclass.php?id=<?php echo $_rows['id']?>"><?php echo $_rows['class']?></a></li>
<?php 
}
?>
			        <li class="dropdown">
			          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">其他新闻 <span class="caret"></span></a>
			          <ul class="dropdown-menu">
			            <?php $_result=mysql_query("select id,class from class where typeid='2'");
while(!!$_rows=mysql_fetch_array($_result)) {?>
<li><a href="sqlgunclass.php?id=<?php echo $_rows['id']?>"><?php echo $_rows['class']?></a></li>
<?php }?>
			          </ul>
			        </li>
			      </ul>
			      <form method="post" action="sqlgunsearch.php" class="navbar-form navbar-right">
			        <div class="form-group">
			          <input name="key" type="text" class="form-control" placeholder="Search">
			        </div>
			        <button type="submit" class="btn btn-default">搜索</button>
			      </form>
			    </div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
		</div>