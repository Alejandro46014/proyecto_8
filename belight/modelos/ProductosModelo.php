<?php
require_once 'CategoriasProductosModelo.php';

class ProductosModelo{
	
	private $id_producto,$nombre_producto,$precio_producto,$descripcion_producto,$imagen_producto,$categoria_producto;
       


        public function __construct(){
            
	}
        
        


        /*-------------------------GETTERS-----------------------------*/
	public function getIdProducto(){
		
		return($this->id_producto);
	}
	
	public function getNombreProducto(){
		
		return($this->nombre_producto);
	}
   
	
	public function getPrecioProducto(){
		
		return($this->precio_producto);
	}
	
	public function getDescripcionProducto(){
		
		return($this->descripcion_producto);
	}
	
	public function getImagenProducto(){
		
		return($this->imagen_producto);
	}
	
	
	public function getCategoriaProducto(){
		
		return($this->categoria_producto);
	}
       

        /*-------------------------SETTERS-----------------------------*/
	
	public function setIdProducto($id){
		
		$this->id_producto=$id;
	}
	
	public function setNombreProducto($nombre){
		
		$this->nombre_producto=$nombre;
	}
        
        public function setPrecioProducto($precio_producto){
		
		$this->precio_producto=$precio_producto;
	}
	
	public function setDescripcionProducto($descripcion_producto){
		
		$this->descripcion_producto=$descripcion_producto;
	}
	
	public function setImagenProducto($imagen_producto){
		
		$this->imagen_producto=$imagen_producto;
	}
	
	
	public function setCategoriaProducto($categoria_producto){
		
            $this->categoria_producto=$categoria_producto;
	}

