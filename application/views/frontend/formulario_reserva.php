<?php foreach ($configs as $config) {
	$max_adultos=$config->max_adultos;
	$max_menores=$config->max_menores;
}?>

<div class="row">
	<div class="col-md-3">
		<div class="panel panel-hotel">
	  		<div class="panel-heading">Reserva online</div>
	  		<div class="panel-body">
	  			<?php echo form_open('reserva/habitacion');?> 
	    			<div class="form-group">
						<label for="exampleInputEmail1"><i class="fa fa-sign-in"></i> Entrada</label>
						<div class="input-group">
							<div class="input-group-addon" onclick="document.getElementById('entrada').focus();">
								<span class="icon-calendarthree"></span>
							</div>
      						<input class="form-control" name="entrada" id="entrada" type="entrada" placeholder="Fecha entrada" value="<?php echo date("d/m/Y",  strtotime("+1 day")); ?>" autocomplete="off">
    					</div>
				  	</div>
				  	<div class="form-group">
					    <label for="exampleInputEmail1"><i class="fa fa-sign-out"></i> Salida</label>
						<div class="input-group">
							<div class="input-group-addon" onclick="document.getElementById('salida').focus();">
								<span class="icon-calendarthree"></span>
							</div>
      						<input class="form-control" name="salida" id="salida" type="salida" placeholder="Fecha salida" value="<?php echo date("d/m/Y",  strtotime("+2 day")); ?>" autocomplete="off">
    					</div>
					</div>
					<div class="form-group">
						<label for="exampleInputPassword1"><i class="fa fa-user"></i> Ocupación</label>
						<select class="form-control" name="adultos">
							<?php $i=1;
							do{
								if($i==1){ ?>
									<option value="<?php echo $i;?>"><?php echo $i;?> adulto</option>	
								<?php }else{?>
									<option value="<?php echo $i;?>" <?php if($i==2){echo "selected";};?>><?php echo $i;?> adultos</option>
							<?php 
								}
							$i=$i+1;
							}while($i<=$max_adultos);?>
						</select>
			     		<select class="form-control" name="menores">
				  			<?php $i=0;
							do{
								if($i==0){ ?>
									<option value="<?php echo $i;?>">sin menores</option>
								<?php }else if($i==1){ ?>
									<option value="<?php echo $i;?>"><?php echo $i;?> menor</option>	
								<?php }else{?>
									<option value="<?php echo $i;?>"><?php echo $i;?> menores</option>
							<?php 
								}
		
							$i=$i+1;
							}while($i<=$max_menores);?>
						</select>
					</div>
			  		<div class="form-group">
						<label for="exampleInputPassword1"><i class="fa fa-building"></i> Hotel</label>
						<select class="form-control" name="hotel">
							<?php 
							foreach ($hoteles as $hotel) { ?>
								<option value="<?php echo $hotel->id_hotel;?>"><?php echo $hotel->hotel;?></option>
							<?php } ?>
						</select>
			  		</div>
					<div class="form-group">
						<center>
							<button type="submit" class="btn btn-hotel btn-xlarge">
								<span class="icon-ok"></span>
							</button>		
						</center>
				  	</div>
				<?php echo form_close(); ?>	
			</div>
		</div>
		<?php if(isset($monedas)){ ?>
		<div class="panel panel-hotel">
			<div class="panel-heading">Monedas</div>
	  		<div class="panel-body">
	  			<form method="post" action="<?php echo base_url().'index.php/reserva/habitacion' ?>">
	  				<input type="hidden" name="entrada" value="<?php echo $this->input->post('entrada') ?>">
						<input type="hidden" name="salida" value="<?php echo $this->input->post('salida') ?>">
						<input type="hidden" name="adultos" value="<?php echo $this->input->post('adultos') ?>">
						<input type="hidden" name="menores" value="<?php echo $this->input->post('menores') ?>">
						<input type="hidden" name="hotel" value="<?php echo $this->input->post('hotel') ?>">
	  			<?php foreach ($monedas as $moneda) { ?>
						<input class="moneda" name="boton1" type="image" title="<?php echo $moneda->moneda;?> - <?php echo $moneda->abreviatura;?>" rel="tooltip" src="<?php echo base_url().'assets/uploads/monedas/'.$moneda->imagen;?>" onclick="document.cookie = 'moneda=<?php echo $moneda->id_moneda ?>'">
				<?php } ?>
				</form>  
	  		</div>
		</div>
		<?php } ?>
	</div>
	
	
	
	
	
	<!--
		Para elegir por tipos
		
		<label for="exampleInputPassword1"><i class="fa fa-user"></i> Tipo</label>
						<select class="form-control" name="tipo">
							<?php 
							foreach ($tipos_habitacion as $tipo) { ?>
								<option value="<?php echo $tipo->id_tipo_habitacion;?>"><?php echo $tipo->tipo_habitacion;?></option>
							<?php } ?>
						</select>
	-->