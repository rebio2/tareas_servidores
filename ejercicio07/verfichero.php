<?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['archivo'])) {
    // Obtener información del archivo subido
    $archivo = $_FILES['archivo'];
    
    // Verificar si hubo algún error en la subida
    if ($archivo['error'] == UPLOAD_ERR_OK) {
        $nombreArchivo = $archivo['name'];
        $rutaTemporal = $archivo['tmp_name'];
        
        // Verificar la extensión del archivo
        $extensionesPermitidas = ['txt', 'html', 'php'];
        $extensionArchivo = pathinfo($nombreArchivo, PATHINFO_EXTENSION);

        if (in_array($extensionArchivo, $extensionesPermitidas)) {
            // Leer el contenido del archivo
            $contenido = file_get_contents($rutaTemporal);

            // Contar el número de caracteres y líneas
            $numCaracteres = strlen($contenido);
            $numLineas = substr_count($contenido, "\n") + 1;

            echo "<h1>Contenido del archivo: $nombreArchivo</h1>";
            echo "<pre>" . htmlspecialchars($contenido) . "</pre>";
            echo "<p>Número de caracteres: $numCaracteres</p>";
            echo "<p>Número de líneas: $numLineas</p>";
        } else {
            echo "<p>El tipo de archivo no está permitido. Solo se permiten archivos .txt, .html, y .php.</p>";
        }
    } else {
        echo "<p>Hubo un error al subir el archivo.</p>";
    }
}
?>

<form method="POST" action="verfichero.php" enctype="multipart/form-data">
    <label for="archivo">Selecciona un archivo de texto (txt, html, php):</label>
    <input type="file" name="archivo" id="archivo" accept=".txt,.html,.php" required>
    <button type="submit">Mostrar contenido</button>
</form>
