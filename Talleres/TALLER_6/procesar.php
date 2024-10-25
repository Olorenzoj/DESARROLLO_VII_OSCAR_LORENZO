<?php
require_once 'validaciones.php';
require_once 'sanitizacion.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $errores = [];
    $datos = [];

    // Sanitizar y validar los campos del formulario
    $campos = ['nombre', 'email', 'fecha_nacimiento', 'genero', 'intereses', 'comentarios']; 

    foreach ($campos as $campo) {
        if (isset($_POST[$campo])) {
            $valor = $_POST[$campo];

        $valorSanitizado = call_user_func("sanitizar" . str_replace("_", "", ucfirst($campo)), $valor); 

            if ($valorSanitizado === false) {
                $errores[] = "El campo $campo no es válido.";
            } else {
                $datos[$campo] = $valorSanitizado;

                if (!call_user_func("validar" . str_replace("_", "", ucfirst($campo)), $valorSanitizado)) {
                    switch ($campo) {
                        case 'email':
                            $errores[] = "Por favor, introduce una dirección de correo electrónico válida.";
                            break;
                        case 'fecha_nacimiento':
                            $errores[] = "La fecha de nacimiento no es válida o eres menor de 18 años.";
                            break;
                        default:
                            $errores[] = "El campo $campo no es válido.";
                    }
                }
            }
        }
    }

    // Calcular la edad a partir de la fecha de nacimiento
    if (isset($datos['fecha_nacimiento'])) {
        $fechaObj = DateTime::createFromFormat('Y-m-d', $datos['fecha_nacimiento']);
        $hoy = new DateTime();
        $edad = $hoy->diff($fechaObj)->y;
        $datos['edad'] = $edad;
    }

    // Procesar la foto de perfil
    if (isset($_FILES['foto_perfil']) && $_FILES['foto_perfil']['error'] !== UPLOAD_ERR_NO_FILE) {
        $foto = validarFotoPerfil($_FILES['foto_perfil']); 
        if (!$foto) {
            $errores[] = "La foto de perfil no es válida.";
        } else {
            // Only access $foto['name'] and $foto['tmp_name'] if $foto is an array
            $rutaDestino = 'uploads/' . basename($foto['name']);
            if (move_uploaded_file($foto['tmp_name'], $rutaDestino)) { 
                $datos['foto_perfil'] = $rutaDestino;
            } else { 
                $errores[] = "Hubo un error al subir la foto de perfil.";
            }
        }
    }
    
    // Guardar los datos en el archivo JSON si no hay errores
    if (empty($errores)) {
        $datosExistentes = file_exists('datos.json') ? json_decode(file_get_contents('datos.json'), true) : [];
        $datosExistentes[] = $datos;
        file_put_contents('datos.json', json_encode($datosExistentes));
        
        // Redirigir a la página de resumen
        header("Location: resumen.php");
        exit(); 
    }

    // Mostrar resultados o errores
    if (empty($errores)) {
        echo "<h2>Datos Recibidos:</h2>";
        echo "<table border='1'>";
        foreach ($datos as $campo => $valor) {
            echo "<tr>";
            echo "<th>" . ucfirst($campo) . "</th>";
            if ($campo === 'intereses') {
                echo "<td>" . implode(", ", $valor) . "</td>";
            } elseif ($campo === 'foto_perfil') {
                echo "<td><img src='$valor' width='100'></td>";
            } else {
                echo "<td>$valor</td>";
            }
            echo "</tr>";
        }
        echo "</table>";
    } else {
        echo "<h2>Errores:</h2>";
        echo "<ul>";
        foreach ($errores as $error) {
            echo "<li>$error</li>";
        }
        echo "</ul>";
    }
} else {
    echo "Acceso no permitido.";
}

echo "<br><a href='formulario.html'>Volver al formulario</a>"; 
