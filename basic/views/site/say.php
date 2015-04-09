<?php

	use yii\web\View;
	use yii\helpers\Html;
	
	\Yii::$app->view->on(View::EVENT_END_BODY, function () {
		echo date('Y-m-d');
	});
	
?>
<?= Html::encode($message) ?>