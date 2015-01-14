<script type="text/javascript">
	$(document).ready(function (){
		$(".carta").click(function (){
				var carta = $(this).data('carta');
				var palo = $(this).data('palo');
				var id = $(this).attr('id');
				var jugador = $(this).data('jugador');
				var valor = $(this).data('valor');
				
				if(jugador == 1){
					
					
					
					
					//guardo los datos de la jugada
					$.ajax({
						type: "POST",
						url: "http://trucotest.web44.net/index.php/truco/guardarJugada",
						data: {  carta_id: id, jugador: jugador, partida: <?=$partida;?>},
						dataType: "text",
						async: false
					});
					$(".juego").load("http://trucotest.web44.net/index.php/truco/cargarFelpudo/<?=$partida;?>");
				}else{
					
				
					$.ajax({
						type: "POST",
						url: "http://trucotest.web44.net/index.php/truco/guardarJugada",
						data: {  carta_id: id, jugador: jugador, partida: <?=$partida;?>},
						dataType: "text",
						async: false
					});
					$(".juego").load("http://trucotest.web44.net/index.php/truco/cargarFelpudo/<?=$partida;?>");
				}


				//turno++;	
				//esconderCartas(turno,cartasJugador1,cartasJugador2, jugador);

			});
	});
</script>

<div class="jugador1 col-md-12">
		<h4>Mis cartas</h4>
			<?foreach ($cartasj1 as $carta) { ?>
				<div class="carta" data-jugador="1" data-valor="<?=$carta->valorj1;?>" data-carta="<?=$carta->cartaj1;?>" data-palo="<?=$carta->paloj1;?>" id="<?=$carta->id;?>"><?=$carta->cartaj1;?> <br> <?=$carta->paloj1;?></div>
			<? } ?>
		</div>
		
		