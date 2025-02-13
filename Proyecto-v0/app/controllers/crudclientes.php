<?php

function crudBorrar($id)
{
    if ($_SESSION['user_role'] != 1) {
        $_SESSION['msg'] = "No tienes permisos para realizar esta acción.";
        header('Location: index.php');
        exit();
    }

    $db = AccesoDatos::getModelo();
    $resu = $db->borrarCliente($id);
    if ($resu) {
        $_SESSION['msg'] = " El usuario " . $id . " ha sido eliminado.";
    } else {
        $_SESSION['msg'] = " Error al eliminar el usuario " . $id . ".";
    }
}

function crudTerminar()
{
    AccesoDatos::closeModelo();
    session_destroy();
}

function crudAlta()
{
    $cli = new Cliente();
    $orden = "Nuevo";
    include_once "app/views/formulario.php";
}

function crudDetalles($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    include_once "app/views/detalles.php";
}


function crudModificar($id)
{
    if ($_SESSION['user_role'] != 1) {
        $_SESSION['msg'] = "No tienes permisos para realizar esta acción.";
        header('Location: index.php');
        exit();
    }

    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $orden = "Modificar";
    include_once "app/views/formulario.php";
}

function crudPostAlta()
{
    limpiarArrayEntrada($_POST); // Evito la posible inyección de código
    $email = $_POST['email'];
    $telefono = $_POST['telefono'];

    $cli = new Cliente();
    $cli->id            = $_POST['id']; // Asigna el primer ID disponible
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $email;
    $cli->gender        = $_POST['gender'];
    $cli->telefono      = $telefono;

    $db = AccesoDatos::getModelo();
    $todoOK = true;

    if (checkEmail($cli->email)) {
        $todoOK = false;
        echo "<p>El email ya existe</p>";
    }

    if (!checkTel($cli->telefono)) {
        $todoOK = false;
        echo "<p>El teléfono tiene un formato incorrecto</p>";
    }


    if ($db->addCliente($cli)) {
        $subidaFoto = manejarSubidaFoto($cli->id);
        if ($subidaFoto !== true) {
            $_SESSION['msg'] = $subidaFoto;
        } else {
            $_SESSION['msg'] = "El usuario ha sido añadido.";
        }
    } else {
        $_SESSION['msg'] = "Error al añadir el usuario.";
    }
}

function crudPostModificar()
{
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $email = $_POST['email'];
    $ip_address = $_POST['ip_address'];
    $telefono = $_POST['telefono'];

    $cli = new Cliente();
    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $email;
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $ip_address;
    $cli->telefono      = $telefono;
    $db = AccesoDatos::getModelo();

    $todoOK = true;

    if (checkEmail($cli->email, $cli->id)) {
        $todoOK = false;
        echo "<p>El email ya existe</p>";
    }

    if (!checkIP($cli->ip_address)) {
        $todoOK = false;
        echo "<p>La IP tiene un formato incorrecto</p>";
    }

    if (!checkTel($cli->telefono)) {
        $todoOK = false;
        echo "<p>El teléfono tiene un formato incorrecto</p>";
    }

    $db = AccesoDatos::getModelo();

    if ($todoOK) {
        $db->modCliente($cli);
        $_SESSION['msg'] = "El usuario ha sido modificado";
    } else {
        $orden = "Modificar";
        include_once "app/views/formulario.php";
    }

    if ($db->modCliente($cli)) {
        $subidaFoto = manejarSubidaFoto($cli->id);
        if ($subidaFoto !== true) {
            $_SESSION['msg'] = $subidaFoto;
        } else {
            $_SESSION['msg'] = "El usuario ha sido modificado.";
        }
    }
}

function crudDetallesSiguiente($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteSiguiente($id);
    include_once "app/views/detalles.php";
}

function crudDetallesAnterior($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteAnterior($id);
    include_once "app/views/detalles.php";
}

function crudModificarSiguiente($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteSiguiente($id);
    $orden = "Modificar";
    include_once "app/views/formulario.php";
}

function crudModificarAnterior($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getClienteAnterior($id);
    $orden = "Modificar";
    include_once "app/views/formulario.php";
}

function checkEmail($email, $id_excluir = null)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->buscarEmail($email);

    if ($id_excluir && $cli && $cli->id == $id_excluir) {
        return false;
    } else {
        if ($cli) {
            return true;
        } else {
            return false;
        }
    }
}

function checkIP($ip)
{
    $formato = true;
    if (!filter_var($ip, FILTER_VALIDATE_IP)) {
        $formato = false;
    }

    return $formato;
}

function checkTel($tel)
{
    $formato = true;
    $patron = "/^\d{3}-\d{3}-\d{4}$/";
    if (!preg_match($patron, $tel)) {
        $formato = false;
    }

    return $formato;
}

function foto($id)
{
    $ruta = "app/uploads/0000000" . $id . ".jpg";
    if (file_exists($ruta)) {
        return  "<img src='$ruta' class='cliente-img' alt='Foto del usuario'>";
    } else {
        return  "<img src='https://robohash.org/$id' class='cliente-img' alt='Foto del usuario'>";
    }
}

