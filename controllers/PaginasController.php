<?php

namespace Controllers;

use MVC\Router;
use Model\Proyectos;
use Model\Categorias;


class PaginasController
{
    public static function index(Router $router)
    {
        $router->render('paginas/index');
    }


    public static function project(Router $router)
    {
        $id = validarORedireccionar('/project');
        $proyecto = Proyectos::find($id);


     
        $router->render('paginas/project', [
            'proyecto' => $proyecto
        ]);

        

    }

    public static function projects(Router $router)
    {
        
        $router->render('paginas/projects');
    }

    
}
