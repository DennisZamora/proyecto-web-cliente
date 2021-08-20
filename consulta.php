<?php
require_once 'conexiones/conexion.php';

function consulta($consulta)
{
    $conexion = Conecta();
    if (!$conexion->set_charset("utf8")) {
        printf("Error de los caracteres utf8: %s\n", $conexion->error);
    } 
    $respuesta = $conexion->query($consulta);
    desconectaDB($conexion);
    return $respuesta;
}
?>