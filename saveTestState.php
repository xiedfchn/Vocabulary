<?php
	
	// 会话开始
	session_start();
	include_once 'config.php';
	// 连接数据库
  	$mysqli = mysqli_connect($host, $username, $password, $db_name) or die("数据库链接失败");

	// 获取用户名密码
	$wordList = $_POST['wordList']; 
	$position = $_POST['position']; 

	// 防MySQL注入
	$wordList = mysqli_real_escape_string($mysqli,$wordList);
	$position = mysqli_real_escape_string($mysqli,$position);
	$myusername = $_SESSION["username"];
	$sql="SELECT * FROM states WHERE  wordList='$wordList' and username = '$myusername'";
	$result= mysqli_query( $mysqli,$sql);
	//  Mysql_num_row 获取结果数
	$count=mysqli_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){
		echo 1;
		$sql = "UPDATE states SET position = $position WHERE  wordList='$wordList' and username = '$myusername'";

		$result= mysqli_query( $mysqli,$sql);

		if($result==1){
			echo $position;
		}
		
	}
	else {


   		$sql = "INSERT INTO states (username, wordList,position) VALUES ('$myusername', '$wordList', $position)";

		$result= mysqli_query( $mysqli,$sql);

		if($result==1){
			// 打印 "true",并且将账号密码注册到session
			echo $position;
		}
			
	}
?>
