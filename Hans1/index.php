<?php
include 'config.php';

$stmt = $pdo->query("SELECT * FROM users");
$users = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuarios</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <h1>Lista de Usuarios</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre</th>
                <th>Email</th>
                <th>Género</th>
                <th>Celular</th>
                <th>Cargo</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($users as $user): ?>
            <tr>
                <td><?php echo htmlspecialchars($user['id']); ?></td>
                <td><?php echo htmlspecialchars($user['name']); ?></td>
                <td><?php echo htmlspecialchars($user['email']); ?></td>
                <td><?php echo htmlspecialchars($user['genero']); ?></td>
                <td><?php echo htmlspecialchars($user['celular']); ?></td>
                <td><?php echo htmlspecialchars($user['cargo']); ?></td>
                <td>
                    <a href="update.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="button edit">Editar</a>
                    <a href="delete.php?id=<?php echo htmlspecialchars($user['id']); ?>" class="button delete" onclick="return confirm('¿Estás seguro de que quieres eliminar este usuario?');">Eliminar</a>
                </td>
            </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <a href="create.php" class="button add">Agregar Nuevo Usuario</a>
</body>
</html>