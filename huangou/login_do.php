<?php 

	$name = $_GET['name'];
	$password = $_GET['password'];

	$pdo = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8","root","root");
	$sql = "select * from user where name='$name' and password='$password' ";

	$data = $pdo->query($sql)->fetch();

	if($data){
		
		session_start();
		$_SESSION['id']=$data['id'];

		echo "<script>alert('登陆成功');location.href='manager.php';</script>";

	}else{
		echo "登录失败";
	}
 ?>