<?php 
	
	session_start();
	$id = $_SESSION['id'];

	$pdo = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8","root","root");
	$sql = "select * from user where id=$id ";
	$data = $pdo->query($sql)->fetch();

 ?>


<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Document</title>
</head>
<body>
	<h1>您的积分为:<?php echo $data['score']; ?></h1>
	<hr>
	<form action="goods_list.php">
		<input type="submit" value="换购商品">
	</form>
	<a href="huangou_list.php">查看已经换购的商品</a>
</body>
</html>