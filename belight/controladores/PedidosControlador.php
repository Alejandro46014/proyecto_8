<?php

class PedidosControlador{
    
    public function __construct() {
        
    }
    
    public function carritoPedido(){
        
        
            
            $id_producto=$_GET['id'];
           $producto=new ProductosModelo();
           $producto=$producto->getById($id_producto);
           $id_usuario=$_POST['id_usuario'];
           $usuario=new UsuariosModelo();
           $usuario=$usuario->getById($id_usuario);
           $cantidad=$_POST['cantidad_producto'];
           
           require_once 'vistas/usuario/carritoPedidoVista.php'; 
        
    }

    public function guardarPedido(){
        
        
        require_once("modelos/UsuariosModelo.php");
        require_once("modelos/ProductosModelo.php");
        require_once("ProductosControlador.php");
       
        
        if (isset($_POST['guardar_pedido'])){
            
           $id_producto=$_GET['id'];
           $producto=new ProductosModelo();
           $producto=$producto->getById($id_producto);
           $id_usuario=$_GET['usuario'];
           $usuario=new UsuariosModelo();
           $usuario=$usuario->getById($id_usuario);
           $cantidad=$_POST['cantidad_producto'];
           
           $total=$producto->getPrecioProducto() * $cantidad;
           
           $pedido=new PedidosModelo();
           
           $pedido->setIdProducto($id_producto);
           $pedido->setIdUsuario($id_usuario);
           $pedido->setNumeroPedido($numero_pedido);
           $pedido->setCantidadProducto($cantidad);
           $pedido->setTotalPedido($total);
           
           $resultado=$pedido->guardar();
           
           if($resultado){
           
               $_GET['id']=1;
               $controller=new ProductosControlador();
               $controller->index();
               
           }
           
           }
        
    }
    
    public function eliminarPedido(){
        
       
    }

}

