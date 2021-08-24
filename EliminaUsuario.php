<!DOCTYPE html>
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Perfil</title>
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <script src="https://use.fontawesome.com/releases/v5.15.3/js/all.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css?family=Lora:400,700,400italic,700italic" rel="stylesheet" type="text/css" />
        <link href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800" rel="stylesheet" type="text/css" />
        <link rel="icon" href="imagenes/icono.png">
        <link rel="stylesheet" href="css/principal.css">
    </head>

    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-expand-lg navbar-light" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand" href="principal.php">Blog personal</a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
                    Menu
                    <i class="fas fa-bars"></i>
                </button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto py-4 py-lg-0">
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="principal.php">Inicio</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="perfil.php">Perfil</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="post.html">Categoria</a></li>
                        <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="cerrarsesion.php">Cerrar sesion</a></li>
                    </ul>
                </div>
            </div>
        </nav>

        <!-- Page Header-->
        <header class="masthead">
            <div class="container position-relative px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <div class="site-heading">
                            <h1>Perfil</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>
    </body>

    <!-- Main content -->
    <?php		
        function recogeGet($var, $m = "")
        {
            if (!isset($_GET[$var])) {
                $tmp = (is_array($m)) ? [] : "";
            } elseif (!is_array($_GET[$var])) {
                $tmp = trim(htmlspecialchars($_GET[$var], ENT_QUOTES, "UTF-8"));
            } else {
                $tmp = $_GET[$var];
                array_walk_recursive($tmp, function (&$valor) {
                    $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
                });
            }
            return $tmp;
        }
        $idUsuario = recogeGet('idUsuario');

        require_once 'consulta.php';

        $elSQL = "SELECT idUsuario, nombre, last_name, username, email, contrasena FROM usuario where idUsuario = $idUsuario";
        $miQuery = consulta($elSQL);

        if($miQuery==null){
            echo "FUUUUCK";
        }

        if ($miQuery->num_rows > 0) {
            while ($row = $miQuery->fetch_assoc()) {
                $idUsuario = $row["idUsuario"];
                $nombre = $row["nombre"];
                $last_name = $row["last_name"];
                $username = $row["username"];
                $email = $row["email"];
                $contrasena = $row["contrasena"];
            }
        } else {
            $idUsuario = "";
            $nombre = "";
            $last_name = "";
            $username = "";
            $email = ""; 
            $contrasena = "";
        }

        ?>

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
            <h5 class="card-title">Eliminar un usuario</h5>
                    <h6 class="card-subtitle mb-2 text-muted">Datos del usuario</h6>
                    <p class="card-text">
                        idUsuario: <?php echo "<strong>$idUsuario</strong>" ?> <br>
                        Nombre del usuario: <?php echo "<strong>$nombre</strong>" ?> <br>
                        Apellido: <?php echo "<strong>$last_name</strong>"?> <br>
                        Username: <?php echo "<strong>$username</strong>"?> <br>
                        Email: <?php echo "<strong>$email</strong>" ?> <br>
                        Contrasena: <?php echo "<strong>$contrasena</strong>" ?> <br>
                    </p>

                    <table>
                        <td>
                            <a href="perfil.php" class="btn btn-outline-primary">Volver</a>
                        </td>
                        <td>
                            <a href="actualizaDatos.php?idUsuario=<?php echo $idUsuario; ?>" class="btn btn-outline-success">Cambiar el usuario</a>
                        </td>
                        <td>
                            <a href="elimina.php?idUsuario=<?php echo $idUsuario; ?>" class="btn btn-outline-danger">Eliminar el usuario</a>
                        </td>
                        <!--<td>
                            <form action="elimina.php" method="POST">
                                <input name="idUsuario" type="text" id="idUsuario" style="width:504px;" value="<?php echo $idUsuario ?>" hidden required />
                                <button type="submit" class="btn btn-outline-danger" onclick="return validaEliminacion();">Eliminar el usuario</button>
                            </form>
                        </td>-->
            </div>
        </div>
    </div>
</html>