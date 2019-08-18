<?php
use yii\widgets\Breadcrumbs;
$this->title = $details["product"]["title"]. " ".$details["product"]["description"];
$this->registerMetaTag([
    'name' => 'description',
    'content' => $details["product"]["meta_description"]
]);
$this->registerMetaTag([
    'name' => 'keywords',
    'content' => $details["product"]["meta_keywords"]
]);
$customLink = [];

if(isset($details["parent_category"])) {
	$customLink[] = ['label' => $details["parent_category"]["name"], 'url' => '/site/search?category_id='.$details["parent_category"]["id"]];	
}

$customLink[] = ['label' => $details["category"]["name"], 'url' => '/site/search?category_id='.$details["category"]["id"]];

$this->params["settings"] = $settings;
?>
<div class="row row-breadcrumbs">
<?php
echo Breadcrumbs::widget([
      'homeLink' => [ 
      		'label' => Yii::t('yii', 'Home'),
            'url' => Yii::$app->homeUrl,
      ],
      'links' => $customLink,
   ]) 
?>
</div>
<div class="row">
  <div style="width: 300px;padding-left: 30px;">
              <form action="/site/search">
                  <div class="input-group">
                     <input type="text" class="form-control"  name="text" placeholder="" id="search">
                     <span class="input-group-btn">
                          <button class="btn btn-default" type="submit">Search</button>
                     </span>
                  </div>
              </form>  
  </div>
</div>
<div class="row">
    <div class="col-md-4">
    	<img class="img-responsive" src="<?php echo $details["product"]["image"]?>" alt="product image">
    </div>
    <div class="col-md-8">
    	<h3>
    		Product ID:<?php echo $details["product"]["name"]?>
    	</h3>
    	<div>
    		<?php echo $details["product"]["description"]?>
    	</div>  

    	<div class="download-div">
			<a class="btn btn-primary" href="<?php echo $details["product"]["document"]?>" download>
			   Download
			</a>
    	</div> 
    	<div>


		<div class="row">

			<ul class="nav nav-tabs">

				<li class="active"><a data-toggle="tab" href="#intro">Introduction</a></li>

			  <?php 
			  	$specifications = json_decode($details["product"]["specifications"],true);
			  	if($details["product"]["specifications"] || $specifications) {
			  ?>
			  <li><a data-toggle="tab" href="#specifications">Specifications</a></li>
			  
			  <?php
			  	}
			  ?>

			  <?php 
			  	$intro = $details["product"]["intro"];
			  	$features = $details["product"]["features"];
			  	$features = json_decode($features);
			  	if($features || $details["product"]["features"]) {
			  ?>
			  
			  <li><a data-toggle="tab" href="#features">Features</a></li>
			  <?php
			  	} 
			  ?>

			  <li><a data-toggle="tab" href="#detail">Detail</a></li>

			</ul>

			<div class="tab-content">


        <div id="intro" class="tab-pane fade in active">
          <pre><?= $intro?></pre>
        </div>

        <div id="features" class="tab-pane fade in">
        <?php
        if($features) {
        ?>
          <ul class="list-group">
          <?php 
            foreach($features as $feature) {
          ?>
            <li class="list-group-item"><?= $feature?></li>
          <?php
            }
          ?>
        </ul>
        <?php
        }
        else {
        ?>
        <pre><?= $details["product"]["features"]?></pre>
        <?php  
        }
        ?>        
        </div>


        <?php 
        if($details["product"]["specifications"] || $specifications) {
        ?>

        <div id="specifications" class="tab-pane fade in">

          <?php 
          if($specifications) {
          ?>

            <ul class="list-group">
          <?php
                foreach($specifications as $spec) {
                ?>
                <li class="list-group-item"><?= $spec?></li>
                <?php   
                }
          ?>
            </ul>

          <?php
          }
          else {
          ?>
          <pre><?= $details["product"]["specifications"]?></pre>
          <?php
          }  
          ?>

        </div>

        <?php
        }
        ?>




			  <div id="detail" class="tab-pane fade">


  <table class="table table-hover table-condensed">
				<?php
					$detail = json_decode($details["product"]["detail"],true);
					if($detail && is_array($detail) && count($detail) > 0) {

  				?>  
      <thead>
        <tr>
          <th class="col-md-6"><?=$detail[0]['field']?></th>
          <th class="col-md-6"><?=$detail[0]['value']?></th>
        </tr>
      </thead>
      <tbody>
      			<?php
      					for($i=1;$i<count($detail);$i++) {
      			?>

        <tr>
          <td><?=$detail[$i]['field']?></td>
          <td><?=$detail[$i]['value']?></td>
        </tr>

      </tbody>
      			<?php
              }
            }
              else {
              echo '<pre>'.$details["product"]["detail"].'</pre>';
    				}
    			?>
  </table>

			  </div>
			</div>
		</div>

    	</div>	
    </div>    
</div>

<div class="related-product">
	<div class="similar-product-header">
		Related Products
	</div>
    <div class="col-md-products">          
            <?php 
            $i = 0;
            if(isset($similar_products)) {
                foreach($similar_products as $product) { 
                    if($i%3 == 0) {
                ?>
              <div class="row card-set">  
                <?php
                    }
                ?>
                <div class="col-md-card card">
                    <a href="/<?=$product["name"]?>.htm">
                        <img class="card-img-top" src="<?=$product["image"]?>" alt="Card image cap">
                    </a>
                  <div class="card-block">
                    <div><h4 class="card-title"><a href="/<?=$product["name"]?>.htm"><?=$product["name"]?></a></h4></div>
                    <div class="card-text"><?=$product["description"]?></div>

                    <div class="card-footer"></div>
                  </div>
                </div>
                <?php 
                    if($i%3 == 2) {
                ?>
                </div>    
                <?php    
                    }            
                    $i ++;
                } 
            }
            ?>
          

    </div>

</div>
