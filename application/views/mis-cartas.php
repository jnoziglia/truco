<script type="text/javascript">
       		$(document).ready(function(){
       			$('.mi-carta').click(function(){
       				var carta_id = $(this).data('id');
       				var carta_mano_id = $(this).data('mano');
       				var user_id = $("#user_id").val();
       				$.ajax({
						  type: "POST",
						  url: "<?php echo base_url();?>index.php/home/tirarCarta",
						  data: { carta_id: carta_id, user_id: user_id, carta_mano_id: carta_mano_id }
						});


       				
       			});
       		});
       </script> 
<?php 
	if($turno->user_id != $this->uri->segment(4)){
	foreach ($cartas as $carta) { ?>
		<div class="carta mi-carta" data-id="<?php echo $carta->carta_id;?>" data-mano="<?php echo $carta->carta_mano_id;?>">
			
			<img src="<?php echo base_url();?>images/<?php echo $carta->carta;?>_<?php echo $carta->palo;?>.jpg" width="100"/>
		</div>

<?php } }else{?>
Es el turno del otro jugador =)
<?php } ?>
