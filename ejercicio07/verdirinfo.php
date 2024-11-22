<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['directorio'])) {
    $directorio = $_POST['directorio'];

    // Verificar si el directorio existe y es válido
    if (is_dir($directorio)) {
        $archivosInfo = [];
        
        // Abrir el directorio y leer los archivos
        $dir = opendir($directorio);
        while (($archivo = readdir($dir)) !== false) {
            $rutaArchivo = $directorio . DIRECTORY_SEPARATOR . $archivo;

            // Saltar '.' y '..' y verificar que sea un archivo
            if ($archivo !== '.' && $archivo !== '..' && is_file($rutaArchivo)) {
                $tamanio = filesize($rutaArchivo); // Tamaño en bytes
                $tipo = mime_content_type($rutaArchivo); // Tipo MIME

                // Almacenar la información en un array
                $archivosInfo[] = [
                    'nombre' => $archivo,
                    'tipo' => $tipo,
                    'tamanio' => $tamanio
                ];
            }
        }
        closedir($dir);

        // Ordenar los archivos por tamaño ascendente
        usort($archivosInfo, function($a, $b) {
            return $a['tamanio'] <=> $b['tamanio'];
        });

        echo "<h2>Contenido del directorio: $directorio</h2>";
        echo "<table border='1' style='border-collapse: collapse;'>";
        echo "<tr><th>Nombre</th><th>Tipo MIME</th><th>Tamaño (bytes)</th></tr>";
        foreach ($archivosInfo as $info) {
            echo "<tr><td>{$info['nombre']}</td><td>{$info['tipo']}</td><td>{$info['tamanio']}</td></tr>";
        }
        echo "</table>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
        echo "<br>";
    } else {
        echo "<p>El directorio especificado no existe o no es válido.</p>";
    }
}
?>

<form method="POST" action="verdirinfo.php">
    <label for="directorio">Nombre del directorio:</label>
    <input type="text" name="directorio" id="directorio" required>
    <button type="submit">Mostrar contenido</button>
</form>
