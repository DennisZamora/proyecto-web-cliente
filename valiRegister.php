<?php


include('conexiones/conexion.php');




if (isset($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name = "";
}

if (isset($_POST['last_name'])) {
    $last_name = $_POST['last_name'];
} else {
    $last_name = "";
}

if (isset($_POST['username'])) {
    $username = $_POST['username'];
} else {
    $username = "";
}

if (isset($_POST['email'])) {
    $email = $_POST['email'];
} else {
    $email = "";
}

if (isset($_POST['pwUsuario'])) {
    $contrasena = $_POST['pwUsuario'];
} else {
    $contrasena = "";
}

if ($name === "" || $last_name ==="" || $username === "" || $email ==="" || $contrasena === "") {
    $error = "Algunos datos estan vacios";
    echo "<script type='text/javascript'>alert('$error');</script>";
}


$idRol = 'cliente';
$consulta="INSERT INTO usuario (nombre,last_name,username,email,contrasena,idRol) 
           VALUES ('$name','$last_name','$username','$email','$contrasena','$idRol')";

$resultado=mysqli_query($conexion,$consulta);

$filas=mysqli_num_rows($resultado);

if($filas>=1){ 
    header("location:index.php");
}else{
    ?>
    <?php
    include("createAccount.php");
  ?>
  
  <script language="javascript">alert("ERROR AL REGISTRARSE");</script>;
  <?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);







