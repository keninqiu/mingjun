<div class="container">
	<div class="row">
	<?php 
	foreach($ecatalogs as $item) {
	?>
		<div class="col col-4">
			<a target="_blank" href="<?=$item['url']?>"><img src="<?=$item['image']?>"></a>
		</div>	
	<?php
	}
	?>

	</div>
</div>