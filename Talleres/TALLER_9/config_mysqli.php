<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto si tu servidor no está en localhost
$username = "root";        // Cambia este valor al usuario de tu base de datos
$password = "";            // Cambia este valor a la contraseña de tu base de datos
$database = "taller9_db"; // Reemplaza con el nombre de tu base de datos

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $database);

// Verificar conexión
if (!$conn) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}
?>
