<?php

require_once 'TipoUsuariosModelo.php';

class UsuariosModelo {
	
	
	protected $id;
	protected $nombre_usuario;
	protected $apellidos_usuario;
	protected $apellido1;
	protected $apellido2;
	protected $fecha_nacimiento_usuario;
	protected $pais_usuario;
	protected $fecha_alta_usuario;
	protected $tipo_usuario ;
	protected $activo_usuario;
	protected $password_usuario;
        protected $email_usuario;
	
	/*---------constructor*/
	public function __construct(){
		
            $this->tipo_usuario=new TipoUsuarios(2);
	}
	
	/*---------------getters---------------*/
	public function getIdUsuario(){
		
		return($this->id);
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
	
	
	public function getFechaNacimientoUsuario(){
		
		return($this->fecha_nacimiento_usuario);
	}
	
	
	public function getPaisUsuario(){
		
		return($this->pais_usuario);
	}
	
	public function getFechaAltaUsuario(){
		
		return($this->fecha_alta_usuario);
	}
	
	public function getTipoUsuario(){
		
		return($this->tipo_usuario);
	}
	
	/*-----------------------setters--------------------------*/
	
	public function setIdUsuario($id){
		$this->id=$id;
	}
	
	public function setNombreUsuario($nombre){
		
		$this->nombre_usuario=$nombre;
	}
	
	
	
	public function setApellidosUsuario($apellidos){
		
		$this->apellidos_usuario=$apellidos;
	}
	
	public function setApellido1($apellido){
		
		$this->apellido1=$apellido;
	}
	public function setApellido2($apellido){
		
		$this->apellido2=$apellido;
	}
	
	
	public function setFechaNacimientoUsuario($fecha_nacimiento){
		
		$this->fecha_nacimiento_usuario=$fecha_nacimiento;
	}
	
	
	public function setPaisUsuario($pais){
		
		$this->pais_usuario=$pais;
	}
	public function setEmailUsuario($email){
		
		$this->email_usuario=$email;
	}
	
	public function setFechaAltaUsuario($fecha_alta){
		
		$this->fecha_alta_usuario=$fecha_alta;
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
	
	

	
        
        /*---------------getTodo---------------------*/
        
        public  function getTodo(){
            
            require_once 'ConectarModelo.php';
            try{
            $conexion= ConectarModelo::conexion();
				$listaUsuarios=[];
            $sql="SELECT * FROM usuarios  INNER JOIN tipo_usuarios ON tipo_usuarios_id_tipo_usuario=id_tipo_usuario ORDER BY id_usuario";
				
            $consulta=$conexion->prepare($sql);
            $consulta->execute();
			
	    $resultado=$consulta->fetchAll();
				
				foreach ($resultado as $fila) {
					
					$usuario=new UsuariosModelo();
					
					$usuario->id=$fila['id_usuario'];
					$usuario->nombre_usuario=$fila['nombre_usuario'];
					$usuario->apellidos_usuario=$fila['apellidos_usuario'];
					$usuario->email_usuario=$fila['email_usuario'];
					$usuario->fecha_nacimiento_usuario=$fila['fecha_nacimiento_usuario'];
					$usuario->pais_usuario=$fila['pais_usuario'];
					$usuario->fecha_alta_usuario=$fila['fecha_alta_usuario'];
					$usuario->activo_usuario=$fila['activo_usuario'];
					$usuario->password_usuario=$fila['password_usuario'];
					$usuario->tipo_usuario=new TipoUsuarios($fila['tipo_usuarios_id_tipo_usuario']);
					
					
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
		$sql="SELECT * FROM usuarios WHERE id_usuario=:id ";
		
			
		$consulta=$conexion->prepare($sql);
		
		$consulta->bindParam(':id',$id,PDO::PARAM_INT);
		
		$consulta->execute();
		
		$resultado=$consulta->fetch(PDO::FETCH_ASSOC);
			
			$usuario=new UsuariosModelo();
			$usuario->id=$resultado['id_usuario'];
			$usuario->nombre_usuario=$resultado['nombre_usuario'];
			$usuario->apellidos_usuario=$resultado['apellidos_usuario'];
			$usuario->email_usuario=$resultado['email_usuario'];
			$usuario->fecha_nacimiento_usuario=$resultado['fecha_nacimiento_usuario'];
			$usuario->pais_usuario=$resultado['pais_usuario'];
			$usuario->fecha_alta_usuario=$resultado['fecha_alta_usuario'];
			$usuario->activo_usuario=$resultado['activo_usuario'];
			$usuario->password_usuario=$resultado['password_usuario'];
			$usuario->tipo_usuario=new TipoUsuarios( $resultado['tipo_usuarios_id_tipo_usuario']);
			
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
		$nombre=$this->nombre_usuario;
		$apellidos=$this->apellidos_usuario;
		
		
		
		$fecha_nacimiento=$this->fecha_nacimiento_usuario;
		$fecha_alta=$this->fecha_alta_usuario;
		
		/*----------------MAYOR DE EDAD----------------------------*/
		
		$diff=strtotime($fecha_alta)-strtotime($fecha_nacimiento);
		$anys = floor($diff / (365*60*60*24));
		
		$pais=$this->pais_usuario;
		$email=$this->email_usuario;
		
		$activo=$this->activo_usuario;
		$tipo_usuario= $this->tipo_usuario->getIdTipoUsuario();
		$password=$this->password_usuario;
		
		
		
		
		
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
		
		
			$patron="/[a-zA-Z\s]/";
			
		if(empty($nombre) || empty($apellidos) ){//compruebo que el campo este lleno
			
			echo '<p>Los campos nombre y apellidos son obligatorios</p>';
			
			$mal=true;
		}
		if(!preg_match($patron,$nombre) || !preg_match($patron,$apellidos)){//compruebo el patron ceado para el campo
			
			echo '<p>Los campos nombre, primer apellido y segundo apellido solo pueden contener caracteres alfabéticos</p>';
			
			$mal2=true;
		}
		
		if(empty($password) || empty($rpassword)){//compruebo el patron ceado para el campo
			echo("<p>Los campos contraseña y repetir contraseña son obligatorios</p>");
			$mal3=true;
		}
			if($password!=$rpassword){//compruebo el patron ceado para el campo
			echo("<p>Los campos contraseña y repetir contraseña no coinciden</p>");
			$mal4=true;
		}
	$patron="/^(?=.*\d)(?=.*)(?=.*[A-Z])(?=.*[a-z])\S{8}$/";//contraseña longitud 8 con mayúsculas, minúsculas y dígitos
		
		if(!preg_match($patron,$password)){//compruebo que el campo cumpla el patron establecido
			echo("<p>El campo contraseña no es valido, consulte la leyenda</p>");
			$mal5=true;
		}

		$patron="/[a-zA-Z\s]/";		
		
		if(empty($pais) || !preg_match($patron,$pais)){//compruebo que el campo este lleno y respete el patron
			
			echo '<p>El campo pais es obligatorio</p>';
			
			$mal6=true;
		}
			
		
		
		if(empty($fecha_nacimiento)){//compruebo que el campo este lleno
			
			echo '<p>El campo fecha de nacimiento es obligatorio</p>';
			
			$mal7=true;
		}
		
			if(empty($email)){//compruebo que el campo este lleno
				
				echo '<p>El campo correo electrónico obligatorio</p>';
			
			$mal8=true;
		}
					if($anys < 18){//compruebo si el usuario es mayor de edad
						
						echo '<script type="text/javascript">
				alert("Debe ser mayor de edad para darse de alta");
				</script>';
			
			$mal9=true;
		}
		
			
			
			
		if($mal || $mal1 ||$mal2 || $mal3 || $mal4 || $mal5 ||$mal6 || $mal7 || $mal8 || $mal9){//con cualquiera de las variables añadimos el aviso final o tenemos exito
			echo '<script type="text/javascript">
				alert("Verifique los campos he intentelo de nuevo");
				</script>';
			
                }else{
                    
                  try{
		$conexion=ConectarModelo::conexion();
                
		$sql="INSERT INTO usuarios (nombre_usuario,apellidos_usuario,email_usuario,fecha_nacimiento_usuario,pais_usuario,fecha_alta_usuario,activo_usuario,password_usuario,tipo_usuarios_id_tipo_usuario) VALUES (:nombre,:apellidos,:email,:fecha_nacimiento,:pais,:fecha_alta,:activo,:password,:tipo_usuario)";
		$consulta=$conexion->prepare($sql);
		
			$consulta->bindParam(':nombre',$nombre,PDO::PARAM_STR);
			$consulta->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
			$consulta->bindParam(':fecha_nacimiento',$fecha_nacimiento,PDO::PARAM_STR);
			$consulta->bindParam(':pais',$pais,PDO::PARAM_STR);
			$consulta->bindParam(':fecha_alta',$fecha_alta,PDO::PARAM_STR);
			$consulta->bindParam(':activo',$activo,PDO::PARAM_STR);
			$consulta->bindParam(':password',$password,PDO::PARAM_STR);
			$consulta->bindParam(':email',$email,PDO::PARAM_STR);
			$consulta->bindParam(':tipo_usuario',$tipo_usuario,PDO::PARAM_INT);
			
			$resultado=$consulta->execute();
			
			
			
			if($resultado){
				
				echo('<script type="text/javascript">
				alert("El usuario se dio de alta correctamente ");
				</script>');
			}else{
				echo('<script type="text/javascript">
				alert("Hubo un error durante el proceso de alta, contacte con el administrador ");
				</script>');
			}
			
			
			$consulta->closeCursor();
			
		
		}catch(PDOException $e){
			
			die ("Error ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
			
		}
		$conexion=null;
		
		return($usuario);
	}
	}
	
	/*--------------------ACTUALIZAR USUARIO---------------------*/
	public function actualizar($usuario){
            
            require_once("ConectarModelo.php");
		
                $id= $usuario->id;
		$rpassword=$_POST['rpassword']; 
		$nombre=$usuario->nombre_usuario;
		$apellidos=$usuario->apellidos_usuario;
		
		
		
		$fecha_nacimiento=$usuario->fecha_nacimiento_usuario;
		//$fecha_alta=$this->fecha_alta_usuario;
		
		/*----------------MAYOR DE EDAD----------------------------*/
		
		$diff=strtotime(date("Y-m-d"))-strtotime($fecha_nacimiento);
		$anys = floor($diff / (365*60*60*24));
		
		$pais=$usuario->pais_usuario;
		$email=$usuario->email_usuario;
		
		
		$password=$usuario->password_usuario;
		
	
		
		
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
		
		
			$patron="/[a-zA-Z\s]/";
			
		if(empty($nombre) || empty($apellidos) ){//compruebo que el campo este lleno
			
			echo '<p>Los campos nombre y apellidos son obligatorios</p>';
			
			$mal=true;
		}
		if(!preg_match($patron,$nombre) || !preg_match($patron,$apellidos)){//compruebo el patron ceado para el campo
			
			echo '<p>Los campos nombre, primer apellido y segundo apellido solo pueden contener caracteres alfabéticos</p>';
			
			$mal2=true;
		}
		
		if(empty($password) || empty($rpassword)){//compruebo que no esten vacios
			echo("<p>Los campos contraseña y repetir contraseña son obligatorios</p>");
			$mal3=true;
		}
			if($password!=$rpassword){//compruebo que no sean diferentes
			echo("<p>Los campos contraseña y repetir contraseña no coinciden</p>");
			$mal4=true;
		}
	$patron="/^(?=.*\d)(?=.*)(?=.*[A-Z])(?=.*[a-z])\S{8}$/";//contraseña longitud 8 con mayúsculas, minúsculas y dígitos
		
		if(!preg_match($patron,$password)){//compruebo que el campo cumpla el patron establecido
			echo("<p>El campo contraseña no es valido, consulte la leyenda</p>");
			$mal5=true;
		}

		$patron="/[a-zA-Z\s]/";		
		
		if(empty($pais) || !preg_match($patron,$pais)){//compruebo que el campo este lleno y respete el patron
			
			echo '<p>El campo pais es obligatorio</p>';
			
			$mal6=true;
		}
			
		
		
		if(empty($fecha_nacimiento)){//compruebo que el campo este lleno
			
			echo '<p>El campo fecha de nacimiento es obligatorio</p>';
			
			$mal7=true;
		}
		
			if(empty($email)){//compruebo que el campo este lleno
				
				echo '<p>El campo correo electrónico obligatorio</p>';
			
			$mal8=true;
		}
					if($anys < 18){//compruebo si el usuario es mayor de edad
						
						echo '<script type="text/javascript">
				alert("Debe ser mayor de edad, esta introduciendo una fecha de nacimiento no autorizada");
				</script>';
			
			$mal9=true;
		}
		
			
			
			
		if($mal || $mal1 ||$mal2 || $mal3 || $mal4 || $mal5 ||$mal6 || $mal7 || $mal8 || $mal9){//con cualquiera de las variables añadimos el aviso final o tenemos exito
			echo '<script type="text/javascript">
				alert("Verifique los campos he intentelo de nuevo");
				</script>';
			
                }else{
                
                   
                  try{
		$conexion=ConectarModelo::conexion();
                
		$sql="UPDATE usuarios SET nombre_usuario=:nombre,apellidos_usuario=:apellidos,fecha_nacimiento_usuario=:fecha_nacimiento,pais_usuario=:pais,password_usuario=:password,email_usuario=:email WHERE id_usuario=:id";
		$consulta=$conexion->prepare($sql);
		
			$consulta->bindParam(':nombre',$nombre,PDO::PARAM_STR);
			$consulta->bindParam(':apellidos',$apellidos,PDO::PARAM_STR);
			$consulta->bindParam(':fecha_nacimiento',$fecha_nacimiento,PDO::PARAM_STR);
			$consulta->bindParam(':pais',$pais,PDO::PARAM_STR);
			
			$consulta->bindParam(':password',$password,PDO::PARAM_STR);
			$consulta->bindParam(':email',$email,PDO::PARAM_STR);
                        $consulta->bindParam(':id',$id,PDO::PARAM_STR);
			
			
			$resultado=$consulta->execute();
			
			
			
			if($resultado){
				
				echo('<script type="text/javascript">
				alert("Sus datos se modificaron correctamente correctamente ");
				</script>');
			}else{
				echo('<script type="text/javascript">
				alert("Hubo un error durante el proceso de alta, contacte con el administrador ");
				</script>');
			}
			
			
			$consulta->closeCursor();
			
		
		}catch(PDOException $e){
			
			die ("Error ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
			
		}
		$conexion=null;
		
		
	}
        return($usuario);
        }


        /*------------------DARSE DE BAJA-----------------*/
	
	public function darseBaja(){
		
		require_once("ConectarModelo.php");
		
		$id=$this->id;
		$activo= $this->activo_usuario;
	try{	
		$conexion= ConectarModelo::conexion();
			
		$sql="UPDATE usuarios SET activo_usuario=:activo WHERE id_usuario=:id";
		
		$consulta=$conexion->prepare($sql);
		
		$consulta->bindParam(':id',$id,PDO::PARAM_INT);
		$consulta->bindParam(':activo',$activo,PDO::PARAM_STR);
		
		$resultado=$consulta->execute();
		if($resultado){
				
				echo('<script type="text/javascript">
				alert("El usuario se dio de baja correctamente ");
				</script>');
			}else{
				echo('<script type="text/javascript">
				alert("Hubo un error durante el proceso de baja, contacte con el administrador ");
				</script>');
			}
		
		$consulta->closeCursor();
		
		
		
	}catch(PDOException $e){
		
		die ("Error ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
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
					
					
					                                        
					$usuario= new UsuariosModelo();
					
					$usuario->id=$resultado['id_usuario'];
					$usuario->nombre_usuario=$resultado['nombre_usuario'];
					$usuario->apellidos_usuario=$resultado['apellidos_usuario'];
					$usuario->fecha_nacimiento_usuario=$resultado['fecha_nacimiento_usuario'];
					$usuario->email_usuario=$resultado['email_usuario'];
					$usuario->fecha_alta_usuario=$resultado['fecha_alta_usuario'];
					$usuario->activo_usuario=$resultado['activo_usuario'];
					$usuario->tipo_usuario=new TipoUsuarios($resultado['tipo_usuarios_id_tipo_usuario']);
					$usuario->pais_usuario=$resultado['pais_usuario'];
					$usuario->password_usuario=$resultado['password_usuario'];
					$fecha_alta=$usuario->fecha_alta_usuario;
					$fecha_actual=date("Y-m-d");
					
					$diff=abs(strtotime($fecha_actual)- strtotime($fecha_alta));
					$antiguedad= floor($diff / (30*60*60*24));
					
                                        
					if($antiguedad > 6 && $numero_votaciones > 25 && $usuario->tipo_usuario->getIdTipoUsuario()==2){
						
						if($tipo_usuario->actualizarTipoUsuario(3,$usuario)){
						$usuario->setTipoUsuario(3);
                                                	
							
						
						echo('<script type="text/javascript">
								alert("Su perfil se actualizó, ahora es usted un usuario experto");
							</script>');
						
						

						}
						
						
					}elseif($antiguedad > 24 && $numero_votaciones > 50 && $usuario->tipo_usuario->getIdTipoUsuario()==3){
						
						if($tipo_usuario->actualizarTipoUsuario(4,$usuario)){
						$usuario->setTipoUsuario(4);
						
							
						echo('<script type="text/javascript">
								alert("Su perfil se actualizó, ahora es usted un usuario profesional");
							</script>');
						
							
						
							
							
						}
					}elseif($usuario->tipo_usuario->getIdTipoUsuario()==1){
						
						
						require_once("vistas/administrador/administradorVista.php");
                                        }
					
				
					
				}
				
				
			}catch(PDOException $e){
				
				die ("Error ".$e->getMessage());
				echo("Linea de error ".$e->getLine());
				
	
			}
		}
		return($usuario);
	}
	
}


