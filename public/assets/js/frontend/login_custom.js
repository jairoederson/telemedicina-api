$(document).ready(function () {
    $("input[type='checkbox']").iCheck({
        checkboxClass: 'icheckbox_minimal-green'
    });


    $(".omb_loginForm").bootstrapValidator({
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'El Campo de Correo es requerido'
                    },
                    emailAddress: {
                        message: 'No es una dirección de correo electrónico válida'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Campo de password requerido'
                    },
                    different: {
                        field: 'first_name,last_name',
                        message: 'La contraseña no debe coincidir con Nombre de usuario'
                    }
                }
            }
        }
    });
});
