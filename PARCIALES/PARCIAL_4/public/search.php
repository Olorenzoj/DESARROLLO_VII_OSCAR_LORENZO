<?php
session_start();
require_once __DIR__ . '/../includes/books.php';

if (!isset($_SESSION['user'])) {
    header('Location: index.php');
    exit;
}

// Mueve la lógica de búsqueda aquí, fuera de <main>
if (isset($_GET['q'])) {
    $results = searchBooks($_GET['q']);
}

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
    <title>Buscar Libros</title>
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
    <h1>Buscar Libros</h1>
    <form method="GET" action="search.php">
        <input type="text" name="q" placeholder="Buscar libros...">
        <button type="submit">Buscar</button>
    </form>

    <?php if (isset($results)): ?>
        <h2>Resultados:</h2>
        <ul class="book-list">
            <?php foreach ($results['items'] as $item): ?>
                <li>
                    <img src="<?= $item['volumeInfo']['imageLinks']['thumbnail'] ?>" alt="<?= $item['volumeInfo']['title'] ?>">
                    <h3><?= $item['volumeInfo']['title'] ?></h3>
                    <p>Autor: <?= isset($item['volumeInfo']['authors'][0]) ? $item['volumeInfo']['authors'][0] : 'Autor no disponible' ?></p>
                    <a href="book.php?id=<?= $item['id'] ?>">Ver detalles</a>
                    <form method="POST" action="search.php">
                        <input type="hidden" name="bookId" value="<?= $item['id'] ?>">
                        <button type="submit">Guardar</button>
                    </form>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</main>

<footer>
</footer>
</body>
</html>