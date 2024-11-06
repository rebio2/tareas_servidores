<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
</head>
<body>
    <?php
    $cont=0;
    $contTotal=0;
    $start=microtime(true);
    while($cont !== 3){
        $num=random_int(1,10);
        if($num==6){
           $cont++; 
        } else{
            $cont=0;
        }
        $contTotal++;
    }
    $end=microtime(true);
    $time=($end - $start)*1000;
    echo "Han salido tres 6 seguidos tras generar " . "<b> $contTotal </b>".  " números en "."<b>$time</b>"." milisegundos";
    
    ?>
</body>
</html>