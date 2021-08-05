$("#login").submit(function(e){
 
    var usuario = $.trim($("#username").val());
    var password =$.trim($("#password").val());
    
    if (usuario.length == "" || password.length == "") {
        
        Swal.fire({
            title: "Login error",
            text: "Please try again",
            icon: 'error',
            width: '25%',
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
            width: '25%',
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
    
    if (name.length == "" || last_name.length == "" || username.length == "" ||
    email.length == "" || password.length == "") {
        
        Swal.fire({
            title: "Error creating an account",
            text: "Please try again",
            icon: 'error',
            width: '25%',
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
            width: '25%',
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






