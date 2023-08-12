<?php 

namespace Controllers;
use Model\Project;
use Model\Categorias;

class APIController {
    public static function projects(){
        $proyectos = Project::all();
        $categorias = Categorias::all();
       
        $args = [
            'proyectos'=>$proyectos,
            'categorias'=>$categorias

        ];
        echo json_encode($args);   
    }

    public static function like(){
        $resultado = Project::like($_POST['id']);
        echo json_encode($resultado);
    }

}