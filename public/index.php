<?php
 require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use MVC\Router;
use Controllers\PaginasController;


 $router = new Router();

//  ZONA PUBLICA
 $router->get('/',[PaginasController::class, 'index']);
 $router->get('/projects',[PaginasController::class, 'projects']);
 $router->get('/project',[PaginasController::class, 'project']);

//  API
$router->get('/api/projects',[APIController::class, 'projects']);
$router->post('/api/like',[APIController::class, 'like']);


$router->comprobarRutas();