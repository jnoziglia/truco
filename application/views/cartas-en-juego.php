<div class="row">
	<div class="col-md-6 col-sm-12">
		<div class="row">
	<?php

	foreach ($cartas1 as $carta1) { ?>
		<div class="col-md-4 col-sm-4 col-xs-4"><img src="<?php echo base_url();?>images/<?php echo $carta1->carta;?>_<?php echo $carta1->palo;?>.jpg" class="img-responsive"/></div>
	<?php } ?>
	</div>
</div>
	<div class="col-md-6 col-sm-12">
		<div class="row">
		<?php 
	foreach ($cartas2 as $carta2) { ?>
		<div class="col-md-4 col-sm-4 col-xs-4"><img src="<?php echo base_url();?>images/<?php echo $carta2->carta;?>_<?php echo $carta2->palo;?>.jpg" class="img-responsive"/></div>
<?php } ?>
</div>
	</div>
	
</div>



