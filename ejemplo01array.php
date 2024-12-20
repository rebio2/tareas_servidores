<?php
echo " <hr> Caso A <br> ";
$t1 = []; // Array vacio es igual a poner $t1 = Array();
$t1[] = 10;
$t1[] = 20;
$t1[] = 30;

// Array similar a Java
for ($i = 0; $i < 3; $i++) {
    echo $t1[$i] . "<br>";
}
echo " <hr> Caso B <br>  ";
for ($i = 0; $i < sizeof($t1); $i++) {
    echo $t1[$i] . "<br>";
}
echo " <hr> Caso C <br>  ";

// Crep un array de 3 y le añado uno mas
$t2 = [11, 22, 33];
$t2[] = 44;

for ($i = 0; $i < sizeof($t2); $i++) {
    echo $t2[$i] . "<br>";
}
echo " <hr> Caso D <br>  ";

// Creo un array de 3 y le añado uno mas en otra posicion ¿Que pasa?
$t3 = ['a', 'b', 'c'];
$t3[10] = 'r';

for ($i = 0; $i < sizeof($t3); $i++) {
    echo " $i ->", $t3[$i] . "<br>"; // Falla a intentar mostrar $t3[3]
}
echo " <hr> Caso E  <br>  ";
foreach ($t3 as $clave => $valor) {
    echo " $clave -> $valor <br> "; // No falla
}
echo " <hr> Caso F <br>  ";
// Array de Arrays
$personas = [["Ana", 23, true], ["Juan", 45, true], ["Luis", 19, false]];
echo " La persona " . $personas[0][0] . " Tiene la edad de " . $personas[0][1] . "<br>";

echo " <hr> Caso G <br>  ";
// Array asociativo clave --> valor
$t3 = array('España' => 'Madrid', 'Francia' => 'París', 'Alemania' => 'Berlín');

// Mal fallo no existe la clave 0,1,2
for ($i = 0; $i < sizeof($t3); $i++) {
    echo $t3[$i] . "<br>";
}
echo " <hr> Caso H <br>  ";

echo " la capital de España es " . $t3['España'] . " <br>";

// Mostrar todos los valores
foreach ($t3 as $valor) {
    echo "$valor </br>"; // Muestra capitales
}
echo " <hr> Caso I  <br>  ";
$t3['Italia'] = 'Roma';  // Nuevo valor

// Mostrar todos los valores y su claves
foreach ($t3 as $clave => $valor) {
    echo "La capital de $clave es $valor </br>"; // Muestra los paises con sus capitales
}
