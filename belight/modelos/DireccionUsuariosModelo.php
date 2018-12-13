<?php

class DireccionUsuariosModelo{
    
    protected $id_direccion,$pais_usuario, $ciudad_usuario, $poblacion_usuario, $calle_usuario,$nº_calle_usuario,$escalera_usuario,
            $cp_usuario,$telf_usuario;
            
    public function __construct() {
        
    }
    
    /*----------------------SETTERS-------------------------*/
    
     public function setIdDireccion($id_direccion) {
        $this->pais_usuario = $id_direccion;
    }
    
    public function setPaisUsuario($pais_usuario) {
        $this->pais_usuario = $pais_usuario;
    }

    public function setCiudadUsuario($ciudad_usuario) {
        $this->ciudad_usuario = $ciudad_usuario;
    }

    public function setPoblacionUsuario($poblacion_usuario) {
        $this->poblacion_usuario = $poblacion_usuario;
    }

    public function setCalleUsuario($calle_usuario) {
        $this->calle_usuario = $calle_usuario;
    }

    public function setNCalleUsuario($nº_calle_usuario) {
        $this->nº_calle_usuario = $nº_calle_usuario;
    }

    public function setEscaleraUsuario($escalera_usuario) {
        $this->escalera_usuario = $escalera_usuario;
    }

    public function setCpUsuario($cp_usuario) {
        $this->cp_usuario = $cp_usuario;
    }
    
    public function setTelfUsuario($telf_usuario) {
        $this->cp_usuario = $telf_usuario;
    }
    
    /*-------------------------GETTERS-------------------------*/
    
    public function getIdDireccion() {
        return $this->pais_usuario;
    }
    
    public function getPaisUsuario() {
        return $this->pais_usuario;
    }

    public function getCiudadUsuario() {
        return $this->ciudad_usuario;
    }

    public function getPoblacionUsuario() {
        return $this->poblacion_usuario;
    }

    public function getCalleUsuario() {
        return $this->calle_usuario;
    }

    public function getNCalleUsuario() {
        return $this->nº_calle_usuario;
    }

    public function getEscaleraUsuario() {
        return $this->escalera_usuario;
    }

    public function getCpUsuario() {
        return $this->cp_usuario;
    }
    
     public function getTelfUsuario() {
        return $this->telf_usuario;
    }




    

}
