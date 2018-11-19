<?php 
	
	$pdo =new PDO('mysql:host=127.0.0.1;dbname=zzq','root','root');

	$sql = "select * from goods";

	$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);


	foreach ($data as $key => $v) {
		$starttime = time();
		$endtime = $v['endtime'];
		$chatime = $endtime-$starttime;

		$hour = floor($chatime/3600);
		$minute = floor(($chatime-$hour*3600)/60);
		$second = $chatime-$hour*3600-$minute*60;


		$data[$key]['hour']=$hour;
		$data[$key]['minute']=$minute;
		$data[$key]['second']=$second;
	}

	echo json_encode($data);

 ?>