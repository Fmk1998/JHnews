<?php
header("Content-Type: text/html; charset=utf-8");
if(@$_GET['action']=='exit'){
	setcookie('username','',time()-1);
	echo'<script type="text/javascript"> alert("退出成功!");location.href="index.php"; </script>';
}


?>