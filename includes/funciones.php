<?php 

define('TEMPLATES_URL', __DIR__ .'/templates');

function incluirTemplates(string $nombre){
    include TEMPLATES_URL . $nombre . ".php";
}

function ValidarTipoContenido($tipo){
    $tipos = ['proyecto'];
    return in_array($tipo,$tipos);

}

function validarORedireccionar(string $url){
    $id = $_GET['id'];
    $id = filter_var($id, FILTER_VALIDATE_INT);
    if(!$id){
        header("Location: $url ");
    }

    return $id;
}