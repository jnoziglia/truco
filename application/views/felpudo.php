<div class="juego-jugador1 col-md-6">
	<?
	echo "<pre>";
	print_r($felpudoj1);
	echo "</pre>";
	//die();
	foreach ($felpudoj1 as $j1) { ?>
		<div class='carta carta-juego' data-carta='<?=$j1->cartacj1;?>'>s</div>
	<? } ?>

</div>
<div class="juego-jugador2 col-md-6">
<?
	echo "<pre>";
	print_r($felpudoj2);
	echo "</pre>";
	//die();
	foreach ($felpudoj2 as $j2) { ?>
		<div class='carta carta-juego' data-carta='<?=$j2->cartacj2;?>'>s</div>
	<? } ?>

</div>