<?php

interface Detalle
{
    public function obtenerDetallesEspecificos(): string;
}

{

}

abstract class Entrada implements Detalle
{
    public $id;
    public $fecha_creacion;
    public $tipo;
    public $titulo;
    public $descripcion;

    public function __construct($datos = [])
    {
        foreach ($datos as $key => $value) {
            if (property_exists($this, $key)) {
                $this->$key = $value;
            }
        }
    }

    abstract public function obtenerDetallesEspecificos(): string;
}

class EntradUnaColumna extends Entrada
{
    public $titulo;
    public $descripcion;

    public function __construct($id, $fecha_creacion, $titulo, $descripcion)
    {
        parent::__construct($id, $fecha_creacion, 1);
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
    }

    // Implementación del método obtenerDetallesEspecificos
    public function obtenerDetallesEspecificos(): string
    {
        return "Entrada de una columna: " . $this->titulo;
    }
}

class EntradaDosColumnas extends Entrada
{
    public $titulo1;
    public $descripcion1;
    public $titulo2;
    public $descripcion2;

    public function __construct($id, $fecha_creacion, $titulo1, $descripcion1, $titulo2, $descripcion2)
    {
        parent::__construct($id, $fecha_creacion, 2);
        $this->titulo1 = $titulo1;
        $this->descripcion1 = $descripcion1;
        $this->titulo2 = $titulo2;
        $this->descripcion2 = $descripcion2;
    }

    // Implementación del método obtenerDetallesEspecificos
    public function obtenerDetallesEspecificos(): string
    {
        return "Entrada de dos columnas: " . $this->titulo1 . " | " . $this->titulo2;
    }
}

class EntradaTresColumnas extends Entrada
{
    public $titulo1;
    public $descripcion1;
    public $titulo2;
    public $descripcion2;
    public $titulo3;
    public $descripcion3;

    public function __construct($id, $fecha_creacion, $titulo1, $descripcion1, $titulo2, $descripcion2, $titulo3, $descripcion3)
    {
        parent::__construct($id, $fecha_creacion, 3);
        $this->titulo1 = $titulo1;
        $this->descripcion1 = $descripcion1;
        $this->titulo2 = $titulo2;
        $this->descripcion2 = $descripcion2;
        $this->titulo3 = $titulo3;
        $this->descripcion3 = $descripcion3;
    }

    // Implementación del método obtenerDetallesEspecificos
    public function obtenerDetallesEspecificos(): string
    {
        return "Entrada de tres columnas: " . $this->titulo1 . " | " . $this->titulo2 . " | " . $this->titulo3;
    }
}

{

}

class GestorBlog
{
    private $entradas = [];

    public function cargarEntradas()
    {
        if (file_exists('blog.json')) {
            $json = file_get_contents('blog.json');
            $data = json_decode($json, true);
            foreach ($data as $entradaData) {
                $this->entradas[] = new Entrada($entradaData);
            }
        }
    }

    public function guardarEntradas()
    {
        $data = array_map(function ($entrada) {
            return get_object_vars($entrada);
        }, $this->entradas);
        file_put_contents('blog.json', json_encode($data, JSON_PRETTY_PRINT));
    }

    public function obtenerEntradas()
    {
        return $this->entradas;
    }
}   