
<!--CONTENIDO PRINCIPAL-->

<section class="seccion">
	
    <div class="formulario clearfix">
	<form action="?controller=Productos&action=buscarProductos" method="post">
            <div class="col_3_formulario">
            <label for="nombre_producto">Nombre producto<input type="text" id="nombre_producto" name="nombre_producto"/></label>
            </div>
            <div class="col_3_formulario">
            <label for="categoria_producto">Categoria producto
                <select name="categoria_producto" id="categoria_producto">
                    <option value="">--Catregoria--</option>
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
             <?php
        $cont = date("Y");
            ?>
            <div class="col_3_formulario">
            <label for="anio_lanzamiento">Año lanzamiento
                <select name="anio_lanzamiento" id="anio_lanzamiento">
                    <option value="">--Año lanzamiento--</option>
                  <?php while ($cont >= 1950) { ?>
                    
         <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
            <?php $cont = ($cont-1); } ?>   
                </select>
                </label>
            </div>
            <div class="col_formulario">
                <input type="submit" name="buscar" value="Buscar" class="buttom_green"/>
            </div>
        </form>
    </div>
    <div class="row">
        
    </div>
    <?php  foreach($productos as $producto) { ?>
    
	<div class="formulario clearfix">
            
		<div class="cabecera_formularios">
                    <h3>Modificar producto <?php echo $producto->getIdProducto(); ?></h3>
		<form action="?controller=Productos&action=actualizarProducto&id=<?php echo $producto->getIdProducto();  ?>" method="post" enctype="multipart/form-data">
		</div>
            <div class="col_2_formulario">
		<label for="nombre_producto">Título película:<input type="text" id="nombre_producto" name="nombre_producto" value="<?php echo $producto->getNombreProducto(); ?>"/></label><br>
            </div>
            <div class="col_2_formulario"> 
               <label for="nombre_original_producto">Titulo Original:<input type="text" id="nombre_original_producto" name="nombre_original_producto" value="<?php echo $producto->getNombreOriginalProducto(); ?>"/></label><br>
            </div>
            <div class="col_2_formulario">
 <?php if($producto->getCategoria()->getIdCategoria()==1){ ?>
            <label for="categoria">Categoria:
                <select name="categoria" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="<?php echo $producto->getCategoria()->getIdCategoria(); ?>" selected >Acción</option>
                    <option value="2">Terror</option>
                    <option value="3">Románticas</option>
                    <option value="4">Infantiles</option>
                    <option value="5">Comedia</option>
                    <option value="6">Ciencia-ficción</option>
                    <option value="7">Drama</option>
                    <option value="8">Musicales</option>
                   
                </select>
            </label><br>
            <?php } elseif ($producto->getCategoria()->getIdCategoria()==2) { ?>
            
            <label for="categoria">Categoria:
                <select name="categoria" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1">Acción</option>
                    <option value="<?php echo $producto->getCategoria()->getIdCategoria(); ?>" selected >Terror</option>
                    <option value="3">Románticas</option>
                    <option value="4">Infantiles</option>
                    <option value="5">Comedia</option>
                    <option value="6">Ciencia-ficción</option>
                    <option value="7">Drama</option>
                    <option value="8">Musicales</option>
                   
                </select>
            </label><br>
            <?php } elseif ($producto->getCategoria()->getIdCategoria()==3) { ?>
            
            <label for="categoria">Categoria:
                <select name="categoria" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Acción</option>
                    <option value="2">Terror</option>
                    <option value="<?php echo $producto->getCategoria()->getIdCategoria(); ?>" selected>Románticas</option>
                    <option value="4">Infantiles</option>
                    <option value="5">Comedia</option>
                    <option value="6">Ciencia-ficción</option>
                    <option value="7">Drama</option>
                    <option value="8">Musicales</option>
                   
                </select>
            </label><br>
           
            <?php }elseif ($producto->getCategoria()->getIdCategoria()==4) { ?>
            
                <label for="categoria">Categoria:
                <select name="categoria" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Acción</option>
                    <option value="2">Terror</option>
                    <option value="3">Románticas</option>
                    <option value="<?php echo $producto->getCategoria()->getIdCategoria(); ?>" selected>Infantiles</option>
                    <option value="5">Comedia</option>
                    <option value="6">Ciencia-ficción</option>
                    <option value="7">Drama</option>
                    <option value="8">Musicales</option>
                   
                </select>
            </label><br>
            <?php }elseif ($producto->getCategoria()->getIdCategoria()==5) { ?>
            
            <label for="categoria">Categoria:
                <select name="categoria" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Acción</option>
                    <option value="2">Terror</option>
                    <option value="3">Románticas</option>
                    <option value="4">Infantiles</option>
                    <option value="<?php echo $producto->getCategoria()->getIdCategoria(); ?>" selected>Comedia</option>
                    <option value="6">Ciencia-ficción</option>
                    <option value="7">Drama</option>
                    <option value="8">Musicales</option>
                   
                </select>
            </label><br>
            
            <?php }elseif ($producto->getCategoria()->getIdCategoria()==6) { ?>
            
            <label for="categoria">Categoria:
                <select name="categoria" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Acción</option>
                    <option value="2">Terror</option>
                    <option value="3">Románticas</option>
                    <option value="4">Infantiles</option>
                    <option value="5">Comedia</option>
                    <option value="<?php echo $producto->getCategoria()->getIdCategoria(); ?>" selected>Ciencia-ficción</option>
                    <option value="7">Drama</option>
                    <option value="8">Musicales</option>
                   
                </select>
            </label><br>
            
            <?php }elseif ($producto->getCategoria()->getIdCategoria()==7) { ?>
            
            <label for="categoria">Categoria:
                <select name="categoria" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Acción</option>
                    <option value="2">Terror</option>
                    <option value="3">Románticas</option>
                    <option value="4">Infantiles</option>
                    <option value="5">Comedia</option>
                    <option value="6">Ciencia-ficción</option>
                    <option value="<?php echo $producto->getCategoria()->getIdCategoria(); ?>" selected>Drama</option>
                    <option value="8">Musicales</option>
                   
                </select>
            </label><br>
            
            <?php }elseif ($producto->getCategoria()->getIdCategoria()==8) { ?>
            
                <label for="categoria">Categoria:
                <select name="categoria" id="categoria">
                    <option value="">---Categoria--</option>
                    <option value="1" >Acción</option>
                    <option value="2">Terror</option>
                    <option value="3">Románticas</option>
                    <option value="4">Infantiles</option>
                    <option value="5">Comedia</option>
                    <option value="6">Ciencia-ficción</option>
                    <option value="7">Drama</option>
                    <option value="<?php echo $producto->getCategoria()->getIdCategoria(); ?>" selected>Musicales</option>
                   
                </select>
            </label><br>
            
                <?php } ?>
            </div>
            <?php
        $cont = $producto->getAnioLanzamiento();
            ?>
            <div class="col_2_formulario">
            <label for="anio_lanzamiento">Año de lanzamiento:
                
                <select id="anio_lanzamiento" name="anio_lanzamiento">
        <?php while ($cont >= 1950) { ?>
         <option value="<?php echo($cont); ?>"><?php echo($cont); ?></option>
            <?php $cont = ($cont-1); } ?>
</select></label><br>
            </div>
            <div class="col_2_formulario">
            <label for="reparto">Reparto:<input type="text" id="reparto" name="reparto" value="<?php echo $producto->getReparto(); ?>"/></label><br>
            </div>
            <div class="col_2_formulario">
            <label for="director">Director:<input type="text" id="director" name="director" value="<?php echo $producto->getDirector(); ?>"/></label><br>
            </div>
            <div class="col_formulario">
            <label for="sinopsis">Sinopsis:<textarea name="sinopsis" id="sinopsis" cols="6" rows="10"><?php echo $producto->getSinopsis(); ?></textarea></label><br>
            </div>
            <h3>Imagenes</h3>
           
    <?php foreach ($producto->getImagenes() as $imagen){ ?>
            
         <div class="col_3_formulario">
          <input type="hidden" name="id_imagen[]" value="<?php echo $imagen->getIdImagen(); ?>"/>   
     <?php if ($imagen->getNombreImagen()=="Portada"){?>
            
            
            <label for="nombre_imagen">Nombre imagen:
                <select name="nombre_imagen[]" id="nombre_imagen">
                    <option value="">---Nombre imagen--</option>
                    <option  selected >Portada</option>
                    <option>Escena</option>
                   
                   
                </select>
            </label>
                
            
     <?php }elseif ($imagen->getNombreImagen()=="Escena") { ?>
               
            
          <label for="nombre_imagen">Nombre imagen:
                <select name="nombre_imagen[]" id="nombre_imagen">
                    <option value="">---Nombre imagen--</option>
                    <option >Portada</option>
                    <option  selected >Escena</option>
                   
                   
                </select>
            </label>
       
            
            
                   <?php } ?>
            
             <label for="directorio_imagen">Directorio:<input type="text" id="directorio_imagen" name="directorio_imagen[]" value="<?php echo $imagen->getDirectorioImagen(); ?>"/></label><br>       
         </div>
            <?php } ?>
             <div class="col_formulario">
                 <input type="submit" name="modificar_producto" value="Guardar" class="buttom_green"/><br>
             </div>
             <div class="col_formulario ">
                 <a class="buttom_red" href="?controller=Productos&action=eliminarProducto&id=<?php echo $producto->getIdProducto(); ?>">Eliminar producto</a>
        
                </div>
            
             </form>
                </div>
    <div class="row"></div>
        <?php  } ?>
		
	</section>



