<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
  <head>
    <title>Simple Login with CodeIgniter - Private Area</title>
  </head>
  <body>
    <h1>Home</h1>
    <h2>Welcome <?php echo $username; ?>!</h2>
    <a href="home/logout">Logout</a>

    <a href="<?php echo base_url();?>index.php/home/crearPartida">crear partida</a>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Partidas existentes</h3>
	  </div>
	  <div class="panel-body">
	    <?php foreach ($partidas as $partida) {?>
	    	<div><a href="<?php echo base_url();?>index.php/home/unirsePartida/<?php echo $partida->id;?>/<?php echo $id;?>"><?php echo $partida->id;?></a></div>
	   <?php } ?>
	  </div>
	</div>
  </body>
</html>
