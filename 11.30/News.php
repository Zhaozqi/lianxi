<?php
namespace frontend\models;

use yii\db\ActiveRecord;

// 
class News extends ActiveRecord{
	public function rules(){
		return [
			// 第1个字段的验证规则，required就是验证必须填写，不能为空
			// [['title','content','author'],'required','message'=>'不能为空']
			['title','required','message'=>'标题不能为空'],
			['content','required','message'=>'内容不能为空'],
			['author','required','message'=>'作者不能为空'],
		];
	}
	// 给模板文件中的表单元素设置中文标签
	public function attributeLabels(){
		return [
			'title'=>'标题',
			'content'=>'内容',
			'author'=>'作者'
		];
	}
}