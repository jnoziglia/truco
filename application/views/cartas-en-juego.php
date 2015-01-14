<div class="row">
	<div class="col-md-6">
	<?php 
	foreach ($cartas1 as $carta1) { ?>
		<div class="carta"><?php echo $carta1->carta;?><br><?php echo $carta1->palo;?></div>
	<?php } ?>
</div>
	<div class="col-md-6">
		
		<?php 
	foreach ($cartas2 as $carta2) { ?>
		<div class="carta"><?php echo $carta2->carta;?><br><?php echo $carta2->palo;?></div>
<?php } ?>
	</div>
</div>



