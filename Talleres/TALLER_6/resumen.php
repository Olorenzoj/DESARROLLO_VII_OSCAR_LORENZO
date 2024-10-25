<?php

// Leer los datos del archivo JSON
$datos = file_exists('datos.json') ? json_decode(file_get_contents('datos.json'), true) : [];

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Resumen de Registros</title>
</head>
<body>
    <h1>Resumen de Registros</h1>
    <table>
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Email</th>
                <th>Edad</th>
                <th>Género</th>
                <th>Intereses</th>
                <th>Comentarios</th>
                <th>Foto de Perfil</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($datos as $registro): ?>
                <tr>
                    <td><?php echo htmlspecialchars($registro['nombre']); ?></td>
                    <td><?php echo htmlspecialchars($registro['email']); ?></td>
                    <td><?php echo $registro['edad']; ?></td>
                    <td><?php echo htmlspecialchars($registro['genero']); ?></td>
                    <td><?php echo implode(', ', $registro['intereses']); ?></td>
                    <td><?php echo htmlspecialchars($registro['comentarios']); ?></td>
                    <td>
                        <?php if (isset($registro['foto_perfil'])): ?>
                            <img src="<?php echo $registro['foto_perfil']; ?>" alt="Foto de Perfil" width="100">
                        <?php endif; ?>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>