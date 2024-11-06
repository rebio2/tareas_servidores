<?php
function obtenerLetraNIF($dni) {
    $letras = ['T', 'R', 'W', 'A', 'G', 'M', 'Y', 'F', 'P', 'D', 'X', 'B', 'N', 'J', 'Z', 'S', 'Q', 'V', 'H', 'L', 'C', 'K', 'E'];
    $resto = $dni % 23;
    return $letras[$resto];
}

$mensaje = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $dni = $_POST['dni'];

    // Validar en el servidor
    if (ctype_digit($dni) && strlen($dni) == 8) {
        $letra = obtenerLetraNIF($dni);
        $mensaje = "El NIF correspondiente al DNI $dni es: $dni-$letra";
    } else {
        $mensaje = "Por favor, introduce un número de DNI válido de 8 dígitos.";
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <h1>Calculadora de Letra NIF</h1>
    <form method="post" action="nif.php">
        <label for="dni">Introduce tu número de DNI (sin letra):</label><br>
        <input type="text" name="dni" id="dni" maxlength="8" required><br><br>
        <input type="submit" value="Calcular Letra NIF">
    </form>

    <?php
    if ($mensaje) {
        echo "<p>$mensaje</p>";
    }
    ?>
</body>
</html>
