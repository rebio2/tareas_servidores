<?php
// Programa principal
$tabla = cargabicis();
if (!empty($_GET['coordx']) && !empty($_GET['coordy'])) {
    $biciRecomendada = bicimascercana($_GET['coordx'], $_GET['coordy'], $tabla);
}

function cargabicis()
{
    $bicis = [];
    if (($archivo = fopen("bicis.csv", "r")) !== FALSE) {
        while (($datos = fgetcsv($archivo, 1000, ",")) !== FALSE) {
            if (count($datos) == 5) {
                $bicis[] = [
                    'id' => $datos[0],
                    'coordx' => $datos[1],
                    'coordy' => $datos[2],
                    'bateria' => $datos[3],
                    'operativa' => $datos[4] == 1 ? true : false
                ];
            }
        }
        fclose($archivo);
    }
    return $bicis;
}

function mostrartablabicis($tabla)
{
    $html = "<table><tr><th>ID</th><th>Coordenada X</th><th>Coordenada Y</th><th>Batería</th><th>Estado</th></tr>";
    foreach ($tabla as $bici) {
        if ($bici['operativa']) {
            $estado = $bici['operativa'] ? 'Operativa' : 'No operativa';
            $html .= "<tr><td>{$bici['id']}</td><td>{$bici['coordx']}</td><td>{$bici['coordy']}</td><td>{$bici['bateria']}%</td><td>{$estado}</td></tr>";
        }
    }
    $html .= "</table>";
    return $html;
}

function bicimascercana($coordx, $coordy, $tabla)
{
    $distanciaMinima = PHP_INT_MAX;
    $biciCercana = null;

    foreach ($tabla as $bici) {
        if ($bici['operativa']) {
            $dx = $coordx - $bici['coordx'];
            $dy = $coordy - $bici['coordy'];
            $distancia = sqrt($dx * $dx + $dy * $dy);

            if ($distancia < $distanciaMinima) {
                $distanciaMinima = $distancia;
                // Devolver la bicicleta más cercana con la distancia y la batería
                $biciCercana = [
                    'id' => $bici['id'],
                    'bateria' => $bici['bateria'],
                    'distancia' => round($distancia, 2)
                ];
            }
        }
    }

    return $biciCercana;
}

$tabla = cargabicis();

if (!empty($_GET['coordx']) && !empty($_GET['coordy'])) {
    $biciRecomendada = bicimascercana($_GET['coordx'], $_GET['coordy'], $tabla);
}
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <title>MOSTRAR BICIS OPERATIVAS</title>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
        }
    </style>
</head>

<body>
    <h1>Listado de bicicletas operativas</h1>
    <?= mostrartablabicis($tabla); ?>
    <?php if (isset($biciRecomendada)) : ?>
        <h2>
            Bicicleta disponible más cercana es Identificador: <?= $biciRecomendada['id']; ?>
            Batería: <?= $biciRecomendada['bateria']; ?>%
        </h2>
        <button onclick="history.back()">Volver</button>
    <?php else : ?>
        <h2>Indicar su ubicación: </h2>
        <form>
            Coordenada X: <input type="number" name="coordx" required><br>
            Coordenada Y: <input type="number" name="coordy" required><br>
            <input type="submit" value="Consultar">
        </form>
    <?php endif ?>
</body>

</html>