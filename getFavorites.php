<?php
	
	// 会话开始
	session_start();
	include_once 'config.php';
	// 连接数据库
  	$mysqli = mysqli_connect($host, $username, $password, $db_name) or die("数据库链接失败");

	// 获取用户名
	$myusername = $_SESSION["username"];

	$sql="SELECT * FROM words WHERE username='$myusername'";

	$result= mysqli_query( $mysqli,$sql);

	$arr = array();  
	// 输出每行数据  
	while($row = $result->fetch_assoc()) {  
	    $count=count($row);//不能在循环语句中，由于每次删除row数组长度都减小  
	    for($i=0;$i<$count;$i++){  
	        unset($row[$i]);//删除冗余数据  
	    }  
	    array_push($arr,$row);  
	  
	}  
	//print_r($arr);  
	echo json_encode($arr);//json编码  
?>
