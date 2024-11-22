<?php
$archivoAccesos = 'accesos.txt';

function obtenerAccesosGlobales($archivo) {
    if (file_exists($archivo)) {
        return (int)file_get_contents($archivo);
    } else {
        file_put_contents($archivo, 0);
        return 0;
    }
}

// Función para incrementar y guardar el nuevo valor de accesos globales
function incrementarAccesosGlobales($archivo) {
    $accesos = obtenerAccesosGlobales($archivo) + 1;
    file_put_contents($archivo, $accesos);
    return $accesos;
}

// Leer y actualizar el número total de accesos globales
$totalAccesos = incrementarAccesosGlobales($archivoAccesos);

// Manejo de la cookie para contar los accesos por navegador
$nombreCookie = 'accesosNavegador';
$duracionCookie = time() + (90 * 24 * 60 * 60); // Duración de 3 meses

// Verificar si la cookie existe y actualizar su valor
if (isset($_COOKIE[$nombreCookie])) {
    $accesosNavegador = (int)$_COOKIE[$nombreCookie] + 1;
} else {
    $accesosNavegador = 1; // Primer acceso desde este navegador
}

// Actualizar la cookie con el nuevo valor
setcookie($nombreCookie, $accesosNavegador, $duracionCookie);

echo "<h1>Contador de accesos</h1>";
echo "<p>Total de accesos a la página: $totalAccesos</p>";
echo "<p>Accesos desde este navegador: $accesosNavegador</p>";
?>
