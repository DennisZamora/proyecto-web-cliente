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
                            <h1>Usuarios</h1>
                        </div>
                    </div>
                </div>
            </div>
        </header>

        <!-- Main Content-->
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-md-10 col-lg-8 col-xl-7">
                <?php
            //Pagina que muestra los datos de base de datos

            require_once 'consulta.php';
            ImprimeDatos();

            function ImprimeDatos()
            {
                $elSQL = "SELECT * FROM usuario";
                $miQuery = consulta($elSQL);
                echo "<div id=ContactDiv>";
                echo "<h3>Datos del usuario</h3>";
                echo "<br>";
                imprimeTabla($miQuery);
                echo "</div>";
            }

            //Imprimir tabla
            function imprimeTabla($miQuery)
            {
                echo "<table WIDTH=50%>";
                echo "<tr>";
                echo " <th> idUsuario  </th>";
                echo " <th> </th>";
                echo " <th> </th>";
                echo " <th> </th>";
                echo " <th> Nombre </th>";
                echo " <th> Apellido  </th>";
                echo " <th> Username </th>";
                echo " <th> Correo </th>";
                echo " <th> Contraseña </th>";
                echo "</tr>";
                if ($miQuery->num_rows > 0) {
                    echo "<tr>";
                    while ($row = $miQuery->fetch_assoc()) {
                        echo "<td colspan='4'>" . $row["idUsuario"] .      "</td> ";
                        echo "<td>" . $row["nombre"] .      "</td> ";
                        echo "<td>" . $row["last_name"] .      "</td> ";
                        echo "<td>" . $row["username"] .      "</td> ";
                        echo "<td>" . $row["email"] .      "</td> ";
                        echo "<td>" . $row["contrasena"] .      "</td> ";
                        echo "<td>" . "<a href='actualizaDatos.php?idUsuario=" .  $row["idUsuario"] .
                            "'>Modificar</a>" .   "</td>";
                        echo "<td>" . "<a href='EliminaUsuario.php?idUsuario=" .  $row["idUsuario"] .
                            "'>Eliminar</a>" .   "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr>";
                    echo " <th> No se pueden mostrar las citas aún, dado que no hay registros </th>";
                    echo "</tr>";
                }
                echo "</table>";
            }

            ?>
                    
                </div>
            </div>
        </div>
        

    </body>
</html>