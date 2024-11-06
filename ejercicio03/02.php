<?php
$medios=["El Pais"=>"https://elpais.com/", 
"El Mundo"=>"https://www.elmundo.es/", 
"Mundo Deportivo"=>"https://www.mundodeportivo.com/", 
"Marca"=>"https://www.marca.com/", 
"Diario Motor"=>"https://www.diariomotor.com/"];


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>
    <h3>Array de medios de comunicación</h3>
    <ul>
        <?php foreach ($medios as $url => $clave) { ?>
            <li><a href="<?= $clave ?>"><?= $url ?></a> </li>
        <?php } ?>
    </ul>
</body>
</html>