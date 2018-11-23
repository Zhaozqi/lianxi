<?php 

	//接收用户名和密码
	$name = $_POST['name'];
	$password = $_POST['password'];

	//pdo连接数据库
	$pdo = new PDO("mysql:host=127.0.0.1;dbname=month8;charset=utf8","root","root");
	$sql = "select * from user where name='$name' and password='$password' ";
	$res = $pdo->query($sql)->fetch();

	//判断
	if($res){
		echo "登录成功";
	}else{
		echo "登录失败";
	}
 ?>