<?php
require_once 'conexiones/conexion.php';
if (isset($_POST['usuario'])) {
  $usuario = $_POST['usuario'];
} else {
  $usuario = "";
}

if (isset($_POST['pwUsuario'])) {
  $contrasena = $_POST['pwUsuario'];
} else {
  $contrasena = "";
}

if ($usuario === "" || $contrasena === "") {
  $error = "Algunos datos estan vacios";
  echo "<script type='text/javascript'>console.log('$error');</script>";
} else {
  $idUsuario2 = usuario();
}

function usuario()
{
  require_once 'consulta.php';
  $usuario2 = $_POST['usuario'];

  $consulta = "SELECT idUsuario FROM usuario where username='$usuario2'";

  $query = consulta($consulta);

  if ($query->num_rows > 0) {
    while ($row = $query->fetch_assoc()) {
      $idUsuario = $row["idUsuario"];
      return $idUsuario;
    }
  }
}


$conexion = conecta();
$consulta = "SELECT username,contrasena FROM usuario where username='$usuario' and contrasena='$contrasena'";
$resultado = mysqli_query($conexion, $consulta);

$filas = mysqli_num_rows($resultado);

if ($filas >= 1) {
  session_start();
  $_SESSION['usuario'] = $usuario;
  header("location:principal.php");
} else {
?>
  <?php
  include("index.php");
  ?>

  <!-- <script language="javascript">alert("ERROR AL INICIAR SESION");</script>; -->
<?php
}
mysqli_free_result($resultado);
mysqli_close($conexion);
