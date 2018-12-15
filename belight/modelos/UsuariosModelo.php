<?php

require_once 'modelos/TipoUsuariosModelo.php';
require_once 'modelos/DireccionUsuariosModelo.php';

class UsuariosModelo {
	
	
	protected $id_usuario;
        protected $dni_usuario;
	protected $nombre_usuario;
	protected $apellidos_usuario;
	protected $tipo_usuario ;
	protected $activo_usuario;
	protected $password_usuario;
        protected $email_usuario;
        protected $direccion_usuario;
	
	/*---------constructor*/
	public function __construct(){
		
            $this->tipo_usuario=new TipoUsuarios(2);
	}
	
	/*---------------getters---------------*/
	public function getIdUsuario(){
		
		return($this->id_usuario);
	}
        
        public function getDniUsuario(){
		
		return($this->dni_usuario);
	}
	
	public function getNombreUsuario(){
		
		return($this->nombre_usuario);
	}
	
	public function getApellidosUsuario(){
		
		return($this->apellidos_usuario);
	}
	
	public function  getEmailUsuario(){
            
            return $this->email_usuario;
        }

        public function  getActivoUsuario(){
            
            return $this->activo_usuario;
        }
        
        public function  getPasswordUsuario(){
            
            return $this->password_usuario;
        }
	
	public function getTipoUsuario(){
		
		return($this->tipo_usuario);
	}
	
        public function getDireccionUsuario(){
		
		return($this->direccion_usuario_usuario);
	}
	
	/*-----------------------setters--------------------------*/
	
	public function setIdUsuario($id){
		$this->id_usuario=$id;
	}
        
        public function setDniUsuario($dni){
		$this->dni_usuario=$dni;
	}
	
	public function setNombreUsuario($nombre){
		
		$this->nombre_usuario=$nombre;
	}
	
	
	
	public function setApellidosUsuario($apellidos){
		
		$this->apellidos_usuario=$apellidos;
	}
	
	
	public function setEmailUsuario($email){
		
		$this->email_usuario=$email;
	}
	
	public function setTipoUsuario($tipo_usuario){
		
		$this->tipo_usuario=$tipo_usuario;
	}
	
	public function setActivoUsuario($activo){
		
		$this->activo_usuario=$activo;
	}
	public function setPasswordUsuario($password){
		
		$this->password_usuario=$password;
	}
        
        public function setDireccionUsuario($direccion_usuario){
		
		$this->direccion_usuario=$direccion_usuario;
	}
	
	

	
        
        /*---------------getTodo---------------------*/
        
