<?php
session_start();

$compraRealizada = "";

if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = $_GET['cliente'];
    $_SESSION['pedidos'] = [];
    
}

if (isset($_SESSION['cliente'])) {
    require_once 'bienvenida.php';
    exit();
}

if (isset($_POST['accion'])) {
    
    
}
if($_POST['accion'] == "Anular"){
    unset($_SESSION['pedidos'][$_POST['fruta']]);
}

function mostrarTablaPedidos(){

}
?>