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
	<script type="text/javascript">
		$(document).ready(function(){
			var turno = 1;
			var cartasJugadas1 = 0;
			var cartasJugadas2 = 0;
			esconderCartas(1);
			var cartasJugador1 = [];
			var cartasJugador2 = []; 
			
			$(".cantarTanto").click(function (){
				$(".poneElTanto").show();
				
			});
			
			$(".carta").click(function (){
				var carta = $(this).data('carta');
				var palo = $(this).data('palo');
				var id = $(this).attr('id');
				var jugador = $(this).data('jugador');
				var valor = $(this).data('valor');
				$(this).hide();
				if(jugador == 1){
					cartasJugadas1++;
					
					cartasJugador1[0] = cartasJugadas1;
					cartasJugador1[1] = valor;
					//console.log(cartasJugador1);
					$(".juego-jugador1").append("<div class='carta carta-juego' data-carta="+carta+" data-palo="+palo+">"+carta+"<br>"+palo+"</div>");
				}else{
					cartasJugadas2++;
					
					cartasJugador2[0] = cartasJugadas2;
					cartasJugador2[1] = valor;
					//console.log(cartasJugador2);
					$(".juego-jugador2").append("<div class='carta carta-juego' data-carta="+carta+" data-palo="+palo+">"+carta+"<br>"+palo+"</div>");
				}


				turno++;	
				esconderCartas(turno,cartasJugador1,cartasJugador2, jugador);

			});

			function esconderCartas(turno, cartasJugador1, cartasJugador2, ultimojugador){
					jugador = comprobarTurno(turno, cartasJugador1, cartasJugador2);

					if(jugador == 3){
						if(ultimojugador == 1){
							jugador = 1;
						}else{
							jugador = 2;
						}
					}
					if(jugador == 2){
						$(".jugador2").hide();
						$(".jugador1").show();
						$(".acciones1").show();
						$(".acciones2").hide();
					}

					if(jugador == 1){
						$(".jugador1").hide();
						$(".jugador2").show();
						$(".acciones2").show();
						$(".acciones1").hide();
					}
					
				}

			function comprobarTurno(turno, cartasJugador1, cartasJugador2){
				switch(turno){
					case 1:
						return 2;
						break;

					case 2:
						return 1;
						break;
					default:
						return comprobar(cartasJugador1, cartasJugador2);
						break;
					}

				}

			function comprobar(cartasJugador1, cartasJugador2){
				console.log(cartasJugador1);
				console.log(cartasJugador2);
				
				if(cartasJugador1[0] == cartasJugador2[0]){
					if(cartasJugador1[1] < cartasJugador2[1]){
						return 1;
					}
					if(cartasJugador1[1] > cartasJugador2[1]){
						return 2;
					}
					if(cartasJugador1[1] == cartasJugador2[1]){
						return 3;
					}
				}else{
					if(cartasJugador1[0] > cartasJugador2[0]){
						return 1;
					}
					if(cartasJugador1[0] < cartasJugador2[0]){
						return 2;
					}
				}
			}

			function cantameElTanto(){

			}	


		});
			
	</script>
</head>
<body>
	<?
		$c = 0;	
		$jugador = array();
		foreach ($cartas as $carta) { 
			
			if($c <= 2){
				$jugador1[$c] = $carta;
			} 
			if($c > 2){
				$jugador2[$c-2] = $carta;
				
			} 

			$c++;
		 }
	  ?>
<div class="container">
	<div class="row juego">
		<div class="juego-jugador1 col-md-6"></div>
		<div class="juego-jugador2 col-md-6"></div>

	</div>
	<div class="row jugadores">
		
		<div class="jugador1 col-md-6">
		<h4>Mis cartas</h4>
			<?foreach ($jugador1 as $carta) { ?>
				<div class="carta" data-jugador="1" data-valor="<?=$carta->valor;?>" data-carta="<?=$carta->carta;?>" data-palo="<?=$carta->palo;?>" id="carta-<?=$carta->id;?>"><?=$carta->carta;?> <br> <?=$carta->palo;?></div>
			<? } ?>
		</div>
		<div class="col-md-6 acciones">
		<h4>Acciones</h4>
			<div class="acciones1"><a href="javascript:void(0);" class="btn btn-default cantarTanto">envido</a> <a href="javascript:void(0);" class="btn btn-default cantarTruco">truco</a></div>
			<div class="poneElTanto"><div class="col-md-2"><input type="text" id="elTanto" class="form-control" /></div><div class="col-md-10"><a class="btn btn-default">cantar</a></div></div>
		</div>
		<div class="jugador2 col-md-6">
		<h4>Mis cartas</h4>
			<?foreach ($jugador2 as $carta) { ?>
				<div class="carta" data-jugador="2" data-valor="<?=$carta->valor;?>" data-carta="<?=$carta->carta;?>" data-palo="<?=$carta->palo;?>" id="carta-<?=$carta->id;?>"><?=$carta->carta;?><br> <?=$carta->palo;?></div>
			<? } ?>
		</div>
		<div class="col-md-6"><div class="acciones2"><a href="javascript:void(0);"  class="btn btn-default cantarTanto">envido</a></div></div>
	</div>

</div>

</body>
</html>