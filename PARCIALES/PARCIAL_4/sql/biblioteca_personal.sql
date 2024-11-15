CREATE TABLE usuarios (
    id VARCHAR(255) PRIMARY KEY,
    email VARCHAR(255) NOT NULL UNIQUE,
    nombre VARCHAR(255),
    google_id VARCHAR(255) UNIQUE,
    fecha_registro TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE libros_guardados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id VARCHAR(255),
    google_books_id VARCHAR(255) UNIQUE,
    titulo VARCHAR(255),
    autor VARCHAR(255),
    imagen_portada VARCHAR(255),
    reseña_personal TEXT,
    fecha_guardado TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usuarios(id)
);