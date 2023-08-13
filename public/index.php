<?php
require_once __DIR__ . '/../includes/app.php';

use Controllers\APIController;
use Controllers\PaginasController;
use MVC\Router;


 $router = new Router();


 $router->get('/',[PaginasController::class, 'index']);


//  API
$router->get('/api/projects',[APIController::class, 'index']);
$router->post('/api/like',[APIController::class, 'like']);


$router->comprobarRutas();