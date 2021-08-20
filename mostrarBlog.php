<?php

if (isset($_GET['idBlog'])) {
    $idBlog = $_GET['idBlog'];
} else {
    $idBlog = "";
}


$validacion = true;

require_once 'consulta.php';

$consulta = "SELECT b.nombre,a.tituloBlog,a.contenidoBlog,a.fecha_publicacion,c.nombreCategoria, c.idCategoria  
    FROM blog a,usuario b,categoria c
    WHERE a.idUsuario = b.idUsuario 
    and a.idCategoria = c.idCategoria
    AND a.idBlog =  $idBlog";

$query = consulta($consulta);

if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
        $titulo = $row["tituloBlog"];
        $contenido = $row["contenidoBlog"];
        $nombre = $row["nombre"];
        $fecha = $row["fecha_publicacion"];
    }
} else {
    $validacion = false;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>Principal</title>
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
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="addBlog.php">Agregar blogs</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="#">Categoria</a></li>
                    <li class="nav-item"><a class="nav-link px-lg-3 py-3 py-lg-4" href="aboutUs.php">Contácnenos</a></li>
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
                        <h1>Blog Personal</h1>
                        <span class="subheading">Expresa tu vida</span>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- Main Content-->

    <div class="container px-4 px-lg-5">
        <div class="row gx-4 gx-lg-5 justify-content-center">
            <div class="col-md-10 col-lg-8 col-xl-7">
                <div class="main">
                    <form class="form-box">
                        <h1><?php echo "<strong>$titulo</strong>" ?> <br></h1>
                        <div><?php echo "$contenido" ?> <br></dvi>
                            <div><?php echo "<i><strong>Posted by: </strong> <i>$nombre</i> <strong>on: </strong> $fecha</i>"  ?></div>
                    </form>
                </div>
            </div>
            <div class="card-action right-align">
                <br>
                 <a href="principal.php"><em><u>BACK TO BLOGS</u></em></a></button>
            </div>
        </div>

        <footer class="border-top">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-md-10 col-lg-8 col-xl-7">
                        <ul class="list-inline text-center">

                            <li class="list-inline-item">
                                <a href="https://github.com/shu353/proyecto-web-cliente">
                                    <span class="fa-stack fa-lg">
                                        <i class="fas fa-circle fa-stack-2x"></i>
                                        <i class="fab fa-github fa-stack-1x fa-inverse"></i>
                                    </span>
                                </a>
                            </li>
                        </ul>
                        <div class="small text-center text-muted fst-italic">Copyright &copy; Your Website 2021</div>
                    </div>
                </div>
            </div>
        </footer>


        <script src="plugins/jquery-3.5.1.js"></script>
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>
        <script src="funcionalidades/principal.js"></script>
</body>

</html>