<?php
$deportes=["Karate"=>"./img/karate.png",
"Tenis"=>"./img/tenis.png",
"Futbol"=>"./img/futbol.jpg",
"Formula 1"=>"./img/formula_uno.jpg",
"Moto GP"=>"./img/moto_gp.jpg"];
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio4</title>
    <style>
        img{
            width: 100px;
        }
        table{
            border-collapse: collapse;
        }
    </style>
</head>
<body>
    <table border=1>
        <tr>
            <th>Deporte</th>
            <th>Logo</th>
        </tr>
        <?php foreach ($deportes as $deporte=>$img) { ?>
        <tr>
            <td><?= $deporte ?></td>
            <td><img src="<?= $img ?>" alt="<?= $deporte ?>"></td>
        </tr>
        <?php } ?>
    </table>
</body>
</html>