<?php
require_once './infopaises.php';
$arrayUSORT = [];
foreach ($paises as $pais => $info) {
    $arrayUSORT[] = [
        'nombre' => $pais,
        'poblacion' => $info['Poblacion']
    ];
}

usort($arrayUSORT, function($a, $b) {
    return $a['poblacion'] <=> $b['poblacion'];
});

$maxPais = $arrayUSORT[count($arrayUSORT) - 1];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6v2</title>
</head>
<body>
<h3>El país con más población es: <?= $maxPais['nombre'] ?> con <?= $maxPais['poblacion'] ?> habitantes</h3>
</body>
</html>