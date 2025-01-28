<?php

function crudBorrar($id)
{
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
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);
    $orden = "Modificar";
    include_once "app/views/formulario.php";
}

function crudPostAlta()
{
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $email = $_POST['email'];
    $ip_address = $_POST['ip_address'];
    $telefono = $_POST['telefono'];

    $validacion = validarDatos($email, $ip_address, $telefono);
    if ($validacion !== true) {
        $_SESSION['msg'] = $validacion;
        return;
    }

    $cli = new Cliente();
    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $email;
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $ip_address;
    $cli->telefono      = $telefono;
    $db = AccesoDatos::getModelo();

    if ($db->addCliente($cli)) {
        $subidaFoto = manejarSubidaFoto($cli->id);
        if ($subidaFoto !== true) {
            $_SESSION['msg'] = $subidaFoto;
        } else {
            $_SESSION['msg'] = "El usuario " . $cli->first_name . " se ha dado de alta.";
        }
    } else {
        $_SESSION['msg'] = "Error al dar de alta al usuario " . $cli->first_name . ".";
    }
}

function crudPostModificar()
{
    limpiarArrayEntrada($_POST); //Evito la posible inyección de código
    $email = $_POST['email'];
    $ip_address = $_POST['ip_address'];
    $telefono = $_POST['telefono'];

    $validacion = validarDatos($email, $ip_address, $telefono);
    if ($validacion !== true) {
        $_SESSION['msg'] = $validacion;
        return;
    }

    $cli = new Cliente();
    $cli->id            = $_POST['id'];
    $cli->first_name    = $_POST['first_name'];
    $cli->last_name     = $_POST['last_name'];
    $cli->email         = $email;
    $cli->gender        = $_POST['gender'];
    $cli->ip_address    = $ip_address;
    $cli->telefono      = $telefono;
    $db = AccesoDatos::getModelo();

    if ($db->modCliente($cli)) {
        $subidaFoto = manejarSubidaFoto($cli->id);
        if ($subidaFoto !== true) {
            $_SESSION['msg'] = $subidaFoto;
        } else {
            $_SESSION['msg'] = "El usuario ha sido modificado.";
        }
    } else {
        $_SESSION['msg'] = "Error al modificar el usuario.";
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

function validarDatos($email, $ip_address, $telefono)
{
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return "Correo electrónico no válido.";
    }

    if (!filter_var($ip_address, FILTER_VALIDATE_IP)) {
        return "Dirección IP no válida.";
    }

    if (!preg_match('/^\d{3}-\d{3}-\d{4}$/', $telefono)) {
        return "Formato de teléfono no válido. Debe ser 999-999-9999.";
    }

    $db = AccesoDatos::getModelo();
    $clientes = $db->getClientes(0, $db->numClientes());
    foreach ($clientes as $cliente) {
        if ($cliente->email == $email) {
            return "El correo electrónico ya está registrado.";
        }
    }

    return true;
}

function foto($id) {
    $ruta = "app/uploads/0000000" . $id . ".jpg";
    if (file_exists($ruta)) {
        return  "<img src='$ruta' class='cliente-img' alt='Foto del usuario'>";
    } else {
        return  "<img src='https://robohash.org/$id' class='cliente-img' alt='Foto del usuario'>";
    }
}

function manejarSubidaFoto($id) {
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

function obtenerPaisPorIP($ip) {
    $jsonIP = file_get_contents('http://ip-api.com/json/' . $ip);
    $jsonObjeto = json_decode($jsonIP);

    if (isset($jsonObjeto->countryCode) && $jsonObjeto->countryCode !== null) {
        return $jsonObjeto->countryCode;
    } else {
        return 'no disponible';
    }
}

require_once __DIR__ . '/../../vendor/autoload.php';

function generarPDF($id) {
    $db = AccesoDatos::getModelo();
    $cli = $db->getCliente($id);

    if (!$cli) {
        return "Cliente no encontrado.";
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
    </table>';

    $mpdf->WriteHTML($html);
    $mpdf->Output('cliente_' . $cli->id . '.pdf', 'D');
}