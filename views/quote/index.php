<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\QuoteSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Quotes';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="quote-index">
    <h1></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>


    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'subject',
            'message',
            'name',
            'company',
            //'address',
            //'city',
            //'province',
            //'postal',
            //'country',
            //'phone',
            //'fax',
            //'email:email',
            //'type',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
