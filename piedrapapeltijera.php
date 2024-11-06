<?php
define('PIEDRA1',  "&#x1F91C;");
define('PIEDRA2',  "&#x1F91B;");
define('TIJERAS',  "&#x1F596;");
define('PAPEL',    "&#x1F91A;");
function piedrapapeltijera()
{
    $rand = rand(0, 2);
    if ($rand == 0) return "piedra";
    elseif ($rand == 1) return "papel";
    else  return "tijeras";
}
$player1 = piedrapapeltijera();
$player2 = piedrapapeltijera();
if ($player1 == $player2) {
    $result = "¡Empate!";
} elseif (($player1 == "piedra" && $player2 == "tijeras") ||
    ($player1 == "papel" && $player2 == "piedra") ||
    ($player1 == "tijeras" && $player2 == "papel")
) {
    $result = "Ha ganado el jugador 1";
} else {
    $result = "Ha ganado el jugador 2";
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>¡Piedra, papel, tijera!</h1>
    <span>Actualice la página para mostrar otra partida</span>
    <table>
        <tr>
            <td><b>Jugador 1</b></td>
            <td><b>Jugador 2</b></td>
        </tr>
        <tr>
            <td><span style="font-size: 7rem;"><?= ($player1 == "piedra") ? PIEDRA1 : (($player1 == "papel") ? PAPEL : TIJERAS) ?></span></td>
            <td><span style="font-size: 7rem;"><?= ($player2 == "piedra") ? PIEDRA2 : (($player2 == "papel") ? PAPEL : TIJERAS) ?></span></td>
        </tr>
        <tr>
            <td><b><?= $result ?></b></td>
        </tr>

    </table>

</body>

</html>