<?php
 session_start();

 if(!isset($_SESSION['user'])){
    header('Location: login.php');
 }
?>
<!DOCTYPE html>

<html>

    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <title></title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="">
    </head>
    <body>
        <a href="logout.php">Cerra sesion </a>
        <div>
            <table>
                <th>Titulo</th>
                <th>Fecha de subida</th>
                <th>Fecha Limite</th>
             
            </table>

            <form action="" method="post">
                <input type="text" name="Tarea" id="tarea" placeholder="agregar tarea">
                <input type="text" name="Fecha"placeholder="Fecha">
            </form>
        </div>
    </body>
</html>