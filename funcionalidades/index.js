$(document).ready(function () {

    cargaCategorias();

    $("#btSubir").click(function () {
        ingresaBlog($("#tituloBlog").val(), $("#blog").val(), $("#nombreUsuario").val(), 
        $("#idCategoria").val());
    });

});

function cargaCategorias() {
    try {
        $.ajax({
            url: 'getCategorias.php'
        })
            .done(function (data) {
                LlenaCategoriasJson(data);
            });
    } catch (err) {
        alert(err);
    }
}

function LlenaCategoriasJson(TextoJSON) {
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON);
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].idCategoria;
        elHTML = ObjetoJSON[i].nombreCategoria;
        $('#idCategoria').append($('<option></option>').val(elValor).html(elHTML));
    }
}

function ingresaBlog(ptituloBlog, pcontenidoBlog, pidUsuario, pidCategoria) {
    try {
        $.ajax(
            {
                data: {
                    tituloBlog: ptituloBlog,
                    contenidoBlog: pcontenidoBlog,
                    idUsuario: pidUsuario,
                    idCategoria: pidCategoria,
                },
                url: 'insertaBlog.php',
                type: 'POST',
                dataType: 'json',
                success: function (r) {
                    InsercionTutoriaExitosa(r);
                    header("location: principal.php");
                    //window.location.replace('principal.php');

                },
                error: function (r) {
                    InsercionTutoriaFallida(r);
                }
            });
    } catch (err) {
        alert(err);
    }
}

function InsercionBlogExitosa(TextoJSON) {

    Swal.fire({
        title: "Ingreso exitoso",
        text: TextoJSON,
        icon: 'success',
        width: '40%',
        padding: '2%',
        backdrop: 'true',
        timerProgressBar: true,
        allowOutsideClick: true,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: false
    });
    e.preventDefault();
}

function InsercionBlogFallida(TextoJSON) {
    Swal.fire({
        title: "Ingreso fallido",
        text: TextoJSON,
        icon: 'error',
        width: '40%',
        padding: '2%',
        backdrop: 'true',
        timerProgressBar: true,
        allowOutsideClick: true,
        allowEscapeKey: false,
        allowEnterKey: false,
        stopKeydownPropagation: false
    });
    e.preventDefault();
}
