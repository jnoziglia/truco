<script type="text/javascript">
	$(document).ready(function(){
		
      		$(".mis-cartas").load('<?php echo base_url();?>index.php/home/traerCartas/'+<?php echo $this->uri->segment(3);?>+'/'+<?php echo $this->uri->segment(4);?>);
			$(".juego").load('<?php echo base_url();?>index.php/home/getCartasTiradas/'+<?php echo $this->uri->segment(4);?>);
		
		
	});
	function recargar(){
	$(".mis-cartas").load('<?php echo base_url();?>index.php/home/traerCartas/'+<?php echo $this->uri->segment(3);?>+'/'+<?php echo $this->uri->segment(4);?>);
			$(".juego").load('<?php echo base_url();?>index.php/home/getCartasTiradas/'+<?php echo $this->uri->segment(4);?>);
			}
</script>
<script>
$(function() {
   var pusher = new Pusher('a391e528fa86fa408ff1');
   var channel = pusher.subscribe('my_notifications');
   var notifier = new PusherNotifier(channel);
   recargar();
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