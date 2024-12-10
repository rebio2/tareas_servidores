<?php

/**
 * Checks if the provided username and password are valid.
 *
 * @param string $username The username to validate.
 * @param string $password The password to validate.
 * @return bool Returns true if the username and password are valid, false otherwise.
 */
$archivoAccesos='usuarios.dat';
function accesoValido($username, $password): bool
{
    if($username && $password){
        return true;
    }else{
        return false;
    }
    return true;
}


// function cargarDatostxt(): array
// {
//     // Si no existe lo creo
//     $tabla = [];
//     if (!is_readable(FILEUSER)) {
//         // El directorio donde se crea tiene que tener permisos adecuados
//         $fich = @fopen(FILEUSER, "w") or die("Error al crear el fichero.");
//         fclose($fich);
//     }
//     $fich = @fopen(FILEUSER, 'r') or die("ERROR al abrir fichero de usuarios"); // abrimos el fichero para lectura

//     while ($linea = fgets($fich)) {
//         $partes = explode('|', trim($linea));
//         // Escribimos la correspondiente fila en tabla
//         // La clave es el login  el primer campo del fichero de texto
//         $tabla[$partes[0]] = [$partes[1], $partes[2], $partes[3]];
//     }
//     fclose($fich);
//     return $tabla;
// }
// //Vuelca los datos a un fichero de texto
// function volcarDatostxt(array $tvalores)
// {
//     $fich = @fopen(FILEUSER, 'w') or die("ERROR al abrir fichero de usuarios"); // abrimos el fichero para lectura

//     foreach ($tvalores as $login => $datos) {
//         $linea = $login . ',';
//         $linea .= implode(',', $datos);
//         $linea .= "\n";
//         fputs($fich, $linea);
//     }
//     fclose($fich);
// }


/**
 * Records a new access for the given username.
 *
 * @param string $username The username for which to record the access.
 * @return int The result of the access recording operation.
 */
function obtenerAccesos($username){
    if (file_exists($username)) {
        return (int)file_get_contents($username);
    } else {
        file_put_contents($username, 0);
        return 0;
    }
}
function anotarNuevoAcceso($username):int{
    $accesos=obtenerAccesos($username)+1;
    file_put_contents($username, $accesos);
    return $accesos;
    return 0;
}

/**
 * Registers a user with a given username and time.
 *
 * @param string $username The username of the user to register.
 * @param int $time The time associated with the registration.
 */
function registra($username,$time){
     // COMPLETAR  +++++++++++++++++++++++++++++++
    return;
}
