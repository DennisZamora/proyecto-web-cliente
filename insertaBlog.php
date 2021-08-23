<?php
  function recoge($var, $m = "")
  {
    if (!isset($_REQUEST[$var])) {

      $tmp = (is_array($m)) ? [] : "";
    } elseif (!is_array($_REQUEST[$var])) {

      $tmp = trim(htmlspecialchars($_REQUEST[$var], ENT_QUOTES, "UTF-8"));
    } else {
      $tmp = $_REQUEST[$var];

        array_walk_recursive($tmp, function (&$valor) {
        $valor = trim(htmlspecialchars($valor, ENT_QUOTES, "UTF-8"));
      });
    }
    return $tmp;
  }

  $tituloBlog = recoge("tituloBlog");
  $contenidoBlog  = recoge("contenidoBlog");
  $idUsuario      = recoge("idUsuario");
  $idCategoria    = recoge("idCategoria");

  $tituloBlogOk  = false;
  $contenidoBlogOk  = false;
  $idUsuarioOk      = false;
  $idCategoriaOk    = false;

  if ($tituloBlog == "") {
    print "  <p class=\"aviso\">No ha escrito el nombre del título.</p>\n";
    print "\n";
  } else {
    $tituloBlogOk = true;
  }

  if ($contenidoBlog == "") {
    print "  <p class=\"aviso\">No ha escrito el contenido del título.</p>\n";
    print "\n";
  } else {
    $contenidoBlogOk = true;
  }

  if ($idUsuario == "") {
    print "  <p class=\"aviso\">No ha escrito el nombre del usuario .</p>\n";
    print "\n";
  } else {
    $idUsuarioOk = true;
  }

  if ($idCategoria == "") {
    print "  <p class=\"aviso\">No ha seleccionado la categoria.</p>\n";
    print "\n";
  } elseif (!is_numeric($idCategoria)) {
    print "  <p class=\"aviso\">El dato de la categoria no es valido.</p>\n";
    print "\n";
  } else {
    $idCategoriaOk = true;
  }

  if ($tituloBlogOk && $contenidoBlogOk && $idUsuarioOk && $idCategoriaOk) {
    include 'conexiones/conexion.php';
    //Una vez validados los datos vamos a proceder a insertarlos en base de datos
    echo json_encode(InsertaDatos($tituloBlog, $contenidoBlog, $idUsuario, $idCategoria));

  }

  ?>