<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>

<body>
    <?php
    $rand = random_int(1, 9);
    for ($i = 1; $i <= $rand; $i++) {
        $color=($i%2==0)?"blue":"red";
        $repeat=str_repeat($i,$i);
        echo "<p style='color:$color'>$repeat</p>";
    }

    echo  "El número aleatorio generado es: $rand";

    ?>
</body>

</html>