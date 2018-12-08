<?php
require_once 'UsuariosModelo.php';
class AdministradorModelo extends UsuariosModelo{
	
	public function __construct(){
		parent::__construct();
		$this->tipo_usuario="Administrador";
	}
	
	/*---------------------------LISTAR USUARIOS ACTIVOS O NO--------------------------*/
	
	public function listarUsuarios($activo){
		require_once("ConectarModelo.php");
		try{
			$conexion=ConectarModelo::conexion();
			$activo=$_POST['activo'];
			$sql="SELECT * FROM usuarios WHERE acivo=:activo";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->binParam(':activo',$activo,PDO::PARAM_STR);
			$consulta->execute();
			$resultado=$consulta->fetchAll();
			
			$consulta->closeCursor();
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		return($resultado);
	}
	
	
	/*---------------------------BLOQUEAR USUARIO ADMINISTRADOR---------------------*/
	
	public function bloquearUsuario($usuario){
		
		require_once("ConectarModelo.php");
		try{
			
			$id= $usuario->id;
                        $activo= $usuario->activo_usuario;
                        
			$conexion=ConectarModelo::conexion();
			$sql="UPDATE usuarios SET activo_usuario=:activo WHERE id_usuario=:id";
			
			$consulta=$conexion->prepare($sql);
			
                        $consulta->bindParam(':id',$id,PDO::PARAM_INT);
			$consulta->bindParam(':activo',$activo,PDO::PARAM_STR);
			
			$resultado=$consulta->execute();
			
			$consulta->closeCursor();
			
			if($resultado){
				
				echo '<script type="text/javascript">
				alert("El usuario se desactivó correctamente");
				</script>';
			
				
			}else{
				
				echo '<script type="text/javascript">
				alert("El usuario no se pudo desactivar");
				</script>';
			
				
			}
			
		}catch(PDOException $e){
			
			die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		$conexion=null;
		
		return($resultado);
	}
        
        public function buscarUsuarios($id,$tipo_usuario,$activo){
            
            require_once 'modelos/ConectarModelo.php';
            
            
            try{
                $conexion= ConectarModelo::conexion();
                $listausuarios=[];
                 $sql="SELECT * FROM usuarios  INNER JOIN tipo_usuarios ON tipo_usuarios_id_tipo_usuario=id_tipo_usuario WHERE"
                        . " id_usuario LIKE :id OR tipo_usuarios_id_tipo_usuario LIKE :tipo OR activo_usuario LIKE :activo";
                $consulta=$conexion->prepare($sql);
                
                $consulta->bindParam(':id',$id,PDO::PARAM_INT);
                $consulta->bindParam(':tipo',$tipo_usuario,PDO::PARAM_STR);
                $consulta->bindParam(':activo',$activo,PDO::PARAM_STR);
                $consulta->execute();
                $resultado=$consulta->fetchAll();
                
                if(!$resultado){
                    echo '<script type="text/javascript">
				alert("No existe ningún usuario con esos criterios de busqueda");
				</script>';
                }else{
                    
                   
                    foreach ($resultado as $fila){
                        
                        $usuario=new UsuariosModelo();
                        
                        $usuario->id=$fila['id_usuario'];
                        $usuario->nombre_usuario=$fila['nombre_usuario'];
                        $usuario->apellidos_usuario=$fila['apellidos_usuario'];
                        $usuario->fecha_nacimiento_usuario=$fila['fecha_nacimiento_usuario'];
                        $usuario->tipo_usuario=new TipoUsuarios($fila['tipo_usuarios_id_tipo_usuario']);
                        $usuario->fecha_alta_usuario=$fila['fecha_alta_usuario'];
                        $usuario->pais_usuario=$fila['pais_usuario'];
                        $usuario->email_usuario=$fila['email_usuario'];
                        $usuario->activo_usuario=$fila['activo_usuario'];
                        
                        $listausuarios[]=$usuario;
                    } 
                }
                $consulta->closeCursor();
            } catch (PDOException $e) {
                
                die("No se pudo conectar con la BBDD ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
            }
            $conexion=null;
            
            return $listausuarios;
        }
	
		
	
	
}
	
?>