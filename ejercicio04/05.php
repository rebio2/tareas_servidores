<?php

function limpiar_dato($dato)
{
    return htmlspecialchars(trim($dato), ENT_QUOTES, 'UTF-8');
}

$nombre = limpiar_dato($_POST['nombre'] ?? 'Sin nombre');
$apellidos = limpiar_dato($_POST['apellidos'] ?? 'Sin apellidos');
$edad = limpiar_dato($_POST['edad'] ?? 'Sin edad');
$sexo = limpiar_dato($_POST['sexo'] ?? 'Sin sexo');

if ($sexo == 'Hombre') {
    $saludo = "Bienvenido";
} else {
    $saludo = "Bienvenida";
}

if ($edad == 'mayor') {
    if ($sexo == 'Hombre') {
        $trato = "D.";
    } else {
        $trato = "Dña.";
    }
} else {
    $trato = "";
}

$hobbies = [];
if (isset($_POST['hobbies'])) {
    if (in_array('lectura', $_POST['hobbies'])) {
        $hobbies[] = 'Lectura';
    }
    if (in_array('tele', $_POST['hobbies'])) {
        $hobbies[] = 'Ver la tele';
    }
    if (in_array('deporte', $_POST['hobbies'])) {
        $hobbies[] = 'Hacer deporte';
    }
    if (in_array('marcha', $_POST['hobbies'])) {
        $hobbies[] = 'Salir de marcha';
    }
}

$hobbies_texto = empty($hobbies) ? "No tiene hobbies seleccionados." : implode(", ", $hobbies);


echo "<h1>$saludo $trato $nombre $apellidos</h1>";
echo "<p>Edad: " . ($edad == 'mayor' ? "Mayor de 55" : "Menor de 55") . "</p>";
echo "<p>$hobbies_texto</p>";
