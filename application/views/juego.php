<script type="text/javascript">
	$(document).ready(function(){
		setInterval(function() {
      		$(".mis-cartas").load('<?php echo base_url();?>index.php/home/traerCartas/'+<?php echo $this->uri->segment(3);?>+'/'+<?php echo $this->uri->segment(4);?>);
			$(".juego").load('<?php echo base_url();?>index.php/home/getCartasTiradas/'+<?php echo $this->uri->segment(4);?>);
		}, 2000);
		
	});
</script>
<div class="container">


<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Juego</h3>
  </div>
  <div class="panel-body juego">
    Panel content
  </div>
</div>
<div class="panel panel-default">
  <div class="panel-heading">
    <h3 class="panel-title">Mis cartas</h3>
  </div>
  <div class="panel-body">
  		<div class="row">
		  	<div class="col-md-6">
		  		<div class="row mis-cartas">
		  				

		  		</div>

		  	</div>
		  	<div class="col-md-6">
		  		
		  	</div>

		  
 		 </div>
  </div>
</div>

</div>
<input type="hidden" value="<?php echo $this->uri->segment(4);?>" id="user_id"/>