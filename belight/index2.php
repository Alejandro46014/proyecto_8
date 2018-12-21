<?php

require_once 'modelos/CategoriasProductosModelo.php';
require_once("modelos/ConectarModelo.php");
require_once("modelos/ProductosModelo.php");
require_once("modelos/PedidosModelo.php");
		
		require_once("modelos/ConectarModelo.php");
		$id=7;
		
		try{
			
			$conexion=ConectarModelo::conexion();
			
			
			$sql="SELECT * FROM pedidos WHERE id_pedido=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':id',$id,PDO::PARAM_INT);
			
			$consulta->execute();
			$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
                        if ($resultado){
                            
			$pedido=new PedidosModelo();
                 
                 /*$pedido->id_pedido=$resultado['id_pedido'];
                 $pedido->id_producto=$resultado['productos_id_producto'];
                 $pedido->id_usuario=$resultado['usuarios_id_usuario'];
                 $pedido->numero_pedido=$resultado['numero_pedido'];
                 $pedido->cantidad_producto=$resultado['cantidad_producto'];
                 $pedido->total_pedido=$resultado['total_pedido'];*/
                        
                        }
			$consulta->closeCursor();
			
			
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
                
                echo $resultado['id_pedido'].'<br>';
                 echo $resultado['id_producto'].'<br>';
                  echo $resultado['total_pedido'].'<br>';