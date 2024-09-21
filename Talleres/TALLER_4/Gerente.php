<?php
require_once 'Empleado.php';
require_once 'Evaluable.php';

class Gerente extends Empleado implements Evaluable {
    private $departamento;
    private $bono;

    public function __construct($nombre, $idEmpleado, $salarioBase, $departamento) {
        parent::__construct($nombre, $idEmpleado, $salarioBase);
        $this->departamento = $departamento;
        $this->bono = 0;
    }

    public function asignarBono($bono) {
        $this->bono = $bono;
    }

    public function getSalarioTotal() {
        return $this->salarioBase + $this->bono;
    }

    public function evaluarDesempenio() {
        // Lógica para evaluar el desempeño del gerente
        return "Evaluación del gerente " . $this->nombre . ": Excelente";
    }
}
?>
