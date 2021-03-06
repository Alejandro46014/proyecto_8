<?php
 
class UsuariosControlador{	

		public function __construct(){
                    
                    
                }



		public function registrar(){

			require_once('vistas/usuario/registrarVista.php');

		}



		//guardar

		public function crearUsuario(){
                    
                    
                    $apellidos=$_POST['apellido1_usuario']." ".$_POST['apellido2_usuario'];
                
		$usuario=new UsuariosModelo();
					
					
                                        $usuario->setDniUsuario($_POST['dni_usuario']);
					$usuario->setNombreUsuario($_POST['nombre_usuario']);
					$usuario->setApellidosUsuario($apellidos);
					$usuario->setEmailUsuario($_POST['email_usuario']);
					$usuario->setPasswordUsuario($_POST['password_usuario']);
                                        $tipo_usuario=new TipoUsuarios(2);
					$usuario->setTipoUsuario($tipo_usuario);
					
                                        $direccion=new DireccionUsuariosModelo();
                                        
                                        $direccion->setIdDireccion($_POST['id_direccion']);
                                        $direccion->setPaisUsuario($_POST['pais_usuario']);
                                        $direccion->setCiudadUsuario($_POST['ciudad_usuario']);
                                        $direccion->setPoblacionUsuario($_POST['poblacion_usuario']);
                                        $direccion->setCalleUsuario($_POST['calle_usuario']);
                                        $direccion->setNCalleUsuario($_POST['n_calle_usuario']);
                                        $direccion->setEscaleraUsuario($_POST['escalera_usuario']);
                                        $direccion->setCpUsuario($_POST['cp_usuario']);
                                        $direccion->setTelfUsuario($_POST['telefono_usuario']);
                                        
                                        $usuario->setDireccionUsuario($direccion);
                
                
                $usuario=$usuario->guardar();
             
                if(isset($usuario)){   
                    
                require_once 'vistas/usuario/loginVista.php';
            
                }else{
                  
                  require_once 'vistas/usuario/registrarVista.php';
              }
}



		public function actualizarUsuario(){
   
                    require_once 'controladores/ProductosControlador.php';
                    
      if(isset($_GET['id'])){
                        
            $id=$_GET['id'];
            
            $apellidos=$_POST['apellido1_usuario']." ".$_POST['apellido2_usuario'];
                
		$usuario=new UsuariosModelo();
					
					
                                        $usuario->setDniUsuario($_POST['dni_usuario']);
					$usuario->setNombreUsuario($_POST['nombre_usuario']);
					$usuario->setApellidosUsuario($apellidos);
					$usuario->setEmailUsuario($_POST['email_usuario']);
					$usuario->setPasswordUsuario($_POST['password_usuario']);
					
					
                                        $direccion=new DireccionUsuariosModelo();
                                        
                                        
                                        $direccion->setPaisUsuario($_POST['pais_usuario']);
                                        $direccion->setCiudadUsuario($_POST['ciudad_usuario']);
                                        $direccion->setPoblacionUsuario($_POST['poblacion_usuario']);
                                        $direccion->setCalleUsuario($_POST['calle_usuario']);
                                        $direccion->setNCalleUsuario($_POST['n_calle_usuario']);
                                        $direccion->setEscaleraUsuario($_POST['escalera_usuario']);
                                        $direccion->setCpUsuario($_POST['cp_usuario']);
                                        $direccion->setTelfUsuario($_POST['telefono_usuario']);
                                        
                                        $usuario->setDireccionUsuario($direccion);
        
                                      
        
       $res=$usuario->actualizar($id);
       if ($res){
           $_GET['id']=1;
           $controller=new ProductosControlador();
           $controller->index();
       }else{
           
        $controller=new UsuariosControlador();
        $controller->modificarUsuario();
       }       }
        
    }



		public function modificarUsuario(){
                       
                    $id=$_GET['id'];
                        
			

			require_once('modelos/UsuariosModelo.php');

			$usuario=new UsuariosModelo();
                        
			$usuario=$usuario->getById($id);
                        
			require_once('vistas/usuario/modificarUsuarioVista.php');

		}
                
                public function  login(){
                    
                    require_once 'vistas/usuario/loginVista.php';
                }
                
                public function loguearse(){
                    require_once 'controladores/ProductosControlador.php';
                    require_once 'controladores/UsuariosControlador.php';
                    require_once 'controladores/AdministradorControlador.php';
                    require_once 'modelos/ProductosModelo.php';
                    
                    echo $_POST['email_usuario'];
                    echo $_POST['password_usuario'];
                    
                    $usuarioAccion=new UsuariosModelo();
                    $usuarioAccion->setEmailUsuario($_POST['email_usuario']);
                    $usuarioAccion->setPasswordUsuario($_POST['password_usuario']);
                    $usuario=$usuarioAccion->login();
                    
                   if(isset($usuario)){ 
                       
                    session_start();
                $_SESSION['login']=TRUE;   
		$_SESSION['usuario']= $usuario->getIdUsuario();
             if($usuario->getTipoUsuario()->getTipoUsuario()=="Administrador"){
                   
                   require_once 'controladores/AdministradorControlador.php';
                
                            
                    echo '<script type="text/javascript">
			window.location.assign("index.php");
			</script>';
                    
                    $controller=new AdministradorControlador();
                    $controller->index();
                   
               }else{
                  
                    echo '<script type="text/javascript">
			window.location.assign("index.php");
			</script>';
                   
                    $_GET['id']=1;
                    $controller=new ProductosControlador();
                    $controller->index();
               }  
                   }
                }
                public function bajaVista(){
                    $usuario=new UsuariosModelo();
                    $usuario=$usuario->getById($_GET['id']);
                    require_once 'vistas/usuario/bajaVista.php';
                }

                public function darseBajaUsuario(){
                    
                    if(isset($_GET['id'])){
                     
                        if (isset($_POST['cancelar'])){
                            
                            echo '<script type="text/javascript">
			window.location.assign("index.php");
			</script>';
                            
                        }elseif(isset ($_POST['aceptar'])){
                    
                   $id=$_GET['id'];
                                
                                $usuario=new UsuariosModelo();
                                
                                $usuario->darseBaja($id);
                          
                                session_start();
                               $_SESSION['usuario']="";
                               $_SESSION['login']=FALSE;
                               session_destroy();
                               
                                echo '<script type="text/javascript">
			window.location.assign("index.php");
			</script>';
                                                
                    require_once 'controladores/ProductosControlador.php';
                    $_GET['id']=1;
                    $controller=new ProductosControlador();
                    $controller->index();
                }
                    }
                }

                


                public function error(){

			require_once('vistas/usuario/error.php');

		} 
                public function cerrarSesion(){
                    session_start();
                    $_SESSION['usuario']="";
                    $_SESSION['login']=FALSE;
                    session_destroy();
                    $_SESSION['usuario']="";
                    $_SESSION['login']=FALSE;
                    
                    echo '<script type="text/javascript">
			window.location.assign("index.php");
			</script>';
                                                
                    require_once 'controladores/ProductosControlador.php';
                    $_GET['id']=1;
                    $controller=new ProductosControlador();
                    $controller->index();
                }

	

	}





	//obtiene los datos del usuario desde la vista y redirecciona a UsuarioController.php

	if (isset($_POST['action'])) {

		$usuarioController= new UsuariosControlador();

		//se añade el archivo usuario.php

		require_once('modelos/UsuariosModelo.php');

		

		//se añade el archivo para la conexion

		require_once('modelos/ConectarModelo.php');



		

	}



	//se verifica que action esté definida

	


