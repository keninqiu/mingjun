<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Ecatalog */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="ecatalog-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php 
    if($model->image) {
        echo '<img src="'.$model->image.'"/>';
    }
    ?>
    
    <?= $form->field($model, 'url')->textInput(['maxlength' => true]) ?>
    
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
