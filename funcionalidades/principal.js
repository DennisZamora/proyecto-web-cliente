$(document).ready(function () {
  $("#id-categoria").change(function () {
    var categoriaId = $(this).val();

    $.ajax({
      url: "getCategoria.php",
      type: "post",
      data: { categoria: categoriaId },
      dataType: "json",
      success: function (response) {
        var len = response.length;

        $("#blogs").empty();

        for (var i = 0; i < len; i++) {
          //var idBlog = response[i]["idBlog"];
          var tituloBlog = response[i]["tituloBlog"];
          var contenidoBlog = response[i]["contenidoBlog"];
          var fecha_publicacion = response[i]["fecha_publicacion"];

          $("#blogs").append(`<h3> ${tituloBlog} </h3
                                        <di> ${contenidoBlog} </div>
                                        <di> ${fecha_publicacion} </div>
                                        
                    `);
        }
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
