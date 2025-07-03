<?php
// Configuración de la conexión
$host = "localhost";
$usuario = "root";
$contrasena = ""; // por el momento no tengo contraseña
$base_datos = "bd_quirozacademy";

// Crear conexión
$conn = new mysqli($host, $usuario, $contrasena, $base_datos);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Verificar si llegaron los datos por GET
if (
    isset($_GET['nombre']) &&
    isset($_GET['apellidos']) &&
    isset($_GET['userName']) &&
    isset($_GET['password']) &&
    isset($_GET['telefono']) &&
    isset($_GET['direccion'])
) {
    // Capturar y limpiar datos
    $nombre = $conn->real_escape_string($_GET['nombre']);
    $apellidos = $conn->real_escape_string($_GET['apellidos']);
    $email = $conn->real_escape_string($_GET['userName']);
    $password = $conn->real_escape_string($_GET['password']);//Por el momento la contraseña no esta emcriptada
    //$password = password_hash($_GET['password'], PASSWORD_DEFAULT); //con este codigo la contraseña se encripta
    $telefono = $conn->real_escape_string($_GET['telefono']);
    $direccion = $conn->real_escape_string($_GET['direccion']);

    // Consulta de inserción
    $sql = "INSERT INTO usuarios (nombre, apellidos, email, password, telefono, direccion)
            VALUES ('$nombre', '$apellidos', '$email', '$password', '$telefono', '$direccion')";

    if ($conn->query($sql) === TRUE) {
        echo "<h2>¡Registro exitoso!</h2>";
        echo "<p>Bienvenido a English Quiroz Academy, $nombre.</p>";
        echo "<a href='index.html'>Volver a inicio</a>";
    } else {
        echo "Error al registrar: " . $conn->error;
    }

} else {
    echo "Todos los campos son obligatorios.";
}

$conn->close();
?>
