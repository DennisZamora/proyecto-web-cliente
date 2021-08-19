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
  echo "<script type='text/javascript'>console.log('$error');</script>";
}


$conexion = conecta();
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
  
  <!-- <script language="javascript">alert("ERROR AL INICIAR SESION");</script>; -->
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);


