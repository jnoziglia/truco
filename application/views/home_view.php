<div class="alert alert-success" role="alert">
Hola, <strong><?php echo $username; ?></strong>!.  <?php echo anchor('/auth/logout/', 'Logout'); ?><br />

<a href="<?=base_url();?>index.php/home/crearPartida" class="btn btn-primary">Crear partida</a>
</div>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Partidas existentes</h3>
	  </div>
	  <div class="panel-body">
	    <?php foreach ($partidas as $partida) {?>
	    	<div><a href="<?php echo base_url();?>index.php/home/unirsePartida/<?php echo $partida->id;?>/<?php echo $user_id;?>"><?php echo $partida->id;?></a></div>
	   <?php } ?>
	  </div>
	</div>
