<?php 
	// 销毁session
	session_start();
	session_destroy();
	header("location:pages-login.php");
?>