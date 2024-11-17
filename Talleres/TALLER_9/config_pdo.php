<?php
// Configuración de la base de datos
$servername = "localhost"; // Cambia esto si tu servidor no está en localhost
$username = "root";        // Cambia este valor al usuario de tu base de datos
$password = "";            // Cambia este valor a la contraseña de tu base de datos
$database = "taller9_db"; // Reemplaza con el nombre de tu base de datos

try {
    // Crear conexión PDO
    $pdo = new PDO("mysql:host=$servername;dbname=$database;charset=utf8", $username, $password);

    // Configurar atributos de PDO
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

    // Confirmar conexión exitosa
    // echo "Conexión exitosa a la base de datos."; // Descomenta para probar
} catch (PDOException $e) {
    // Manejar error de conexión
    die("Error al conectar a la base de datos: " . $e->getMessage());
}
?>
