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
</head>

<body>
    
    <form action ="valiRegister.php" method="post" class="form-box">
        <h1 class = "advice">Register</h1>
        <h5 class="advice">
            Please fill in the following fields to register as user
        </h5>
        <input type="text" placeholder="Name" name="name">
        <input type="text" placeholder="Last Name" name="last_name">
        <input type="text" placeholder="Username" name="username">
        <input type="email" placeholder="E-mail" name="email">
        <input type = "password" placeholder="Password" name="pwUsuario">      
        <button type="submit" name="btnRegister">
            Register
        </button>
        
    </form>
</body>
</html>