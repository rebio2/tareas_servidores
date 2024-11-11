<?php
session_start();
var_dump($_POST);
$compraRealizada = "";



if (isset($_GET['cliente'])) {
    $_SESSION['cliente'] = $_GET['cliente'];
    $_SESSION['pedidos'] = [];
}

if (!isset($_SESSION['cliente'])) {
    require_once('bienvenida.php');
    exit();
}

// Procesar la acción del formulario si se envía un POST
if (isset($_POST['accion'])) {
    $accion = $_POST['accion'];
    
    // Anotar fruta en el carrito
    if ($accion == "Anotar") {
        $fruta = htmlspecialchars($_POST['fruta']);
        $cantidad = $_POST['cantidad'];

        // Validar la cantidad de fruta para agregar al carrito
        if ($cantidad > 0) {
            if (isset($_SESSION['pedidos'][$fruta])) {
                $_SESSION['pedidos'][$fruta] += $cantidad;
            } else {
                $_SESSION['pedidos'][$fruta] = $cantidad;
            }
        }
    }

    // Anular una fruta del carrito
    if ($accion == "Anular") {
        unset($_SESSION['pedidos'][$_POST["fruta"]]);
    }

    // Finalizar pedido y mostrar resumen
    if ($accion == "Terminar") {
        $compraRealizada = mostrarTablaPedidos();
        require_once("despedida.php");
        session_destroy();
        exit();
    }
}

// Mostrar carrito actual en la página de compra
$compraRealizada = mostrarTablaPedidos();
require_once("compra.php");

// Función para mostrar el contenido del carrito
function mostrarTablaPedidos()
{
    $mostrar = "";
    if (count($_SESSION['pedidos']) > 0) {
        $mostrar .= "<h2>Resumen de su pedido:</h2><table border='1'><tr><th>Fruta</th><th>Cantidad</th></tr>";
        foreach ($_SESSION['pedidos'] as $fruta => $cantidad) {
            $mostrar .= "<tr><td>$fruta</td><td>$cantidad</td></tr>";
        }
        $mostrar .= "</table>";
    } else {
        $mostrar = "No hay productos en su carrito.";
    }
    return $mostrar;
}
?>