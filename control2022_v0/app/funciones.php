<?php 
require_once ('dat/datos.php');

/**
 * Devuelve true si el código del usuario y contraseña se
 * encuentran en la tabla de usuarios.
 * @param $login : Código de usuario
 * @param $clave : Clave del usuario
 * @return true o false
 */
function userOk($login, $clave): bool {
    global $usuarios;
    global $contenido;

    if (!isset($_SESSION['intentos'])) {
        $_SESSION['intentos'] = 0;
    }

    if ($_SESSION['intentos'] >= 5) {
        $contenido = "Acceso bloqueado. Has superado el número máximo de intentos. Cierra el navegador o usa una ventana privada para intentar nuevamente.";
        return false;
    }

    if (isset($usuarios[$login]) && $usuarios[$login][1] === $clave) {
        $_SESSION['intentos'] = 0;
        return true;
    } else {
        $_SESSION['intentos']++;
        return false;
    }
}

/**
 * Devuelve el rol asociado al usuario.
 * @param $login: código de usuario
 * @return ROL_ALUMNO o ROL_PROFESOR
 */
function getUserRol($login) {
    global $usuarios;
    return $usuarios[$login][2] ?? null;
}

/**
 * Muestra las notas del alumno indicado.
 * @param $codigo: Código del usuario
 * @return string $msg una cadena con una tabla HTML con los resultados
 */
function verNotasAlumno($codigo): string {
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $msg = " Bienvenido/a alumno/a: " . $usuarios[$codigo][0] . "<br>";
    $msg .= "<table><tr><th>Asignatura</th><th>Nota</th></tr>";

    foreach ($nombreModulos as $index => $modulo) {
        $nota = $notas[$codigo][$index] ?? 'N/A';
        $msg .= "<tr><td>$modulo</td><td>$nota</td></tr>";
    }
    $msg .= "</table>";
    return $msg;
}

/**
 * Muestra las notas de todos los alumnos.
 * @param $codigo: Código del profesor
 * @return string $msg una cadena con una tabla HTML con los resultados
 */
function verNotaTodas($codigo): string {
    $msg="";
    global $nombreModulos;
    global $notas;
    global $usuarios;
    $msg = " Bienvenido Profesor: D. " . $usuarios[$codigo][0] . "<br>";
    $msg .= "<table><tr><th>Alumno</th>";

    foreach ($nombreModulos as $modulo) {
        $msg .= "<th>$modulo</th>";
    }
    $msg .= "</tr>";

    foreach ($notas as $codigoAlumno => $notasAlumno) {
        $msg .= "<tr><td>" . $usuarios[$codigoAlumno][0] . "</td>";
        foreach ($notasAlumno as $nota) {
            $msg .= "<td>$nota</td>";
        }
        $msg .= "</tr>";
    }
    $msg .= "</table>";
    return $msg;
}
