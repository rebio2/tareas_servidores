<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio1</title>
</head>
<body>
    <?php
    $num1=random_int(1,10);
    $num2=random_int(1,10);
    
    echo "1º Número :  $num1<br>";
    echo "2º Número :  $num2<br>";
    echo "$num1+$num2 =  ".$num1+$num2."<br>";
    echo "$num1-$num2 =  ".$num1-$num2."<br>";
    echo "$num1*$num2 =  ".$num1*$num2."<br>";
    echo "$num1/$num2 =  ".$num1/$num2."<br>";
    echo "$num1%$num2 =  ".$num1%$num2."<br>";
    echo "$num1**$num2 =  ".$num1**$num2."<br>";
    
    ?>
</body>
</html>