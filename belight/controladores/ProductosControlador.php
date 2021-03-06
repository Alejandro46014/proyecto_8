<?php
require_once 'librerias/libreria.php';
class ProductosControlador{
    
    public function __construct(){}
    
    public function index(){
        require_once 'modelos/ProductosModelo.php';
        if(isset($_GET['id'])){
            
            $id_categoria=$_GET['id'];
            
            $producto=new ProductosModelo();
            $productos=$producto->getByCategoria($id_categoria);
            
        require_once 'vistas/indexProductosVista.php';
        
        }
    }
    
    
    
    public function nuevoProducto(){
        
        require_once 'vistas/administrador/nuevoProductoVista.php';
        
    }
    
    public function guardarProducto(){
        
        require_once("librerias/libreria.php");
        require_once 'modelos/CategoriasProductosModelo.php';
        
        if (isset($_POST['nuevo_producto'])){
            
            $imagen= subir_archivos();
           
                                $producto=new ProductosModelo();
				
				
				$producto->setNombreProducto($_POST['nombre_producto']);
                                $producto->setPrecioProducto($_POST['precio_producto']);
                                $categoria=new CategoriasProductosModelo($_POST['categoria_producto']);
                                $producto->setCategoriaProducto($categoria);
				$producto->setDescripcionProducto($_POST['descripcion_producto']);
				$producto->setImagenProducto($imagen);
				
                                
                                $producto->guardar();
        }
        require_once 'vistas/administrador/nuevoProductoVista.php';
    }
    
    public function listarProductos(){
        require_once 'modelos/CategoriasProductosModelo.php';
        require_once 'modelos/ProductosModelo.php';
        $producto=new ProductosModelo();
        $productos=$producto->getTodo();
        require_once 'vistas/administrador/gestionarProductosVista.php';
    }
    
    public function modificarProducto(){
        require_once 'modelos/CategoriasProductosModelo.php';
       require_once 'modelos/ProductosModelo.php'; 
        if (isset($_GET['id'])){
            
            $id=$_GET['id'];
            $producto=new ProductosModelo();
            $producto=$producto->getById($id);
            
            
            require_once 'vistas/administrador/modificarProductoVista.php';
        }
    }

        public function actualizarProducto(){
        
        require_once 'modelos/CategoriasProductosModelo.php';
        
        
        if(isset($_POST['modificar_producto'])){
            
            if (isset($_GET['id'])){
            
        $id=$_GET['id'];
        
        
        
            $producto=new ProductosModelo();
				
				
				$producto->setNombreProducto($_POST['nombre_producto']);
                                $producto->setPrecioProducto($_POST['precio_producto']);
                                $categoria=new CategoriasProductosModelo($_POST['categoria_producto']);
                                $producto->setCategoriaProducto($categoria);
				$producto->setDescripcionProducto($_POST['descripcion_producto']);
				$producto->setImagenProducto($_POST['imagen_producto']);
                                
            $producto->actualizar($id);
            
            $controller=new ProductosControlador();
            $controller->listarProductos();
           

            }
        }
        
    }
    
    public function eliminarProducto(){
        if (isset($_GET['id'])){
        
            $id=$_GET['id'];
       
        $producto=new ProductosModelo();
        $producto->eliminar($id);
        
        $controller=new ProductosControlador();
        $controller->listarProductos();
        
        }
    }
    
                 public function buscarProductos(){
                    if ((isset($_POST['buscar']))){
                     $nombre=$_POST['nombre_producto'];
                     $categoria=$_POST['categoria_producto'];
                     $id_producto=$_POST['id_producto'];
                     
                     
                    $producto=new ProductosModelo();
                    $productos=$producto->buscar($nombre,$categoria,$id_producto); 
                    
                    require_once("vistas/administrador/gestionarProductosVista.php");
                    }
    }
}

