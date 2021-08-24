$(document).ready(function () {
    cargaUsuarios();
    cargaCategorias();

    $("#btSubir").click(function () {
        var titulo = $.trim($("#tituloBlog").val());
        var blog = $.trim($("#blog").val());
        var usuario = $.trim($("#idUsuario").val());
        var categoria = $.trim($("#idCategoria").val());

        if (titulo === "" || blog === "" || usuario === "" || categoria === "") {
            Swal.fire({
                title: "Datos estan vacios",
                text: "Ingrese los datos correctamente",
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
        } else {
            ingresaBlog($("#tituloBlog").val(), $("#blog").val(), $("#idUsuario").val(),
            $("#idCategoria").val());
        }   
    });
});


function cargaUsuarios() {
    try {
        $.ajax({
            url: 'getUsuario.php'
        })
            .done(function (data) {
                LlenaUsuarioJson(data);
            });
    } catch (err) {
        alert(err);
    }
}


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

function LlenaUsuarioJson(TextoJSON) {
    var elValor;
    var elHTML;
    var ObjetoJSON = JSON.parse(TextoJSON);
    for (i = 0; i < ObjetoJSON.length; i++) {
        elValor = ObjetoJSON[i].idUsuario;
        elHTML = ObjetoJSON[i].username;
        $('#idUsuario').append($('<option></option>').val(elValor).html(elHTML));
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
                    InsercionBlogExitosa(r);
                    window.location.replace("principal.php");
                },
                error: function (r) {
                    InsercionBlogFallida();
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

}

function InsercionBlogFallida() {
    Swal.fire({
        title: "Ingreso fallido",
        text: "Los datos no se ingresaron correctamente",
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
}
