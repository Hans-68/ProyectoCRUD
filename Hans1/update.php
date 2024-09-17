<?php
include 'config.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = $_POST['nombre'];
        $email = $_POST['email'];
        $genero = $_POST['genero'];
        $celular = $_POST['celular'];
        $cargo = $_POST['cargo'];

        if (!empty($nombre) && !empty($email) && !empty($genero) && !empty($celular) && !empty($cargo)) {
            $stmt = $pdo->prepare("UPDATE users SET name = ?, email = ?, genero = ?, celular = ?, cargo = ? WHERE id = ?");
            $stmt->execute([$nombre, $email, $genero, $celular, $cargo, $id]);
            header('Location: index.php');
            exit;
        } else {
            echo '¡Todos los campos son requeridos!';
        }
    }

    $stmt = $pdo->prepare("SELECT * FROM users WHERE id = ?");
    $stmt->execute([$id]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
} else {
    echo 'ID no especificado.';
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Actualizar Usuario</title>
    <link rel="stylesheet" href="style2.css">
</head>
<body>
    <h1>Actualizar Usuario</h1>
    <?php if ($user): ?>
    <form method="post">
        <label>Nombre:
            <input type="text" name="nombre" value="<?php echo htmlspecialchars($user['name']); ?>" required>
        </label><br>
        <label>Email:
            <input type="email" name="email" value="<?php echo htmlspecialchars($user['email']); ?>" required>
        </label><br>
        <label>Género:
            <input type="text" name="genero" value="<?php echo htmlspecialchars($user['genero']); ?>" required>
        </label><br>
        <label>Celular:
            <input type="text" name="celular" value="<?php echo htmlspecialchars($user['celular']); ?>" required>
        </label><br>
        <label>Cargo:
            <input type="text" name="cargo" value="<?php echo htmlspecialchars($user['cargo']); ?>" required>
        </label><br>
        <input type="submit" value="Actualizar Usuario">
    </form>
    <?php else: ?>
        <p>Usuario no encontrado.</p>
    <?php endif; ?>
    <div class="back-link-container">
        <a href="index.php" class="back-link">Volver a la Lista</a>
    </div>

</body>
</html>
