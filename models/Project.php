<?php 

namespace Model;

class Project extends ActiveRecord{
    // BASE DE DATOS
    protected static $tabla = 'proyectos';
    protected static $columnasDB = ['id','titulo','imagen','descripcion','likes','url','repo'];


    public $id;
    public $titulo;
    public $imagen;
    public $descripcion;
    public $likes;
    public $url;
    public $repo;



    public function __construct($args = []){
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? null;
        $this->imagen = $args['imagen'] ?? null;
        $this->descripcion = $args['descripcion'] ?? null;
        $this->likes = null;
        $this->url = null;
        $this->repo = null;

        

    }

}