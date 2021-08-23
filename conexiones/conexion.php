<?php
function conecta(){
$servidor = "localhost";
$usuario = "root";
$contrasena = "";
$BD = "proyecto";
$conexion = new mysqli($servidor, $usuario, $contrasena, $BD);

if ($conexion->connect_error) {
   // die("Error al Conectar con la BD: " . $conexion->connect_error);
}
return $conexion;
}

function desconectaDB($conexion){
   $close = mysqli_close($conexion); 
   return $close;
   }

function InsertaDatos($pTituloBlog, $pContenidoBlog, $pIdUsuario, $pIdCategoria){

   $response = "";
   $conn = conecta();
   // prepare and bind
   mysqli_set_charset($conn, "utf8"); //formato de datos utf8

   $stmt = $conn->prepare("INSERT into blog (tituloBlog, contenidoBlog, idUsuario, idCategoria) VALUES (?, ?, ?, ?)");
   $stmt->bind_param("siiis", $itituloBlog, $icontenidoBlog, $iidUsuario, $iidCategoria);

   // set parameters and execute
   $itituloBlog = $pTituloBlog;
   $icontenidoBlog = $pContenidoBlog;
   $iidUsuario = $pIdUsuario;
   $iidCategoria = $pIdCategoria;

   $stmt->execute();

   $response = "Se almaceno el blog satisfactoriamente";

   $stmt->close();
   desconectaDB($conn);

   return $response;
}

?>