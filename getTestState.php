<?php
	
	// 会话开始
	session_start();
	include_once 'config.php';
	// 连接数据库
  	$mysqli = mysqli_connect($host, $username, $password, $db_name) or die("数据库链接失败");

	// 获取用户名密码
	$wordList = $_POST['wordList']; 

	// 防MySQL注入
	$wordList = mysqli_real_escape_string($mysqli,$wordList);
	$myusername = $_SESSION["username"];
	$sql="SELECT * FROM states WHERE  wordList='$wordList' and username = '$myusername'";
	$result= mysqli_query( $mysqli,$sql);

	//  Mysql_num_row 获取结果数
	$count=mysqli_num_rows($result);
	// If result matched $myusername and $mypassword, table row must be 1 row
	if($count==1){
		// 输出每行数据  
		$row = $result->fetch_assoc();
		echo json_encode($row);//json编码  
	}
?>
