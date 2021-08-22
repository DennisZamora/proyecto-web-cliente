$("#login").submit(function(e){
 
    var usuario = $.trim($("#username").val());
    var password =$.trim($("#password").val());
    
    if (usuario.length == "" || password.length == "") {
        
        Swal.fire({
            title: "Login error",
            text: "Please try again",
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
    } else {
        Swal.fire({
            title: "Login successfully",
            text: "Welcome to the blog",
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
});

$("#register").submit(function(e){
    var name = $.trim($("#name").val());
    var last_name = $.trim($("#last_name").val());
    var username = $.trim($("#username").val());
    var email = $.trim($("#email").val());
    var password =$.trim($("#password").val());
     
    // let xhr = new XMLHttpRequest();
    // xhr.open('POST', '../valiRegister.php',true);
    // xhr.onload = function (){
    //     let respuesta = JSON.parse(xhr.responseText);
    //     console.log(respuesta);
    //     if (respuesta.respuesta === false){
    //         Swal.fire({
    //             title: "Error creating an account",
    //             text: "Please try again",
    //             icon: 'warning',
    //             width: '40%',
    //             padding: '2%',
    //             backdrop: 'true',
    //             timerProgressBar: true,
    //             allowOutsideClick: true,
    //             allowEscapeKey: false,
    //             allowEnterKey: false,
    //             stopKeydownPropagation: false
    //         });
    //         e.preventDefault();
    //     }
    // }
    
    
    if (name.length == "" || last_name.length == "" || username.length == "" ||
    email.length == "" || password.length == "") { 
        Swal.fire({
            title: "Error creating an account",
            text: "Please try again",
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
    } else {
        Swal.fire({
            title: "Successfully registered ",
            text: "The account was created successfully ",
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
});






