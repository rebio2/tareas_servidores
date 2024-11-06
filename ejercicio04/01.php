<?php
$usuarios=[
    "javi" => "javi",
    "aimar" => "aimar",
    "pinedo"  => "pinedo"
];

$usuario=$_POST["usuario"];
$contraseña=$_POST["contraseña"];

if(array_key_exists($usuario,$usuarios) && $usuarios[$usuario] == $contraseña){
    echo  "Bienvenido $usuario";    
}else{
    echo "Error. Usuario o  contraseña incorrectos";
}


?>