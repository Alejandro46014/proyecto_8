<?php

class PedidosModelo{
    
    private $id_pedido,$numero_pedido,$id_usuario,$id_producto,$cantidad_producto,$total_pedido,$fecha_pedido;
    
    public function __construct() {
        
       
    }

    /*--------------------GETTERS----------------------*/
    
    public function getIdPedido() {
        return $this->id_pedido;
    }

    public function getNumeroPedido() {
        return $this->numero_pedido;
    }

    public function getIdUsuario() {
        return $this->id_usuario;
    }

    public function getIdProducto() {
        return $this->id_producto;
    }

    public function getCantidadProducto() {
        return $this->cantidad_producto;
    }
    public function getTotalPedido() {
        return $this->total_pedido;
    }

    public function getFechaPedido() {
        return $this->fecha_pedido;
    }
    

    /*--------------------SETTERS---------------------*/
    
    public function setIdPedido($id_pedido) {
        $this->id_pedido = $id_pedido;
    }

    public function setNumeroPedido($numero_pedido) {
        $this->numero_pedido = $numero_pedido;
    }

    public function setIdUsuario($id_usuario) {
        $this->id_usuario = $id_usuario;
    }

    public function setIdProducto($id_producto) {
        $this->id_producto = $id_producto;
    }

    public function setCantidadProducto($cantidad_producto) {
        $this->cantidad_producto = $cantidad_producto;
    }

    public function setTotalPedido($total_pedido) {
        $this->total_pedido = $total_pedido;
    }
    
    public function setFechaPedido($fecha_pedido){
        
        $this->fecha_pedido=$fecha_pedido;
    }


