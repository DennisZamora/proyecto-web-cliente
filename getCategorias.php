<?php

include 'conexiones/conexion.php';
$elSQl = "call pGetCategoria()";
$myArray = getArray($elSQl);
echo json_encode($myArray, JSON_UNESCAPED_UNICODE);

?>