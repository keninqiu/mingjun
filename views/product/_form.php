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

    <?= $form->field($model, 'meta_keywords')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'meta_description')->textarea(['rows' => '6']) ?>
    
    <?= $form->field($model, 'category_id')->dropDownList($categoryList) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'intro')->textarea(['rows' => '6']) ?>

    <?= $form->field($model, 'features')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textarea(['rows' => '6']) ?>

    <?php
    $specificationJson = json_decode($model->specifications);
    if($specificationJson) {
    ?>
    <table class="table" id="specification-table">
      <thead>
        <tr>
          <th scope="col">Specifications</th>
          <th scope="col"></th>
        </tr>

      </thead>
      <tbody>  

 
    <?php
        foreach ($specificationJson as $item) {
    ?>
            <tr>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" name="specification_field[]"  value="<?=$item?>">
                        
                    </div>
                </td>
                <td>
                    <span onclick="addSpecificationItem()" class="glyphicon glyphicon-plus"></span>
                </td>
            </tr>
    <?php    
        }
    ?> 

      </tbody>
    </table>    
    <?php
    }
    else {
    ?>
    <?= $form->field($model, 'specifications')->textarea(['rows' => '6'])?>
    <?php
    }
    ?>

    

    

    <?php 
    $detailJson = json_decode($model->detail);
    if($detailJson) {
    ?>

    <table class="table" id="detail-table">
      <thead>
        <tr>
          <th scope="col">Detail</th>
          <th scope="col"></th>
          <th scope="col"></th>
        </tr>
      </thead>
      <tbody>    
    <?php
        foreach ($detailJson as $item) {
    ?>
            <tr>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" name="detail_field[]"  value="<?=$item->field?>">
                    </div>
                </td>
                <td>
                    <div class="form-group">
                        <input type="text" class="form-control" name="detail_value[]"  value="<?=$item->value?>">
                    </div>                    
                </td>
                <td>
                    <span onclick="addDetailItem()" class="glyphicon glyphicon-plus"></span>
                </td>                    
            </tr>
    <?php    
        }
    ?>
      </tbody>
    </table>
    <?php
    }
    else {
    ?>

    <?= $form->field($model, 'detail')->textarea(['rows' => '6']) ?>
    <?php
    }
    ?>
    <?= $form->field($model, 'imageFile')->fileInput() ?>
    <?php 
    if($model->image) {
        echo '<img src="'.$model->image.'"/>';
    }
    ?>

    <?= $form->field($model, 'imageFile1')->fileInput() ?>
    <?php 
    if($model->image1) {
        echo '<img src="'.$model->image1.'"/>';
    }
    ?>

    <?= $form->field($model, 'imageFile2')->fileInput() ?>
    <?php 
    if($model->image2) {
        echo '<img src="'.$model->image2.'"/>';
    }
    ?>

    <?= $form->field($model, 'imageFile3')->fileInput() ?>
    <?php 
    if($model->image3) {
        echo '<img src="'.$model->image3.'"/>';
    }
    ?>

    <?= $form->field($model, 'imageFile4')->fileInput() ?>
    <?php 
    if($model->image4) {
        echo '<img src="'.$model->image4.'"/>';
    }
    ?>

    <?= $form->field($model, 'imageFile5')->fileInput() ?>
    <?php 
    if($model->image5) {
        echo '<img src="'.$model->image5.'"/>';
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
