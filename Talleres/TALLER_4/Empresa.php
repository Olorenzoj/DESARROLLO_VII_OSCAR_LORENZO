<?php
require_once 'Gerente.php';
require_once 'Desarrollador.php';

class Empresa {
    private $empleados = [];

    public function agregarEmpleado(Empleado $empleado) {
        $this->empleados[] = $empleado;
    }

    public function listarEmpleados() {
        foreach ($this->empleados as $empleado) {
            echo "Empleado: " . $empleado->getNombre() . " - ID: " . $empleado->getIdEmpleado() . "<br>";
        }
    }

    public function calcularNominaTotal() {
        $nominaTotal = 0;
        foreach ($this->empleados as $empleado) {
            if ($empleado instanceof Gerente) {
                $nominaTotal += $empleado->getSalarioTotal();
            } else {
                $nominaTotal += $empleado->getSalarioBase();
            }
        }
        return $nominaTotal;
    }

    public function evaluarDesempenioEmpleados() {
        foreach ($this->empleados as $empleado) {
            if ($empleado instanceof Evaluable) {
                echo $empleado->evaluarDesempenio() . "<br>";
            } else {
                echo $empleado->getNombre() . " no es evaluable.<br>";
            }
        }
    }
}
?>
