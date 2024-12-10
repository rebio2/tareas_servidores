<?php
include_once 'funciones.php';
session_start();

// echo '<H1> NO HAGO NADA &#128542; </H1>';
// if (!isset ($_SESSION['tuser'])){
//     $_SESSION['tuser'] = cargarDatostxt();  
// }
if (!isset($_REQUEST['orden'])) {
    include_once('acceso.php');
} else {
    switch ($_REQUEST['orden']) {
        case 'Entrar':
            if (isset($_REQUEST['username']) && isset($_REQUEST['password']) &&
                accesoValido($_REQUEST['username'], $_REQUEST['password'])) {
                echo " Bienvenido <b>" . $_REQUEST['username'] . "</b><br>";
                include_once  'bienvenido.php';
            }else{
                echo "Usuario o contraseña incorrectos";
                include_once('acceso.php');
            }
    }
}
if (isset($_SESSION['tiempolimite'])) {
}
