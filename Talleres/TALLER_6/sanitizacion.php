<?php
function sanitizarNombre($nombre) {
    $nombre = trim($nombre); 
    return htmlspecialchars($nombre, ENT_QUOTES, 'UTF-8'); 
}

function sanitizarEmail($email) {
    $email = trim($email);
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return htmlspecialchars($email, ENT_QUOTES, 'UTF-8'); 
    } else {
        return false; 
    }
}

function sanitizarEdad($edad) {
    $edad = filter_var($edad, FILTER_SANITIZE_NUMBER_INT);
    if ($edad !== false && $edad >= 0 && $edad <= 120) { 
        return $edad;
    } else {
        return false; 
    }
}

function sanitizarSitioWeb($sitioWeb) { 
    $sitioWeb = trim($sitioWeb);
    if (filter_var($sitioWeb, FILTER_VALIDATE_URL)) {
        return $sitioWeb;
    } else {
        return false; 
    }
}

function sanitizarGenero($genero) {
  
    $genero = trim($genero);
    $allowedGenders = ['male', 'female', 'other']; 
    if (in_array($genero, $allowedGenders)) {
        return $genero;
    } else {
        return false; 
    }
}

function sanitizarIntereses($intereses) {
    return array_map(function($interes) {
        $interes = trim($interes);
        return htmlspecialchars($interes, ENT_QUOTES, 'UTF-8'); 
    }, $intereses);
}

function sanitizarComentarios($comentarios) {
    return htmlspecialchars(trim($comentarios), ENT_QUOTES, 'UTF-8'); 
}
function sanitizarFechaNacimiento($fecha) {
    $fecha = trim($fecha);
    $fechaObj = DateTime::createFromFormat('Y-m-d', $fecha);
    return $fechaObj ? $fechaObj->format('Y-m-d') : false;
}
