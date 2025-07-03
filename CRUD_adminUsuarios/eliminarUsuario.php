<?php
$conn = new mysqli("localhost", "root", "", "bd_quirozacademy");
if ($conn->connect_error) {
    die("Error de conexión: " . $conn->connect_error);
}

if (isset($_GET['id'])) {
    $id = intval($_GET['id']);
    $sql = "DELETE FROM usuarios WHERE id = $id";

    if ($conn->query($sql) === TRUE) {
        header("Location: adminUsuarios.php");
        exit();
    } else {
        echo "Error al eliminar usuario: " . $conn->error;
    }
} else {
    echo "ID de usuario no especificado.";
}
?>
