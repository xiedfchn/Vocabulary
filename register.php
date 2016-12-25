<?php
	
	// 会话开始
	session_start();
	include_once 'config.php';
	// 连接数据库
  	$mysqli = mysqli_connect($host, $username, $password, $db_name) or die("数据库链接失败");

	// 获取用户名密码
	$myusername = $_POST['myusername']; 
	$mypassword = $_POST['mypassword']; 

	// 防MySQL注入
	$myusername = mysqli_real_escape_string($mysqli,$myusername);
	$mypassword = mysqli_real_escape_string($mysqli,$mypassword);
	$sql="SELECT * FROM $tbl_name WHERE username='$myusername'";
	$result= mysqli_query( $mysqli,$sql);
	//  Mysql_num_row 获取结果数
	$count=mysqli_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){

		// 打印 "true",并且将账号密码注册到session
		echo "flase";
		
	}
	else {


   		$sql = "INSERT INTO user (username, password) VALUES ( '$myusername', '$mypassword')";

		$result= mysqli_query( $mysqli,$sql);

		if($result==1){
			// 打印 "true",并且将账号密码注册到session
			echo "true";
			$_SESSION['username'] = $myusername;
			
		}
			
	}
?>
