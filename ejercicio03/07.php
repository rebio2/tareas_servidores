<?php
require_once './infopaises.php';
$paisRandom = array_rand($paises, 2);
$paisUno=$paisRandom[0];
$paisDos=$paisRandom[1];

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio7</title>
</head>

<body>
    <p>Ver en Maps 1</p>
    <a href="https://www.google.com/maps/place/<?= $paisUno ?>"> Maps</a> <br><br>
    <p>ver en maps 2</p>
    <a href="https://www.google.com/maps/place/<?= $paisDos ?>"> Maps</a>
</body>

</html>