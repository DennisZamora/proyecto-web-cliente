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
