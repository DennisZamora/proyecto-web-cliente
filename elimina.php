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

        <!-- Main content -->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <?php

                function recoge($var, $m = ""){
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
                /*function recoge($var, $m = ""){
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
                }*/ 

                $idUsuario = recoge("idUsuario");

                require_once 'consulta.php';

                $elSQL = "SELECT idUsuario, nombre, last_name, username, email, contrasena FROM usuario where idUsuario = $idUsuario";
                $miQuery = consulta($elSQL);

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

                $nombreOk  = false;
                $last_nameOk    = false;
                $usernameOk         = false;
                $emailOk          = false;
                $contrasenaOk        = false;

                if ($nombre == "") {
                    print "  <p class=\"aviso\">No ha escrito el nombre.</p>\n";
                    print "\n";
                } else {
                    $nombreOk = true;
                }

                if ($last_name == "") {
                    print "  <p class=\"aviso\">No ha escrito el apellido.</p>\n";
                    print "\n";
                } else {
                    $last_nameOk = true;
                }

                if ($username == "") {
                    print "  <p class=\"aviso\">No ha escrito el username</p>\n";
                    print "\n";
                } else {
                    $usernameOk = true;
                }

                if ($email == "") {
                    print "  <p class=\"aviso\">No ha escrito el email</p>\n";
                    print "\n";
                } else {
                    $emailOk = true;
                }

                if ($contrasena == "") {
                    print "  <p class=\"aviso\">No ha escrito la contrasena.</p>\n";
                    print "\n";
                } else {
                    $contrasenaOk = true;
                }


                if ($nombreOk && $last_nameOk && $usernameOk && $emailOk && $contrasenaOk) {
                print "  <p>El identificador del usuario eliminado era <strong>$idUsuario</strong>.</p>\n";
                print "  <p>El nombre del del usuario eliminado era <strong>$nombre</strong>.</p>\n";
                print "  <p>El apellido del usuario eliminado era <strong>$last_name</strong>.</p>\n";
                print "  <p>El username del usuario eliminado era <strong>$username</strong>.</p>\n";
                print "  <p>El email del usuario eliminado era <strong>$email</strong>.</p>\n";
                print "  <p>La contrasena del usuario eliminado era <strong>$contrasena</strong>.</p>\n";
                print "\n";

                include_once('conexiones/conexion.php');
                echo EliminaDato($idUsuario);

                }

                function EliminaDato($pidUsuairo)
                {
                    $response = "";
                    $conn = Conecta();
                    // prepare and bind
                    $stmt = $conn->prepare("DELETE FROM usuario WHERE idUsuario = ?");
                    $stmt->bind_param("i", $iidUsuairo);

                    // set parameters and execute
                    $iidUsuairo = $pidUsuairo;

                    $stmt->execute();

                    $response = "Se eliminó el usuario satisfactoriamente";

                    $stmt->close();
                    $conn->close();

                    return $response;
                }

                ?>

                <td>
                    <a href="perfil.php" class="btn btn-outline-primary">Volver</a>
                </td>
                
                </div>
            </div>
        </div>
    
    </body>
</html>