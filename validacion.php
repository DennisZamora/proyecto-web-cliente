<?php

 include('conexiones/conexion.php');
if(isset($_POST['usuario'])){
  $usuario=$_POST['usuario'];
} else {
  $usuario ="";
}

if(isset($_POST['pwUsuario'])){
  $contrasena=$_POST['pwUsuario'];
} else {
  $contrasena="";
}

if ($usuario === "" || $contrasena === ""){
  $error = "Algunos datos estan vacios";
  echo "<script type='text/javascript'>alert('$error');</script>";
}



$consulta="SELECT username,contrasena FROM usuario where username='$usuario' and contrasena='$contrasena'";
$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas>=1){ 
   session_start();
   $_SESSION['usuario']=$usuario;
    header("location:principal.php");
}else{
    ?>
    <?php
    include("index.php");
  ?>
  
  <script language="javascript">alert("ERROR AL INICIAR SESION");</script>;
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);


/*
if (isset($_POST["btnLogin"])) {
  include("conexiones/conexion.php");

  $usuario = $_POST['usuario'];
  $contrasena = $_POST['pwUsuario'];

  $sentenciaSQL = $pdo->prepare("SELECT * FROM usuario
   WHERE idUsuario=:idUsuario 
   AND contrasena=:contrasena");

  $sentenciaSQL->bindParam("idUsuario", $usuario, PDO::PARAM_STR);
  $sentenciaSQL->bindParam("contrasena", $contrasena, PDO::PARAM_STR);
  $sentenciaSQL->execute();

  $registro = $sentenciaSQL->fetch(PDO::FETCH_ASSOC);
  print_r($registro);



  $numeroRegistro = $sentenciaSQL->rowCount();

  if ($numeroRegistro >= 1) {
    session_start();
    $_SESSION['idUsuario'] = $registro;
    header("location:principal.php");
  } else {
    echo "<script> alert('Error al iniciar sesion')</script>";
  }
}
*/