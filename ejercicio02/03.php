<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>
<body>
    <?php
    include_once("./funcionesref.php");
    $num1=random_int(1,10);
    $num2=random_int(1,10);
    echo "1º Número:  $num1<br>";
    echo "2º Número:  $num2<br>";

    $valor=0;
    suma($num1,$num2,$valor);
    echo "$num1 + $num2 = $valor<br>";

    resta($num1,$num2,$valor);
    echo "$num1 - $num2 = $valor<br>";

    multi($num1,$num2,$valor);
    echo "$num1 * $num2 = $valor<br>";

    div($num1,$num2,$valor);
    echo "$num1 / $num2 = $valor<br>";

    resto($num1,$num2,$valor);
    echo "$num1 % $num2 = $valor<br>";

    poten($num1,$num2,$valor);
    echo "$num1 ** $num2 = $valor<br>";
    ?>
</body>
</html>