function manejarSubidaFoto($id)
{
    if (isset($_FILES['foto']) && $_FILES['foto']['error'] == UPLOAD_ERR_OK) {
        $foto = $_FILES['foto'];
        $ext = pathinfo($foto['name'], PATHINFO_EXTENSION);
        $allowed = ['jpg', 'png'];

        if (!in_array(strtolower($ext), $allowed)) {
            echo "El archivo debe ser una imagen JPG o PNG.";
        }

        if ($foto['size'] > 500 * 1024) {
            echo "El archivo debe ser menor a 500 KB.";
        }

        $ruta = "app/uploads/0000000" . $id . ".jpg";
        if (!move_uploaded_file($foto['tmp_name'], $ruta)) {
            return "Error al subir la imagen.";
        }
    }
    return true;
}

function obtenerPaisPorIP($ip)
{
    $jsonIP = file_get_contents('http://ip-api.com/json/' . $ip);
    $jsonObjeto = json_decode($jsonIP);

    if (isset($jsonObjeto->countryCode) && $jsonObjeto->countryCode !== null) {
        return $jsonObjeto->countryCode;
    } else {
        return 'no disponible';
    }
}

require_once __DIR__ . '/../../vendor/autoload.php';

function generarPDF($id)
{
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);

    if (!$cli) {
        return "Cliente no encontrado.";
    }

    // Obtener la foto
    $fotoRuta = "app/uploads/0000000" . $id . ".jpg";
    if (!file_exists($fotoRuta)) {
        $fotoRuta = "https://robohash.org/$id"; // Foto por defecto
    }

    // Obtener la bandera del país
    $codigoPais = obtenerPaisPorIP($cli->ip_address);
    if ($codigoPais !== 'no disponible') {
        $banderaURL = "https://flagcdn.com/w320/" . strtolower($codigoPais) . ".png";
    } else {
        $banderaURL = "https://via.placeholder.com/100x60?text=No+Flag";
    }

    // Obtener la geolocalización
    $localizacion = obtenerLocalizacionPorIP($cli->ip_address);
    if ($localizacion) {
        $lat = $localizacion['lat'];
        $lon = $localizacion['lon'];
        $mapaURL = "https://maps.googleapis.com/maps/api/staticmap?center=$lat,$lon&zoom=14&size=400x300&markers=color:red%7C$lat,$lon&key=YOUR_GOOGLE_MAPS_API_KEY";
    } else {
        $mapaURL = "https://via.placeholder.com/400x300?text=No+Map";
    }

    $tempDir = sys_get_temp_dir();
    if (!is_writable($tempDir)) {
        die('El directorio temporal del sistema no es escribible: ' . $tempDir);
    }

    $mpdfConfig = [
        'tempDir' => $tempDir,
    ];

    $mpdf = new \Mpdf\Mpdf($mpdfConfig);

    $html = '
    <h1>Detalles del Cliente</h1>
    <table>
        <tr>
            <td>ID:</td>
            <td>' . htmlspecialchars($cli->id) . '</td>
        </tr>
        <tr>
            <td>Nombre:</td>
            <td>' . htmlspecialchars($cli->first_name) . '</td>
        </tr>
        <tr>
            <td>Apellido:</td>
            <td>' . htmlspecialchars($cli->last_name) . '</td>
        </tr>
        <tr>
            <td>Correo Electrónico:</td>
            <td>' . htmlspecialchars($cli->email) . '</td>
        </tr>
        <tr>
            <td>Género:</td>
            <td>' . htmlspecialchars($cli->gender) . '</td>
        </tr>
        <tr>
            <td>Dirección IP:</td>
            <td>' . htmlspecialchars($cli->ip_address) . '</td>
        </tr>
        <tr>
            <td>Teléfono:</td>
            <td>' . htmlspecialchars($cli->telefono) . '</td>
        </tr>
        <tr>
            <td>Foto:</td>
            <td><img src="' . $fotoRuta . '" width="100"></td>
        </tr>
        <tr>
            <td>País:</td>
            <td><img src="' . $banderaURL . '" width="100"></td>
        </tr>
        <tr>
            <td>Mapa:</td>
            <td><img src="' . $mapaURL . '" width="400" height="300"></td>
        </tr>
    </table>';

    $mpdf->WriteHTML($html);
    $mpdf->Output('cliente_' . $cli->id . '.pdf', 'D');
}

function obtenerLocalizacionPorIP($ip)
{
    $jsonIP = file_get_contents('http://ip-api.com/json/' . $ip);
    $jsonObjeto = json_decode($jsonIP);

    if (isset($jsonObjeto->lat) && isset($jsonObjeto->lon)) {
        return [
            'lat' => $jsonObjeto->lat,
            'lon' => $jsonObjeto->lon,
        ];
    } else {
        return null;
    }
}
