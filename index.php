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
</head>

<body>
    
    <form action ="validacion.php" method="post" class="form-box">
        <h1>
            <img class="imagen" src="imagenes/1.png"  alt="Profile Photo" >
        </h1>
        <h5 class="advice">
            Fill in the fields to login
        </h5>
        <input type="text" placeholder="Username" name="usuario">
        <input type = "password" placeholder="Password" name="pwUsuario">
        <button type="submit" name="btnLogin" value="Ingresar">
            Login
        </button>
        <h5 class="registro">
            Not registered? <a href="createAccount.php">Create an account</a>
        </h5>
    </form>
</body>
</html>