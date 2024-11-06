<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
</head>

<body>
    <?php
    $num1 = random_int(1, 10);
    $num2 = random_int(1, 10);

    echo "1º Número :  $num1<br>";
    echo "2º Número :  $num2<br>";

    echo "<table border=1px>";
    echo "<tr>";
    echo "<th style='color: blue'>Operación</th>";
    echo "<th style='color: blue'>Resultado</th>";
    echo "</tr>";
    
    echo "<tr>";
    echo "<td> $num1+$num2</td>";
    echo "<td>".$num1 + $num2 . "</td>";
    echo "</tr>";
    
    echo "<tr>";
    echo "<td> $num1-$num2</td>";
    echo "<td>".$num1 - $num2 . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td> $num1*$num2</td>";
    echo "<td>".$num1 * $num2 . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td> $num1/$num2</td>";
    echo "<td>".$num1 / $num2 . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td> $num1%$num2</td>";
    echo "<td>".$num1 % $num2 . "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td> $num1**$num2</td>";
    echo "<td>".$num1 ** $num2 . "</td>";
    echo "</tr>";
    echo "</table>";



    ?>
</body>

</html>