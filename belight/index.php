<?php
require_once('modelos/ConectarModelo.php');
require_once 'modelos/UsuariosModelo.php';
                session_start();
                if(!isset($_SESSION['login'])){
                    
                    $_SESSION['login']=FALSE;
                    $_SESSION['usuario']="";
                }else{
                $id=$_SESSION['usuario'];
                $usuarioAc= new UsuariosModelo();
                $usuario=$usuarioAc->getById($id);
                }





	// la variable controller guarda el nombre del controlador y action guarda la acción por ejemplo registrar 

	//si la variable controller y action son pasadas por la url desde layout.php entran en el if

	if (isset($_GET['controller'])&&isset($_GET['action'])) {
           
		$controller=$_GET['controller'];

		$action=$_GET['action'];		

	} else{
            
            if($_SESSION['login']==TRUE && $usuario->getTipoUsuario()->getTipoUsuario()=="Administrador"){
                
                
                    
                    $controller="Administrador";
                    $action="index";
                }else{
                    
                    $_GET['id']=1;
                    $controller="Productos";
                    $action="index";
                }
           
        }
         
            

             $usuarioAc= new UsuariosModelo();
                $usuario=$usuarioAc->getById($id);
        require_once 'vistas/plantillas/header.php';
        
       
      //session_start();
     //session_destroy();
      //se comprueba si existe alguna sesión o no, entonces se muestra menu de registro o menu del usuario
        if(isset($_SESSION['usuario']) && $usuario->getTipoUsuario()->getTipoUsuario()=="Administrador"){
            //$usuario=$usuario->getById($id);
            //session_start();
            //$id= $_SESSION['usuario'];
            $usuario=$usuario->getById($id);
            
          require_once 'vistas/plantillas/navegacion_administrador.php';
          
        }elseif(isset($_SESSION['usuario']) && ($usuario->getTipoUsuario()->getTipoUsuario()=="Usuario_novel"  
                || $usuario->getTipoUsuario()->getTipoUsuario()=="Usuario_experto" 
                || $usuario->getTipoUsuario()->getTipoUsuario()=="Usuario_profesional")){
           // session_start();
            //$id= $_SESSION['usuario'];
            $usuario=$usuario->getById($id);
            require_once 'vistas/plantillas/navegacion_usuarios.php';
            
        }else{
             
          require_once 'vistas/plantillas/navegacion_invitados.php';
        }
        
        
	
?>
<?php if($usuario->getTipoUsuario()->getTipoUsuario()=="Administrador"){
    
require_once 'vistas/plantillas/footer_administrador.php';

} else {
    
    require_once 'vistas/plantillas/footer.php';
    
}?>