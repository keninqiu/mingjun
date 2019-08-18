<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\widgets\CKEditor;
use iutbay\yii2kcfinder\KCFinder;

/* @var $this yii\web\View */
/* @var $model app\models\Post */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="post-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

	<?= $form->field($model, 'content')->widget(\bizley\quill\Quill::class, [
		'toolbarOptions' => 'FULL',
		'options' => ['style' => 'height:320px']
	]);
?>
<?php
// kcfinder options
// http://kcfinder.sunhater.com/install#dynamic
$kcfOptions = array_merge(KCFinder::$kcfDefaultOptions, [
	'uploadURL' => Yii::getAlias('@web').'/uploads',
	'access' => [
		'files' => [
			'upload' => true,
			'delete' => false,
			'copy' => false,
			'move' => false,
			'rename' => false,
		],
		'dirs' => [
			'create' => true,
			'delete' => false,
			'rename' => false,
		],
	],
]);

// Set kcfinder session options
Yii::$app->session->set('KCFINDER', $kcfOptions);
?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
