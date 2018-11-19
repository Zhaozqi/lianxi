<?php 
	$pdo = new PDO("mysql:host=127.0.0.1;dbname=zzq;charset=utf8","root",'root');
	$sql = "select * from goods";
	$data = $pdo->query($sql)->fetchAll();
 ?>

 <!DOCTYPE html>
 <html lang="en">
 <head>
 	<meta charset="UTF-8">
 	<title>Document</title>
 </head>
 <body>
 	<?php foreach ($data as $key => $value): ?>
 		<table>
 			<tr>
 				<td><span id="h<?=$value['id']?>"></span>时
					<span id="m<?=$value['id']?>"></span>分
					<span id="s<?=$value['id']?>"></span>秒
 				</td>
 				<td><img src="<?=$value['img']?>" width="200" height="200"></td>
 				<td><?=$value['name']?></td>
 				<td><?=$value['price']?>$</td>
 				<td><input type="button" value="抢购" id="<?=$value['id']?>"></td>
 			</tr>
 		</table>
 	<?php endforeach ?>
 </body>
 </html>
 <script src="jquery-1.12.4.min.js"></script>
 <script>

 	//倒计时ready
 	$(document).ready(function(){

 		//计时器
 		window.setInterval(function(){

 			$.ajax({
 				url:'settime.php',
 				type:'get',
 				dataType:'json',
 				success:function(data){
 					for(var i=0;i<data.length;i++){
 						id = data[i]['id'];

 						$('#h'+id).text(data[i]['hour']);
 						$('#m'+id).text(data[i]['minute']);
 						$('#s'+id).text(data[i]['second']);

 					}
 				}
 			})

 		},1000);

 		$("input[type=button]").click(function(){
 			alert("抢购成功");
 		})

 	})

 </script>