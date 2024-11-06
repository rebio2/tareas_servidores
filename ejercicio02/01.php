<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>

<body>
    <?php
    $A = random_int(0, 10);
    $B = random_int(0, 10);
    echo "El número A es: $A<br>";
    echo "El número B es: $B<br>";
    function elMayor($A, $B, &$C){  
        if ($A > $B) {
            $C = $A;
        } elseif ($B > $A) {
            $C = $B;
        } else {
            $C = 0;
        }
    }

    elMayor($A, $B, $C);
    echo "El valor mayor es: $C"
    ?>
</body>

</html>