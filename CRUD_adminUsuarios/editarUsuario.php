<?php
$conn = new mysqli("localhost", "root", "", "bd_quirozacademy");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id = $id";
$resultado = $conn->query($sql);

if ($resultado->num_rows == 0) {
    echo "Usuario no encontrado.";
    exit();
}

$usuario = $resultado->fetch_assoc();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellidos = $conn->real_escape_string($_POST['apellidos']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']);
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $direccion = $conn->real_escape_string($_POST['direccion']);

    $sql = "UPDATE usuarios SET
                nombre = '$nombre',
                apellidos = '$apellidos',
                email = '$email',
                password = '$password',
                telefono = '$telefono',
                direccion = '$direccion'
            WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: adminUsuarios.php");
        exit();
    } else {
        echo "Error al actualizar: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Usuario</title>
</head>
<body>
    <h2>Editar Usuario</h2>
    <form method="POST" action="">
        <input type="text" name="nombre" value="<?= $usuario['nombre'] ?>" required><br>
        <input type="text" name="apellidos" value="<?= $usuario['apellidos'] ?>" required><br>
        <input type="email" name="email" value="<?= $usuario['email'] ?>" required><br>
        <input type="text" name="password" value="<?= $usuario['password'] ?>" required><br>
        <input type="tel" name="telefono" value="<?= $usuario['telefono'] ?>"><br>
        <input type="text" name="direccion" value="<?= $usuario['direccion'] ?>"><br>
        <button type="submit">Actualizar</button>
    </form>
    <br>
    <a href="adminUsuarios.php">Volver al listado</a>
</body>
</html>
