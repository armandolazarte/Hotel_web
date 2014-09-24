<?php $id_hotel=$_COOKIE['id_hotel']?>
  	<aside class="flotante">
    	<div class="btn-toolbar">
			<div class="btn-group">
				<a href="javascript:agregar()" class="btn btn-footer btn-lg" title='<?php echo $texto['favoritos']?>'><i class="icon-favoritefile"></i></a>
		      	<a href="#" class="btn btn-footer btn-lg" title='<?php echo $texto['enviar_consulta']?>' data-toggle="modal" data-target="#email"><i class="icon-emailalt"></i></a>
		      	<a href="#" class="btn btn-footer btn-lg" title='<?php echo $texto['telefono']?>' data-toggle="modal" data-target="#telefono"><i class="icon-phonealt"></i></a>
		      	<a href="#" class="btn btn-footer btn-lg" title='<?php echo $texto['direccion']?>' data-toggle="modal" data-target="#direccion"><i class="icon-map"></i></a>
		      	<!--<a href="<?php echo base_url().'index.php/hoteles/como_llegar/'.$id_hotel; ?>" class="btn btn-footer btn-lg" title='<?php echo $texto['direccion']?>'><i class="icon-map-marker"></i></a>-->
		      	<a href="#" class="scrollup btn btn-footer btn-lg" title='<?php echo $texto['arriba']?>'><span class="icon-arrow-up"></span></a>
		  	</div>
		</div>      
	</aside>
  	  	
  	
  	<div class="row">
  		<div class="col-md-12">
  			<div class="panel panel-default">
  				<div class="panel-body">
  					


    


  				  	<div class="row">
  					<?php 
  					$telefono=array();
					$direccion=array();
					foreach ($hoteles as $hotel) {
  						if (!(in_array($hotel->telefono, $telefono))) {
    						$telefono[]=$hotel->telefono;	
						} 
						if (!(in_array($hotel->calle." - ".$hotel->provincia, $direccion))) {
							$direccion[]=$hotel->calle." - ".$hotel->provincia;
						}	
					} ?>
					<div class="col-md-4">			
					<center>
					<h4><i class="fa fa-phone"></i>
						<?php 
						foreach ($telefono as $key => $value) {
							echo $value."<br>";
						}
						?>
					</h4>
					</center>
					</div>
					<div class="col-md-4">
					<center>
   					<h4><i class="fa fa-map-marker"></i> 
						<?php 
						foreach ($direccion as $key => $value) {
							echo $value."<br>";
						}
						?>
					</h4>
					</center>
					</div>
					<div class="col-md-4">
					<center>
   					<h4><i class="fa fa-envelope-o"></i>
						<?php 
						if($emails_hotel){
							foreach ($emails_hotel as $email) {
								echo $email->email."<br>";
							}	
						}
						?>
					</h4>
					</center>
					</div>
				</div>
   						
    			</div>
			</div>
  		</div>
  	</div>
	 		
    
</div><!-- cierra el <div class="container"> -->


</body>
</html>
