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

<div class="">
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
            ['label' => 'Contact', 'url' => ['/site/contact']],
            ['label' => 'Ecatalog', 'url' => ['/site/ecatalog']],
            ['label' => 'Login', 'url' => ['/site/login']]
        ]) : ([
            ['label' => 'Category', 'url' => ['/category']],
            ['label' => 'Product', 'url' => ['/product']],
            ['label' => 'Post', 'url' => ['/post']],
            ['label' => 'Ecatalog', 'url' => ['/ecatalog']],
            ['label' => 'Quote', 'url' => ['/quote']],
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

    <div class="container-fluid admin-container">
        <div class="row">
            <div class="col-md-12">
                <?= $content ?>
            </div>
        </div>   
    </div>
</div>

<footer class="footer navbar-fixed-bottom">
    <div class="container">
        <p class="pull-left">&copy; CCTV <?= date('Y') ?></p>

        <p class="pull-right">Powered by Miri</p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
