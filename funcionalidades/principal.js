$(document).ready(function () {
  $("#id-categoria").change(function () {
    var categoriaId = $(this).val();
    console.log("aqui");

    $.ajax({
      url: "getCategoria.php",
      type: "POST",
      data: { categoriaId: categoriaId },
      success: function (data) {
        $("#container-blog").html(data);
      },
    });
  });
});
