<?php

// Caracteres asociadas a las logos 
// PIEDRA (Puño derecho)
// PIEDRA2 (Puño Izquierdo / jugador 2 ) 
define ('PIEDRA',   "&#x1F91C;");
define ('PIEDRA2',  "&#x1F91B;");
define ('TIJERAS',  "&#x1F596;");
define ('PAPEL',    "&#x1F91A;" );

// Tabla de mensajes en función del ganador
$tmsg = [
          "¡Empate !",
          " Ha ganado el jugador 1",
          " Ha ganado el jugador 2"
        ];


/**
 *  Calcula el ganador 
 *  Parámetros: Dos valores PIEDRA, PAPEL O TIJERA
 *  Resultado: 0 (Empate),1 (1 Gana jugador 1), 2 (Gana jugador 2)   
 *  
 */

function calcularGanador (String $valor1, String $valor2): int{
    
    $ganador =0;
    
    if ( $valor1 == $valor2 ) return $ganador;
    
    switch ($valor1){
        case PIEDRA:  $ganador = ( $valor2 == TIJERAS)?1:2; break;
        case TIJERAS: $ganador = ( $valor2 == PAPEL  )?1:2; break;
        case PAPEL:   $ganador = ( $valor2 == PIEDRA )?1:2; break;
    }
    return $ganador;
}

function obtenerFicha (){
  $valor = rand(0,2);
  switch ($valor){
    case 0: return PIEDRA;
    case 1: return TIJERAS;
    case 2: return PAPEL;
  }
}

//Programa Principal
if(!isset($_GET["usuario"])){
    include './formulario.php';
    exit();
}

$valores=[PIEDRA,TIJERAS,PAPEL];
$jugador1 = obtenerFicha();
$jugador2 = $valores[$_GET["usuario"]];
$pos = calcularGanador($jugador1,$jugador2);
$mensaje =  $tmsg[$pos]; 
$jugador2 = ($jugador2 == PIEDRA)?PIEDRA2:$jugador2;
include './respuesta.php';
?>



