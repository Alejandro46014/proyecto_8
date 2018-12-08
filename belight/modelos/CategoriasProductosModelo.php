<?php

class CategoriasProductosModelo{
    

    private $id_categoria;
    private  $genero;
    private $descripcion;
    
    public function __construct($id_categoria) {
        
        $this->id_categoria=$id_categoria;
        if($this->id_categoria==1){
            $this->genero="Acción";
        }elseif($this->id_categoria==2){
            $this->genero="Terror";
        }elseif($this->id_categoria==3){
            $this->genero="Románticas";
        }elseif($this->id_categoria==4){
            $this->genero="Infantiles";
        }elseif($this->id_categoria==5){
            $this->genero="Comedia";
        }elseif($this->id_categoria==6){
            $this->genero="Ciencia-ficción";
        }elseif($this->id_categoria==7){
            $this->genero="Drama";
        }
    }


    /*-------------------GETTERS--------------------*/
    
    public function getIdCategoria(){
        
        return $this->id_categoria;
    }
    
    public function getGenero(){
        
        return $this->genero;
    }
    
    public function getDescripcion(){
        
        return $this->descripcion;
    }
    
    /*-------------------SETTERS--------------------*/
    
    public function setIdCategoria($id){
        
         $this->id_categoria=$id;
    }
    
    public function setGenero($genero){
        
         $this->genero=$genero;
    }
    
    public function setDescripcion($descripcion){
        
         $this->descripcion=$descripcion;
    }

}