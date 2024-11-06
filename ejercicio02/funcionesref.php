<?php
function suma($num1, $num2,&$resultado){
    $resultado = $num1 + $num2;
}
function resta($num1, $num2,&$resultado){
    $resultado = $num1 - $num2;
}
function multi($num1, $num2,&$resultado){
    $resultado = $num1 * $num2;
}
function div($num1, $num2,&$resultado){
    $resultado = $num1 / $num2;
}
function resto($num1, $num2,&$resultado){
    $resultado = $num1 % $num2;
}
function poten($num1, $num2,&$resultado){
    $resultado = $num1 ** $num2;
    // $resultado = 1;
    // for($i=0;$i=$num2;$i++){
    //     $resultado *= $num1;
    // }
}

?>
