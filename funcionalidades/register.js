$('#registro').click(function(){
    var wait = 2000;
    $.ajax({
        url: 'valiRegister.php',
        beforeSend : function(){
            $('#contendio').text("Cargando");
        },
        success : function(data){
            setTimeout(function(){
                $('#contenido').html(data);
            },wait
            );      
        }
    });
});