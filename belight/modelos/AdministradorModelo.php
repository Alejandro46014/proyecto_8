<?php
require_once 'UsuariosModelo.php';
class AdministradorModelo extends UsuariosModelo{
	
	public function __construct(){
		parent::__construct();
		$this->tipo_usuario->SetIdTipoUsuario(1);
	}
	
	
        
        public function buscarUsuarios($id,$pais){
            
            require_once 'modelos/ConectarModelo.php';
            
            
            try{
                $conexion= ConectarModelo::conexion();
                $listausuarios=[];
                 $sql="SELECT * FROM usuarios  INNER JOIN tipo_usuarios ON tipo_usuarios_id_tipo_usuario=id_tipo_usuario WHERE"
                        . " id_usuario LIKE :id OR pais_usuario LIKE :pais ";
                $consulta=$conexion->prepare($sql);
                
                $consulta->bindParam(':id',$id,PDO::PARAM_INT);
                $consulta->bindParam(':pais',$pais,PDO::PARAM_STR);
               
                $consulta->execute();
                $resultado=$consulta->fetchAll();
                
                if(!$resultado){
                    echo '<script type="text/javascript">
				alert("No existe ningún usuario con esos criterios de busqueda");
				</script>';
                }else{
                    
                   
                    foreach ($resultado as $fila){
                        
                        $usuario=new UsuariosModelo();
					
					$usuario->id_usuario=$fila['id_usuario'];
                                        $usuario->dni_usuario=$fila['dni_usuario'];
					$usuario->nombre_usuario=$fila['nombre_usuario'];
					$usuario->apellidos_usuario=$fila['apellidos_usuario'];
					$usuario->email_usuario=$fila['email_usuario'];
					$usuario->password_usuario=$fila['password_usuario'];
					$usuario->tipo_usuario=new TipoUsuarios();
					
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