<?php
function usuarioOk($usuario, $contraseña): bool {
    if (strlen($usuario) < 8) {
        return false; 
    }

    $usuarioInvertido = strrev($usuario);

    if ($contraseña == $usuarioInvertido) {
        return true;
    } else {
        return false;
    }
}

function letraMasRepetida($texto) {
    $texto = strtolower(preg_replace('/[^a-z]/', '', $texto));
    $contador = array();

    for ($i = 0; $i < strlen($texto); $i++) {
        $letra = $texto[$i];
        if (isset($contador[$letra])) {
            $contador[$letra]++;
        } else {
            $contador[$letra] = 1;
        }
    }

    $letraMasRepetida = '';
    $maxRepeticiones = 0;

    foreach ($contador as $letra => $repeticiones) {
        if ($repeticiones > $maxRepeticiones) {
            $maxRepeticiones = $repeticiones;
            $letraMasRepetida = $letra;
        }
    }

    return $letraMasRepetida;
}

function palabraMasRepetida($texto) {
    $texto = strtolower($texto);
    $palabras = str_word_count($texto, 1);
    $contador = array_count_values($palabras);

    $palabraMasRepetida = '';
    $maxRepeticiones = 0;

    foreach ($contador as $palabra => $repeticiones) {
        if ($repeticiones > $maxRepeticiones) {
            $maxRepeticiones = $repeticiones;
            $palabraMasRepetida = $palabra;
        }
    }

    return $palabraMasRepetida;
}
