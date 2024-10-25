<?php
session_start();

if(isset($_SESSION['user'])) {
    header("Location: index.php");
    exit();
}


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $usuario = $_POST['user'];
    $contrasena = $_POST['password'];

    if($usuario === "oscar" && $contrasena === "1234") {
        $_SESSION['user'] = $usuario;
        header("Location: index.php");
        exit();
    } else {
        $error = "Usuario o contraseña incorrectos";
    }
}
?>
?>

<!DOCTYPE html>

<html>
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../css/plantilla.css">
    </head>
    <body>
        <div class="divlogin">
            <form action="" method="post">
                <Input  type="text" name="user" id="user"placeholder="Ingrese su Email">
                <input type="password" name="password" id="password" placeholder="Ingrese la Contraseña">
                <button type="submit">submit</button>
            </form>
            
        </div>
    </body>
</html>