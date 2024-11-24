<?php
session_start();
require_once __DIR__ . '/../includes/database.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

$userId = $_SESSION['user']['google_id'];
$pdo = connectDB();
$stmt = $pdo->prepare("SELECT * FROM libros_guardados WHERE user_id = :user_id");
$stmt->execute(['user_id' => $userId]);
$libros = $stmt->fetchAll(PDO::FETCH_ASSOC);

?>

<!DOCTYPE html>
<html>
<head>
    <title>Mi Biblioteca</title>
    <link rel="stylesheet" href="../../../DSVII_PROYECTO_FINAL/public/css/styles.css">
</head>
<body>
<header>
    <nav>
        <ul>
            <li><a href="index.php">Inicio</a></li>
            <li><a href="search.php">Buscar</a></li>
            <li><a href="library.php">Mi Biblioteca</a></li>
            <li><a href="logout.php">Cerrar Sesión</a></li>
        </ul>
    </nav>
</header>

<main>
    <h1>Mi Biblioteca</h1>

    <ul class="book-list">
        <?php foreach ($libros as $libro): ?>
            <li>
                <img src="<?= $libro['imagen_portada'] ?>" alt="<?= $libro['titulo'] ?>">
                <h3><?= $libro['titulo'] ?></h3>
                <p>Autor: <?= $libro['autor'] ?></p>
            </li>
        <?php endforeach; ?>
    </ul>
</main>

<footer>
</footer>
</body>
</html>