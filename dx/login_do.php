<?php 

	$name = $_POST['name'];
	$pwd = $_POST['pwd'];

	$pdo = new PDO('mysql:host=127.0.0.1;dbname=zzq;charset=utf8','root','root');
	$sql = "select * from reg "

 ?>