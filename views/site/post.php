<?php

use yii\helpers\Html;
$this->title = $model->title;
$this->params['breadcrumbs'][] = $this->title;
$this->params["settings"] = $settings;
?>
<style>
 .ql-align-center {
 	text-align: center;
 }
  .ql-align-right {
 	text-align: right;
 }
 .container {
 	max-width: 1024px;
 }
.post-title {
	font-size: 20px;
	padding-top: 15px;
	padding-bottom: 15px;
	font-weight: bold;
}
</style>

<div class="container">
    <h1 class="post-title text-center py-3"><?= Html::encode($this->title) ?></h1>
    <div>
    	<?= $model->content ?>
    </div>
</div>