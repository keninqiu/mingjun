<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Products';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Product', ['create'], ['class' => 'btn btn-success']) ?>
        <?= Html::a('Export Product', ['export'], ['class' => 'btn btn-success']) ?>
        <?php 
        //echo Html::a('Reload All', ['reloadall'], ['class' => 'btn btn-success']) 
        ?>

    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'category_id',
            'name',
            'description',
            //'specifications',
            'new',
            //'detail',
            //'image',
            //'document',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
