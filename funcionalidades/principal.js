$(document).ready(function () {
  $("#id-categoria").change(function () {
    var categoriaId = $(this).val();
    console.log("aqui");

    $.ajax({
      url: "getCategoria.php",
      type: "POST",
      data: { categoriaId: categoriaId },
      success: function (data) {
        $("#blogs").html(data);
      },
    });
  });
});

function ingresaBlog($pTituloBlog, $pContenidoBlog, $pIdUsuario, $pIdCategoria) {
  try {
      $.ajax(
          {
              data: {
                  tituloBlog: $pTituloBlog,
                  contenidoBlog: $pContenidoBlog,
                  idUsuario: $pIdUsuario,
                  idCategoria: $pIdCategoria,
              },
              url: 'nuevoBlog.php',
              type: 'POST',
              dataType: 'json',
              // beforeSend: function () 
              //  {
              //     $("#pnlInfo").fadeTo("slow");
              //     $("#pnlMensaje").fadeTo("slow");
              //  },
              success: function (r) {
                  InsercionBlogExitosa(r);
              },
              error: function (r) {
                  InsercionBlogFallida(r);
              }
          });
  } catch (err) {
      alert(err);
  }
}
