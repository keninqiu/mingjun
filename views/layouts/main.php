<?php

/* @var $this \yii\web\View */
/* @var $content string */

use app\widgets\Alert;
use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
use app\services\DatabaseUtil;

AppAsset::register($this);
$dbUtil = new DatabaseUtil();
$categories = $dbUtil->getCategories();
$currentUrl = Yii::$app->request->url;
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
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-121438914-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-121438914-1');

</script>    
</head>
<body>
<?php $this->beginBody() ?>
<!--
<div id="masthead">
  
    <object classid="clsid:D27CDB6E-AE6D-11cf-96B8-444553540000" codebase="http://download.macromedia.com/pub/shockwave/cabs/flash/swflash.cab#version=6,0,29,0" width="500" height="27">
      <param name="movie" value="foresightcctv.swf">
      <param name="quality" value="high">
      <param name="wmode" value="transparent">
      <param name="SCALE" value="exactfit">
      <embed src="/foresightcctv.swf" width="500" height="27" quality="high" pluginspage="http://www.macromedia.com/go/getflashplayer" type="application/x-shockwave-flash" wmode="transparent" scale="exactfit"></embed>
    </object>
</div>
-->



<div class="container">
  <div id="logo">
    <a href="/" class="retina-logo"><img src="/img/logo.jpeg"></a>  
  </div>
  <div id="social-buttons">

    <img  src="/img/facebook.svg" class="social-icon" alt="facebook"/>
    <img  src="/img/twitter.svg" class="social-icon" alt="twitter"/>
    <img  src="/img/linkedin.svg" class="social-icon" alt="linkedin"/>
    <img  src="/img/instagram.svg" class="social-icon" alt="instagram"/>
    <a href="http://www.foresightcctv.com/19/" target="_blank"><img src="/img/eCatalog.png" class="social-icon" alt="eCatalog"/></a>
  </div>
</div>

<div id="mobile-menu">
    <select id="select-menu">
      <option value="#" <?php echo $currentUrl=="#"?"selected":""?>>Go to Page...</option>
      <option value="/" <?php echo $currentUrl=="/"?"selected":""?>>&nbsp;Home</option>
      <option value="/site/search" <?php echo $currentUrl=="/site/search"?"selected":""?>>&nbsp;Products</option>
<?php 
      $prefixString = "&nbsp;–&nbsp;";
      $dbUtil->genMobileProductsMenu($currentUrl,$prefixString,$categories);
?>    
      <option value="/solution.htm" <?php echo $currentUrl=="/solution.htm"?"selected":""?>>&nbsp;Solutions</option>
      <option value="/supplier_news.htm" <?php echo $currentUrl=="/supplier_news.htm"?"selected":""?>>&nbsp;News and Press Release</option>
      <option value="/faq.htm" <?php echo $currentUrl=="/faq.htm"?"selected":""?>>&nbsp;FAQ</option>
      <option value="/site/about" <?php echo $currentUrl=="/site/about"?"selected":""?>>&nbsp;About</option>
      <option value="/supplier_contact.htm" <?php echo $currentUrl=="/supplier_contact.htm"?"selected":""?>>&nbsp;Contact Us</option>
    </select>  
</div>

<div id="primary-menu">
	<div class="container clearfix">
  	<ul id="main-menu" class="sf-js-enabled">
    	<li><a href="/" title="Home">Home</a></li>
    	<li class="MainNavSelected sub-menu"><a href="/site/search" title="Products">Products</a>		
    		<ul>

          <?php 
          $dbUtil->genProductsMenu($categories);
          ?>    
        </ul>
      </li>
      <li><a href="/solution.htm" title="Solutions">Solutions</a></li>
      <li><a href="/supplier_news.htm" title="News and Press Release">News and Press Release</a></li>
      <li><a href="/faq.htm" title="FAQ">FAQ</a></li>
      <li><a href="/site/about" title="About">About</a></li>
      <li><a href="/supplier_contact.htm" title="Contact Us">Contact Us</a></li>
    </ul>

  
  </div>
</div>





<div class="container-fluid">
<div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  <!-- Indicators -->
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1" class=""></li>
    <li data-target="#carousel-example-generic" data-slide-to="2" class=""></li>
    <li data-target="#carousel-example-generic" data-slide-to="3" class=""></li>
    <li data-target="#carousel-example-generic" data-slide-to="4" class=""></li>
  </ol>

  <!-- Wrapper for slides -->
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="/common/adv_4_en.png" alt="adv_1">
      <div class="carousel-caption">
        
      </div>
    </div>

    <div class="item">
      <img src="/common/adv_5_en.png" alt="adv_2">
      <div class="carousel-caption">
        
      </div>
    </div>

    <div class="item">
      <img src="/common/adv_6_en.png" alt="adv_3">
      <div class="carousel-caption">

      </div>
    </div>    
    <div class="item">
      <img src="/common/adv_9_en.png" alt="adv_3">
      <div class="carousel-caption">
       
      </div>
    </div>    
    <div class="item">
      <img src="/common/adv_10_en.png" alt="adv_4">
      <div class="carousel-caption">
       
      </div>
    </div>        
  </div>

  <!-- Controls -->
  <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>    
    <?= $content ?>
</div>



    <div class="company-footer">
        <?php 
        if(isset($this->params["settings"])) {
            echo $this->params["settings"]["CONTACT"];
        }
        
        ?>
    </div>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
