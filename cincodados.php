<?php
function tirarDados(){
    $dados = [];
    for ($i = 0; $i < 6; $i++) {
        $dados[] = rand(1, 6);
    }
    return $dados;
}

function calcularPuntos($dados){
    sort($dados); // Ordena de menor a mayor
    array_shift($dados); // Elimina el más bajo
    array_pop($dados); // Elimina el más alto
    return array_sum($dados); // Suma los dados
}

function mostrarDados($dados){
    $caracteres_dados = [
        1 => "&#9856;",
        2 => "&#9857;",
        3 => "&#9858;",
        4 => "&#9859;",
        5 => "&#9860;",
        6 => "&#9861;" 
    ];
    foreach ($dados as $dado) {
        echo $caracteres_dados[$dado] . " ";
    }
}

$dadosRojo=tirarDados();
$dadosAzul=tirarDados();

$puntuacionRojo=calcularPuntos($dadosRojo);
$puntuacionAzul=calcularPuntos($dadosAzul);

if ($puntuacionRojo > $puntuacionAzul) {
    $ganador = "Rojo";
} elseif ($puntuacionAzul > $puntuacionRojo) {
    $ganador = "Azul";
} else {
    $ganador = "Empate";
}
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cinco dados</title>
    <style>
        #red{
            background-color: red;
        }
        #blue{
            background-color: blue;
        }
    </style>
</head>

<body>
    <h1>Cinco dados</h1>
    <p>Actualice la página para mostrar una nueva partida</p>

    <table>
        <tr>
            <th>Jugador 1</th>
            <td id="red"><?php mostrarDados($dadosRojo); ?></td>
            <td><?= $puntuacionRojo ?></td>
        </tr>
        <tr>
            <th>Jugador 2</th>
            <td id="blue"><?php mostrarDados($dadosAzul); ?></td>
            <td><?= $puntuacionAzul ?></td>
        </tr>

    </table>

    <span><b>Resultado </b><?= $ganador === "Empate" ? "Es un empate" : "El ganador es el jugador $ganador" ?></span>

</body>

</html>
