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
			//esconderCartas(1);
			var cartasJugador1 = [];
			var cartasJugador2 = []; 
			<? $jugador = $this->uri->segment(3);?>
			//cargo el felpudo
			$(".juego").load("<?=base_url();?>index.php/truco/cargarFelpudo/<?=$partida;?>");
			$(".jugadores").load("<?=base_url();?>index.php/truco/cargarCartas/<?=$partida;?>/<?=$jugador;?>");
			$(".cantarTanto").click(function (){
				$(".poneElTanto").show();
				
			});
			
			

			/*function esconderCartas(turno, cartasJugador1, cartasJugador2, ultimojugador){
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
					
				}*/

			/*function comprobarTurno(turno, cartasJugador1, cartasJugador2){
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
*/
			/*function comprobar(cartasJugador1, cartasJugador2){
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
			}*/
			


		});
			
	</script>
</head>
<body>

<div class="container">
	<div class="row juego">
		

	</div>
	<div class="row jugadores">
		
		
	
	</div>

</div>

</body>
</html>