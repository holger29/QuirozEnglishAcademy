<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesa Datos</title>
    <link rel="stylesheet" href="styles3.css">
</head>
<body>
    <?php
        // obtener los datos formulario de registro
        $nombre=$_GET['nombre'];
        $apellidos=$_GET['apellidos'];
        $userName=$_GET['userName'];
        $password=$_GET['password']; 
        $telefono=$_GET['telefono'];  
        $direccion=$_GET['direccion'];
    ?> 
    <div>
        <h1>BIENVENID@</h1>
        <p>
            <?php
                echo "Señor(a) $nombre usted se ha registrado correctamente";
            ?>
        </p>
        <p>
        
        <p>
            <?php 
                echo "Nombre de usuario: ". $userName ."</br>";
                echo "Contraseña: ". $password ."</br>";
            ?>
        </p>
        <p><input type="button" value="Ir a login"></p>

    </div>
    <script>
        document.querySelector('input[type="button"]').addEventListener('click', function() {
            window.location.href = 'index.html';
        });
    </script>
</body>
</html>
