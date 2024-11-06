<?php
define('MAX_NUM', 50);
define('MAX_VALUE', 100);

$num = random_int(1, MAX_VALUE);
$min=$num;
$max=$num;
$sum = $num;

for($i=1;$i<MAX_NUM;$i++){
    $num = random_int(1, MAX_VALUE);
    if($num>$max)$max=$num;
    if($num<$min)$min=$num;
    $sum+=$num;
}
$avg=$sum/MAX_NUM;
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
</head>

<body>

    <table border="1">
        <tr>
            <th colspan="2">Generación de 50 valores aleatorios</th>
        </tr>
        <tr>
            <td>Mínimo</td>
            <td><?=$min?></td>
        </tr>
        <tr>
            <td>Máximo</td>
            <td><?=$max?></td>
        </tr>
        <tr>
            <td>Media</td>
            <td><?=$avg?></td>
        </tr>
    </table>
</body>

</html>