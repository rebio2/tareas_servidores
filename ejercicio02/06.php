<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio6</title>
</head>
<body>
    <code>
        <?php
        $muralla=random_int(1,10);
        echo "$muralla <br/>";
        for($i=0;$i<3;$i++){
            if($i==2){
                for($j=0;$j<$muralla;$j++){
                    echo "*****";
                }
                echo "****";
            } else{
                for($h=0;$h<$muralla;$h++){
                    echo "****&nbsp";
                }
            }
            echo  "<br/>";

        }
        ?>
    </code>
</body>
</html>