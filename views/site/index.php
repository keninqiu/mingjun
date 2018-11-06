<?php

/* @var $this yii\web\View */
use yii\helpers\Html;
$this->title = 'Video Balun, Surge Protector, Video Distributor Amplifier, CAT5 VGA, Twisted Pair Transmission - FORESIGHT CCTV INC.';
$this->params["settings"] = $settings;
?>



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