<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Category;
use yii\helpers\ArrayHelper;
/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

$categories = Category::find()->orderBy('id')->asArray()->all(); 
$categoryList = ArrayHelper::map($categories, 'id', 'name'); 
?>

<div class="product-form">

    <?php $form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>


    
    <?= $form->field($model, 'category_id')->dropDownList($categoryList) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textarea(['rows' => '6']) ?>
<!--
    <?= $form->field($model, 'link')->textInput(['maxlength' => true]) ?>
-->
    <?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'specifications')->textarea(['rows' => '6'])?>

    <?= $form->field($model, 'detail')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php 
    if($model->image) {
        echo '<img src="'.$model->image.'"/>';
    }
    ?>
    <?= $form->field($model, 'documentFile')->fileInput() ?>
    <?php 
    if($model->document) {
        echo '<a href="'.$model->document.'" download>download</a>';
    }
    ?>
    <?php
        echo $form->field($model, 'new')->dropDownList(['1' => 'Yes', '0' => 'No']);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>    

    <br/>
    <br/>
    <br/>
    <?php ActiveForm::end(); ?>

</div>
