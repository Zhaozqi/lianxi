<?php 
	
	$name = $_POST['name'];
	$pwd = $_POST['pwd'];
	$phone = $_POST['phone'];
	$code = $_POST['code'];



    $redis = new Redis;
    $redis->connect('127.0.0.1',6379);
    $code2=$redis->get('code');

    if($code!=$code2){
    	echo "验证码错误";
    	die;
    }
    $pdo = new PDO('mysql:host=127.0.0.1;dbname=zzq;charset=utf8','root','root');
    $sql = "insert into `reg` (name,pwd,phone) values ('$name','$pwd','$phone') ";
   	$pdo->query($sql);

 ?>