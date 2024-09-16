<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $genero = $_POST['genero'];
    $celular = $_POST['celular'];
    $cargo = $_POST['cargo'];

    if (!empty($nombre) && !empty($email) && !empty($genero) && !empty($celular) && !empty($cargo)) {
        $stmt = $pdo->prepare("INSERT INTO users (name, email, genero, celular, cargo) VALUES (?, ?, ?, ?, ?)");
        $stmt->execute([$nombre, $email, $genero, $celular, $cargo]);
        header('Location: index.php');
        exit;
    } else {
        echo '¡Todos los campos son requeridos!';
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Crear Usuario</title>
    <link rel="stylesheet" href="style.css">
    <style>
        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            background: #f9f9f9;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input[type="text"],
        .form-group input[type="email"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
        }

        .form-group input[type="submit"] {
            background-color: #0066cc;
            color: #fff;
            border: none;
            padding: 10px 20px;
            border-radius: 4px;
            cursor: pointer;
        }

        .form-group input[type="submit"]:hover {
            background-color: #004999;
        }

        .form-group input[type="submit"]:active {
            background-color: #003366;
        }

        .back-link {
            display: inline-block;
            margin-top: 20px;
            text-decoration: none;
            color: #0066cc;
        }

        .back-link:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Crear Nuevo Usuario</h1>
        <form method="post">
            <div class="form-group">
                <label>Nombre:</label>
                <input type="text" name="nombre" required>
            </div>
            <div class="form-group">
                <label>Email:</label>
                <input type="email" name="email" required>
            </div>
            <div class="form-group">
                <label>Género:</label>
                <input type="text" name="genero" required>
            </div>
            <div class="form-group">
                <label>Celular:</label>
                <input type="text" name="celular" required>
            </div>
            <div class="form-group">
                <label>Cargo:</label>
                <input type="text" name="cargo" required>
            </div>
            <div class="form-group">
                <input type="submit" value="Crear Usuario">
            </div>
        </form>
        <a class="back-link" href="index.php">Volver a la Lista</a>
    </div>
</body>
</html>
