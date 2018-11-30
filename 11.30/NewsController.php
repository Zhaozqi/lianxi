<?php
namespace frontend\controllers;

use yii;
use yii\web\Controller;
use frontend\models\News;		// 包含news模型
class NewsController extends Controller{
	// 我们在add方法中实现两个功能：1 初始访问时加载表单；2 提交表单时，进行处理（接收数据、入库等操作）
	public function actionAdd(){
		// 判断用户是否提交了表单
		if(yii::$app->request->isPost){
			// 方法一：
			// 接收所有表单数据
			// $data=Yii::$app->request->post('News');
			// // 入库
			// $model=new News;
			// $model->title=$data['News']['title'];
			// $model->content=$data['News']['content'];
			// $model->author=$data['News']['author'];
			// $model->addtime=time();
			// 调用save方法入库
			// $model->save();

			// 方法二：
			// 接收所有表单数据
			$data=Yii::$app->request->post();
			// 入库
			$model=new News;
			// 使用load载入数据到模型中，同时调用validate验证表单是否符合规则（对表单的输入值进行验证）
			$model->addtime=time();
			if($model->load($data) && $model->validate()){
				$model->save();	// 调用save方法入库
			}

		}else{
			// 加载页面
			$model=new News();
			return $this->render('add',['model'=>$model]);
		}
	}
}