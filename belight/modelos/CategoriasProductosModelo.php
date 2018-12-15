<?php

class CategoriasProductosModelo{
    

    private $id_categoria;
    private  $categoria;
    private $descripcion;
    
    public function __construct($id_categoria) {
        
        $this->id_categoria=$id_categoria;
        if($this->id_categoria==1){
            $this->categoria="Patinetes";
        }elseif($this->id_categoria==2){
            $this->categoria="Bicicletas";
        }elseif($this->id_categoria==3){
            $this->categoria="SegWays";
        }elseif($this->id_categoria==4){
            $this->categoria="NineBots";
        }elseif($this->id_categoria==5){
            $this->categoria="HoverBoards";
        }
    }


    /*-------------------GETTERS--------------------*/
    
    public function getIdCategoria(){
        
        return $this->id_categoria;
    }
    
    public function getCategoria(){
        
        return $this->categoria;
    }
    
    public function getDescripcion(){
        
        return $this->descripcion;
    }
    
    /*-------------------SETTERS--------------------*/
    
    public function setIdCategoria($id){
        
         $this->id_categoria=$id;
    }
    
    public function setCategoria($categoria){
        
         $this->categoria=$categoria;
    }
    
    public function setDescripcion($descripcion){
        
         $this->descripcion=$descripcion;
    }

}