<?php
include 'captura.html';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nombre = ($_POST['nombre']);
    $alias = ($_POST['alias']);
    $edad = ($_POST['edad']);
    $magia = $_POST['radio'] ?? 'No hay respuesta';
    if ($magia == 'si') {
        $respuesta = "Sí";
    } else {
        $respuesta = "No";
    }

    $armas = [];
    if (isset($_POST['arma'])) {
        $armas = $_POST['arma'];
    }

    //Salida de los inputs del formulario
    echo "<div style='background-color: yellow; border-radius: 10px; width: 30em; padding: 20px;'>";
    echo "<h2 style='text-align: center'>Datos del jugador:</h2>";
    echo "<div style='display: flex; justify-content: space-between;'>";
    echo "<div style='flex: 1; text-align: left;'>";
    echo "Nombre: " . htmlspecialchars($nombre) . "<br>";
    echo "Alias: " . htmlspecialchars($alias) . "<br>";
    echo "Edad: " . $edad . "<br>";
    echo "Armas seleccionadas: " . implode(", ", $armas) . "<br>";
    echo "¿Practica artes mágicas? &nbsp;" . htmlspecialchars($magia);
    echo "</div>";

    echo "<div style='flex: 0 0 auto; text-align: right;'>";
    if (isset($_FILES['archivo']) && $_FILES['archivo']['error'] === UPLOAD_ERR_OK) {
        $nombreArchivo = $_FILES['archivo']['name'];
        $tipoArchivo = $_FILES['archivo']['type'];
        $tamanoArchivo = $_FILES['archivo']['size'];
        $rutaTemporal = $_FILES['archivo']['tmp_name'];

        // Comprobar que la imagen png y es menor de 10240 bytes (10KB)
        if ($tipoArchivo === 'image/png' && $tamanoArchivo <= 10240) {
            $directorioDestino = 'uploads/' . $nombreArchivo;
            if (move_uploaded_file($rutaTemporal, $directorioDestino)) {
                echo "<p>Imagen subida correctamente:</p>";
                echo "<img src='$directorioDestino' alt='Imagen del jugador' style='width: 150px; height: auto;'><br>";
            } else {
                echo "<p>Error al mover el archivo.</p>";
                echo "<img src='calavera.png' alt='Error' style='width: 150px; height: auto;'><br>";
            }
        } else {
            echo "<p>El archivo no es válido (debe ser PNG y menor a 10KB).</p>";
            echo "<img src='calavera.png' alt='Error' style='width: 150px; height: auto;'><br>";
        }
    } else {
        // Si no se subió ninguna imagen o hubo error
        echo "<p>No se ha subido ninguna imagen.</p>";
        echo "<img src='calavera.png' alt='Error' style='width: 150px; height: auto;'><br>";
    }
    echo "</div>";
    echo "</div>";
    echo "</div>";
}
?>