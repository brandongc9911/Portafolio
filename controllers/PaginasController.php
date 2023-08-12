<?php

namespace Controllers;

use MVC\Router;
use Model\Project;
use Model\Categorias;


class PaginasController
{
    public static function index(Router $router)
    {
        $router->render('paginas/index');
    }

    public static function projects(Router $router)
    {
        
        $router->render('paginas/projects');
    }

    
}
