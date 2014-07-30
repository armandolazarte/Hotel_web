<?php 
if($cantidad_categorias==3 || $cantidad_categorias==2 || $cantidad_categorias==1){ 
	echo "<div class='row'>";
	 	foreach ($articulos as $articulo) { ?>
			<div class="col-md-<?php echo 12/$cantidad_categorias?>">
				<div class="panel panel-default">
			  		<div class="panel-heading"><?php echo $articulo->categoria;?></div>
			  		<div class="panel-body">
			  			<?php if($articulo->archivo_url!=""){?>
			    			<img class="img-circle img-banner" src="<?php echo base_url().'assets/uploads/articulos/'.$articulo->archivo_url?>">
			    		<?php } ?>
			    		<div class="text-banner">
			    			<?php echo $articulo->articulo; ?>
			    		</div>
					</div>
				</div>
			</div>			
	<?php }
	echo "</div>";
}else if($cantidad_categorias==4 || $cantidad_categorias==6){  
	$i=0;
	foreach ($articulos as $articulo) { 
		if($i==0 || $cantidad_categorias*0.5==$i){
			echo "<div class='row'>";
		} ?>		
			<div class="col-md-<?php echo 24/$cantidad_categorias?>">
				<div class="panel panel-default">
			  		<div class="panel-heading"><?php echo $articulo->categoria;?></div>
			  		<div class="panel-body">
			  			<?php if($articulo->archivo_url!=""){?>
			    			<img class="img-circle img-banner" src="<?php echo base_url().'assets/uploads/articulos/'.$articulo->archivo_url?>">
			    		<?php } ?>
			    		<div class="text-banner">
			    			<?php echo $articulo->articulo; ?>
			    		</div>
					</div>
				</div>
			</div>			
	<?php
		if(($cantidad_categorias*0.5)-1==$i || $cantidad_categorias-1==$i){
			echo "</div>";
		} 
	$i=$i+1;
	}//cierra el foreach 
}else if($cantidad_categorias==5){ 
	$i=0;
	foreach ($articulos as $articulo) { 
		if($i==0 || $i==3){
			echo "<div class='row'>";
		} ?>		
			<div class="col-md-<?php if($i<3){ echo 4;}else{ echo 6;}?>">
				<div class="panel panel-default">
			  		<div class="panel-heading"><?php echo $articulo->categoria;?></div>
			  		<div class="panel-body">
			  			<?php if($articulo->archivo_url!=""){?>
			    			<img class="img-circle img-banner" src="<?php echo base_url().'assets/uploads/articulos/'.$articulo->archivo_url?>">
			    		<?php } ?>
			    		<div class="text-banner">
			    			<?php echo $articulo->articulo; ?>
			    		</div>
					</div>
				</div>
			</div>			
	<?php
		if($i==2 || $i==4){
			echo "</div>";
		} 
	$i=$i+1;
	}//cierra 

}else{ 
	$i=0;
	foreach ($articulos as $articulo) { 
		if($i==0 || $i==3){
			echo "<div class='row'>";
		} 
		if($i<6){ ?>		
			<div class="col-md-<?php echo 4?>">
				<div class="panel panel-default">
			  		<div class="panel-heading"><?php echo $articulo->categoria;?></div>
			  		<div class="panel-body">
			  			<?php if($articulo->archivo_url!=""){?>
			    			<img class="img-circle img-banner" src="<?php echo base_url().'assets/uploads/articulos/'.$articulo->archivo_url?>">
			    		<?php } ?>
			    		<div class="text-banner">
			    			<?php echo $articulo->articulo; ?>
			    		</div>
					</div>
				</div>
			</div>			
	<?php
			if($i==2 || $i==5){
				echo "</div>";
			}
		}else if($i==6)	{ ?>
			<div class='row'>
			<div class="col-md-12">
				<div class="panel panel-default">
			  		<div class="panel-heading">Otros</div>
			  		<div class="panel-body">
			    		<div class="text-banner">
			    <?php	} ?>
							<?php if($i>5){echo $articulo->categoria;?> - <?php echo $articulo->titulo; }?>
<?php	if($i==$cantidad_categorias-1){ ?>
			    		</div>
					</div>
				</div>
			</div>	
			</div>	
			
			
<?php	}
		
	$i=$i+1;
	}//cierra el foreach 
 } ?>


	