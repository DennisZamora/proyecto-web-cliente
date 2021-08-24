<?php

include 'conexiones/conexion.php';
$elSQl = "call pGetUsuario()";
$myArray = getArray($elSQl);
echo json_encode($myArray, JSON_UNESCAPED_UNICODE);
?>