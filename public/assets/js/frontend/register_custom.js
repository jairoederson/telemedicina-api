$(document).ready(function(){
    $("input[type='checkbox'],input[type='radio']").iCheck({
        checkboxClass: 'icheckbox_minimal-green',
        radioClass: 'iradio_minimal-green'
    });

$("#reg_form").bootstrapValidator({
    fields: {
        first_name: {
            validators: {
                notEmpty: {
                    message: 'Campo de nombre es requerido'
                }
            },
            required: true,
            minlength: 3
        },
        last_name: {
            validators: {
                notEmpty: {
                    message: 'Campo de Apellido es requerido'
                }
            },
            required: true,
            minlength: 3
        },
        dni: {
            validators: {
                notEmpty: {
                    message: 'Campo de DNI es requerido'
                },
                integer: {
                  message: 'Por favor ingrese un numero valido'
                },
                regexp: {
                  message: 'Por favor ingrese un valor que coincida con el patrón'
                },
                stringLength: {
                  message: 'Por favor no ingrese mas de 8 caracteres'
                }
            },
            required: true,
            minlength: 8
        },
        number: {
            validators: {
                notEmpty: {
                    message: 'Campo de numero es requerido'
                }
            },
            required: true,
            minlength: 9
        },
        email: {
            validators: {
                notEmpty: {
                    message: 'Campo de email es requerido'
                },
                regexp: {
                    regexp: /^(\w+)([\-+.\'0-9A-Za-z_]+)*@(\w[\-\w]*\.){1,5}([A-Za-z]){2,6}$/,
                    message: 'El campo email no es válido'
                }
            }
        },
        password: {
            validators: {
                notEmpty: {
                    message: 'Campo de contraseña requerido'
                },
                different: {
                    field: 'first_name,last_name',
                    message: 'La contraseña no debe coincidir con el nombre / apellido'
                }
            }
        },
        password_confirm: {
            validators: {
                notEmpty: {
                    message: 'Campo de confirmar contraseña requerido'
                },
                identical: {
                    field: 'password'
                },
                different: {
                    field: 'first_name,last_name',
                    message: 'Debe coincidir con la contraseña'
                }
            }
        }
    }
});
});

$('#reg_form input').on('keyup', function (){

    $('#reg_form input').each(function(){
        var pswd = $("#reg_form input[name='password']").val();
        var pswd_cnf = $("#reg_form input[name='password_confirm']").val();
            if(pswd != '' ){
                $('#reg_form').bootstrapValidator('revalidateField', 'password');
            }
            if(pswd_cnf != '' ){
                $('#reg_form').bootstrapValidator('revalidateField', 'password_confirm');
            }
    });
});
