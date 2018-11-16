<?php 
	
	$redis = new Redis;
	$redis->connect('127.0.0.1',6379);
	$city = $_GET['city'];

	if($redis->exists($city)){

		$str=$redis->get($city);
		echo "from redis";
		echo $str;

	}else{

		$key = "3c2ae6ab1c8442f99baa1a183b4b8da7";
		$url = "https://free-api.heweather.com/s6/weather/forecast?location=$city&key=$key";

		$str = get_url($url);

		// echo $str;

		//入库
		$data= json_decode($str,true);
		$data = $data['HeWeather6'][0]['daily_forecast'];

		// echo "<pre>";
		// print_r($data);

		$pdo=new PDO('mysql:host=127.0.0.1;dbname=zzq','root','root');
		foreach ($data as $key => $value) {
			$date = $value['date'];
			$tmp_max = $value['tmp_max'];
			$tmp_min = $value['tmp_min'];
			$sql = "insert into weather (city,date,tmp_max,tmp_min) values ('$city','$date','$tmp_max','$tmp_min') ";
			$pdo->exec($sql);
		}
		$str = json_encode($data);
		$redis->set($city,$str);
		echo "from db";
		echo $str;
	}
	
	

	//curl请求 传url

	function get_url($url){
		// 初始化
		$ch = curl_init();
		// 设置参数
		curl_setopt($ch,CURLOPT_URL,$url);
		curl_setopt($ch,CURLOPT_SSL_VERIFYPEER,false);
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,1);
		// 执行
		$str = curl_exec($ch);
		// 清理
		curl_close($ch);
		// 返回
		return $str;
	}

 ?>