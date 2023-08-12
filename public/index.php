<?php
 require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use MVC\Router;
use Controllers\PaginasController;


 $router = new Router();


 $router->get('/',[PaginasController::class, 'index']);
 $router->get('/projects',[PaginasController::class, 'projects']);


//  API
$router->get('/api/projects',[APIController::class, 'projects']);
$router->post('/api/like',[APIController::class, 'like']);


$router->comprobarRutas();