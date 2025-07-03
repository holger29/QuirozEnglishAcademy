<?php
// Panel PHP
session_start();

if (!isset($_SESSION['email'])) {
    header("Location: index.html");
    exit();
}

$nombre = $_SESSION['nombre_completo'];
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Panel de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .barra-superior {
            display: flex;
            justify-content: space-between;
            background-color: #f1f1f1;
            padding: 10px;
        }
        .perfil {
            display: flex;
            align-items: center;
        }
        .perfil img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }
        .cerrar-sesion a {
            color: red;
            font-weight: bold;
            text-decoration: none;
        }
    </style>
</head>
<body>

<div class="barra-superior">
    <div class="cerrar-sesion">
        <a href="logout.php">Cerrar sesión</a>
    </div>
    <div class="perfil">
        <span><?php echo $nombre; ?></span>
        <img src="imagenes/login.png" alt="Foto de perfil">
    </div>
</div>

<h2>Bienvenido al Panel de Usuario</h2>
<p>Aquí puedes acceder a tus cursos, ver calificaciones, etc.</p>

</body>
</html>