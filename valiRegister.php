<?php

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

if ($name === "" || $last_name === "" || $username === "" || $email === "" || $contrasena === "") {
    $error = "Algunos datos estan vacios";
    echo "<script type='text/javascript'>alert('$error');</script>";
    header("location:createAccount.php");
} else {
    $idRol = 2;
    include "conexiones/conexion.php";
    ingresarUsuario($name, $last_name, $username, $email, $contrasena, $idRol);
}


function ingresarUsuario($pname, $plast_name, $pusername, $pemail, $pcontrasena, $pidRol)
{
    $conexion = conecta();
    $consulta = $conexion->prepare("INSERT INTO usuario (nombre,last_name,username,email,contrasena,idRol)  VALUES (?, ?, ?, ?, ?, ?)");
    $consulta->bind_param("sssssi", $name, $last_name, $username, $email, $contrasena, $idRol);
    
    $name = $pname;
    $last_name = $plast_name;
    $username = $pusername;
    $email = $pemail;
    $contrasena = $pcontrasena;
    $idRol = $pidRol;
     
    if ($consulta->execute()) {
        $consulta->close();
        $conexion->close();
        header("location:index.php");
    } else {
        header("location:createAccount.php");
    }
}

