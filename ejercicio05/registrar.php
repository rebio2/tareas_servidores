<?php
$mensaje = "";

function esContrasenaSegura($contrasena) {
    return strlen($contrasena) >= 8 &&
           preg_match('/[A-Z]/', $contrasena) &&  
           preg_match('/[a-z]/', $contrasena) &&  
           preg_match('/\d/', $contrasena) &&     
           preg_match('/\W/', $contrasena);       
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = $_POST['nombre'];
    $email = $_POST['email'];
    $contrasena = $_POST['contrasena'];
    $confirmarContrasena = $_POST['confirmarContrasena'];

    if (empty($nombre) || empty($email) || empty($contrasena) || empty($confirmarContrasena)) {
        $mensaje = "Error: Todos los campos son obligatorios.";
    } elseif (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        $mensaje = "Error: El correo electrónico no es válido.";
    } elseif ($contrasena !== $confirmarContrasena) {
        $mensaje = "Error: Las contraseñas no coinciden.";
    } elseif (!esContrasenaSegura($contrasena)) {
        $mensaje = "Error: La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un dígito y un carácter especial.";
    } else {
        $mensaje = "Usuario registrado correctamente.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
    <script>
        function validarFormulario() {
            const nombre = document.getElementById("nombre").value;
            const email = document.getElementById("email").value;
            const contrasena = document.getElementById("contrasena").value;
            const confirmarContrasena = document.getElementById("confirmarContrasena").value;

            if (contrasena !== confirmarContrasena) {
                alert("Las contraseñas no coinciden.");
                return false;
            }

            const contrasenaSegura = /^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*\W).{8,}$/;
            if (!contrasenaSegura.test(contrasena)) {
                alert("La contraseña debe tener al menos 8 caracteres, una mayúscula, una minúscula, un dígito y un carácter especial.");
                return false;
            }

            return true;
        }
    </script>
</head>
<body>
    <h1>Registro de Usuario</h1>
    <form method="post" action="registrar.php" onsubmit="return validarFormulario()">
        <label for="nombre">Nombre:</label><br>
        <input type="text" name="nombre" id="nombre" required><br><br>

        <label for="email">Correo Electrónico:</label><br>
        <input type="email" name="email" id="email" required><br><br>

        <label for="contrasena">Contraseña:</label><br>
        <input type="password" name="contrasena" id="contrasena" required><br><br>

        <label for="confirmarContrasena">Confirmar Contraseña:</label><br>
        <input type="password" name="confirmarContrasena" id="confirmarContrasena" required><br><br>

        <input type="submit" value="Registrar">
    </form>

    <?php
    if ($mensaje) {
        echo "<p>$mensaje</p>";
    }
    ?>
</body>
</html>
