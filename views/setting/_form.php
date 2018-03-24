<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use dosamigos\ckeditor\CKEditor;
/* @var $this yii\web\View */
/* @var $model app\models\Setting */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="setting-form">


    <?php $form = ActiveForm::begin(); ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>
    <?= $form->field($model, 'field')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'value')->widget(CKEditor::className(), [
	        'options' => ['rows' => 6],
	        'preset' => 'full'
	    ]) ?>



    <?php ActiveForm::end(); ?>

</div>
