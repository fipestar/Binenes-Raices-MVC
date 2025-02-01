<?php 
namespace App;

class Blog extends ActiveRecord {
    protected static $tabla = 'blog';
    protected static $columnasDB = ['id', 'titulo', 'creado', 'descripcion', 'imagen',];

    public $id;
    public $titulo;
    public $creado;
    public $descripcion;
    public $imagen;

    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->creado = $args['creado'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        
    }
    public function validar(){
        if(!$this->titulo){
            self::$errores[] = "El titulo es obligatorio";
        }
        if(!$this->creado){
            self::$errores[] = "La fecha de creacion es obligatoria";
        }
        if(!$this->descripcion){
            self::$errores[] = "La descripcion es obligatoria";
        }
        if(!$this->imagen){
            self::$errores[] = "La imagen es obligatoria";
        }

        return self::$errores;
    }
}
