<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Contact';
$this->params['breadcrumbs'][] = $this->title;
if(isset($settings)) {
	$this->params["settings"] = $settings;
}
?>
<div class="site-contact">
    <h1>Inquiry Succeed</h1>
    <p>
    	Your inquiry has been sent. Thank you very much.
    </p>
</div>