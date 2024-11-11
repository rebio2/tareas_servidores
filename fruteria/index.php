<?php
session_start();

// No hay cliente todavía
if (!isset($_SESSION['cliente'])) {
    require_once('bienvenida.php');
    exit(); // Termina el programa
}
// Nuevo cliente: valores iniciales en la sesión
if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = $_GET['cliente'];
    $_SESSION['pedidos'] = [];
    exit(); // Termina el script
}

// Procesa las acciones
if (isset($_POST["accion"])) {
    if ($accion == "Anotar") {
        $cantidad = (int)$_POST['cantidad'];
        $fruta    = $_POST['fruta'];

        if ($cantidad > 0) {
            // Si ya existe un pedido de fruta previo, acumula la cantidad
            if (isset($_SESSION['pedidos'][$fruta])) {
                $_SESSION['pedidos'][$fruta] += $cantidad;
            } else {
                $_SESSION['pedidos'][$fruta] = $cantidad;
            }
        }
    }

    // Anula la fruta
    if ($accion == "Anular") {
        unset($_SESSION['pedidos'][$_POST['fruta']]);
    }

    // Muestra el pedido y cierra la sesión
    if ($accion == "Terminar") {
        $compraRealizada = htmlTablaPedidos();
        require_once("despedida.php");
        session_destroy();
        exit;
    }
}

// Genera la tabla de pedidos y carga compra.php
$compraRealizada = htmlTablaPedidos();
require_once('compra.php');

// Función auxiliar para generar una tabla HTML con los pedidos
function htmlTablaPedidos(): string
{
    $msg = "";
    if (count($_SESSION['pedidos']) > 0) {
        $msg .= "Este es su pedido :";
        $msg .= "<table style='border: 1px solid black;'>";
        foreach ($_SESSION['pedidos'] as $fruta => $cantidad) {
            $msg .= "<tr><td><b>" . htmlspecialchars($fruta) . "</b></td><td>" . $cantidad . "</td></tr>";
        }
        $msg .= "</table>";
    } else {
        $msg = "No hay productos en su carrito.";
    }
    return $msg;
}
