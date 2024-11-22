<?php
function accionBorrar($id)
{
    $msg = '';
    if (isset($_SESSION['tuser'][$id])) {
        $nombre = $_SESSION['tuser'][$id][0];
        // Se ellimina de la tabla
        unset($_SESSION['tuser'][$id]);
        $msg = "Se ha eliminado a $nombre";
    } else {
        $msg = "No se ha encontrado al usuario con id $id";
    }
    $_SESSION['msg'] = $msg;
}


// Termina: Cierra sesión y vuelva los datos
function accionTerminar()
{
    volcarDatos($_SESSION['tuser']);
    session_destroy();
    $_SESSION['msg'] = "  Todos datos se han guardado ";
}


// Muestra un formularios con los datos de un usuario de la posición $id de la tabla
function accionDetalles($id)
{
    $login = $id;
    $usuario = $_SESSION['tuser'][$id];
    $clave  =   $usuario[0];
    $nombre   = $usuario[1];
    $comentario = $usuario[2];
    $orden = "Detalles";
    include_once "layout/formulario.php";
    exit();
}

// Muestra  el formularios con los datos permitiendo la modificación
function accionModificar($id)
{
    $login = $id;
    $usuario = $_SESSION['tuser'][$id];
    $clave  = $usuario[0];
    $nombre  = $usuario[1];
    $comentario = $usuario[2];
    $orden = "Modificar";
    include_once "layout/formulario.php";
    exit();
}

// Modifica el contenido de usuario
function accionPostModificar()
{
    limpiarArrayEntrada($_POST);

    $id = $_POST['login'];
    $msgerr = "";
    if (empty($_POST['nombre']) || empty($_POST['login']) || empty($_POST['clave']) || empty($_POST['comentario'])) {
        $msgerr = "Todos los campos tienen que estra rellenados";
        accionRepetirAlta($msgerr);
        return;
    }

    $nuevovalor = [$_POST['clave'], $_POST['nombre'], $_POST['comentario']];
    if (isset($_SESSION['tuser'][$id])) {
        $_SESSION['tuser'][$id] = $nuevovalor;
        $msg = "El usuario ha sido modificado";
    } else {
        $msg = "El usuario no existe";
    }
    $_SESSION['msg'] = $msg;
}



// Muestra  el formulario con los datos vacios para realizar una alta
function accionAlta()
{
    $nombre  = "";
    $login   = "";
    $clave   = "";
    $comentario = "";
    $orden = "Nuevo";
    include_once "layout/formulario.php";
    exit();
}

function accionRepetirAlta()
{
    $nombre = $_POST['nombre'];
    $login = $_POST['login'];
    $clave = $_POST['clave'];
    $comentario = $_POST['comentario'];
    $orden = "Nuevo";
    // $msg=$msgformulario;
    include_once "layout/formulario.php";
    exit();
}

// Proceso los datos del formularios guardándolo en la sesión
// Debe evitar que se puedan introducir dos usuarios con el mismo login y
// que exista algún campo vacio.
function accionPostAlta()
{
    limpiarArrayEntrada($_POST);
    $msgerr = "";
    if (empty($_POST['nombre']) || empty($_POST['login']) || empty($_POST['clave']) || empty($_POST['comentario'])) {
        $msgerr = "Todos los campos tienen que estra rellenados";
        accionRepetirAlta($msgerr);
        return;
    }
    $id = $_POST['login'];
    if (isset($_SESSION['tuser'][$id])) {
        $msgerr = "El login incorrecto";
        accionRepetirAlta($msgerr);
        return;
    }

    $id = $_POST['login'];
    $nuevo=[$_POST['clave'], $_POST['nombre'], $_POST['comentario']];
    $_SESSION['tuser'][$id]=$nuevo;
    $msg="Se ha añadido correctamente el usuario";
    $_SESSION['msg']=$msg;
}