        /*---------------------------------GetTodo--------------------------------------*/
        public function getTodo(){
           require_once 'CategoriasProductosModelo.php';
            require_once("ConectarModelo.php");
		
		
		try{
                        
		$lista_productos=[];
		$conexion=ConectarModelo::conexion();
			
            
            $sql="SELECT * FROM productos  ORDER BY id_producto DESC";
            $consulta=$conexion->prepare($sql);
            $consulta->execute();
            $resultado=$consulta->fetchAll();
            
          
          if($resultado){
               
             foreach ($resultado as $fila){
                        
                 $producto=new ProductosModelo();
                 
                 $producto->id_producto=$fila['id_producto'];
                 $producto->nombre_producto=$fila['nombre_producto'];
                 $categoria=new CategoriasProductosModelo($fila['categorias_id_categoria']);
                 $producto->setCategoriaProducto($categoria);
                 $producto->precio_producto=$fila['precio_producto'];
                 $producto->descripcion_producto=$fila['descripcion_producto'];
                 $producto->imagen_producto=$fila['imagen_producto'];
                 
                 $lista_productos[]=$producto;
                 
                }
                   
          }  
			$consulta->closeCursor();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		return($lista_productos);
        }


        /*---------------------------------GetById--------------------------------------*/
	public function getById($id){
            require_once 'CategoriasProductosModelo.php';
            require_once("ConectarModelo.php");
		
		
		try{
			
			$conexion=ConectarModelo::conexion();
			
			
			$sql="SELECT * FROM productos WHERE id_producto=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id,PDO::PARAM_INT);
			
			$consulta->execute();
			$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
                        if ($resultado){
                            
			$producto=new ProductosModelo();
                 
                 $producto->id_producto=$resultado['id_producto'];
                 $producto->nombre_producto=$resultado['nombre_producto'];
                 $categoria=new CategoriasProductosModelo($resultado['categorias_id_categoria']);
                 $producto->categoria_producto=$categoria;
                 $producto->precio_producto=$resultado['precio_producto'];
                 $producto->descripcion_producto=$resultado['descripcion_producto'];
                 $producto->imagen_producto=$resultado['imagen_producto'];
                        
                        }
			$consulta->closeCursor();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		return($producto);
        }
        /*---------------------------NUEVO PRODUCTO ADMINISTRADOR---------------------*/
	
	
	public function guardar(){
		
		
		require_once("ConectarModelo.php");
              
		
		try{
			$conexion=ConectarModelo::conexion();
			
			$nombre_producto= $this->nombre_producto;
			$categoria= $this->categoria_producto->getIdCategoria();
                        $precio= $this->precio_producto;
                        $descripcion= $this->descripcion_producto;
                        $imagen= $this->imagen_producto;
                        
                        $mal=FALSE;
                        $mal2=FALSE;
                        $mal3=FALSE;
                        $mal4=FALSE;
                        $mal5=FALSE;
                        $mal6=FALSE;
                        $mal7=FALSE;
                        $mal8=FALSE;
                        
                    if (empty($nombre_producto)){
                        
                        echo '<p>El campo nombre producto no puedes estar vacío</p>';
                        
                        $mal=TRUE;    
                    }
                    
                    if (empty($categoria)){
                        
                        echo '<p>El campo categoria debe estar seleccionado</p>';
                        
                        $mal3=TRUE;
                    }
                    
                    $patron="/[0-9]/";
                    
                    if (empty($precio)){
                            
                         echo '<p>El campo año de lanzamiento no puede estar vacío</p>';
                         
                        $mal4=TRUE;
                    }
                    
                    if (!preg_match($patron, $precio)){
                        
                        echo '<p>El campo precio solo puede contener números</p>';
                        
                        $mal5=TRUE;
                    }
                    
                    if (empty($descripcion)){
                        
                        echo '<p>El campo descripcion no puede estar vacío</p>';
                        
                        $mal7=TRUE;
                    }
                    
                    
                    
                    if (empty($imagen)){
                        
                        echo 'Debe incluir una imagen';
                        $mal8=TRUE;
                    }
                    
                    if ($mal || $mal2 || $mal3 || $mal4 || $mal5 ||$mal6 || $mal7 || $mal8){
                        
                        echo '<script type="text/javascript">
				alert("Revise los campos e intentelo de nuevo");
				</script>';
                        
                    }
                        
			
                        
			$sql="INSERT INTO productos (nombre_producto,categorias_id_categoria,precio_producto,descripcion_producto,imagen_producto)"
                                . " VALUES(:nombre,:categoria,:precio,:descripcion,:imagen)";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':nombre',$nombre_producto,PDO::PARAM_STR);
                        $consulta->bindParam(':categoria',$categoria,PDO::PARAM_INT);
                        $consulta->bindParam(':precio',$precio,PDO::PARAM_INT);
			$consulta->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
			$consulta->bindParam(':imagen',$imagen,PDO::PARAM_STR);
			
			
			$resultado=$consulta->execute();
	
			$consulta->closeCursor();
                        
                        
			if($resultado){
				
				
				echo '<script type="text/javascript">
				alert("El producto se creó correctamente");
				</script>';
				
				
			}else{
				
				echo '<script type="text/javascript">
				alert("El producto no se pudo guardar");
				</script>';
			}
                        
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
          
		}
		
		$conexion=null;
		
	}
        
        /*---------------------------Actualizar ≤ productos------------------------------*/
        
        public function actualizar($id){
		
	
		require_once("ConectarModelo.php");
		
		try{
			$conexion=ConectarModelo::conexion();
			
			$nombre_producto= $this->nombre_producto;
			$categoria= $this->categoria_producto->getIdCategoria();
                        $precio= $this->precio_producto;
                        $descripcion= $this->descripcion_producto;
                        $imagen= $this->imagen_producto;
			
                        
                        
                                
			$sql="UPDATE productos  SET nombre_producto=:nombre, categorias_id_categoria=:categoria, precio_producto=:precio,"
                                . " descripcion_producto=:descripcion,imagen_producto=:imagen WHERE id_producto=:id";
			
			$consulta=$conexion->prepare($sql);
			
                        $consulta->bindParam(':id',$id,PDO::PARAM_INT);
                        $consulta->bindParam(':nombre',$nombre_producto,PDO::PARAM_STR);
                        $consulta->bindParam(':categoria',$categoria,PDO::PARAM_INT);
                        $consulta->bindParam(':precio',$precio,PDO::PARAM_STR);
			$consulta->bindParam(':descripcion',$descripcion,PDO::PARAM_STR);
			$consulta->bindParam(':imagen',$imagen,PDO::PARAM_STR);
                        
                        
			
			$consulta->execute();
			
			
			$resultado=$consulta->closeCursor();
                     
			if($resultado){
				
				
				echo '<script type="text/javascript">
				alert("El producto se actualizó correctamente");
				</script>';
				
				
			}else{
				
				echo '<script type="text/javascript">
				alert("El producto no se pudo actualizar");
				</script>';
			}
                        
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
                        
                        
		}
		
		$conexion=null;
		
	}
	
        
        
        /*---------------------------ELIMINAR PRODUCTO POR ID---------------------*/
	
	public function eliminar($id){
		
		require_once("ConectarModelo.php");
		
		
		try{
			$conexion=ConectarModelo::conexion();
			$sql="DELETE FROM productos WHERE id_producto=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id,PDO::PARAM_INT);
			
			$resultado=$consulta->execute();
			
			if($resultado){
				
				
				echo '<script type="text/javascript">
				alert("El producto se eliminó correctamente");
				</script>';
				
				
			}else{
				
				echo '<script type="text/javascript">
				alert("El producto no se pudo eliminar");
				</script>';
			}
                        $consulta->closeCursor();
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		
	}
	/*---------------------------LISTAR PRODUCTOS POR CATEGORIA---------------------*/
	
	public function getByCategoria($id_categoria){
            
        try{
        
        $lista_productos=[];
        $conexion=ConectarModelo::conexion();
        
       
        
        $sql="SELECT * FROM productos WHERE categorias_id_categoria=:categoria ORDER BY id_producto";
        $consulta=$conexion->prepare($sql);
        
        $consulta->bindParam(':categoria',$id_categoria,PDO::PARAM_STR);
        $consulta->execute();
        $resultado=$consulta->fetchAll();
        
      
        if ($resultado){
            
            foreach ($resultado as $fila){
                    
       $producto=new ProductosModelo();
                 
                 $producto->id_producto=$fila['id_producto'];
                 $producto->nombre_producto=$fila['nombre_producto'];
                 $producto->categoria_producto=new CategoriasProductosModelo($fila['categorias_id_categoria']);
                 $producto->precio_producto=$fila['precio_producto'];
                 $producto->descripcion_producto=$fila['descripcion_producto'];
                 $producto->imagen_producto=$fila['imagen_producto'];
                 
                 $lista_productos[]=$producto;
            }
        }   
               
        $consulta->closeCursor();
        
        
        
    }catch(PDOException $e){
        
        die("No se pudo conectar con la BBDD ".$e->getMessage());
        echo("Linea de error ".$e->getLine());
    }
    
    $conexion=null;
    
    return($lista_productos);
    }
        
        /*---------------------------Buscar productos------------------------------*/
        
        public function buscar($nombre,$categoria,$id_producto){
            
            require_once 'ConectarModelo.php';
            
           $nombre="%".$nombre."%";
            try{
                $conexion= ConectarModelo::conexion();
                $lista_productos=[];
                 $sql="SELECT * FROM productos  INNER JOIN imagenes ON id_producto=productos_id_producto WHERE"
                        . " nombre_producto LIKE :nombre OR categorias_productos_id_categoria LIKE :categoria OR id_producto LIKE :id ORDE BY id_producto DESC";
                $consulta=$conexion->prepare($sql);
                
                $consulta->bindParam(':nombre',$nombre,PDO::PARAM_STR);
                $consulta->bindParam(':categoria',$categoria,PDO::PARAM_STR);
                $consulta->bindParam(':id',$id_producto,PDO::PARAM_INT);
                
                $consulta->execute();
                $resultado=$consulta->fetchAll();
                
                if(!$resultado){
                    echo '<script type="text/javascript">
				alert("No existe ningún producto con esos criterios de busqueda");
				</script>';
                    $controller=new ProductosControlador();
                    $controller->listarProductos();
                }else{
                    
                   
                    foreach ($resultado as $fila){
                        
                        $producto=new ProductosModelo();
                 
                 $producto->id_producto=$fila['id_producto'];
                 $producto->nombre_producto=$fila['nombre_producto'];
                 $producto->categoria_producto=new CategoriasProductosModelo($fila['categorias_id_categoria']);
                 $producto->precio_producto=$fila['precio_producto'];
                 $producto->descripcion_producto=$fila['descripcion_producto'];
                 $producto->imagen_producto=$fila['imagen_producto'];
                 
                 $lista_productos[]=$producto;
                    } 
                }
                $consulta->closeCursor();
            } catch (PDOException $e) {
                
                die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
            }
            $conexion=null;
            
            return $lista_productos;
        }
        
       
        
	
}


