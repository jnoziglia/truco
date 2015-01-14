<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Welcome to CodeIgniter</title>
	<style>
		.jugador1, .jugador2{padding:10px 0px;float:left;border:1px solid #ccc;}
		.carta{width:100px;margin-right:10px;float:left;border:1px solid #ccc;background-color: #fff}
		.juego{clear:both;background-color:#050;min-height: 500px;}
		.poneElTanto{display: none;margin-top:10px;}
		.acciones1{padding:10px 0px;}
	</style>
	<script type="text/javascript" src="http://trucotest.web44.net/js/jquery.js"></script>
	<script type="text/javascript" src="http://trucotest.web44.net/js/bootstrap.min.js"></script>
	<link href="http://trucotest.web44.net/css/bootstrap.css" type="text/css" rel="stylesheet" />

</head>
<body>
<div class="container">
	<a href="http://trucotest.web44.net/index.php/truco/test/<?=$jugador=1?>/<?=$partida=0?>">crear partida</a>
	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title">Partidas existentes</h3>
	  </div>
	  <div class="panel-body">
	    <?foreach ($partidas as $partida) {?>
	    	<div><a href="http://trucotest.web44.net/index.php/truco/test/<?=$jugador=2?>/<?=$partida->id?>"><?=$partida->id;?></a></div>
	   <? } ?>
	  </div>
	</div>
</div>
</body>
</html>