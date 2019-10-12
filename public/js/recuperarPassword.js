$(function(){//Código JQUERY:

    $('#form-recuperar-password').submit(function(e){//Función para guardar los datos de los inputs y mandar la solicitud a php
        e.preventDefault();//Evita que el navegador se refresque
        const postData = {//Objeto con clave valor de los datos recibidos desde el formulario
            correo: $('#correo').val()
        };
        let url = '../alumnos/recuperarPassword_back.php';//Url al archivo de php que haremos el insert
        $.post(url, postData, function(response){//Método POST de Jquery para mandar los datos y la url
            console.log(response);
            if(response==1){
                $('#response-password').html("<p>Se ha envido la contraseña a tu correo.</p>");
                $('#response-password').addClass('exito');
            }else{
                 $('#response-password').html("<p>Ese correo no esta registrado.</p>");
                 $('#response-password').removeClass('exito'); 
                 $('#response-password').addClass('error');   
            }

            
        });
        
    });
});