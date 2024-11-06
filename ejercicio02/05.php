<?php
function generarHTMLTable($filas,$columnas,$borde,$contenido){
    echo "<table style=\" border:$borde px solid black; border-collapse:collapse; \">";
    for($i=0;$i<$filas;$i++){
        echo "<tr style='border:$borde' px solid black; border-collapse:collapse; \">";
        for($j=0;$j<$columnas;$j++){
            echo "<td style=\" border:$borde". "px solid black; border-collapse:collapse; \"> $contenido </td>";
        }
        echo "</tr>";
    }
    echo "</table>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio5</title>
</head>
<body>
    <?= generarHTMLTable(5,4,3,"Hola"); ?>
    <br><br>
    <?= generarHTMLTable(3,5,2,"Hola"); ?>
</body>
</html>