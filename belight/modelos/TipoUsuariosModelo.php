<?php

class TipoUsuarios{
    
    private $id_tipo_usuario;
    private  $tipo_usuario;
    private $descripcion;
    
    public function __construct($id_tipo_usuario) {
      
        $this->id_tipo_usuario=$id_tipo_usuario;
        if($id_tipo_usuario==2){
        $this->tipo_usuario="Usuario standar";

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
    
    
    
}

