<?php

$servidor="localhost";
$baseDeDatos="webside";
$usuario="root";
$contraseña="";

try{

  $conexion=new PDO("mysql:host=$servidor; dbname=$baseDeDatos", $usuario, $contraseña); 
  echo "Conexión realizada...";

}catch(Exception $error) { echo $error->getMessage();

}

?>