<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio7</title>
    <meta http-equiv="refresh" content="5">
</head>

<body>
    <?php
    $num1 = random_int(100, 500);
    $num2 = random_int(100, 500);
    $num3 = random_int(100, 500);

    echo "<table style='background-color: red'>";
    echo "<tr>";
    echo "<td style='width: {$num1}px'>Rojo($num1)</td>";
    echo "</tr>";
    echo "</table>";

    echo "<table style='background-color: green'>";
    echo "<tr>";
    echo "<td style='width: {$num2}px'>Verde($num2)</td>";
    echo "</tr>";
    echo "</table>";

    echo "<table style='background-color: blue'>";
    echo "<tr>";
    echo "<td style='width: {$num3}px'>Azul($num3)</td>";
    echo "</tr>";
    echo "</table>";
    ?>
</body>

</html>