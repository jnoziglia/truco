<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html lang="es">
    <head>
        <meta charset="utf-8" />
        <title>Truco</title>
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <?php echo add_style('bootstrap');?>
        <?php echo add_style('truco');?>
        <?php echo add_style('gritter');?>
        <?php echo add_jscript('jquery');?>
        <?php echo add_jscript('gritter.min');?>		
        <?php echo add_jscript('bootstrap.min');?>
		<script src="//js.pusher.com/2.2/pusher.min.js"></script>
        <?php echo add_jscript('pusherNotifier');?>

      	
    </head>
<body>
<div class="row resetMargin">
        <div class="col-md-12 resetPadding">
           <nav class="navbar navbar-default" role="navigation">
			  <div class="container-fluid nav8a">
				<!-- Brand and toggle get grouped for better mobile display -->
				<div class="navbar-header">
				  <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
					<span class="sr-only">Toggle navigation</span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
					<span class="icon-bar"></span>
				  </button>
				  <a class="navbar-brand" href="<?php echo base_url();?>dashboard"><img src="<?=base_url();?>images/logo_8a.png" /></a>
				</div>
				
			
				<div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
				  <ul class="nav navbar-nav">
				  </ul>
				 
				</div><!-- /.navbar-collapse -->
			  </div><!-- /.container-fluid -->
			</nav>
        </div>
    </div>
<div class="container">
    <?php echo $content_for_layout?>
    
</div>
</body>
</html>