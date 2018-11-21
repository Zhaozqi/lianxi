<?php 
	
	$pdo=new PDO('mysql:host=127.0.0.1;dbname=test;charset=utf8','root','root');

	$goods_id = $_GET['goods_id'];
	$goods_score = $_GET['goods_score'];

	session_start();
	$id = $_SESSION['id'];

	//库存
	$sql1 = "update goods set stock = stock-1 where id = $id ";
	$pdo->exec($sql1);

	//积分
	$sql2 = "update user set score = score-$goods_score where id=$id";
	$pdo->exec($sql2);

	//兑换记录
	$time = time();
	$sql3 = "insert into scorelog(user_id,goods_id,score,addtime) values ($id,$goods_id,$goods_score,$time) ";
	$pdo->exec($sql3); 

	echo "ok";

 ?>