<?php 
include("conexiones/conexion.php");

$idCategoria = 0;
$conexion = conecta();
if(isset($_POST['categoria'])){
    $idCategoria = mysqli_real_escape_string($conexion,$_POST['categoria']); //id categoria
 }

 $blogArray = array();


if($idCategoria > 0){
   $sql = "SELECT idBlog, tituloBlog, contenidoBlog, fecha_publicacion,  FROM blog WHERE idCategoria=".$idCategoria;

   $result = mysqli_query($conexion,$sql);  
   
   while( $row = mysqli_fetch_array($result) ){
      $idBlog = $row['idBlog'];
      $tituloBlog = $row['tituloBlog'];

      $blogArray[] = array("idBlog" => $idBlog, "tituloBlog" => $tituloBlog);
   }
 }
// encoding array to json format
echo json_encode($blogArray);
