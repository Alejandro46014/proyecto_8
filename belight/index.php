<?php

require_once 'modelos/CategoriasProductosModelo.php';
require_once("modelos/ConectarModelo.php");
require_once("modelos/ProductosModelo.php");
		
		
		
			$id=14;
                        
			$conexion=ConectarModelo::conexion();
			
			
			$sql="SELECT * FROM productos WHERE id_producto=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id,PDO::PARAM_INT);
			
			$consulta->execute();
			$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
                        
                            
			$producto=new ProductosModelo();
                 
                 $producto->setIdProducto($resultado['id_producto']);
                 $producto->setNombreProducto($resultado['nombre_producto']);
                 $categoria=new CategoriasProductosModelo($resultado['categorias_id_categoria']);
                 $producto->setCategoriaProducto($categoria);
                 $producto->setPrecioProducto($resultado['precio_producto']);
                 $producto->setDescripcionProducto($resultado['descripcion_producto']);
                 $producto->setImagenProducto($resultado['imagen_producto']);
                        
                        
echo $producto->getIdProducto()."<br>";

echo $producto->getCategoriaProducto()->getCategoria()."<br>";