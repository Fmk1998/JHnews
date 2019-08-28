<?php
session_start();
define('GUY','true');
require 'common.inc.php';
header("Content-Type: text/html; charset=utf-8");
if(empty($_POST['username'])){
	echo'<script type="text/javascript"> alert("请输入用户账号再登录!");location.href="login.php"; </script>';			
		exit;
	}
	if(empty($_POST['password'])){
	echo'<script type="text/javascript"> alert("请输入用户密码再登录!");location.href="login.php"; </script>';			
		exit;
	}	
	$_html=array();
	//Trim（)删除字符串首尾的空白
	
	$_html['username']=trim($_POST['username']);
	$_html['password']=trim($_POST['password']);	
	$_result=@mysql_query("select * from admin where admin='{$_html[username]}' and password='{$_html['password']}'")or die('登录错误');
	if(!!$_rows=mysql_fetch_array($_result)){
		setcookie('username',$_rows['admin']);
		header('location:index2.php');
	}else{
		echoalerthistory('登录账号信息错误!');
	}
mysql_close();
?>