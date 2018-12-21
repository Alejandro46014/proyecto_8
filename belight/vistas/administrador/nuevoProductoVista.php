
	<!--contenido principal-->
	
	<section class="seccion">
	
	<div class="formulario clearfix">
		<div class="cabecera_formularios">
		<h3>Nuevo producto</h3>
		<form action="?controller=Productos&action=guardarProducto" method="post" enctype="multipart/form-data">
		</div>
            <div 
		<div class="col_2_formulario">
			 <label for="nombre_producto">Nombre producto:<input type="text" id="nombre_producto" name="nombre_producto"/></label>
		</div>
		<div class="col_2_formulario">
			 <label for="categoria">Categoria:
                <select name="categoria_producto" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Patinetes</option>
                    <option value="2">Bicicletas</option>
                    <option value="3">SegWays</option>
                    <option value="4">NineBots</option>
                    <option value="5">HoverBoards</option>
                    
                   
                </select>
            </label>
		</div>
		<div class="col_2_formulario">
			
		</div>
		<div class="col_2_formulario">
                    <label for="directorio_imagen">Directorio imagen:<input type="text" id="directorio_imagen" name="directorio_imagen" disabled="true" placeholder="Carga automática"/></label>
		</div>
                <div class="col_2_formulario">
			 <label for="precio">Precio producto:<input type="text" id="precio" name="precio_producto"/></label>
		</div>
        
		<div class="col_formulario">
			<label for="descripcion">Descripción:<textarea name="descripcion_producto" id="sinopsis" cols="50" rows="10"></textarea></label>
		</div>
		
		
		<div class="row">
		<div class="col_formulario">
			 <label for="archivo">Archivos:<input type="file" class="form_file" id="archivo" name="archivo" ></label>
		</div>
		</div>
                
			
		<div class="col_formulario">
			  <input type="submit" name="nuevo_producto" class="buttom_green" value="Guardar"/>
                          <div class="leyenda">
			<small>* Primero cargue la imagen en el campo habilitado para ello, rellene todos los campos y a continuación guarde el producto</small>
                    </div>
		</div>
		</div>
	</section>
	
<!--FOOTER-->
	
	
	
	
	