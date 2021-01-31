<?php

$host = "localhost";
$usuario = "root";
$contraseña = "";
$nombreDB = "clientes";

$conexion = mysqli_connect("$host","$usuario","$contraseña","$nombreDB");
mysqli_set_charset($conexion, "utf8");

if(!$conexion){
    die('No pudo conectarse: ' . mysqli_connect_error());
}
else{
    echo("<script>console.log('Conexion Exitosa...');</script>");
    
}

?>