        public  function getTodo(){
            
            require_once 'ConectarModelo.php';
            try{
            $conexion= ConectarModelo::conexion();
				$listaUsuarios=[];
            $sql="SELECT * FROM usuarios  INNER JOIN tipo_usuarios ON tipo_usuarios_id_tipo_usuario=id_tipo_usuario INNER JOIN direcciones ON id_usuario=usuarios_id_usuario ORDER BY id_usuario";
				
            $consulta=$conexion->prepare($sql);
            $consulta->execute();
			
	    $resultado=$consulta->fetchAll();
				
				foreach ($resultado as $fila) {
					
					$usuario=new UsuariosModelo();
					
					$usuario->id_usuario=$fila['id_usuario'];
                                        $usuario->dni_usuario=$fila['dni_usuario'];
					$usuario->nombre_usuario=$fila['nombre_usuario'];
					$usuario->apellidos_usuario=$fila['apellidos_usuario'];
					$usuario->email_usuario=$fila['email_usuario'];
					$usuario->password_usuario=$fila['password_usuario'];
					$usuario->tipo_usuario=new TipoUsuarios($fila['tipo_usuarios_id_tipo_usuario']);
					
                                        $direccion=new DireccionUsuariosModelo();
                                        
                                        $direccion->setIdDireccion($fila['id_direccion']);
                                        $direccion->setPaisUsuario($fila['pais_usuario']);
                                        $direccion->setCiudadUsuario($fila['ciudad_usuario']);
                                        $direccion->setPoblacionUsuario($fila['poblacion_usuario']);
                                        $direccion->setCalleUsuario($fila['calle_usuario']);
                                        $direccion->setNCalleUsuario($fila['n_calle_usuario']);
                                        $direccion->setEscaleraUsuario($fila['escalera_usuario']);
                                        $direccion->setCpUsuario($fila['cp_usuario']);
                                        $direccion->setTelfUsuario($fila['telefono_usuario']);
                                        
                                        $usuario->setDireccionUsuario($direccion);
					
			$listaUsuarios[]= $usuario;

		}

		

				$consulta->closeCursor();
			
				
			}catch(PDOException $e){
				
				die ("Error ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
			}
			
			$conexion=null;
			
            return $listaUsuarios;
        }
	
	/*----------------------------getById----------------------------------*/
	
	
	public function getById($id){
		
		require_once("ConectarModelo.php");
		
		try{
		$conexion=ConectarModelo::conexion();
                
		$sql="SELECT * FROM usuarios INNER JOIN direcciones ON id_usuario=usuarios_id_usuario WHERE id_usuario=:id ";
		
			
		$consulta=$conexion->prepare($sql);
		
		$consulta->bindParam(':id',$id,PDO::PARAM_INT);
		
		$consulta->execute();
		
		$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
			
			$usuario=new UsuariosModelo();
					
					$usuario->id_usuario=$resultado['id_usuario'];
                                        $usuario->dni_usuario=$resultado['dni_usuario'];
					$usuario->nombre_usuario=$resultado['nombre_usuario'];
					$usuario->apellidos_usuario=$resultado['apellidos_usuario'];
					$usuario->email_usuario=$resultado['email_usuario'];
					$usuario->activo_usuario=$resultado['activo_usuario'];
					$usuario->password_usuario=$resultado['password_usuario'];
					$usuario->tipo_usuario=new TipoUsuarios($resultado[tipo_usuarios_id_tipo_usuario]);
					
                                        $direccion=new DireccionUsuariosModelo();
                                        
                                        $direccion->setIdDireccion($resultado['id_direccion']);
                                        $direccion->setPaisUsuario($resultado['pais_usuario']);
                                        $direccion->setCiudadUsuario($resultado['ciudad_usuario']);
                                        $direccion->setPoblacionUsuario($resultado['poblacion_usuario']);
                                        $direccion->setCalleUsuario($resultado['calle_usuario']);
                                        $direccion->setNCalleUsuario($resultado['n_calle_usuario']);
                                        $direccion->setEscaleraUsuario($resultado['escalera_usuario']);
                                        $direccion->setCpUsuario($resultado['cp_usuario']);
                                        $direccion->setTelfUsuario($resultado['telefono_usuario']);
                                        
                                        $usuario->setDireccionUsuario($direccion);
			
			$consulta->closeCursor();
			
		}catch(PDOException $e){
			
			die ("Error ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		return($usuario);
		
	}
        /*-----------------GUARDAR USUARIO-----------------------*/
	
	public function guardar(){
		
		require_once("ConectarModelo.php");
		

		$rpassword=$_POST['rpassword']; 
                
                $dni=$this->dni_usuario;
		$nombre=$this->nombre_usuario;
		$apellidos=$this->apellidos_usuario;
		$email=$this->email_usuario;
		$tipo_usuario= $this->tipo_usuario->getIdTipoUsuario();
		$password=$this->password_usuario;
                
                $pais=$this->direccion_usuario->getPaisUsuario();
                $ciudad=$this->direccion_usuario->getCiudadUsuario();
                $poblacion=$this->direccion_usuario->getPoblacionUsuario();
                $calle=$this->direccion_usuario->getCalleUsuario();
                $num_calle=$this->direccion_usuario->getNCalleUsuario();
                $escalera=$this->direccion_usuario->getEscaleraUsuario();
                $cp=$this->direccion_usuario->getCpUsuario();
                $telefono=$this->direccion_usuario->getTelfUsuario();
		
		
		
		
		
		
		
/*-----------------COMPROBAMOS TODOS LOS CAMPOS INTRODUCIDOS-------------------------*/
		
			$mal=false;
			$mal1=false;
			$mal2=false;
			$mal3=false;//declaro la variable $mal para controlar los fallos de la distintas condiciones
			$mal4=false;
			$mal5=false;
			$mal6=false;
			$mal7=false;
			$mal8=false;
			$mal9=false;
                        $mal10=false;
			$mal11=false;
			$mal12=false;
			$mal13=false;
			$mal14=false;
			
		
		
			$patron="/[a-zA-Z\s]/";
			
		if(empty($nombre) || empty($apellidos) ){//compruebo que el campo este lleno
			
			echo '<p>Los campos nombre y primer apellido son obligatorios</p>';
			
			$mal=true;
		}
		if(!preg_match($patron,$nombre) || !preg_match($patron,$apellidos)){//compruebo el patron ceado para el campo
			
			echo '<p>Los campos nombre, primer apellido y segundo apellido solo pueden contener caracteres alfabéticos</p>';
			
			$mal2=true;
		}
                
                $patron="/^[0-9]{8}[abcdefgxvwrABCDEFGXVWR]$/";//declaro el patron para el dni 
                
                if(empty($dni)){
                    
                    echo '<p>El campo DNI es obligatorio</p>';
			
			$mal3=true;
                }
		
		if(empty($password) || empty($rpassword)){//compruebo el patron ceado para el campo
			echo("<p>Los campos contraseña y repetir contraseña son obligatorios</p>");
			$mal4=true;
		}
			if($password!=$rpassword){//compruebo el patron ceado para el campo
			echo("<p>Los campos contraseña y repetir contraseña no coinciden</p>");
			$mal5=true;
		}
                
	$patron="/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8}$/";//contraseña longitud 8 con mayúsculas, minúsculas y dígitos
		
		if(!preg_match($patron,$password)){//compruebo que el campo cumpla el patron establecido
			echo("<p>El campo contraseña no es valido, consulte la leyenda</p>");
			$mal6=true;
		}

		$patron="/[a-zA-Z\s]/";		
		
		if(empty($pais) || !preg_match($patron,$pais)){//compruebo que el campo este lleno y respete el patron
			
			echo '<p>El campo pais es obligatorio</p>';
			
			$mal7=true;
		}
			
		
		
			if(empty($email)){//compruebo que el campo este lleno
				
				echo '<p>El campo correo electrónico obligatorio</p>';
			
			$mal8=true;
		}
                        
                
                        if(empty($pais)){//compruebo que el campo este lleno
				
				echo '<p>El campo pais obligatorio</p>';
			
			$mal9=true;
		}
                
                 if(empty($pais)){//compruebo que el campo este lleno
				
				echo '<p>El campo pais obligatorio</p>';
			
			$mal10=true;
		}
                
                 if(empty($poblacion)){//compruebo que el campo este lleno
				
				echo '<p>El campo población obligatorio</p>';
			
			$mal11=true;
		}
                
                 if(empty($calle)){//compruebo que el campo este lleno
				
				echo '<p>El campo calle obligatorio</p>';
			
			$mal12=true;
		}
                
                 if(empty($num_calle)){//compruebo que el campo este lleno
				
				echo '<p>Debe introducir un numero de calle obligatorio</p>';
			
			$mal13=true;
		}
                
                 if(empty($cp)){//compruebo que el campo este lleno
				
				echo '<p>El campo del código postal obligatorio</p>';
			
			$mal14=true;
		}
	
		
			
			
			
		if($mal || $mal1 ||$mal2 || $mal3 || $mal4 || $mal5 ||$mal6 || $mal7 || $mal8 || $mal9 ||$mal10 || $mal11 || $mal12 || $mal13 || $mal14){//con cualquiera de las variables añadimos el aviso final o tenemos exito
			
                    
                        echo '<script type="text/javascript">
				alert("Verifique los campos he intentelo de nuevo");
				</script>';
			
                }else{
                    
                  try{
		$conexion=ConectarModelo::conexion();
                
                $conexion->beginTransaction();
                
		$sql="INSERT INTO usuarios (dni_usuario,nombre_usuario,apellidos_usuario,email_usuario,password_usuario,tipo_usuarios_id_tipo_usuario) VALUES (:dni,:nombre,:apellidos,:email,:pais,:password,:tipo_usuario)";
		$consulta=$conexion->prepare($sql);
		
                        $consulta->bindParam(':dni',$dni,PDO::PARAM_STR);
			$consulta->bindParam(':nombre',$nombre,PDO::PARAM_STR);
			$consulta->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
			$consulta->bindParam(':pais',$pais,PDO::PARAM_STR);
			$consulta->bindParam(':password',$password,PDO::PARAM_STR);
			$consulta->bindParam(':email',$email,PDO::PARAM_STR);
			$consulta->bindParam(':tipo_usuario',$tipo_usuario,PDO::PARAM_INT);
			
			$consulta->execute();
                        
                        $id_usuario=$conexion->lastInsertId();
                        
                        $consulta->closeCursor();
                        /*-------------------INSERTAR EN TABLA DIRECCIONES------------------------*/
			
                        $sql="INSERT INTO direcciones (usuarios_id_usuario,pais_usuario,ciudad_usuario,poblacion_usuario,calle_usuario,"
                                . "n_calle_usuario,escalera_usuario,cp_usuario,telefono1_usuario) VALUES (:id_usuario,:pais,:ciudad,:poblacion,:calle,:numero_calle"
                                . ",:escalera,:cp,:telefono)";
                        
                        $consulta=$conexion->prepare($sql);
                        
                        $consulta->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
                        $consulta->bindParam(':pais',$id_usuario,PDO::PARAM_STR);
                        $consulta->bindParam(':ciudad',$id_usuario,PDO::PARAM_STR);
                        $consulta->bindParam(':poblacion',$id_usuario,PDO::PARAM_STR);
                        $consulta->bindParam(':calle',$id_usuario,PDO::PARAM_STR);
                        $consulta->bindParam(':numero_calle',$id_usuario,PDO::PARAM_INT);
                        $consulta->bindParam(':escalera',$id_usuario,PDO::PARAM_STR);
                        $consulta->bindParam(':cp',$id_usuario,PDO::PARAM_INT);
                        $consulta->bindParam(':telefono',$id_usuario,PDO::PARAM_INT);
			
                        $consulta->execute();
                        
                        $resultado=$conexion->commit();
			
			if($resultado){
				
				echo('<script type="text/javascript">
				alert("El usuario se dio de alta correctamente ");
				</script>');
			}
			
			
			
			
		
		}catch(PDOException $e){
			
			die ("Error ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
			
                        if($conexion->rollBack()){
                            
                            echo('<script type="text/javascript">
				alert("Hubo un error durante el proceso de alta, contacte con el administrador ");
				</script>');
                        }
		}
		$conexion=null;
		
		return($resultado);
	}
	}
	
	/*--------------------ACTUALIZAR USUARIO---------------------*/
	public function actualizar($id){
            
            require_once("ConectarModelo.php");
		
               
		$rpassword=$_POST['rpassword']; 
                
                $dni=$this->dni_usuario;
		$nombre=$this->nombre_usuario;
		$apellidos=$this->apellidos_usuario;
		$email=$this->email_usuario;
		$tipo_usuario= $this->tipo_usuario->getIdTipoUsuario();
		$password=$this->password_usuario;
                
                $pais=$this->direccion_usuario->getPaisUsuario();
                $ciudad=$this->direccion_usuario->getCiudadUsuario();
                $poblacion=$this->direccion_usuario->getPoblacionUsuario();
                $calle=$this->direccion_usuario->getCalleUsuario();
                $num_calle=$this->direccion_usuario->getNCalleUsuario();
                $escalera=$this->direccion_usuario->getEscaleraUsuario();
                $cp=$this->direccion_usuario->getCpUsuario();
                $telefono=$this->direccion_usuario->getTelfUsuario();
		
	
		
		
/*-----------------COMPROBAMOS TODOS LOS CAMPOS INTRODUCIDOS-------------------------*/
		
			$mal=false;
			$mal1=false;
			$mal2=false;
			$mal3=false;//declaro la variable $mal para controlar los fallos de la distintas condiciones
			$mal4=false;
			$mal5=false;
			$mal6=false;
			$mal7=false;
			$mal8=false;
			$mal9=false;
                        $mal10=false;
			$mal11=false;
			$mal12=false;
			$mal13=false;
			$mal14=false;
			
		
		
			$patron="/[a-zA-Z\s]/";
			
		if(empty($nombre) || empty($apellidos) ){//compruebo que el campo este lleno
			
			echo '<p>Los campos nombre y primer apellido son obligatorios</p>';
			
			$mal=true;
		}
		if(!preg_match($patron,$nombre) || !preg_match($patron,$apellidos)){//compruebo el patron ceado para el campo
			
			echo '<p>Los campos nombre, primer apellido y segundo apellido solo pueden contener caracteres alfabéticos</p>';
			
			$mal2=true;
		}
                
                $patron="/^[0-9]{8}[abcdefgxvwrABCDEFGXVWR]$/";//declaro el patron para el dni 
                
                if(empty($dni)){
                    
                    echo '<p>El campo DNI es obligatorio</p>';
			
			$mal3=true;
                }
		
		if(empty($password) || empty($rpassword)){//compruebo el patron ceado para el campo
			echo("<p>Los campos contraseña y repetir contraseña son obligatorios</p>");
			$mal4=true;
		}
			if($password!=$rpassword){//compruebo el patron ceado para el campo
			echo("<p>Los campos contraseña y repetir contraseña no coinciden</p>");
			$mal5=true;
		}
	$patron="/^(?=\w*\d)(?=\w*[A-Z])(?=\w*[a-z])\S{8}$/";//contraseña longitud 8 con mayúsculas, minúsculas y dígitos//contraseña longitud 8 con mayúsculas, minúsculas y dígitos
		
		if(!preg_match($patron,$password)){//compruebo que el campo cumpla el patron establecido
			echo("<p>El campo contraseña no es valido, consulte la leyenda</p>");
			$mal6=true;
		}

		$patron="/[a-zA-Z\s]/";		
		
		if(empty($pais) || !preg_match($patron,$pais)){//compruebo que el campo este lleno y respete el patron
			
			echo '<p>El campo pais es obligatorio</p>';
			
			$mal7=true;
		}
			
		
		
			if(empty($email)){//compruebo que el campo este lleno
				
				echo '<p>El campo correo electrónico obligatorio</p>';
			
			$mal8=true;
		}
                        
                
                        if(empty($pais)){//compruebo que el campo este lleno
				
				echo '<p>El campo pais obligatorio</p>';
			
			$mal9=true;
		}
                
                 if(empty($pais)){//compruebo que el campo este lleno
				
				echo '<p>El campo pais obligatorio</p>';
			
			$mal10=true;
		}
                
                 if(empty($poblacion)){//compruebo que el campo este lleno
				
				echo '<p>El campo población obligatorio</p>';
			
			$mal11=true;
		}
                
                 if(empty($calle)){//compruebo que el campo este lleno
				
				echo '<p>El campo calle obligatorio</p>';
			
			$mal12=true;
		}
                
                 if(empty($num_calle)){//compruebo que el campo este lleno
				
				echo '<p>Debe introducir un numero de calle obligatorio</p>';
			
			$mal13=true;
		}
                
                 if(empty($cp)){//compruebo que el campo este lleno
				
				echo '<p>El campo del código postal obligatorio</p>';
			
			$mal14=true;
		}
	
		
			
			
			
		if($mal || $mal1 ||$mal2 || $mal3 || $mal4 || $mal5 ||$mal6 || $mal7 || $mal8 || $mal9 ||$mal10 || $mal11 || $mal12 || $mal13 || $mal14){//con cualquiera de las variables añadimos el aviso final o tenemos exito
			
                    
                        echo '<script type="text/javascript">
				alert("Verifique los campos he intentelo de nuevo");
				</script>';
			
                }else{
                
                   
                  try{
		$conexion=ConectarModelo::conexion();
                
		$sql="UPDATE `usuarios` INNER JOIN direcciones ON id_usuario=usuarios_id_usuario SET `dni_usuario`=:dni,`nombre_usuario`=:nombre,"
                        . "`apellidos_usuario`=:apellidos,`email_usuario`=:email,`password_usuario`=:password,pais_usuario=:pais,ciudad_usuario=:ciudad,poblacion_usuario=:poblacion,"
                        . "calle_usuario=:calle,n_calle_usuario=:numero_calle,escalera_usuario=:escalera,cp_usuario=:cp,telefono1_usuario=:telefono WHERE id_usuario=:id";
		$consulta=$conexion->prepare($sql);
		
			$consulta->bindParam(':dni',$dni,PDO::PARAM_STR);
			$consulta->bindParam(':nombre',$nombre,PDO::PARAM_STR);
			$consulta->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
			$consulta->bindParam(':pais',$pais,PDO::PARAM_STR);
			$consulta->bindParam(':password',$password,PDO::PARAM_STR);
			$consulta->bindParam(':email',$email,PDO::PARAM_STR);
			$consulta->bindParam(':tipo_usuario',$tipo_usuario,PDO::PARAM_INT);
                        
                        
                        $consulta->bindParam(':id_usuario',$id_usuario,PDO::PARAM_INT);
                        $consulta->bindParam(':pais',$id_usuario,PDO::PARAM_STR);
                        $consulta->bindParam(':ciudad',$id_usuario,PDO::PARAM_STR);
                        $consulta->bindParam(':poblacion',$id_usuario,PDO::PARAM_STR);
                        $consulta->bindParam(':calle',$id_usuario,PDO::PARAM_STR);
                        $consulta->bindParam(':numero_calle',$id_usuario,PDO::PARAM_INT);
                        $consulta->bindParam(':escalera',$id_usuario,PDO::PARAM_STR);
                        $consulta->bindParam(':cp',$id_usuario,PDO::PARAM_INT);
                        $consulta->bindParam(':telefono',$id_usuario,PDO::PARAM_INT);
			
			
			$resultado=$consulta->execute();
			
			
			
			if($resultado){
				
				echo('<script type="text/javascript">
				alert("Sus datos se modificaron correctamente ");
				</script>');
                               
			}else{
				echo('<script type="text/javascript">
				alert("Hubo un error durante el proceso de modificación contacte con el administrador ");
				</script>');
			}
			
			
			$consulta->closeCursor();
			
		
		}catch(PDOException $e){
			
			die ("Error ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
			
		}
		$conexion=null;
		
		
	}
        return($resultado);
        }




        /*------------------DARSE DE BAJA-----------------*/
	
	public function darseBaja($id){
		
		require_once("ConectarModelo.php");
		
		
		
	try{	
		$conexion= ConectarModelo::conexion();
                
                $conexion->beginTransaction();
			
		$sql="DELETE FROM usuarios WHERE id_usuario=:id";
		
		$consulta=$conexion->prepare($sql);
		
		$consulta->bindParam(':id',$id,PDO::PARAM_INT);
		
		$consulta->execute();
	
		$consulta->closeCursor();
                
                $sql="DELETE FROM direcciones WHERE usuarios_id_usuario=:id";
		
		$consulta=$conexion->prepare($sql);
		
		$consulta->bindParam(':id',$id,PDO::PARAM_INT);
		
		$consulta->execute();
	
		$consulta->closeCursor();
		
		$resultado=$conexion->commit();
			
			if($resultado){
				
				echo('<script type="text/javascript">
				alert("El usuario se dio de baja correctamente ");
				</script>');
			}
		
	}catch(PDOException $e){
		
		die ("Error ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
                        
                         if($conexion->rollBack()){
                            
                            echo('<script type="text/javascript">
				alert("Hubo un error durante el proceso de baja, contacte con el administrador ");
				</script>');
                        }
	}
		$conexion=null;
		
		return($resultado);
		
	}
	
	
	/*-------------------LOGIN------------------------------*/
	
	public function login(){
		
		require_once("ConectarModelo.php");
                
		
		$email_usuario= $this->email_usuario;
		$password_usuario= $this->password_usuario;
		
                if(empty($email_usuario) || empty($password_usuario)){
			
			echo('<script type="text/javascript">
				alert("Los campos nombre y contraseña estan vacios ");
				</script>');
			
		}else{
			
			try{
				
				$conexion=ConectarModelo::conexion();
				
				

				$sql="SELECT * FROM usuarios WHERE email_usuario=:email AND password_usuario=:password";
				
				$consulta=$conexion->prepare($sql);
				
				$consulta->bindParam(':email',$email_usuario,PDO::PARAM_STR);
				$consulta->bindParam(':password',$password_usuario,PDO::PARAM_STR);
				
				$consulta->execute();
				
				$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
				
				
				$numero_filas=$consulta->rowCount();
				
				$consulta->closeCursor();
				
				
				
				if($numero_filas==0){
					
					echo('<script type="text/javascript">
				alert("No existe ningun usuario con esas credenciales ");
				</script>');
					
				}elseif($numero_filas==1){
					
					$resultado=true;
					                                      
				}
				
				
			}catch(PDOException $e){
				
				die ("Error ".$e->getMessage());
				echo("Linea de error ".$e->getLine());
				
	
			}
		}
		return($resultado);
	}
	
}


