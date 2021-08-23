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

function getArray($sql){

   $conexion = conecta();

   mysqli_set_charset($conexion, "utf8");

   if(!$result = mysqli_query($conexion, $sql)) die();

   $rawdata = array();

   $i=0;

   while($row = mysqli_fetch_array($result))
   {
       $rawdata[$i] = $row;
       $i++;
   }

   desconectaDB($conexion);
   return $rawdata;
}

function InsertaDatos($ptituloBlog, $pcontenidoBlog, $pidUsuario, $pidCategoria) {
  $response = "";
  $conn = conecta();
  
  mysqli_set_charset($conn, "utf8");

  $stmt = $conn->prepare("Call spInsertaBlog(?, ?, ?, ?)");
  $stmt->bind_param("ssii", $itituloBlog, $icontenidoBlog, $idUsuario, $idCategoria);

  $itituloBlog = $ptituloBlog;
  $icontenidoBlog = $pcontenidoBlog;
  $idUsuario = $pidUsuario;
  $idCategoria = $pidCategoria;

  $stmt->execute();

  $response = "Se almaceno el blog satisfactoriamente";

  $stmt->close();
  desconectaDB($conn);

  return $response;
}
?>