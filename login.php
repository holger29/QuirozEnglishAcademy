<?php
session_start();

// Conexión
$host = "localhost";
$usuario = "root";
$contrasena = "";
$base_datos = "bd_quirozacademy";

$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_POST['email']) && isset($_POST['password'])) {
    $email = $conn->real_escape_string($_POST['email']);
    $password = $_POST['password'];

    // Buscar usuario en la BD
    $sql = "SELECT * FROM usuarios WHERE email = '$email' LIMIT 1";
    $resultado = $conn->query($sql);

    if ($resultado->num_rows > 0) {
        $usuario = $resultado->fetch_assoc();

        if ($usuario['password'] == $password) {
            // Login correcto
            $_SESSION['nombre_completo'] = $usuario['nombre'] . ' ' . $usuario['apellidos'];
            $_SESSION['email'] = $usuario['email'];
            header("Location: panel.php");
            exit();
        } else {
            echo "<script>alert('Contraseña incorrecta.'); window.location.href='index.html';</script>";
        }
    } else {
        echo "<script>alert('Usuario no registrado. Verifique sus credenciales o regístrese.'); window.location.href='index.html';</script>";
    }
} else {
    echo "<script>alert('Debe llenar ambos campos.'); window.location.href='index.html';</script>";
}

$conn->close();
?>

