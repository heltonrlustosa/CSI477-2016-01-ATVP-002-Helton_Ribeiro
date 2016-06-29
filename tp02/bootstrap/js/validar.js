

$(document).ready(function() {
    console.log("Documento pronto!");

    $("#cadastrar").validate({
        rules: {
            nome: {
                required: true,
                minlength: 10
            },

            login: {
                required: true,
                
            },
           
            senha: {
                required: true,
                passowrd: true,
                minlength: 4

            },
            
          

        },


        messages: {
            nome: {
                required: "Informe o nome corretamente.",
            },
            login: {
                equalTo: "Informe um login!",
            },
            senha: {
                equalTo: "Senha pequena!"
            }
           


        },
        // Comandos abaixo necessários para funcionar com o bootstrap.
        highlight: function(element) {
            $(element).closest('.control-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.control-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if (element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        },

        submitHandler: function(form) {
            form.submit();
        }

    });

    


});

