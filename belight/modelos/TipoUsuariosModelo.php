<?php

class TipoUsuarios{
    
    private $id_tipo_usuario;
    private  $tipo_usuario;
    private $descripcion;
    
    public function __construct($id_tipo_usuario) {
        $this->id_tipo_usuario=$id_tipo_usuario;
        if($id_tipo_usuario==2){
            $this->tipo_usuario="Usuario_novel";
        }elseif($id_tipo_usuario==3){
            $this->tipo_usuario="Usuario_experto";
        }elseif($id_tipo_usuario==4){
            $this->tipo_usuario="Usuario_profesional";
        }elseif($id_tipo_usuario==1){
            $this->tipo_usuario="Administrador";
        }
    }
    
    /*-------------------SGETTERS--------------------*/
    
    public function getIdTipoUsuario(){
        
        return $this->id_tipo_usuario;
    }
    
    public function getTipoUsuario(){
        
        return $this->tipo_usuario;
    }
    
    public function getDescripcion(){
        
        return $this->descripcion;
    }
    
    /*-------------------SETTERS--------------------*/
    
    public function setIdTipoUsuario($id){
        
         $this->id_tipo_usuario=$id;
    }
    
    public function setTipoUsuario($tipo_usuario){
        
         $this->tipo_usuario=$tipo_usuario;
    }
    
    public function setDescripcion($descripcion){
        
         $this->descripcion=$descripcion;
    }
    
    public function actualizarTipoUsuario($id_tipo_usuario,$usuario){
        
        require_once("ConectarModelo.php");
		
		$id=$usuario->getIdUsuario();
		
		try{
			$conexion=ConectarModelo::conexion();
			$sql="UPDATE usuarios SET tipo_usuarios_id_tipo_usuario=:tipo_usuario WHERE id_usuario=:id";
			
			$consulta=$conexion->prepare($sql);
			
			$consulta->bindParam(':tipo_usuario',$tipo_usuario,PDO::PARAM_INT);
			$consulta->bindParam(':id',$id,PDO::PARAM_INT);
			
			$resultado=$consulta->execute();
			
			
			
		}catch(PDOException $e){
			
			die ("Error ".$e->getMessage());
			echo("Linea de error ".$e->getLine());
		}
		
		return($resultado);
	}
    
}

