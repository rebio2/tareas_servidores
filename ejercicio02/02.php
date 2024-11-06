<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio2</title>
</head>
<body>
    <?php
    $num1=random_int(1,10);
    $num2=random_int(1,10);
    echo "1º Número:  $num1<br>";
    echo "2º Número:  $num2<br>";

    require_once("./funcionesvar.php");

    $suma=suma($num1,$num2);
    echo "$num1 + $num2 = $suma<br>";

    $resta=resta($num1,$num2);
    echo "$num1  $num2 = $resta<br>";

    $multi=multi($num1,$num2);
    echo "$num1 * $num2 = $multi<br>";

    $div=div($num1,$num2);
    echo "$num1 / $num2 = $div<br>";

    $resto=resto($num1,$num2);
    echo "$num1 / $num2 = $resto<br>";

    $poten=poten($num1,$num2);
    echo "$num1 ** $num2 = $poten";
    ?>
</body>
</html>