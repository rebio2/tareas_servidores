<?php
function mostrarCalendario($mes, $anio) {
    // Dias y meses
    $diasSemana = ['Lun', 'Mar', 'Mié', 'Jue', 'Vie', 'Sáb', 'Dom'];
    $nombreMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
    
    // Primer día del mes y número de días en el mes
    $primerDiaMes = date('N', strtotime("$anio-$mes-01"));
    $diasEnMes = date('t', strtotime("$anio-$mes-01"));
    
    echo "<h2>Calendario de " . $nombreMeses[$mes - 1] . " $anio</h2>";
    echo "<table border='1' cellpadding='5' cellspacing='0'>";
    echo "<tr>";
    
    // Nombres de los días
    foreach ($diasSemana as $dia) {
        echo "<th>$dia</th>";
    }
    echo "</tr><tr>";

    // Espacios en blanco para los días previos al primer día del mes
    for ($i = 1; $i < $primerDiaMes; $i++) {
        echo "<td></td>";
    }

    // Imprimir días del mes
    for ($dia = 1; $dia <= $diasEnMes; $dia++) {
        echo "<td>$dia</td>";
        
        // Salto de línea después de cada domingo
        if (($dia + $primerDiaMes - 1) % 7 == 0) {
            echo "</tr><tr>";
        }
    }
    
    echo "</tr>";
    echo "</table>";
}

// Obtener el año actual
$anioActual = date("Y");
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ejercicio3</title>
</head>
<body>
    <h1>Selecciona un Mes y un Año</h1>
    <form method="post" action="vermes.php">
        <label for="mes">Mes:</label>
        <select name="mes" id="mes" required>
            <?php
            // Generar opciones de los meses
            $nombreMeses = ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'];
            foreach ($nombreMeses as $index => $nombreMes) {
                $mesNumero = $index + 1;
                echo "<option value='$mesNumero'>$nombreMes</option>";
            }
            ?>
        </select>

        <label for="anio">Año:</label>
        <select name="anio" id="anio" required>
            <?php
            // Generar opciones de los años desde 1980 hasta el año actual
            for ($anio = 1980; $anio <= $anioActual; $anio++) {
                echo "<option value='$anio'>$anio</option>";
            }
            ?>
        </select>
        
        <br><br>
        <input type="submit" value="Mostrar Calendario">
    </form>

    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $mes = $_POST['mes'];
        $anio = $_POST['anio'];
        
        // Mostrar el calendario para el mes y año seleccionados
        mostrarCalendario($mes, $anio);
    }
    ?>
</body>
</html>
