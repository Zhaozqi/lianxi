<?php 

	$pdo=new PDO('mysql:host=127.0.0.1;dbname=test;charset=utf8','root','root');

	session_start();
	$id = $_SESSION['id'];

	$sql = "select * from `scorelog` inner join `goods` on scorelog.goods_id= goods.id where user_id = '$id' ";
	$data = $pdo->query($sql);
    var_dump($data);
 ?>


<html>
<head>
	<title></title>
</head>
<body>
<table border='1'>
<tr><th>序号</th><th>商品名称</th><th>使用积分</th><th>兑换时间</th></tr>
<?php foreach($data as $key=>$value):?>
	<tr><td><?=$key+1?></td><td><?=$value['name']?></td><td><?=$value['score']?></td><td><?=date('Y-m-d',$value['addtime'])?></td></tr>
<?php endforeach;?>
</table>
</body>
</html>
