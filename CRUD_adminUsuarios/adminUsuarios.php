<?php
// Conexión
$host = "localhost";
$user = "root";
$password = "";
$db = "bd_quirozacademy";

$conn = new mysqli($host, $user, $password, $db);
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$sql = "SELECT * FROM usuarios";
$resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Gestión de Usuarios</title>
    <style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td { border: 1px solid #000; }
        th, td { padding: 8px; text-align: left; }
        .acciones a {
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <h2>Administración de Usuarios</h2>
     <!--<a href="CRUD_adminUsuarios/agregarUsuario.php">Agregar nuevo usuario</a> -->
   <a href="agregarUsuario.php">Agregar nuevo usuario</a><br><br> 

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nombre completo</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Dirección</th>
                <th>Fecha de ingreso</th>
                <th>Acciones</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($usuario = $resultado->fetch_assoc()): ?>
                <tr>
                    <td><?= $usuario['id'] ?></td>
                    <td><?= $usuario['nombre'] . ' ' . $usuario['apellidos'] ?></td>
                    <td><?= $usuario['email'] ?></td>
                    <td><?= $usuario['telefono'] ?></td>
                    <td><?= $usuario['direccion'] ?></td>
                    <td><?= $usuario['fecha_registro'] ?></td>
                    <td class="acciones">
                        <a href="editarUsuario.php?id=<?= $usuario['id'] ?>">Editar</a>
                        <a href="eliminarUsuario.php?id=<?= $usuario['id'] ?>" onclick="return confirm('¿Estás seguro?')">Eliminar</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>

</body>
</html>

<?php $conn->close(); ?>
