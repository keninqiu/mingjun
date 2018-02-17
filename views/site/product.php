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
			  <?php 
			  	$specifications = json_decode($details["product"]["specifications"],true);
			  	if($specifications) {
			  ?>
			  <li class="active"><a data-toggle="tab" href="#specifications">Specifications</a></li>
			  <?php
			  	}
			  ?>
			  <?php 
			  	$features = $details["product"]["features"];
			  	$features = json_decode($features);
			  	if($features) {
			  ?>
			  <li class="active"><a data-toggle="tab" href="#features">Features</a></li>
			  <?php
			  	} 
			  ?>
			  <li><a data-toggle="tab" href="#detail">Detail</a></li>
			</ul>

			<div class="tab-content">
			  <?php 
			  if($specifications) {
			  ?>
			  <div id="specifications" class="tab-pane fade in active">
		    		<ul class="list-group">
		    			<?php 
		    			
		    			foreach($specifications as $spec) {
		    			?>
		    			<li class="list-group-item"><?= $spec?></li>
		    			<?php		
		    			}
		    			?>
		    		</ul>
			  </div>
			  <?php
			  }
			  if($features) {
			  ?>
			  <div id="features" class="tab-pane fade in active">
			  	<ul class="list-group">
			    <?php 
			    	foreach($features as $feature) {
			    ?>
			    	<li class="list-group-item"><?= $feature?></li>
			    <?php
			    	}
			    ?>
				</ul>
			  </div>
			  <?php
			  }
			  ?>
			  <div id="detail" class="tab-pane fade">


  <table class="table table-hover table-condensed">
				<?php
					$detail = json_decode($details["product"]["detail"],true);
					if($detail && count($detail) > 0) {
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
      			<?php
      					}
      			?>
    </tbody>
    			<?php
    				}
    			?>
  </table>

			  </div>
			</div>
		</div>

    	</div>	
    </div>    
</div>
