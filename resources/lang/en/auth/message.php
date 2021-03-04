<?php
/**
* Language file for auth error messages
*
*/

return array(

    'account_already_exists' => 'Ya existe una cuenta con este correo electrónico.',
    'account_not_found' => 'El correo electrónico o la contraseña son incorrectos.',
    'account_email_not_found' =>'El correo electrónico es incorrecto',
    'account_not_activated'  => 'Esta cuenta de usuario no esta activada',
    'account_suspended'      => 'Cuenta de usuario suspendida debido a demasiados intentos de inicio de sesión. Intenta de nuevo después de [:delay] segundos',
    'account_banned'         => 'Este Usuario esta Baneado.',

    'signin' => array(
        'error'   => 'Hubo un problema al intentar iniciar sesión, por favor intente de nuevo.',
        'success' => 'Inicio de sesión con éxito.',
    ),

    'login' => array(
        'error'   => 'Hubo un problema al intentar iniciar sesión, por favor intente de nuevo.',
        'success' => 'Inicio de sesión con éxito.',
    ),

    'signup' => array(
        'error'   => 'Hubo un problema al intentar crear su cuenta, intente de nuevo.',
        'success' => 'Cuenta exitosamente creada. Revise su correo para activar su cuenta.',
    ),

        'forgot-password' => array(
            'error'   => 'Hubo un problema al intentar obtener un código de contraseña de restablecimiento, por favor intente de nuevo.',
            'success' => 'El correo electrónico de recuperación de contraseña se envió correctamente.',
        ),

        'forgot-password-confirm' => array(
            'error'   => 'Hubo un problema al intentar restablecer su contraseña. Inténtelo de nuevo.',
            'success' => 'Su contraseña ha sido restablecida exitosamente.',
        ),

    'activate' => array(
        'error'   => 'Hubo un problema al intentar activar su cuenta, intente de nuevo.',
        'success' => 'Su cuenta ha sido activada exitosamente.',
    ),

    'contact' => array(
        'error'   => 'Hubo un problema al intentar enviar el formulario de contacto, intente de nuevo.',
        'success' => 'Su información de contacto ha sido enviada exitosamente.',
    ),
);
