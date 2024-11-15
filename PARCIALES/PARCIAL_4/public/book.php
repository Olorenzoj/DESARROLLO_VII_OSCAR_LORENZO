<?php
session_start();
require_once __DIR__ . '/../includes/books.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Obtener detalles del libro si se proporciona un ID
if (isset($_GET['id'])) {
    $book = getBookDetails($_GET['id']);
}

// Guardar el libro si se ha enviado el formulario
if (isset($_POST['bookId'])) {
    $bookId = $_POST['bookId'];
    $userId = $_SESSION['user']['google_id'];
    $bookData = getBookDetails($bookId);
    saveBook($userId, $bookData);
    // Puedes mostrar un mensaje al usuario indicando que el libro se guardó
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Detalles del Libro</title>
    <link rel="stylesheet" href="css/styles.css">
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
    <h1>Detalles del Libro</h1>

    <?php if (isset($book)): ?>
        <img src="<?= $book['volumeInfo']['imageLinks']['thumbnail'] ?>" alt="<?= $book['volumeInfo']['title'] ?>">
        <h2><?= $book['volumeInfo']['title'] ?></h2>
        <p>Autor: <?= isset($book['volumeInfo']['authors'][0]) ? $book['volumeInfo']['authors'][0] : 'Autor no disponible' ?></p>
        <p>Descripción: <?= $book['volumeInfo']['description'] ?></p>
        <form method="POST" action="book.php">
            <input type="hidden" name="bookId" value="<?= $book['id'] ?>">
            <button type="submit">Guardar</button>
        </form>
    <?php endif; ?>
</main>

<footer>
</footer>
</body>
</html>