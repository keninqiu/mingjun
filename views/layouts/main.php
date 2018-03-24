<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div id="masthead">
  
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="500" height="27">
      <param name="movie" value="foresightcctv.swf">
      <param name="quality" value="high">
      <param name="wmode" value="transparent">
      <param name="SCALE" value="exactfit">
      <embed src="/foresightcctv.swf" width="500" height="27" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" scale="exactfit"></embed>
    </object>
  </h1>
</div>
<div class="clearfix">  <br></div>
<div class="clearfix">  <br></div>
<div class="menu-div">
    <?php
    NavBar::begin([
        'brandLabel' => Yii::$app->name,
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => Yii::$app->user->isGuest ? ([
            ['label' => 'Home', 'url' => ['/']],
            ['label' => 'Product', 'url' => ['/site/search']],
            ['label' => 'About', 'url' => ['/site/about']],
            ['label' => 'Login', 'url' => ['/site/login']]
        ]) : ([
            ['label' => 'Dashboard', 'url' => ['/site/dashboard']],
            ['label' => 'Category', 'url' => ['/category']],
            ['label' => 'Product', 'url' => ['/product']],
            ['label' => 'Setting', 'url' => ['/setting']],
            '<li>'
            . Html::beginForm(['/site/logout'], 'post')
            . Html::submitButton(
                'Logout (' . Yii::$app->user->identity->username . ')',
                ['class' => 'btn btn-link logout']
            )
            . Html::endForm()
            . '</li>'            
        ])
    ]);
    NavBar::end();
    ?>
</div>

<div class="container-fluid">
    <?= $content ?>
</div>



    <div class="company-footer">
        <?php echo $this->params["settings"]["CONTACT"]?>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
