<?php

$servidor="localhost";
$baseDeDatos="webside";
$usuario="root";
$contraseña="";

try{

  $conexion=new PDO("mysql:host=$servidor; dbname=$baseDeDatos", $usuario, $contraseña); 

}catch(Exception $error) {print "¡Error BD!: " . $error->getMessage();

}

?>