
<!--CONTENIDO PRINCIPAL-->

<section class="seccion"> 
    
	<div class="formulario clearfix">
            <div class="cabecera_formularios">
		    <h3>Modificar producto <?php echo $producto->getIdProducto(); ?></h3>
		<form action="?controller=Productos&action=actualizarProducto&id=<?php echo $producto->getIdProducto();  ?>" method="post">
		</div>
            <div class="col_2_formulario">
		<label for="nombre_producto">Nombre del producto:<input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo $producto->getNombreProducto(); ?>"/></label>
            </div>
            
            <div class="col_2_formulario">

            <?php if ($producto->getCategoriaProducto()->getIdCategoria()==1) { ?>
            
                <label for="categoria">Categoria:
                <select name="categoria_producto" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="<?php echo $producto->getCategoriaProducto()->getIdCategoria(); ?>" selected>Patinetes</option>
                    <option value="2">Bicicletas</option>
                    <option value="3">SegWays</option>
                    <option value="4">NineBots</option>
                    <option value="5">HoverBoards</option>
                    
                   
                </select>
            </label>
            <?php }elseif ($producto->getCategoriaProducto()->getIdCategoria()==2) { ?>
            
                <label for="categoria">Categoria:
                <select name="categoria_producto" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Patinetes</option>
                    <option value="<?php echo $producto->getCategoriaProducto()->getIdCategoria(); ?>" selected>Bicicletas</option>
                    <option value="3">SegWays</option>
                    <option value="4">NineBots</option>
                    <option value="5">HoverBoards</option>
                    
                   
                </select>
            </label>
            
            <?php }elseif ($producto->getCategoriaProducto()->getIdCategoria()==3) { ?>
            
                <label for="categoria">Categoria:
                <select name="categoria_producto" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Patinetes</option>
                    <option value="2">Bicicletas</option>
                    <option value="<?php echo $producto->getCategoriaProducto()->getIdCategoria(); ?>" selected>SegWays</option>
                    <option value="4">NineBots</option>
                    <option value="5">HoverBoards</option>
                    
                   
                </select>
            </label>
            
            <?php }elseif ($producto->getCategoriaProducto()->getIdCategoria()==4) { ?>
            
                <label for="categoria">Categoria:
                <select name="categoria_producto" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Patinetes</option>
                    <option value="2">Bicicletas</option>
                    <option value="3">SegWays</option>
                    <option value="<?php echo $producto->getCategoriaProducto()->getIdCategoria(); ?>" selected>NineBots</option>
                    <option value="5">HoverBoards</option>
                    
                   
                </select>
                </label>
            
            <?php }elseif ($producto->getCategoriaProducto()->getIdCategoria()==5) { ?>
            
                <label for="categoria">Categoria:
                <select name="categoria_producto" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Patinetes</option>
                    <option value="2">Bicicletas</option>
                    <option value="3">SegWays</option>
                    <option value="4">NineBots</option>
                    <option value="<?php echo $producto->getCategoriaProducto()->getIdCategoria(); ?>" selected>HoverBoards</option>
                    
                   
                </select>
            </label>
            
                <?php } ?>
            </div>
            
            <div class="col_2_formulario">
            <label for="precio">Precio: <input type="text" id="precio" name="precio_producto" value="<?php echo $producto->getPrecioProducto(); ?>"/></label>
            </div>
            <div class="col_2_formulario">
            <label for="director">Drectorio imagen:<input type="text" id="imagen_producto" name="imagen_producto" value="<?php echo $producto->getImagenProducto(); ?>"/></label>
            </div>
            <div class="col_formulario">
            <label for="descripcion">Descripción:<textarea name="descripcion_producto" id="descripcion" cols="6" rows="10"><?php echo $producto->getDescripcionProducto(); ?></textarea></label>
            </div>
             <div class="col_formulario">
                 <input type="submit" name="modificar_producto" value="Modificar" class="buttom_green"/>
             </div>
                      
             </form>
                </div>
   		
	</section>



