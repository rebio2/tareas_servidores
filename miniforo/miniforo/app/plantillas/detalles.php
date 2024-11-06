<?php
include '../funciones.php';

$comentario = isset($_REQUEST['comentario']) ? $_REQUEST['comentario'] : '';
$letraRepetida = letraMasRepetida($comentario);
$palabraRepetida = palabraMasRepetida($comentario); 
?>

<div>
<b> Detalles:</b><br>
<table>
<tr><td>Longitud:          </td><td><?= strlen($_REQUEST['comentario']) ?></td></tr>
<tr><td>Nº de palabras:    </td><td><?= str_word_count($_REQUEST['comentario']) ?></td></tr>
<tr><td>Letra + repetida:  </td><td><?= htmlspecialchars($letraRepetida) ?></td></tr>
<tr><td>Palabra + repetida:</td><td><?= htmlspecialchars($palabraRepetida) ?></td></tr>
</table>
</div>

