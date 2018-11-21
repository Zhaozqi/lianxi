<?php 
	
	//展示商品
	$pdo = new PDO("mysql:host=127.0.0.1;dbname=test;charset=utf8","root","root");
	$sql = "select * from goods";
	$data = $pdo->query($sql)->fetchAll();

	//查询积分
	session_start();
	$id = $_SESSION['id'];
	$sql1= "select score from user where id=$id ";
	$str = $pdo->query($sql1)->fetch();
	$user_score = $str['score'];

	//购买的记录
	$sql2 = "select *from scorelog ";
	$arrlog = $pdo->query($sql2)->fetchAll();
	// echo "<pre>";
	// print_r($arrlog);die;
	$goods_id = array_column($arrlog,'goods_id');
	$user_id = array_column($arrlog,'user_id');

 ?>

 <table>
 	<?php foreach ($data as $key => $v): ?>
 	<tr>
 		<td><img src="<?php echo $v['img']; ?>" style="width:250px;height:250px"></td>
 		<td>商品名称:<?php echo $v['name']; ?></td>
 		<td>&nbsp;&nbsp;&nbsp;需要换购积分:<?php echo $v['score']; ?></td>
 		<td>&nbsp;&nbsp;&nbsp;<a href="javascript:;" onclick="tip(<?php echo $v['score']; ?>,<?php echo $v['id']; ?>)" >换购</a></td>
 	</tr>
 	<?php endforeach ?>
 	
 </table>

 <script src="jquery.js"></script>
 <script>

 	function tip(goods_score,goods_id){
 		var user_score = "<?php echo $user_score ?>";
 		alert("购买此商品需要"+goods_score+"积分");
        // alert(user_score);
 		if(user_score<goods_score){
 			alert("积分不足");
 			alert("换购失败");
 			return false;
 		}else{
 			$.ajax({
 				url:'huangou.php?goods_id='+goods_id+'&goods_score='+goods_score,
 				type:'get',
 				dataType:'json',
 				success:function(data){
 					if(data=='ok'){
 						alert('换购成功');
 						$('#huangou'+goods_id).text('已换购');
 					}
 				}

 			})
 		}

 	}
 </script>