    /*---------------------------------GetTodo--------------------------------------*/
     public function getTodo(){
            
            require_once("ConectarModelo.php");
		
		
		try{
                        
		$lista_pedidos=[];
		$conexion=ConectarModelo::conexion();
			
            
            $sql="SELECT * FROM pedidos  ORDER BY id_pedido DESC";
            $consulta=$conexion->prepare($sql);
            
           
            
            $consulta->execute();
            $resultado=$consulta->fetchAll();
            
          
          if($resultado){
               
             foreach ($resultado as $fila){
                        
                 $pedido=new PedidosModelo();
                 
                 $pedido->id_pedido=$fila['id_pedido'];
                 $pedido->id_producto=$fila['productos_id_producto'];
                 $pedido->id_usuario=$fila['usuarios_id_usuario'];
                 $pedido->numero_pedido=$fila['numero_pedido'];
                 $pedido->cantidad_producto=$fila['cantidad_producto'];
                 $pedido->total_pedido=$fila['total_pedido'];
                 $pedido->fecha_pedido=new DateTime($fila['fecha_pedido']);
                 
                 $lista_pedidos[]=$pedido;
                 
                }
                   
          }  
			$consulta->closeCursor();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		return($lista_pedidos);
        }

    
    /*------------------------------GetTodoUsuario---------------------------------*/
        public function getTodoUsuario($id_usuario){
            
            require_once("ConectarModelo.php");
		
		
		try{
                        
		$lista_pedidos=[];
		$conexion=ConectarModelo::conexion();
			
            
            $sql="SELECT * FROM pedidos WHERE usuarios_id_usuario=:id_usuario ORDER BY id_pedido DESC";
            $consulta=$conexion->prepare($sql);
            
            $consulta->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
            
            $consulta->execute();
            $resultado=$consulta->fetchAll();
            
          
          if($resultado){
               
             foreach ($resultado as $fila){
                        
                 $pedido=new PedidosModelo();
                 
                 $pedido->id_pedido=$fila['id_pedido'];
                 $pedido->id_producto=$fila['productos_id_producto'];
                 $pedido->id_usuario=$fila['usuarios_id_usuario'];
                 $pedido->numero_pedido=$fila['numero_pedido'];
                 $pedido->cantidad_producto=$fila['cantidad_producto'];
                 $pedido->total_pedido=$fila['total_pedido'];
                 $pedido->fecha_pedido=new DateTime($fila['fecha_pedido']);
                 
                 $lista_pedidos[]=$pedido;
                 
                }
                   
          }  
			$consulta->closeCursor();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		return($lista_pedidos);
        }


        /*---------------------------------GetById--------------------------------------*/
	public function getById($id){
            
            require_once("ConectarModelo.php");
		
		
		try{
			
			$conexion=ConectarModelo::conexion();
			
			
			$sql="SELECT * FROM pedidos WHERE id_pedido=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id,PDO::PARAM_INT);
			
			$consulta->execute();
			$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
                        if ($resultado){
                            
			$pedido=new PedidosModelo();
                 
                 $pedido->id_pedido=$resultado['id_pedido'];
                 $pedido->id_producto=$resultado['productos_id_producto'];
                 $pedido->id_usuario=$resultado['usuarios_id_usuario'];
                 $pedido->numero_pedido=$resultado['numero_pedido'];
                 $pedido->cantidad_producto=$resultado['cantidad_producto'];
                 $pedido->total_pedido=$resultado['total_pedido'];
                 $pedido->fecha_pedido=new DateTime($fila['total_pedido']);
                        
                        }
			$consulta->closeCursor();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		return($pedido);
        }
    
    /*----------------------GUARDAR------------------------*/
    
    public function guardar(){
        
        require_once 'ConectarModelo.php';
        $conexion= ConectarModelo::conexion();
        
        $id_producto= $this->id_producto;
        $id_usuario= $this->id_usuario;
        $numero_pedido= $this->numero_pedido;
        $cantidad= $this->cantidad_producto;
        $total= $this->total_pedido;
        $fecha_pedido= $this->fecha_pedido->format('Y-m-d H:i:s');
        try {
            
            $sql="INSERT INTO pedidos (productos_id_producto,usuarios_id_usuario,numero_pedido,cantidad_producto,total_pedido,fecha_pedido)"
                                . " VALUES(:id_producto,:id_usuario,:numero_pedido,:cantidad,:total,:fecha_pedido)";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id_producto',$id_producto,PDO::PARAM_INT);
                        $consulta->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
                        $consulta->bindParam(':numero_pedido',$numero_pedido,PDO::PARAM_INT);
			$consulta->bindParam(':cantidad',$cantidad,PDO::PARAM_INT);
			$consulta->bindParam(':total',$total,PDO::PARAM_INT);
                        $consulta->bindParam(':fecha_pedido',$fecha_pedido,PDO::PARAM_STR);
			
			
			$resultado=$consulta->execute();
	
			$consulta->closeCursor();
                        
                        
			if($resultado){
				
				
				echo '<script type="text/javascript">
				alert("El pedido se creó correctamente");
				</script>';
				
				
			}else{
				
				echo '<script type="text/javascript">
				alert("El pedido no se pudo guardar");
				</script>';
			}
                        
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
          
		}
		
		$conexion=null;
		
                return $resultado;
	}





    /*----------------------ELIMINAR-----------------------*/
    
    public function eliminar($id_pedido){
		
		require_once("ConectarModelo.php");
		
		
		try{
			$conexion=ConectarModelo::conexion();
			$sql="DELETE FROM pedidos WHERE  id_pedido=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id_pedido,PDO::PARAM_INT);
                        
			
			$resultado=$consulta->execute();
			
			if($resultado){
				
				
				echo '<script type="text/javascript">
				alert("El pedido se eliminó correctamente");
				</script>';
				
				
			}else{
				
				echo '<script type="text/javascript">
				alert("El pedido no se pudo eliminar");
				</script>';
			}
                        $consulta->closeCursor();
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		
	}

    
    /*---------------------buscar-----------------------*/
        
    public function buscar($id_pedido,$id_usuario,$numero_pedido){
        
        
                require_once("ConectarModelo.php");
		
		
		try{
			$conexion=ConectarModelo::conexion();
			$sql="SELECT * FROM pedidos WHERE  id_pedido LIKE :id_pedido OR usuarios_id_usuario LIKE :id_usuario"
                                . " OR numero_pedido LIKE :numero_pedido";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id_pedido',$id_pedido,PDO::PARAM_INT);
                        $consulta->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
                        $consulta->bindParam(':numero_pedido',$numero_pedido,PDO::PARAM_INT);
                        
			
			$resultado=$consulta->execute();
			
			if($resultado){
				
				
				echo '<script type="text/javascript">
				alert("El pedido se eliminó correctamente");
				</script>';
				
				
			}else{
				
				echo '<script type="text/javascript">
				alert("El pedido no se pudo eliminar");
				</script>';
			}
                        $consulta->closeCursor();
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		
	}

}

