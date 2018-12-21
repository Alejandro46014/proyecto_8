<?php

class CategoriasProductosModelo{
    
    private  $id_categoria,$categoria;
    
    public function __construct($id_categoria) {
        $this->id_categoria = $id_categoria;
        if ($id_categoria==1){
            
            $this->categoria="Patinetes";
            
        }elseif ($id_categoria ==2) {
            
            $this->categoria="Bicicletas";
            
        }elseif ($id_categoria ==3) {
            
            $this->categoria="SegWays";
            
        }elseif ($id_categoria ==4) {
            
            $this->categoria="NineBots";
            
        }elseif ($id_categoria ==5) {
            
            $this->categoria="HoverBoards";
        }
    }

    public function getIdCategoria() {
        return $this->id_categoria;
    }

    public function getCategoria() {
        return $this->categoria;
    }

    public function setIdCategoria($id_categoria) {
        $this->id_categoria = $id_categoria;
    }

    public function setCategoria($categoria) {
        $this->categoria = $categoria;
    }


}