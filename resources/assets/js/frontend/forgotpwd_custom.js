$(".omb_loginForm").bootstrapValidator({
    fields: {
        email: {
            validators: {
                notEmpty: {
                    message: 'El campo de email es requerido'
                },
                emailAddress: {
                    message: 'No es una dirección de correo electrónico válida'
                }
            }
        }
    }
});
$(function() {
    setTimeout(function () {
        $("#notific").remove();
    }, 5000);
});
