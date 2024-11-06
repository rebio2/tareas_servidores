<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>
</head>

<body>
    <?php
    $num = random_int(1, 10);
    echo "<header style='background-color: blue'><h1 style='color: white'>TABLA DE MULTIPLICAR</h1></header>";
    echo "<table border=1px style='border-collapse: collapse'>";
    echo "<tr style='color: grey'>";
    echo "<th>Tabla del $num</th>";
    echo "<th></th>";
    echo "</tr>";

    echo "<tr style='color: grey'>";
    echo "<td> $num x 1 = </td>";
    echo "<td>".$num*1 . "</td>";
    echo "</tr>";

    echo "<tr style='color: grey'>";
    echo "<td> $num x 2 = </td>";
    echo "<td>".$num*2 . "</td>";
    echo "</tr>";

    echo "<tr style='color: grey'>";
    echo "<td> $num x 3 = </td>";
    echo "<td>".$num*3 . "</td>";
    echo "</tr>";

    echo "<tr style='color: grey'>";
    echo "<td> $num x 4 = </td>";
    echo "<td>".$num*4 . "</td>";
    echo "</tr>";

    echo "<tr style='color: grey'>";
    echo "<td> $num x 5 = </td>";
    echo "<td>".$num*5 . "</td>";
    echo "</tr>";

    echo "<tr style='color: grey'>";
    echo "<td> $num x 6 = </td>";
    echo "<td>".$num*6 . "</td>";
    echo "</tr>";

    echo "<tr style='color: grey'>";
    echo "<td> $num x 7 = </td>";
    echo "<td>".$num*7 . "</td>";
    echo "</tr>";

    echo "<tr style='color: grey'>";
    echo "<td> $num x 8 = </td>";
    echo "<td>".$num*8 . "</td>";
    echo "</tr>";

    echo "<tr style='color: grey'>";
    echo "<td> $num x 9 = </td>";
    echo "<td>".$num*9 . "</td>";
    echo "</tr>";

    echo "<tr style='color: grey'>";
    echo "<td> $num x 10 = </td>";
    echo "<td>".$num*10 . "</td>";
    echo "</tr>";
    ?>
</body>

</html>