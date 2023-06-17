<?php
namespace Model;

class ActiveRecord{
    protected static $db;
    protected static $columnasDB = [];
    protected static $tabla = '';

    protected static $errores = [];

    public static function setDb($database){
        self::$db = $database;
    }

    public static function getErrores(){
        return static::$errores;
    }
    
    public function guardar(){
        if(!is_null($this->id)){
            // ACTUALIZAR
            $this->actualizar();
        }else{
            // CREANDO UN NUEVO REGISTRO
            $this->crear();
        }
    }

    public function crear(){
        // SANITIZAR LOS DATOS
        $atributos = $this->sanitizarAtributos();
        // INSERTAR EN LA DB
        $query = " INSERT INTO " . static::$tabla . "( ";
        $query .= join(', ', array_keys($atributos));
        $query .= " ) VALUES (' ";
        $query .= join("', '", array_values($atributos));
        $query .= " ') ";
        $resultado = self::$db->query($query);
        // DEBUGGEAR FETCH
        return json_encode(['query' => $query]);
        // MENSAJE DE EXITO
        if($resultado){
          if(static::$tabla === "proyectos"){
              //    REDIRECCIONAR AL USUARIO
              header("Location: /admin");
          }else{
            return [
                'resultado' => $resultado,
            ];
          }
        }
    }

    public function actualizar(){
        // SANITIZAR LOS DATOS
        $atributos = $this->sanitizarAtributos();
        $valores = [];

        foreach($atributos as $key => $value){
            $valores[] = "{$key}='{$value}'";
        }
      
       $query =  "UPDATE " . static::$tabla . " SET ";
       $query .= join(', ', $valores);
       $query .= " WHERE id = '". self::$db->escape_string($this->id) . "' ";
       $query .= " LIMIT 1 ";
       

       $resultado = self::$db->query($query);
       
        if($resultado){
            //    REDIRECCIONAR AL USUARIO
            header("Location:/admin");
        }
    }

    public function eliminar(){
        // ELIMINAR EL REGISTRO
        $query = "DELETE FROM " .  static::$tabla . " WHERE id =  " . self::$db->escape_string($this->id) . " LIMIT 1";
        
        $resultado = self::$db->query($query);

        // if($resultado){
        //     header('Location:/admin');
        // }
    }

    // IDENTIFICAR Y UNIR LOS ATRIBUTOS DE LA DB
    public function atributos(){
        $atributos = [];
        foreach(static::$columnasDB as $columna){
            if($columna === "id") continue;
            if($columna === "likes") continue;
            if($columna === "comentarios") continue;
            if($columna === "submitted"){
                $atributos[$columna] = $this->submitted;
            }
            if($columna === "url"){
                $atributos[$columna] = $this->url;
            }
            if($columna === "repo"){
                $atributos[$columna] = $this->repo;
            }
            if($columna === "alias"){
                $atributos[$columna] = $this->alias;
            }
            $atributos[$columna] = $this->$columna;
        }
        return $atributos;
    }

    public function sanitizarAtributos(){
        $atributos = $this->atributos();
        $sanitizado = [];

        foreach($atributos as $key => $value){
            $sanitizado[$key] = self::$db->escape_string($value);
        }
        return $sanitizado;
    }
    public function validar(){
        static::$errores = [];
        return static::$errores;
    }

    public static function all(){
        $query = "SELECT * FROM " . static::$tabla;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function like($id){
        $query =" UPDATE proyectos SET likes = likes + 1 WHERE id = $id";
        $resultado = self::$db->query($query);
        return $resultado;
    }

    public static function get($cantidad){
        $query = "SELECT * FROM " . static::$tabla . " LIMIT " . $cantidad;
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function find($id){
        $query = "SELECT * FROM " . static::$tabla . " WHERE id = $id";
        $resultado = self::consultarSQL($query);
        return array_shift($resultado);
    }
    
    public static function findCol($col,$val){
        $query = "SELECT * FROM " . static::$tabla . " WHERE $col = $val";
        $resultado = self::consultarSQL($query);
        return $resultado;
    }

    public static function consultarSQL($query){
        $resultado = self::$db->query($query);

        $array = [];

        while($registro = $resultado->fetch_assoc()){
            $array[] = static::crearObjeto($registro);
        }

        $resultado->free();

        return $array;
    }

    protected static function crearObjeto($registro){
        $objeto = new static;

        foreach($registro as $key => $value){
            if(property_exists($objeto, $key)){
                $objeto->$key = $value;
            }
        }

        return $objeto;
    }

    public function sincronizar($args = []){
        foreach($args as $key => $value){
            // MAPEO DEL OBJETO EN MEMORIA CON LA NUEVA INFORMACION
            if(property_exists($this, $key) && !is_null($value)){
                $this->$key = $value;
            }
        }
    }
}