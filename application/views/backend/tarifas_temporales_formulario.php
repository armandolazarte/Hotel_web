<div class="container">
<div class="row">
	<div class="col-md-2">
		<div class="panel panel-success">
  			<div class="panel-heading">
  				<span class="icon-bed"></span> Habitaciones
  			</div>
  			<div class="panel-body">
    			<ul class="nav nav-pills nav-stacked">
	            	<li><a  href='<?php echo site_url('admin/habitacion/habitaciones_abm')?>'>Habitaciones</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/tarifas_abm')?>'>Tarifas</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/tarifas_temporales_abm')?>'>Tarifas temporales</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/monedas_abm')?>'>Monedas</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/servicios_abm')?>'>Servicios</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/tipos_habitacion')?>'>Tipos de habitación</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/tipo_tarifa_abm')?>'>Tipos tarifa</a></li>
					<li><a  href='<?php echo site_url('admin/habitacion/estados_habitacion')?>'>Estados habitación</a></li>
          		</ul>
  			</div>
		</div>
	</div>

	<div class="col-md-10">
		<div class="panel panel-success">
  			<div class="panel-heading">
  				<span class="icon-bed"></span> Habitaciones
  			</div>
  			<div class="panel-body">
  				<?php 
  					if(!empty($registro)){
  						$descripcion=$registro['tarifa_temporal'];
						$valor=$registro['valor'];
						$id_tipo_tarifa=$registro['id_tipo_tarifa'];
  					}else{
  						$descripcion="";	
						$valor=0;
						$id_tipo_tarifa=0;
  					}  				
  					
					if(!empty($mensaje)){ ?>
				<div class="alert alert-success alert-dismissible" role="alert">
				 	<button type="button" class="close" data-dismiss="alert"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
				  	<?php echo $mensaje ?>
				</div>	
				<?php }	
  				?>
  				<form action="" method="post" class="form-horizontal">
  					<link href="<?php echo base_url().'librerias/ui/jquery-ui.css'?>" rel="stylesheet" media="screen">
    				<div class="form-group even" id="adultos_field_box">
						<div class="col-sm-2 control-label" id="descripcion_display_as_box">
						Descripción<span class="required">*</span>  :
						</div>
						<div class="col-sm-10" id="descripcion">
							<input id="descripcion" name="descripcion" type="text" value="<?php echo $descripcion?>" class="numeric form-control" maxlength="11" required>		
						</div>
					</div>
    				
					<div class="form-group even" id="Salida_field_box">
						<div class="col-sm-2 control-label" id="entrada_display_as_box">
						Entrada<span class="required">*</span>  :
						</div>
						<div class="col-sm-10" id="Entrada_input_box">
							<input id="comienzo" name="entrada" type="text" value="" maxlength="10" class="form-control" autocomplete="off" required>		
						</div>
					</div>
					
					<div class="form-group even" id="Salida_field_box">
						<div class="col-sm-2 control-label" id="salida_display_as_box">
						Salida<span class="required">*</span>  :
						</div>
						<div class="col-sm-10" id="Salida_input_box">
							<input id="final" name="salida" type="text" value="" maxlength="10" class="form-control" autocomplete="off" required>		
						</div>
					</div>
					
					<div class="form-group even">
						<div class="col-sm-2 control-label">
						Tipo<span class="required">*</span>  :
						</div>
						<div class="col-sm-10">
							<select name="id_tipo_tarifa" class="chosen-select chzn-done form-control" data-placeholder="Seleccionar tipo de tarifa">
								<?php foreach ($tipos as $tipo) { ?>
									<?php if($id_tipo_tarifa==$tipo->id_tipo_tarifa){ ?>
										<option value=<?php echo $tipo->id_tipo_tarifa ?> selected><?php echo $tipo->tipo_tarifa ?></option>
									<?php }else{ ?>
										<option value=<?php echo $tipo->id_tipo_tarifa ?> ><?php echo $tipo->tipo_tarifa ?></option>
									<?php } ?>	
								<?php } ?>
							</select>				
						</div>
					</div>
					
					<div class="form-group even">
						<div class="col-sm-2 control-label">
						Valor<span class="required">*</span>  :
						</div>
						<div class="col-sm-10">
							<input id="valor" name="valor" value="<?php echo $valor ?>" maxlength="10" class="form-control" autocomplete="off" required>		
						</div>
					</div>
					
					<div class="form-group even" id="huesped_field_box">
						<div class="col-sm-2 control-label" id="huesped_display_as_box">
						Habitaciones <span class="required">*</span>  :
						</div>
						<div class="col-sm-10" id="adultos_input_box">
							<select id="id_habitaciones" name="id_habitaciones[]" class="chosen-select chzn-done form-control" data-placeholder="Seleccionar habitaciones"  multiple="">
								<?php 
								if(!empty($tarifa_habitacion)){
									foreach ($habitaciones as $habitacion) {
										if(in_array($habitacion->id_habitacion, $tarifa_habitacion)){ ?>
											<option value="<?php echo $habitacion->id_habitacion ?>" selected><?php echo $habitacion->habitacion." - ".$habitacion->hotel ?></option>
									<?php }else{?>
											<option value="<?php echo $habitacion->id_habitacion ?>"><?php echo $habitacion->habitacion." - ".$habitacion->hotel ?></option>
									<?php }
										
									} 
									
								}else{
									foreach ($habitaciones as $habitacion) { ?>
										<option value="<?php echo $habitacion->id_habitacion ?>"><?php echo $habitacion->habitacion." - ".$habitacion->hotel ?></option>
								<?php } ?>
										
								<?php } ?>
							</select>
						</div>
					</div>
					
					<div class="form-group even" id="alta_field_box">
						<div class="col-sm-2 control-label" id="alta_display_as_box">
						</div>
						<div class="col-sm-10" id="total_input_box">
							<button type="submit" name="aceptar" value="1" class="btn btn-default">Aceptar</button>		
							<a href="http://localhost/Hotel_web/index.php/admin/habitacion/tarifas_temporales_abm" class="btn btn-default">Tarifas Temporales</a>
						</div>
					</div>

    			</form>
    			<?php if(!empty($tarifa_habitacion)){ ?>
    				<div class="form-group even" id="Salida_field_box">
						<div class="col-sm-2">
							<b>Tarifa temporal</b>
						</div>
						<div class="col-sm-2">
							<b>Entrada</b>
						</div>
						<div class="col-sm-2">
							<b>Salida</b>		
						</div>
						<div class="col-sm-2">
							<b>Tipo</b>		
						</div>
						<div class="col-sm-2">
							<b>Valor</b>		
						</div>
						<div class="col-sm-2">
							<b>Habitación</b>		
						</div>
					</div>	
    			<?php foreach ($cargas as $row) { ?> 
					<div class="form-group even" id="Salida_field_box">
						<div class="col-sm-2">
							<?php echo $row->tarifa_temporal ?>
						</div>
						<div class="col-sm-2">
							<?php echo date('d/m/Y', strtotime($row->entrada)); ?>
						</div>
						<div class="col-sm-2">
							<?php echo date('d/m/Y', strtotime($row->salida)); ?>		
						</div>
						<div class="col-sm-2">
							<?php echo $row->tipo_tarifa ?>		
						</div>
						<div class="col-sm-2">
							<?php echo $row->valor ?>		
						</div>
						<div class="col-sm-2">
							<?php echo $row->habitacion ?>		
						</div>
					</div>	
						
				<?php }
    				
    			}?>
  			</div>
		</div>
    </div>
</div> 

 <script src="<?php echo base_url().'librerias/chosen/chosen.jquery.js'?>" type="text/javascript"></script>
 <script src="<?php echo base_url().'librerias/chosen/prism.js'?>" type="text/javascript" charset="utf-8"></script>
  <script type="text/javascript">
    var config = {
      '.chosen-select'           : {},
      '.chosen-select-deselect'  : {allow_single_deselect:true},
      '.chosen-select-no-single' : {disable_search_threshold:10},
      '.chosen-select-no-results': {no_results_text:'Oops, nothing found!'},
      '.chosen-select-width'     : {width:"95%"}
    }
    for (var selector in config) {
      $(selector).chosen(config[selector]);
    }
  </script>   






