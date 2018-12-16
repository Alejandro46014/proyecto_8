<?php

class AdministradorControlador{
    
    public function __construct() {
        
    }
    
    public function index(){
        
        require_once 'vistas/administrador/administradorVista.php';
    }

        public function listarUsuarios(){
			
			require_once("modelos/AdministradorModelo.php");
			
			

			$usuarios=new UsuariosModelo();
			$usuarios=$usuarios->getTodo();
			
			require_once("vistas/administrador/gestionarUsuariosVista.php");
		}
                
               
                
                public function buscarUsuarios(){
                    if ((isset($_POST['buscar']))){
                     $id=$_POST['id_usuario'];
                     $nombre=$_POST['nombre_usuario'];
                     $pais=$_POST['pais_usuario'];
                    
                     
                    $usuarioAd=new AdministradorModelo();
                    $usuarios=$usuarioAd->buscarUsuarios($id,$pais,$nombre); 
                    
                    require_once("vistas/administrador/gestionarUsuariosVista.php");
                    }
                }
                
                
                
                
                
                
}
        

