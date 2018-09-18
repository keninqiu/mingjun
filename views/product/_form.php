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

    <?= $form->field($model, 'image')->fileInput() ?>

    <?= $form->field($model, 'document')->fileInput() ?>
    <!--
    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>
    
    <?= $form->field($model, 'document')->textInput(['maxlength' => true]) ?>
    -->
    <?= $form->field($model, 'new')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>    
    <br/>
    <br/>
    <br/>
    <?php ActiveForm::end(); ?>

</div>
