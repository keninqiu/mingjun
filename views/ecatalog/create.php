<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Ecatalog */

$this->title = 'Create Ecatalog';
$this->params['breadcrumbs'][] = ['label' => 'Ecatalogs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ecatalog-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
