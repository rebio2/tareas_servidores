<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Procesando formulario</title>
    <style>
        body {
            background-color: grey;
            color: black;
            width: 500px;
        }

        .container {
            background-color: blue;
            color: white;
            padding: 20px;
            text-align: center;
        }

        .content {
            background-color: white;
            color: black;
            padding: 20px;
        }

        p {
            color: grey;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1>Procesando formulario</h1>
    </div>

    <div class="content">
        <?php
        $nombre = $_GET['nombre'] ?? 'Falta el dato';
        $contraseña = $_GET['contraseña'] ?? 'Falta el dato';
        $semaforo = $_GET['radio'] ?? 'Falta el dato';
        $publicidad = isset($_GET['hola']) && $_GET['hola'] == 'publi' ? 'Sí publicidad' : 'No publicidad' ?? 'Falta el dato';

        $idiomas = [];
        if (isset($_GET['check'])) {
            if (in_array('ingles', $_GET['check'])) {
                $idiomas[] = 'Inglés';
            }
            if (in_array('frances', $_GET['check'])) {
                $idiomas[] = 'Francés';
            }
            if (in_array('aleman', $_GET['check'])) {
                $idiomas[] = 'Alemán';
            }
        }
        $idioma = empty($idiomas) ? 'Falta el dato' : implode(', ', $idiomas);

        $anoFinEstudios = $_GET['age'] ?? 'Falta el dato';

        $ciudades = $_GET['city'];
        $ciudadesLista = empty($ciudades) ? 'Falta el dato' : implode(', ', $ciudades);

        $comentarios = $_GET['coment'] ?? 'Falta el dato';

        echo "<p>Nombre: $nombre</p>";
        echo "<p>Contraseña: $contraseña</p>";
        echo "<p>Semáforo: $semaforo</p>";
        echo "<p>Publicidad: $publicidad</p>";
        echo "<p>Idiomas: $idioma</p>";
        echo "<p>Año de finalización de estudios: $anoFinEstudios</p>";
        echo "<p>Ciudades seleccionadas: $ciudadesLista</p>";
        echo "<p>Comentarios: $comentarios</p>";
        ?>
    </div>

</body>

</html>