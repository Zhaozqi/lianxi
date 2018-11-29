<?php
use yii\widgets\ActiveForm;
use yii\helpers\Html;		// 辅助类
?>
<html>
<head>
	<title></title>
</head>
<body>
<!-- 使用ActiveForm重新构造一下表单，使得表单和模型发生关联 -->
<?php $form=ActiveForm::begin()?>
	<div class='form-group'>
		<!-- <label>标题</label> -->
		<!-- <input type='text' name='title' class='form-control'> -->
		<?=$form->field($model,'title')->textInput();?>
	</div>
	<div class='form-group'>
		<!-- <label>内容</label> -->
		<!-- <textarea name='content' class='form-control'></textarea> -->
		<?=$form->field($model,'content')->textArea(['class'=>'form-control'])?>
	</div>

	<div class='form-group'>
		<!-- <label>作者</label> -->
		<!-- <input type='text' name='author' class='form-control'> -->
		<?=$form->field($model,'author')->textInput();?>
	</div>		

	<!-- <input type='submit' value='添加' class='btn btn-success btn-sm'> -->
	<?=Html::submitButton('添加',['class'=>'btn btn-success btn-sm'])?>
<?php ActiveForm::end();?>
</body>
</html>