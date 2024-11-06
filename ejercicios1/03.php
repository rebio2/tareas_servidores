<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>

<body>
    <code>
        <?php
        $num = random_int(1, 9);
        echo "Número generado: $num<br>";
        for ($i = 1; $i <= $num; $i++) {
            for ($j=1; $j <= $num-$i; $j++) {
                echo "&nbsp";
            }
            for ($a = 1; $a <= (2*$i-1); $a++) {
                echo "*";
            }
            echo "<br>";
        }
        ?>
    </code>
</body>

</html>