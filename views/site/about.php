<?php

/* @var $this yii\web\View */

use yii\helpers\Html;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
$this->params["settings"] = $settings;
?>
<div class="content">
	<div id="page-title">
		<div class="container clearfix">
		<h1>About Us</h1>
		</div>
		</div>
		<div class="content-wrap">
			<div class="container clearfix">
				<div class="clear"></div>
				<div class="col_full">
					<?php echo $settings["COMPANY_DESCRIPTION"]?>
				</div>	
			<div class="tabs-frame-content">
				<h6> Contact Detail </h6>
				<?php echo $settings["CONTACT_DETAIL"]?>
			</div>	
		</div>
	</div>
</div>