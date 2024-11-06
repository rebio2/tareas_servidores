<?php
require_once './infopaises.php';
$maxPoblacion=0;
$maxPais=null;

foreach($paises as $pais => $info){
    $poblacion = $info['Poblacion'];
    if($poblacion>$maxPoblacion){
        $maxPoblacion=$poblacion;
        $maxPais=$pais;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>
</head>
<body>
    <h3>El país con más población es:  <?=  $maxPais; ?></h3>
    <h3>Ciudades</h3>
    <ul>
        <?php foreach ($ciudades[$maxPais] as $ciudad) { ?>
            <li><?= $ciudad ?></li>
        <?php } ?>
    </ul>

</body>
</html>