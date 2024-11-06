<?php
function generarArray() {
    $array = [];
    for ($i = 0; $i < 20; $i++) {
        $array[] = rand(1, 10);
    }
    return $array;
}

function maxminrpeat($array){
    $max = max($array);
    $min = min($array);
    $repeat = array_count_values($array);

    $masRepetido = array_search(max($repeat), $repeat);  

    return array($max, $min, $masRepetido);
}

$array = generarArray();
list($max, $min, $masRepetido) = maxminrpeat($array);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <table border="1">
        <tr>
            <?php foreach ($array as $num) { ?>
                <td><?= $num ?></td>
            <?php } ?>
        </tr>
    </table>
    <br><br>
    <table border="1">
        <tr>
            <td>Máximo</td>
            <td><?= $max ?></td>
        </tr>
        <tr>
            <td>Mínimo</td>
            <td><?= $min ?></td>
        </tr>
        <tr>
            <td>Más repetido</td>
            <td><?= $masRepetido ?></td>
        </tr>
    </table>
</body>
</html>
