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
            margin: 0;
        }
        .barra-superior {
            display: flex;
            justify-content: space-between;
            background-color: #f1f1f1;
            padding: 10px 20px;
            align-items: center;
            position: relative;
        }
        .perfil {
            display: flex;
            align-items: center;
            cursor: pointer;
            position: relative;
        }
        .perfil img {
            width: 40px;
            height: 40px;
            border-radius: 50%;
            margin-left: 10px;
        }

        /* Menú desplegable */
        .menu {
            display: none;
            position: absolute;
            top: 60px;
            right: 20px;
            background: #fff;
            border: 1px solid #ccc;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0,0,0,0.1);
            width: 180px;
            z-index: 1000;
        }
        .menu ul {
            list-style: none;
            margin: 0;
            padding: 0;
        }
        .menu ul li {
            padding: 12px;
            border-bottom: 1px solid #eee;
            cursor: pointer;
        }
        .menu ul li:hover {
            background-color: #f5f5f5;
        }
        .menu ul li:last-child {
            border-bottom: none;
        }

        /* Estilo cerrar sesión en rojo */
        .menu ul li.cerrar {
            color: red;
            font-weight: bold;
        }
    </style>
</head>
<body>

<div class="barra-superior">
    <div class="cerrar-sesion">
        <!-- ya no hace falta este botón porque estará en el menú -->
    </div>
    <div class="perfil" id="perfil">
        <span><?php echo $nombre; ?></span>
        <img src="imagenes/login.png" alt="Foto de perfil">
    </div>

    <!-- Menú desplegable -->
    <div class="menu" id="menuPerfil">
        <ul>
            <li onclick="alert('Esta opción aún no está habilitada, estamos trabajando en esto.')">Configuración</li>
            <li onclick="alert('Esta opción aún no está habilitada, estamos trabajando en esto.')">Modo</li>
            <li class="cerrar" onclick="window.location.href='logout.php'">Cerrar sesión</li>
        </ul>
    </div>
</div>

<h2>Bienvenido al Panel de Usuario</h2>
<p>Aquí puedes acceder a tus cursos, ver calificaciones, etc.</p>

<script>
    // Alternar visibilidad del menú al hacer click en perfil
    const perfil = document.getElementById('perfil');
    const menu = document.getElementById('menuPerfil');

    perfil.addEventListener('click', () => {
        menu.style.display = (menu.style.display === 'block') ? 'none' : 'block';
    });

    // Cerrar menú si se hace click fuera
    document.addEventListener('click', (e) => {
        if (!perfil.contains(e.target) && !menu.contains(e.target)) {
            menu.style.display = 'none';
        }
    });
</script>

</body>
</html>
