$(document).ready(function () {
    $("input[type='checkbox']").iCheck({
        checkboxClass: 'icheckbox_minimal-blue'
    });


    $(".omb_loginForm").bootstrapValidator({
        fields: {
            email: {
                validators: {
                    notEmpty: {
                        message: 'El campo de Correo es requerido'
                    },
                    emailAddress: {
                        message: 'No es una dirección de correo electrónico válida'
                    }
                }
            },
            password: {
                validators: {
                    notEmpty: {
                        message: 'Password is required'
                    },
                    different: {
                        field: 'first_name,last_name',
                        message: 'Password should not match user Name'
                    }
                }
            }
        }
    });
});
