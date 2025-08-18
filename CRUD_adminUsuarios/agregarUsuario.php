<?php
// Conexión
$conn = new mysqli("localhost", "root", "", "bd_quirozacademy");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $conn->real_escape_string($_POST['nombre']);
    $apellidos = $conn->real_escape_string($_POST['apellidos']);
    $email = $conn->real_escape_string($_POST['email']);
    $password = $conn->real_escape_string($_POST['password']); // guardado plano
    $telefono = $conn->real_escape_string($_POST['telefono']);
    $direccion = $conn->real_escape_string($_POST['direccion']);

    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, telefono, direccion)
            VALUES ('$nombre', '$apellidos', '$email', '$password', '$telefono', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        header("Location: adminUsuarios.php");
        exit();
    } else {
        echo "Error: " . $conn->error;
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Agregar Usuario</title>
    <link rel="stylesheet" href="../estilos_css/formulariosCRUD.css">
</head>
<body>
    
    <form method="POST" action="">
        <h2>Agregar nuevo usuario</h2>
        <input type="text" name="nombre" placeholder="Nombre" required><br>
        <input type="text" name="apellidos" placeholder="Apellidos" required><br>
        <input type="email" name="email" placeholder="Email" required><br>
        <input type="text" name="password" placeholder="Contraseña" required><br>
        <input type="tel" name="telefono" placeholder="Teléfono"><br>
        <input type="text" name="direccion" placeholder="Dirección"><br>
        <button type="submit">Guardar</button>
         <a href="adminUsuarios.php">Volver al listado</a>
    </form>
    <br>
   
</body>
</html>
