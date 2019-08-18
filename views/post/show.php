<?php

use yii\helpers\Html;
$this->title = $model->title;
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
</style>

<div class="container">
    <h1 class="text-center py-3"><?= Html::encode($this->title) ?></h1>
    <div>
    	<?= $model->content ?>
    </div>
</div>