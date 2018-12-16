<section class="seccion">
	<div class="formulario clearfix">
		<form action="?controller=Productos&action=buscarProductos" method="post">
		<div class="col_3_formulario">
			<label for="id_producto">Id producto:<br> <input type="number" id="id_producto" name="id_producto"/></label>
		</div>
                    <div class="col_3_formulario">
                        <label for="nombre_producto">Nombre producto:<br> <input type="text" id="nombre_producto" name="nombre_producto"/></label>
		</div>
		<div class="col_3_formulario">
			<label for="categoria" >Categoria:<br>
                <select name="categoria_producto" class="categoria">
                    <option value="">--Categoria--</option>
                    <option value="1">Patinetes</option>
                    <option value="2">Bicicletas</option>
                    <option value="3">SegWays</option>
                    <option value="4">NineBots</option>
                    <option value="5">HoverBoards</option>
                    
                </select>
            </label>
		</div>
		
			<div class="col_formulario">
				<input type="submit" name="buscar" value="Buscar" class="buttom_green"/>
			</div>
		</form>
	</div>
	<div class="lista_usuarios">
	<div class="tabla">
		
		<table class="tabla">
	
	<tr>
		<th>Id</th>
		<th>Nombre</th>
		<th>Categoria</th>
		<th>Descripción</th>
		<th>Precio</th>
                <th colspan="2">Imagen</th>
		
		<th colspan=2 >Acciones</th>
	</tr>
<?php foreach ($productos as $producto) { ?>
		
			<tr>
				<td><?php echo $producto->getIdProducto(); ?></td>
				<td><?php echo $producto->getNombreProducto(); ?></td>
                                <td><?php echo $producto->getCategoriaProducto()->getCategoria(); ?></td>
                                <td><?php echo $producto->getDescripcionProducto(); ?></td>
                                <td><?php echo $producto->getPrecioProducto(); ?></td>
                                <td colspan="2"><img class="imgtd" src="<?php echo $producto->getImagenProducto(); ?>" alt="Imagen del producto"/></td>
				
				
				<td><a href="?controller=Productos&action=modificarProducto&id=<?php echo $producto->getIdProducto(); ?>">Actualizar</a> </td>
				<td><a href="?controller=Administrador&action=eliminarProducto&id=<?php echo $producto->getIdProducto(); ?>">Eliminar</a> </td>
			</tr>
			
	<?php } ?>
</table>
		</div>
	</div>
	
	</section><!--fin contenido-->
	