<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'CCTV';
$this->params["settings"] = $settings;
?>

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

<div class="row">
      <div class="col-md-8 col-spanning-1">
          <h1><?php echo $settings["COMPANY_NAME"]?></h1>
          <div>
          <?php echo $settings["COMPANY_SHORT_DESCRIPTION"]?>
          </div>
          <div>
            <a href="/site/about"><button class="button button-blue-round">More</button></a>
          </div>
      </div>
      <div class="col-md-4 col-spanning-2">
        <div class="container-fluid">
            <div class="clearfix">  <br></div>
            <div class="row">
              <form action="/site/search">
                  <div class="input-group">
                     <input type="text" class="form-control"  name="text" placeholder="" id="search">
                     <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Search</button>
                     </span>
                  </div>
              </form>
            </div>
            <div class="row">
                <h3>New Products Release</h3>
            </div>
            <div class="row">
              <table class="table">
                <tbody>
                  <tr>
                    <td><a href="/supplier_news.htm#news19">2018 APR New Product Release</a></td>
                  </tr>
                  <tr>
                    <td><a href="/supplier_news.htm#news18">ISC WEST 2018</a></td>
                  </tr>
                  <tr>
                    <td><a href="/supplier_news.htm#news17">InfoComm CHINA 2018</a></td>
                  </tr>
                  <tr>
                    <td><a href="/supplier_news.htm#news16">4K HDMI over IP</a></td>
                  </tr>
                  <tr>
                    <td><a href="/supplier_news.htm#news15">Bluetooth Digital Amplifier</a></td>
                  </tr>                                                                         
                </tbody>
              </table>               
            </div>
        </div>
      </div>
  </div>