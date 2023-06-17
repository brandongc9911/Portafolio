<?php

namespace Model;

class Categorias extends ActiveRecord{
    protected static $tabla = 'categorias';
    protected static $columnasDB = ['id','categoria','proyectos_id'];


    public $id;
    public $categoria;
    public $proyectos_id;
  


    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->categoria = $args['categoria'] ?? null;
        $this->proyectos_id = $args['proyectos_id'] ?? null;
    

    }
}