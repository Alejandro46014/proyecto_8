<?php

class PedidosControlador{
    
    public function __construct() {
        
    }
    
    public function confirmarPedido(){
        
         require_once("modelos/UsuariosModelo.php");
        require_once("modelos/ProductosModelo.php");
        
        if (isset($_GET['id'])){
            
            $id_producto=$_GET['id'];
           $producto=new ProductosModelo();
           $producto=$producto->getById($id_producto);
           $id_usuario=$_POST['id_usuario'];
           $usuario=new UsuariosModelo();
           $usuario=$usuario->getById($id_usuario);
           $cantidad=$_POST['cantidad_producto'];
           $numero_pedido=$_POST['numero_pedido'];
           
           $total_pedido=$cantidad * $producto->getPrecioProducto();
           
           $pedido=new PedidosModelo();
           
           $pedido->setIdProducto($id_producto);
           $pedido->setIdUsuario($id_usuario);
           $pedido->setNumeroPedido($numero_pedido);
           $pedido->setTotalPedido($total_pedido);
           $pedido->setCantidadProducto($cantidad);
           
           require_once 'vistas/usuario/carritoPedidoVista.php'; 
        }
        
    }

    public function guardarPedido(){
        
        
        require_once("modelos/UsuariosModelo.php");
        require_once("modelos/ProductosModelo.php");
        require_once("ProductosControlador.php");
       
        
        if (isset($_POST['confirmar_carrito'])){
            
           $id_producto=$_POST['id_producto'];
           $producto=new ProductosModelo();
           $producto=$producto->getById($id_producto);
           $id_usuario=$_POST['id_usuario'];
           $cantidad=$_POST['cantidad_producto'];
           $numero_pedido=$_POST['numero_pedido'];
           $total=$_POST['total_pedido'];
           
           $pedido=new PedidosModelo();
           
           $pedido->setIdProducto($id_producto);
           $pedido->setIdUsuario($id_usuario);
           $pedido->setNumeroPedido($numero_pedido);
           $pedido->setCantidadProducto($cantidad);
           $pedido->setTotalPedido($total);
           
           $resultado=$pedido->guardar();
           
           
           
               $_GET['id']=$producto->getCategoriaProducto()->getIdCategoria();
               $controller=new ProductosControlador();
               $controller->index();
               
           
           
           }elseif (isset ($_POST['vaciar_carrito'])) {
            
                $_GET['id']=$producto->getCategoriaProducto()->getIdCategoria();
               $controller=new ProductosControlador();
               $controller->index();
        }
        
    }
    
    public function listarPedidos(){
        require_once 'modelos/ProductosModelo.php';
        if (isset($_GET['id'])){
            
            $id_usuario=$_GET['id'];
            $pedido=new PedidosModelo();
            $pedidos=$pedido->getTodoUsuario($id_usuario);
            
            require_once 'vistas/usuario/gestionarPedidosVista.php';
        }
    }
    
    public function ConfirmarEliminarPedido(){
        
        if (isset($_GET['id'])){
            
            $id_pedido=$_GET['id'];
            $pedido=new PedidosModelo();
            $pedido=$pedido->getById($id_pedido);
            
            require_once 'vistas/usuario/ConfirmarEliminarProductoVista.php';
        }
             
    }

        public function eliminarPedido(){
        
            if (isset($_GET['id'])){
                
                $numero_pedido=$_GET['id'];
                $pedido=new PedidosModelo();
                $pedido->eliminar($numero_pedido);
                
                $controller=new PedidosControlador();
                $controller->listarPedidos();
            }
             
    }

}

