<?php
session_start();
require_once __DIR__ . '/../includes/auth.php';

$client = createGoogleClient(); // Crea la instancia del cliente de Google aquí

if (isset($_SESSION['user'])) {
    // Redirigir a la página de la biblioteca si el usuario ya ha iniciado sesión
    header('Location: library.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Biblioteca Personal</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <?php if (isset($_SESSION['user'])): ?>
                <li><a href="search.php">Buscar</a></li>
                <li><a href="library.php">Mi Biblioteca</a></li>
                <li><a href="logout.php">Cerrar Sesión</a></li>
            <?php else: ?>
                <li><a href="<?= loginUrl($client) ?>">Iniciar sesión con Google</a></li>
            <?php endif; ?>
        </ul>
    </nav>
</header>

<main>
    <h1>Bienvenido a tu Biblioteca Personal</h1>

    <?php if (isset($_SESSION['user'])): ?>
        <p>Hola, <?= $_SESSION['user']['nombre'] ?>!</p>
    <?php endif; ?>
</main>

<footer>
</footer>
</body>
</html>