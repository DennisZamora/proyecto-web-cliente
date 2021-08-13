<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-
    scale=1.0">
    <title>Create an account</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200&display=swap');
    </style>
    <link rel="stylesheet" type="text/css" href="css/index.css">
    <link rel="icon" href="imagenes/icono.png">
    <link rel="stylesheet" href="css/sweetalert2.min.css">
</head>

<body>
    
    <form id="register" action ="valiRegister.php" method="post" class="form-box">
        <h1 class = "advice">Register</h1>
        <h5 class="advice">
            Please fill in the following fields to register as user
        </h5>
        <input type="text" id="name" placeholder="Name" name="name">
        <input type="text" id="last_name" placeholder="Last Name" name="last_name">
        <input type="text" id="username" placeholder="Username" name="username">
        <input type="email" id="email" placeholder="E-mail" name="email">
        <input type = "password" id="password" placeholder="Password" name="pwUsuario">    
        <div class="enviar">
                <input type="hidden" id="tipo" value="crear">
                <button type="submit" name="btnRegister"> Register </button>
        </div>  
        <div>
            <h5 class="registro">
            <a href="index.php"> Go to back the login</a>
        </h5>
        </div>
        
    </form>
    <script src="plugins/jquery-3.5.1.js"></script>
    <script src="plugins/sweetalert2.all.min.js"></script>
    <script src="funcionalidades/alert.js"></script>
   
</body>
</html>