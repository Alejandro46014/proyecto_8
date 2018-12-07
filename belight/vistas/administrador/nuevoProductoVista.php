
	<!--contenido principal-->
	
	<section class="seccion">
	
	<div class="formulario clearfix">
		<div class="cabecera_formularios">
		<h3>Nuevo producto</h3>
		<form action="?controller=Productos&action=guardarProducto" method="post" enctype="multipart/form-data">
		</div>
		<div class="col_2_formulario">
			 <label for="nombre_producto">Título película:<input type="text" id="nombre_producto" name="nombre_producto"/></label>
		</div>
		<div class="col_2_formulario">
			<label for="nombre_original_producto">Titulo Original:<input type="text" id="nombre_original_producto" name="nombre_original_producto"/></label>
		</div>
		<div class="col_2_formulario">
			 <label for="categoria">Categoria:
                <select name="categoria" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1">Acción</option>
                    <option value="2">Terror</option>
                    <option value="3">Románticas</option>
                    <option value="4">Infantiles</option>
                    <option value="5">Comedia</option>
                    <option value="6">Ciencia-ficción</option>
                    <option value="7">Drama</option>
                    <option value="8">Musicales</option>
                   
                </select>
            </label>
		</div>
		<div class="col_2_formulario">
			 <?php
        $cont = date('Y');
            ?>
            <label for="anio_lanzamiento">Año de lanzamiento:
                
     <select id="anio_lanzamiento" name="anio_lanzamiento">
        <?php while ($cont >= 1950) { ?>
         <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
            <?php $cont = ($cont-1); } ?>
	</select></label>
		</div>
		<div class="col_2_formulario">
			 <label for="reparto">Reparto:<input type="text" id="reparto" name="reparto"/></label>
		</div>
		<div class="col_2_formulario">
			 <label for="director">Director:<input type="text" id="director" name="director"/></label>
		</div>
		<div class="col_formulario">
			<label for="sinopsis">Sinopsis:<textarea name="sinopsis" id="sinopsis" cols="50" rows="10"></textarea></label>
		</div>
		<h3>Imagenes</h3>
		<div class="col_3_formulario">
			 <label for="nombre_imagen">Imagen 1
                <select name="nombre_imagen[]" id="nombre_imagen">
             		<option value="">--Nombre imagen--</option> 
                    <option>Portada</option>
                    <option>Escena</option>
                 
                     </select>
                     </label>
		</div>
		<div class="col_3_formulario">
			<label for="nombre_imagen">Imagen 2
                <select name="nombre_imagen[]" id="nombre_imagen">
             		<option value="">--Nombre imagen--</option> 
                    <option>Portada</option>
                    <option>Escena</option>
                 
                     </select>
                     </label>
		</div>
		<div class="col_3_formulario">
			 <label for="nombre_imagen">Imagen 2
                <select name="nombre_imagen[]" id="nombre_imagen">
             		<option value="">--Nombre imagen--</option> 
                    <option>Portada</option>
                    <option>Escena</option>
                 
                     </select>
                     </label>
		</div>
		<div class="row">
		<div class="col_formulario">
			 <label for="archivo">Archivos:<input type="file" class="form_file" id="archivo" name="archivo[]" multiple=""></label>
		</div>
		</div>
                
			<div class="leyenda">
			<small>* Las imagenes se pueden cargar de una sola vez. Tres imagenes por película, dos escenas y una portada. Seleccione los tres archivos,
				elija el nombre y después de rellenar todos los campos guardará el producto y las imagenes</small>
                    </div>
		<div class="col_formulario">
			  <input type="submit" name="nuevo_producto" class="buttom_green" value="Guardar"/>
		</div>
		</div>
	</section>
	
<!--FOOTER-->
	
	
	
	
	