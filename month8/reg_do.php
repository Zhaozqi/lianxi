<?php 
	
	//接值
	$name = $_POST['name'];
	$password = $_POST['password'];
	$phone = $_POST['phone'];
	$code = $_POST['code'];

	//连接redis
	$redis = new Redis;
    $redis->connect('127.0.0.1',6379);
    $old_code = $redis->get('code');

    //判断验证码
    if($old_code!=$code){
    	echo "验证码错误";
    	return false;
    }else{
    	echo "注册成功";
    	//注册成功后入库
    	$pdo = new PDO("mysql:host=127.0.0.1;dbname=month8;charset=utf8","root","root");
    	$sql = "insert into user (name,password,phone) values('$name','$password','$phone') ";
    	$pdo->exec($sql);
    }

 ?>