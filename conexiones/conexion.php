<?php
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$BD = "proyecto4";
$conexion = new mysqli($servidor, $usuario, $contrasena, $BD);

if ($conexion->connect_error) {
    die("Error al Conectar con la BD: " . $conexion->connect_error);
}
return $conexion;
