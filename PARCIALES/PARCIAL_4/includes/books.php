<?php

require_once __DIR__ . '/database.php';
require_once __DIR__ . '/../vendor/autoload.php';

function searchBooks($query) {
    $client = new GuzzleHttp\Client();
    $apiKey = "AIzaSyAstjRF3o2zMrbpNco10qyDGa63kRF3no0";
    $response = $client->request('GET', "https://www.googleapis.com/books/v1/volumes?q={$query}&key={$apiKey}");
    return json_decode($response->getBody(), true);
}

function getBookDetails($bookId) {
    $client = new GuzzleHttp\Client();
    $apiKey = "AIzaSyAstjRF3o2zMrbpNco10qyDGa63kRF3no0";
    $response = $client->request('GET', "https://www.googleapis.com/books/v1/volumes/{$bookId}?key={$apiKey}");
    return json_decode($response->getBody(), true);
}

function saveBook($userId, $bookData) {
    $pdo = connectDB();
    $stmt = $pdo->prepare("INSERT INTO libros_guardados (user_id, google_books_id, titulo, autor, imagen_portada) 
                        VALUES (:user_id, :google_books_id, :titulo, :autor, :imagen_portada)");
    $stmt->execute([
        'user_id' => $userId,
        'google_books_id' => $bookData['id'],
        'titulo' => $bookData['volumeInfo']['title'],
        'autor' => $bookData['volumeInfo']['authors'][0],
        'imagen_portada' => $bookData['volumeInfo']['imageLinks']['thumbnail']
    ]);
}

// ... (funciones para obtener, actualizar y eliminar libros)