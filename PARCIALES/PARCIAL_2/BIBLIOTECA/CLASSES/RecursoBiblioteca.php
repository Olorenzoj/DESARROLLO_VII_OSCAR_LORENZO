<?php
require_once 'Prestable.php';

abstract class RecursoBiblioteca implements Prestable {
    public $id;
    public $titulo;
    public $estado;

    public function __construct($id, $titulo, $estado) {
        $this->id = $id;
        $this->titulo = $titulo;
        $this->estado = $estado;
    }

    abstract public function obtenerDetallesPrestamo(): string;
}
?>