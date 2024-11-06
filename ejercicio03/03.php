<?php
include './02.php';
$enlaceRandom=$medios[array_rand($medios)];

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>
<body>
    <h3>El medio recomendado es: <a href="<?= $enlaceRandom ?>"><?= $enlaceRandom?></a></h3>
</body>
</html>