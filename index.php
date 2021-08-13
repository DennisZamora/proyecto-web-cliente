<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-
    scale=1.0">
    <title>Login</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="icon" href="imagenes/icono.png">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
</head>

<body id="contenido">
    <form id="login" action="validacion.php" method="post" class="form-box">
        <h1>
            <img class="imagen" src="imagenes/1.png" alt="Profile Photo">
        </h1>
        <h5 class="advice">
            Fill in the fields to login
        </h5>
        <input type="text" id="username" placeholder="Username" name="usuario">
        <input type="password" id="password" placeholder="Password" name="pwUsuario">

        <div class="enviar">
            <input type="hidden" id="tipo" value="login">
            <button type="submit" name="btnLogin" value="Ingresar">Login</button>
        </div>
        <h5 id="registro" class="registro">
            Not registered? <a href="createAccount.php">Create an account</a>
        </h5>
    </form>
   
    <script src="plugins/jquery-3.5.1.js"></script>
    <script src="funcionalidades/register.js"></script>
    <script src="plugins/sweetalert2.all.min.js"></script>
    <script src="funcionalidades/alert.js"></script>
</body>

</html>