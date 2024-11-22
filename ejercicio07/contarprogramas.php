<?php
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['directorio'])) {
    $directorio = $_POST['directorio'];
    $totalLineas = 0;
    
    // Verificar si el directorio existe y es válido
    if (is_dir($directorio)) {
        $archivosPHP = [];

        // Abrir el directorio y leer los archivos
        $dir = opendir($directorio);
        while (($archivo = readdir($dir)) != false) {
            $rutaArchivo = $directorio . DIRECTORY_SEPARATOR . $archivo;

            // Verificar que el archivo tenga extensión .php
            if (pathinfo($archivo, PATHINFO_EXTENSION) == 'php' && is_file($rutaArchivo)) {
                // Contar las líneas del archivo
                $numLineas = count(file($rutaArchivo));
                $totalLineas += $numLineas;

                // Almacenar la información del archivo en el array
                $archivosPHP[] = [
                    'nombre' => $archivo,
                    'lineas' => $numLineas
                ];
            }
        }
        closedir($dir);

        echo "<h2>Archivos PHP en el directorio: $directorio</h2>";
        echo "<table border='1' style='border-collapse: collapse; text-align: center;'>";
        echo "<tr><th>Nombre del archivo</th><th>Líneas de código</th></tr>";
        foreach ($archivosPHP as $archivo) {
            echo "<tr><td>{$archivo['nombre']}</td><td>{$archivo['lineas']}</td></tr>";
        }
        echo "</table>";
        echo "<p>Total de líneas en el directorio: $totalLineas</p>";
    } else {
        echo "<p>El directorio especificado no existe o no es válido.</p>";
    }
}
?>

<!-- Formulario para ingresar el nombre del directorio -->
<form method="POST" action="contarprogramas.php">
    <label for="directorio">Nombre del directorio:</label>
    <input type="text" name="directorio" id="directorio" required>
    <button type="submit">Contar líneas</button>
</form>
