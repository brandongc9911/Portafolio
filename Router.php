<?php
namespace MVC;
class Router{
    public $rutasGET = [];
    public $rutasPOST = [];

    public function get($url, $fn){
        $this->rutasGET[$url] = $fn;
        
    }

    public function post($url, $fn){
        $this->rutasPOST[$url] = $fn;
    }

    public function comprobarRutas(){
        session_start();
        $auth = $_SESSION['login'] ?? null;

        $rutas_protegidas = ['/admin','/proyectos/crear', 'proyectos/actualizar', '/proyectos/eliminar'];
        $urlActual = strtok($_SERVER['REQUEST_URI'], '?') ?? '/';
        $metodo = $_SERVER['REQUEST_METHOD'];

        if($metodo === 'GET'){
            $fn = $this->rutasGET[$urlActual] ?? null;
            
        }else{
            $fn = $this->rutasPOST[$urlActual] ?? null;

        }

        // PROTEGER LAS RUTAS
        if(in_array($urlActual, $rutas_protegidas) && !$auth){
            header("Location: /");
        }
        if($fn){
            call_user_func($fn, $this);
        }else{
            $this->render('paginas/error');
        }
    }
    public function render($view, $datos = []){
        foreach($datos as $key => $value){
            $$key = $value;
        }

        ob_start();

        include_once __DIR__ . "/views/$view.php";

        $contenido = ob_get_clean();

        include_once __DIR__ . "/views/layout.php";
    }
}