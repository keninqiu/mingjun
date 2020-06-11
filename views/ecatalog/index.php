<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\EcatalogSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Ecatalogs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="ecatalog-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Ecatalog', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'image',
            'url',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
