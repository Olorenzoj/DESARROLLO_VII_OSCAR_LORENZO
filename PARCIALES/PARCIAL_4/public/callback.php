<?php
session_start();
require_once __DIR__ . '/../includes/auth.php';
require_once __DIR__ . '/../includes/database.php'; // Asegúrate de incluir el archivo con la función connectDB()

$client = createGoogleClient();
handleCallback($client);

// Obtener la información del usuario de la sesión
$userInfo = $_SESSION['user'];

// Función para guardar el usuario en la base de datos
function saveUser($userInfo) {
    $pdo = connectDB();
    try {
        $stmt = $pdo->prepare("INSERT INTO usuarios (id, email, nombre) VALUES (:id, :email, :nombre) 
    ON DUPLICATE KEY UPDATE email = VALUES(email), nombre = VALUES(nombre)");
        $stmt->execute([
            'id' => $userInfo['google_id'],
            'email' => $userInfo['email'],
            'nombre' => $userInfo['nombre']
        ]);
    } catch (PDOException $e) {
        // Manejo de errores, por ejemplo, registrar el error o mostrar un mensaje al usuario
        error_log("Error al guardar el usuario: " . $e->getMessage());
        // Puedes mostrar un mensaje de error al usuario si lo deseas
    } catch (Exception $e) {
        echo "Error general: " . $e->getMessage();
    }
}

// Guardar el usuario en la base de datos
saveUser($userInfo);

// Redirigir a la página principal después de iniciar sesión
header('Location: index.php');
exit;

