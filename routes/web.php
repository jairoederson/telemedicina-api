<?php

use Culqi\Resource;
use App\Events\SendVideoCall;

include_once 'web_builder.php';
//require __DIR__ . '/vendor/autoload.php';
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::pattern('slug', '[a-z0-9- _]+');
//prueba twilio api
Route::get('sendsms', 'SmsController@sendSms');

Route::get('/sendSocketPrueba', function (Request $request) {
    $mensaje = "pruebaSocket";
    event(new SendVideoCall($mensaje));
    return response()->json(['status'=>'success', 'data'=>$mensaje]);
});

// LOGIN SOCIAL NETWORK
Route::get('/google/redirect/{provider}', 'Auth\LoginSocialController@redirectToGoogleProvider');
Route::get('/google/callback/{provider}', 'Auth\LoginSocialController@handleProviderGoogleCallback');

Route::get('/login/facebook', 'Auth\LoginSocialController@redirectToFacebookProvider');
Route::get('login/facebook/callback', 'Auth\LoginSocialController@handleProviderFacebookCallback');
Route::get('/redirect/{provider}', 'User\SocialAuthFacebookController@redirect');
Route::get('/callback/{provider}', 'User\SocialAuthFacebookController@callback');
Route::group(['prefix' => 'admin', 'namespace'=>'Admin'], function () {

    # Error pages should be shown without requiring login
    Route::get('404', function () {
        return view('admin/404');
    });
    Route::get('500', function () {
        return view('admin/500');
    });
    # Lock screen
    Route::get('{id}/lockscreen', 'UsersController@lockscreen')->name('lockscreen');
    Route::post('{id}/lockscreen', 'UsersController@postLockscreen')->name('lockscreen');
    # All basic routes defined here
    Route::get('login', 'AuthController@getSignin')->name('login');
    Route::get('signin', 'AuthController@getSignin')->name('signin');
    Route::post('signin', 'AuthController@postSignin')->name('postSignin');
    Route::post('signup', 'AuthController@postSignup')->name('admin.signup');
    Route::post('forgot-password', 'AuthController@postForgotPassword')->name('forgot-password');
    Route::get('login2', function () {
        return view('admin/login2');
    });


    # Register2
    Route::get('register2', function () {
        return view('admin/register2');
    });
    Route::post('register2', 'AuthController@postRegister2')->name('register2');

    # Forgot Password Confirmation
    Route::get('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm')->name('forgot-password-confirm');
    Route::post('forgot-password/{userId}/{passwordResetCode}', 'AuthController@getForgotPasswordConfirm');

    # Logout
    Route::get('logout', 'AuthController@getLogout')->name('logout');

    # Account Activation
    Route::get('activate/{userId}/{activationCode}', 'AuthController@getActivate')->name('activate');
});


Route::group(['prefix' => 'admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {
    # GUI Crud Generator

    Route::get('medico','Admin\MedicoController@index');
    Route::post('listarmedicos','Admin\MedicoController@listarMedicos');
    Route::post('eliminarmedicos','Admin\MedicoController@eliminarMedicos');
    Route::post('obtenermedico','Admin\MedicoController@obtenerMedicos');
    Route::get('vermedicos/{idusuario}','Admin\MedicoController@verMedico');
    Route::post('agregarnotamedico','Admin\MedicoController@agregarNotaMedicos');
    Route::post('obtenerpagosmedico','Admin\MedicoController@obtenerPagosMedico');
    Route::post('planpagosmedico','Admin\MedicoController@GenerarPlanPagosMedico');
    Route::post('registropagosmedico','Admin\MedicoController@RegistroPagosMedico');
    Route::post('eliminarpagosmedico','Admin\MedicoController@eliminarPagosMedico');
    Route::post('actualizardatospromedico','Admin\MedicoController@actualizarDatosProMedico');
    Route::post('registroexperienciamedico','Admin\MedicoController@RegistroExperienciaMedico');
    Route::post('registroformacionmedico','Admin\MedicoController@RegistroFormacionMedico');
    Route::post('obtenerformacionmedico','Admin\MedicoController@obtenerFormacionMedico');
    Route::post('obtenerexperienciamedico','Admin\MedicoController@obtenerExperienciaMedico');
    Route::post('eliminarexperienciamedico','Admin\MedicoController@eliminarExperienciaMedico');
    Route::post('eliminarformacionmedico','Admin\MedicoController@eliminarFormacionMedico');

    Route::get('registrousuario','Admin\RegistroUsuarioController@index');
    Route::post('registrarUsuario','Admin\RegistroUsuarioController@registrarUsuario');

    Route::post('listardepartamentos','Admin\UbigeoController@listarDepartamentos');
    Route::post('listarprovincia','Admin\UbigeoController@listarProvincia');
    Route::post('listardistrito','Admin\UbigeoController@listarDistrito');
    Route::post('obtenerubigeo','Admin\UbigeoController@obtenerUbigeo');

    Route::post('listartipodocumento','Admin\UsuarioController@listarTipoDocumento');
    Route::get('usuario/{idusuario}','Admin\UsuarioController@index');
    Route::post('listarusuario','Admin\UsuarioController@listarUsuario');
    Route::get('actualizarusuario/{idusuario}','Admin\UsuarioController@actualizarUsuario');
    Route::post('obtenerusuario','Admin\UsuarioController@obtenerUsuario');
    Route::post('modificarusuario','Admin\UsuarioController@modificarUsuario');

    Route::get('paciente','Admin\PacienteController@index');
    Route::post('listarpacientes','Admin\PacienteController@listarPacientes');
    Route::post('eliminarpaciente','Admin\PacienteController@eliminarPacientes');
    Route::post('obtenerpaciente','Admin\PacienteController@obtenerPacientes');
    Route::get('verpaciente/{idusuario}','Admin\PacienteController@verPacientes');
    Route::post('agregarnotapaciente','Admin\PacienteController@agregarNotaPacientes');

    Route::get('asociado','Admin\AsociadoController@index');
    Route::post('listarasociado','Admin\AsociadoController@listarAsociados');
    Route::get('registroasociado','Admin\AsociadoController@registroAsociados');
    Route::post('registrarasociado','Admin\AsociadoController@registrarAsociado');
    Route::get('verasociado/{idasociado}','Admin\AsociadoController@verAsociado');
    Route::post('subirimagen/{idasociado}', 'Admin\AsociadoController@store');
    Route::post('obtenerasociado','Admin\AsociadoController@obtenerAsociado');
    Route::post('obtenerpagosasociado','Admin\AsociadoController@obtenerPagosAsociado');
    Route::post('planpagosasociado','Admin\AsociadoController@GenerarPlanPagosAsociado');
    Route::post('registropagosasociado','Admin\AsociadoController@RegistroPagosAsociado');
    Route::post('eliminarpagosasociado','Admin\AsociadoController@eliminarPagosAsociado');
    
    
    
    
    Route::get('especialidad','Admin\EspecialidadController@index');
    Route::post('listarespecialidad','Admin\EspecialidadController@listarEspecialidades');
    Route::get('actualizarespecialidad/{idespecialidad}','Admin\EspecialidadController@actualizarEspecialidad');
    Route::post('eliminarespecialidad','Admin\EspecialidadController@eliminarEspecialidad');
    Route::post('modificarespecialidad','Admin\EspecialidadController@modificarEspecialidad');
    Route::post('obtenerespecialidad','Admin\EspecialidadController@obtenerEspecialidad');
    Route::post('obtenerespecialidadmedico','Admin\EspecialidadController@obtenerEspecialidadMedico');
    Route::post('eliminarespecialidadmedico','Admin\EspecialidadController@eliminarEspecialidadMedico');
    Route::post('agregarespecialidadmedico','Admin\EspecialidadController@agregarEspecialidadMedico');


    Route::post('agregarnotaasociado','Admin\AsociadoController@agregarNota');
    Route::post('listarafiliados','Admin\AsociadoController@listarAfiliados');
    Route::post('registrarafiliado','Admin\AsociadoController@registrarAfiliado');
    Route::post('eliminarasociado','Admin\AsociadoController@eliminarAsociado');
    Route::get('actualizarasociado/{idasociado}','Admin\AsociadoController@actualizarAsociado');

    Route::get('consultas','Admin\ConsultaController@index')->name('consultas');
    Route::post('listarconsultas','Admin\ConsultaController@listarConsultas');
    Route::post('listarconsultascanceladas','Admin\ConsultaController@listarConsultasCanceladas');
    Route::post('listarconsultasatendidas','Admin\ConsultaController@listarConsultasAtendidas');

    Route::post('actualizarconsultasatendidas','Admin\ConsultaController@ActualizarConsultasAtendidas');
    Route::post('actualizarconsultascanceladas','Admin\ConsultaController@CancelarConsultas');
    Route::post('actualizarconsultaspagos','Admin\ConsultaController@ActualizarPagos');

    Route::post('obtenerconsultas','Admin\ConsultaController@obtenerConsultas');
    Route::post('obtenerreprogramaciones','Admin\ConsultaController@obtenerReprogramacion');

    Route::get('verconsulta/{idconsulta}','Admin\ConsultaController@verConsulta');
    Route::get('reprogramarconsulta/{idconsulta}','Admin\ConsultaController@ReprogramarConsulta');
    Route::post('reprogramacion','Admin\ConsultaController@Reprogramacion');

    Route::get('verreceta/{idconsulta}','Admin\ConsultaController@verReceta');
    Route::post('agregarnotaconsulta','Admin\ConsultaController@agregarNota');
    Route::post('listarrecetas','Admin\ConsultaController@listarRecetas');

    Route::get('laboratorios','Admin\LaboratorioController@index');
    Route::post('listarlaboratorios','Admin\LaboratorioController@listarLaboratorios');
    //Route::get('laboratoriosreg','Admin\LaboratorioController@verLaboratoriosReg');
    Route::get('laboratoriosact/{idlaboratorio}','Admin\LaboratorioController@actualizarLaboratorio');
    Route::get('laboratoriosimagen/{idlaboratorio}','Admin\LaboratorioController@verLaboratorio');
    Route::post('subirimagenlaboratorio/{idlaboratorio}', 'Admin\LaboratorioController@store');
    Route::post('listarusuarios','Admin\LaboratorioController@listarUsuarios');
    Route::post('registrarLaboratorio','Admin\LaboratorioController@registrarLaboratorio');
    Route::post('obtenerlaboratorio','Admin\LaboratorioController@obtenerLaboratorio');
    Route::post('eliminarlaboratorio','Admin\LaboratorioController@eliminarLaboratorio');

    Route::get('configuracion','Admin\ConfiguracionController@index');
    Route::post('obtenerconfiguracion','Admin\ConfiguracionController@obtenerConfiguracion');
    Route::post('actualizarconfiguracion','Admin\ConfiguracionController@actualizarConfiguracion');

    Route::get('log','Admin\LogController@index');
    Route::post('listarlog','Admin\LogController@listarLog');

    Route::post('obtenerdatosresumen','Admin\DashboardController@listarDatos');

    Route::get('pagosmedico','Admin\PagoController@index');
    Route::post('listarpagosmedicoshistorial','Admin\PagoController@listarPagosMedicosHistorial');

    Route::get('liquidaciones','Admin\LiquidacionController@index')->name('liquidaciones.index');
    Route::post('listarpagosasociadoshistorial','Admin\LiquidacionController@listarPagosAsociadosHistorial');

    Route::get('categoriapregunta','Admin\CategoriaPreguntaController@index');
    Route::get('categoria_preguntareg','Admin\CategoriaPreguntaController@create');
    Route::post('listarcategoriapregunta','Admin\CategoriaPreguntaController@listarCategorias');
    Route::get('categoria_preguntaact/{idcategoria}','Admin\CategoriaPreguntaController@actualizarCategoria');
    Route::post('registrarcategoria','Admin\CategoriaPreguntaController@registrarCategoria');
    Route::post('obtenercategoria','Admin\CategoriaPreguntaController@obtenerCategoria');
    Route::post('eliminarcategoria','Admin\CategoriaPreguntaController@eliminarCategoria');

    Route::resource('subcategoriapregunta', 'Question\SubcategoryQuestionController');
    Route::post('listarsubcategoriapregunta','Question\SubcategoryQuestionController@listarCategorias');
    Route::post('eliminarsubcategoria','Question\SubcategoryQuestionController@eliminarCategoria');
    Route::post('registrarsubcategoria','Question\SubcategoryQuestionController@registrarsubCategoria');

    Route::get('pregunta','Admin\PreguntaController@index');
    Route::post('listarpregunta','Admin\PreguntaController@listarPreguntas');
    Route::get('preguntaact/{idpregunta}','Admin\PreguntaController@actualizarPregunta');
    Route::post('registrarpregunta','Admin\PreguntaController@registrarPregunta');
    Route::post('obtenerpregunta','Admin\PreguntaController@obtenerPregunta');
    Route::post('eliminarpregunta','Admin\PreguntaController@eliminarPregunta');
    
    Route::get('registrarespecialidad','Admin\RegistroEspecialidadController@index');
    Route::post('registroEspecialidad','Admin\RegistroEspecialidadController@registroEspecialidad');

    //Route::get('detallepagosempresa','PagosController@index');
    Route::get('verpostulante','PagosController@verpostulante');

    Route::get('demo','UsuarioController@index3');
    Route::get('generator_builder', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@builder')->name('generator_builder');
    Route::get('field_template', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@fieldTemplate');
    Route::post('generator_builder/generate', '\InfyOm\GeneratorBuilder\Controllers\GeneratorBuilderController@generate');
    // Model checking
    Route::post('modelCheck', 'ModelcheckController@modelCheck');

    # Dashboard / Index
    Route::get('/', 'JoshController@showHome')->name('dashboard');
    # crop demo
    Route::post('crop_demo', 'JoshController@crop_demo')->name('crop_demo');
    //Log viewer routes
    Route::get('log_viewers', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@index')->name('log-viewers');
    Route::get('log_viewers/logs', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@listLogs')->name('log_viewers.logs');
    Route::delete('log_viewers/logs/delete', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@delete')->name('log_viewers.logs.delete');
    Route::get('log_viewers/logs/{date}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@show')->name('log_viewers.logs.show');
    Route::get('log_viewers/logs/{date}/download', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@download')->name('log_viewers.logs.download');
    Route::get('log_viewers/logs/{date}/{level}', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@showByLevel')->name('log_viewers.logs.filter');
    Route::get('log_viewers/logs/{date}/{level}/search', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@search')->name('log_viewers.logs.search');
    Route::get('log_viewers/logcheck', '\Arcanedev\LogViewer\Http\Controllers\LogViewerController@logCheck')->name('log-viewers.logcheck');
    //end Log viewer
    # Activity log
    Route::get('activity_log/data', 'JoshController@activityLogData')->name('activity_log.data');
//    Route::get('/', 'JoshController@index')->name('index');

    //SINTOMA
    Route::post('listarenfermedad', 'Doctor\SymptomController@listarEnfermedad');
    Route::get('sintomas', 'Doctor\SymptomController@index');
    Route::post('listarsintoma', 'Doctor\SymptomController@listarSintoma');
    Route::get('registrosintoma', 'Doctor\SymptomController@registroSintoma');
    Route::post('registrarSintoma', 'Doctor\SymptomController@registrarSintoma');
    Route::get('actualizarsintoma/{idsintoma}', 'Doctor\SymptomController@actualizarSintoma');
    Route::post('obtenersintoma', 'Doctor\SymptomController@obtenerSintoma');
    Route::post('modificarsintoma', 'Doctor\SymptomController@modificarSintoma');
    Route::post('eliminarsintomas', 'Doctor\SymptomController@eliminarSintomas');

    //HISTORIAL MEDICO
    Route::get('registroprenatal', 'HistorialMedico\HistorialMedicoController@registroPreNatal');
    Route::post('registrarprenatal', 'HistorialMedico\HistorialMedicoController@registrarPreNatal');
    Route::post('listarprenatal', 'HistorialMedico\HistorialMedicoController@listarPreNatal');
    Route::get('prenatal', 'HistorialMedico\HistorialMedicoController@indexPreNatal');
    Route::get('actualizarprenatal/{idprenatal}', 'HistorialMedico\HistorialMedicoController@actualizarPreNatal');
    Route::post('obtenerprenatal', 'HistorialMedico\HistorialMedicoController@obtenerPreNatal');
    Route::post('modificarprenatal', 'HistorialMedico\HistorialMedicoController@modificarPreNatal');

    Route::get('registronacimiento', 'HistorialMedico\HistorialMedicoController@registroNacimiento');
    Route::post('registrarnacimiento', 'HistorialMedico\HistorialMedicoController@registrarNacimiento');
    Route::post('listarnacimiento', 'HistorialMedico\HistorialMedicoController@listarNacimiento');
    Route::get('nacimiento', 'HistorialMedico\HistorialMedicoController@indexNacimiento');
    Route::get('actualizarnacimiento/{idnacimiento}', 'HistorialMedico\HistorialMedicoController@actualizarNacimiento');
  Route::post('obtenernacimiento', 'HistorialMedico\HistorialMedicoController@obtenerNacimiento');
    Route::post('modificarrnacimiento', 'HistorialMedico\HistorialMedicoController@modificarNacimiento');

    Route::get('registroinmunisaciones', 'HistorialMedico\HistorialMedicoController@registroInmunisaciones');
    Route::post('registrarinmunisaciones', 'HistorialMedico\HistorialMedicoController@registrarInmunisaciones');
    Route::post('listarinmunisaciones', 'HistorialMedico\HistorialMedicoController@listarInmunisaciones');
    Route::get('inmunisaciones', 'HistorialMedico\HistorialMedicoController@indexInmunisaciones');;
    Route::get('actualizarinmunisaciones/{idinmunisaciones}', 'HistorialMedico\HistorialMedicoController@actualizarInmunisaciones');
  Route::post('obtenerinmunisaciones', 'HistorialMedico\HistorialMedicoController@obtenerInmunisaciones');
    Route::post('modificarinmunisaciones', 'HistorialMedico\HistorialMedicoController@modificarInmunisaciones');

    Route::get('registrohabitos', 'HistorialMedico\HistorialMedicoController@registroHabitos');
    Route::post('registrarhabitos', 'HistorialMedico\HistorialMedicoController@registrarHabitos');
    Route::post('listarhabitos', 'HistorialMedico\HistorialMedicoController@listarHabitos');
    Route::get('habitos', 'HistorialMedico\HistorialMedicoController@indexHabitos');
    Route::get('actualizarhabitos/{idhabitos}', 'HistorialMedico\HistorialMedicoController@actualizarHabitos');
  Route::post('obtenerhabitos', 'HistorialMedico\HistorialMedicoController@obtenerHabitos');
    Route::post('modificarhabitos', 'HistorialMedico\HistorialMedicoController@modificarHabitos');

    Route::get('registroapetitos', 'HistorialMedico\HistorialMedicoController@registroApetitos');
    Route::post('registrarapetitos', 'HistorialMedico\HistorialMedicoController@registrarApetitos');
    Route::post('listarapetitos', 'HistorialMedico\HistorialMedicoController@listarApetitos');
    Route::get('apetitos', 'HistorialMedico\HistorialMedicoController@indexApetitos');
    Route::get('actualizarapetitos/{idapetitos}', 'HistorialMedico\HistorialMedicoController@actualizarApetitos');
  Route::post('obtenerapetitos', 'HistorialMedico\HistorialMedicoController@obtenerApetitos');
    Route::post('modificarapetitos', 'HistorialMedico\HistorialMedicoController@modificarApetitos');

    Route::get('registroorinas', 'HistorialMedico\HistorialMedicoController@registroOrinas');
    Route::post('registrarorinas', 'HistorialMedico\HistorialMedicoController@registrarOrinas');
    Route::post('listarorinas', 'HistorialMedico\HistorialMedicoController@listarOrinas');
    Route::get('orinas', 'HistorialMedico\HistorialMedicoController@indexOrinas');
    Route::get('actualizarorinas/{idorinas}', 'HistorialMedico\HistorialMedicoController@actualizarOrinas');
  Route::post('obtenerorinas', 'HistorialMedico\HistorialMedicoController@obtenerOrinas');
    Route::post('modificarorinas', 'HistorialMedico\HistorialMedicoController@modificarOrinas');

    Route::get('registrosuenos', 'HistorialMedico\HistorialMedicoController@registroSuenos');
    Route::post('registrarsuenos', 'HistorialMedico\HistorialMedicoController@registrarSuenos');
    Route::post('listarsuenos', 'HistorialMedico\HistorialMedicoController@listarSuenos');
    Route::get('suenos', 'HistorialMedico\HistorialMedicoController@indexSuenos');
    Route::get('actualizarsuenos/{idsuenos}', 'HistorialMedico\HistorialMedicoController@actualizarSuenos');
  Route::post('obtenersuenos', 'HistorialMedico\HistorialMedicoController@obtenerSuenos');
    Route::post('modificarsuenos', 'HistorialMedico\HistorialMedicoController@modificarSuenos');

    Route::get('registrodeposiciones', 'HistorialMedico\HistorialMedicoController@registroDeposiciones');
    Route::post('registrardeposiciones', 'HistorialMedico\HistorialMedicoController@registrarDeposiciones');
    Route::post('listardeposiciones', 'HistorialMedico\HistorialMedicoController@listarDeposiciones');
    Route::get('deposiciones', 'HistorialMedico\HistorialMedicoController@indexDeposiciones');
    Route::get('actualizardeposiciones/{iddeposiciones}', 'HistorialMedico\HistorialMedicoController@actualizarDeposiciones');
  Route::post('obtenerdeposiciones', 'HistorialMedico\HistorialMedicoController@obtenerDeposiciones');
    Route::post('modificardeposiciones', 'HistorialMedico\HistorialMedicoController@modificarDeposiciones');

        Route::get('registrosed', 'HistorialMedico\HistorialMedicoController@registroSed');
    Route::post('registrarsed', 'HistorialMedico\HistorialMedicoController@registrarSed');
    Route::post('listarsed', 'HistorialMedico\HistorialMedicoController@listarSed');
    Route::get('sed', 'HistorialMedico\HistorialMedicoController@indexSed');
    Route::get('actualizarsed/{idsed}', 'HistorialMedico\HistorialMedicoController@actualizarSed');
  Route::post('obtenersed', 'HistorialMedico\HistorialMedicoController@obtenerSed');
    Route::post('modificarsed', 'HistorialMedico\HistorialMedicoController@modificarSed');


});

Route::group(['prefix' => 'admin','namespace'=>'Admin', 'middleware' => 'admin', 'as' => 'admin.'], function () {

    # User Management
    Route::group([ 'prefix' => 'users'], function () {
        Route::get('data', 'UsersController@data')->name('users.data');
        Route::get('{user}/delete', 'UsersController@destroy')->name('users.delete');
        Route::get('{user}/confirm-delete', 'UsersController@getModalDelete')->name('users.confirm-delete');
        Route::get('{user}/restore', 'UsersController@getRestore')->name('restore.user');
//        Route::post('{user}/passwordreset', 'UsersController@passwordreset')->name('passwordreset');
        Route::post('passwordreset', 'UsersController@passwordreset')->name('passwordreset');

    });
    Route::resource('users', 'UsersController');

    Route::get('deleted_users',['before' => 'Sentinel', 'uses' => 'UsersController@getDeletedUsers'])->name('deleted_users');

    # Group Management
    Route::group(['prefix' => 'groups'], function () {
        Route::get('{group}/delete', 'GroupsController@destroy')->name('groups.delete');
        Route::get('{group}/confirm-delete', 'GroupsController@getModalDelete')->name('groups.confirm-delete');
        Route::get('{group}/restore', 'GroupsController@getRestore')->name('groups.restore');
    });
    Route::resource('groups', 'GroupsController');

    /*routes for blog*/
    Route::group(['prefix' => 'blog'], function () {
        Route::get('{blog}/delete', 'BlogController@destroy')->name('blog.delete');
        Route::get('{blog}/confirm-delete', 'BlogController@getModalDelete')->name('blog.confirm-delete');
        Route::get('{blog}/restore', 'BlogController@restore')->name('blog.restore');
        Route::post('{blog}/storecomment', 'BlogController@storeComment')->name('storeComment');
    });
    Route::resource('blog', 'BlogController');

    /*routes for blog category*/
    Route::group(['prefix' => 'blogcategory'], function () {
        Route::get('{blogCategory}/delete', 'BlogCategoryController@destroy')->name('blogcategory.delete');
        Route::get('{blogCategory}/confirm-delete', 'BlogCategoryController@getModalDelete')->name('blogcategory.confirm-delete');
        Route::get('{blogCategory}/restore', 'BlogCategoryController@getRestore')->name('blogcategory.restore');
    });
    Route::resource('blogcategory', 'BlogCategoryController');
    /*routes for file*/
    Route::group(['prefix' => 'file'], function () {
        Route::post('create', 'FileController@store')->name('store');
        Route::post('createmulti', 'FileController@postFilesCreate')->name('postFilesCreate');
        Route::delete('delete', 'FileController@delete')->name('delete');
    });

    Route::get('crop_demo', function () {
        return redirect('admin/imagecropping');
    });


    /* laravel example routes */
    #Charts
    Route::get('laravel_chart', 'ChartsController@index')->name('laravel_chart');
    Route::get('database_chart', 'ChartsController@databaseCharts')->name('database_chart');

    # datatables
    Route::get('datatables', 'DataTablesController@index')->name('index');
    Route::get('datatables/data', 'DataTablesController@data')->name('datatables.data');

    # datatables
    Route::get('jtable/index', 'JtableController@index')->name('index');
    Route::post('jtable/store', 'JtableController@store')->name('store');
    Route::post('jtable/update', 'JtableController@update')->name('update');
    Route::post('jtable/delete', 'JtableController@destroy')->name('delete');



    # SelectFilter
    Route::get('selectfilter', 'SelectFilterController@index')->name('selectfilter');
    Route::get('selectfilter/find', 'SelectFilterController@filter')->name('selectfilter.find');
    Route::post('selectfilter/store', 'SelectFilterController@store')->name('selectfilter.store');

    # editable datatables
    Route::get('editable_datatables', 'EditableDataTablesController@index')->name('index');
    Route::get('editable_datatables/data', 'EditableDataTablesController@data')->name('editable_datatables.data');
    Route::post('editable_datatables/create', 'EditableDataTablesController@store')->name('store');
    Route::post('editable_datatables/{id}/update', 'EditableDataTablesController@update')->name('update');
    Route::get('editable_datatables/{id}/delete', 'EditableDataTablesController@destroy')->name('editable_datatables.delete');

//    # custom datatables
    Route::get('custom_datatables', 'CustomDataTablesController@index')->name('index');
    Route::get('custom_datatables/sliderData', 'CustomDataTablesController@sliderData')->name('custom_datatables.sliderData');
    Route::get('custom_datatables/radioData', 'CustomDataTablesController@radioData')->name('custom_datatables.radioData');
    Route::get('custom_datatables/selectData', 'CustomDataTablesController@selectData')->name('custom_datatables.selectData');
    Route::get('custom_datatables/buttonData', 'CustomDataTablesController@buttonData')->name('custom_datatables.buttonData');
    Route::get('custom_datatables/totalData', 'CustomDataTablesController@totalData')->name('custom_datatables.totalData');

    //tasks section
    Route::post('task/create', 'TaskController@store')->name('store');
    Route::get('task/data', 'TaskController@data')->name('data');
    Route::post('task/{task}/edit', 'TaskController@update')->name('update');
    Route::post('task/{task}/delete', 'TaskController@delete')->name('delete');

    //Pagos
    Route::get('pagos-empresa/create', 'PagoController@pagoEmpresa')->name('pagos.empresa.create');
    Route::post('pagos-empresa', 'PagoController@registropagoEmpresa')->name('pagos.empresa.store');
    Route::post('eliminar/liquidacion', 'PagoController@cancelarPagoCompanyAdmin')->name('pagos.empresa.cancelar');
    Route::post('generar/pagos/empresa', 'PagoController@generatePaymentToCompany')->name('pagos.empresa.generar');

    Route::resource('sedes', 'SedeController');
    Route::post('get/videos/query', 'ConsultaController@getVideos');
});



# Remaining pages will be called from below controller method
# in real world scenario, you may be required to define all routes manually
Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function () {
    Route::get('{name?}', 'JoshController@showView');
});

#FrontEndController
Route::get('login', 'FrontEndController@getLogin')->name('login');
Route::post('login', 'FrontEndController@postLogin')->name('login');
Route::get('register', 'FrontEndController@getRegister')->name('register');
Route::post('register','FrontEndController@postRegister')->name('register');
Route::get('activate/{userId}/{activationCode}','FrontEndController@getActivate')->name('activate');
Route::get('forgot-password','FrontEndController@getForgotPassword')->name('forgot-password');
Route::post('forgot-password', 'FrontEndController@postForgotPassword');
Route::get('app/activate/account', function(){
    return view('user.activateapp');
})->name('activate.app');
# Forgot Password Confirmation
Route::post('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@postForgotPasswordConfirm');
Route::get('forgot-password/{userId}/{passwordResetCode}', 'FrontEndController@getForgotPasswordConfirm')->name('forgot-password-confirm');
# My account display and update details
Route::group(['middleware' => 'user'], function () {
    Route::put('my-account', 'FrontEndController@update');
    Route::get('my-account', 'FrontEndController@myAccount')->name('my-account');
    Route::get('home', 'FrontEndController@home')->name('home');
    Route::get('user-pass','FrontEndController@userPass')->name('user-pass');
    Route::get('user-ayuda','FrontEndController@userAyuda')->name('user-ayuda');
    Route::get('user-historial-medico','FrontEndController@UserHistotialMedico')->name('user-historial-medico');
    Route::get('user-chat','FrontEndController@UserChat')->name('user-chat');
    Route::get('user-analisis','FrontEndController@UserAnalisis')->name('user-analisis');
    Route::get('user-califica','FrontEndController@UserCalifica')->name('user-califica');

    // Route::get('/', function(){
    //   return view('index');
    // });
    Route::get('user-edit-creditCard','FrontEndController@userEditCC')->name('user-edit-creditCard');
    Route::get('user-pagos', 'FrontEndController@userPagos')->name('user-pagos');
    Route::get('user-historial', 'FrontEndController@userHistorial')->name('user-historial');
    Route::get('user-consulta', 'FrontEndController@userConsulta')->name('user-consulta');
    Route::get('user-consulta-doctor', 'FrontEndController@userConsultaDoctor')->name('user-consulta-doctor');
    Route::get('user-recetas', 'FrontEndController@userReceta')->name('user-recetas');
    Route::get('user-pagos-credit-card', 'FrontEndController@userPagosCredit')->name('user-pagos-credit-card');
    Route::get('user-pagos-paypal', 'FrontEndController@userPagosPaypal')->name('user-pagos-paypal');

    Route::get('doctor-account', 'FrontEndController@doctorAccount')->name('doctor-account');
    Route::get('doctor-ayuda', 'FrontEndController@doctorAyuda')->name('doctor-ayuda');
    Route::get('doctor-consulta', 'FrontEndController@doctorConsulta')->name('doctor-consulta');
    Route::get('doctor-consulta-perdida', 'FrontEndController@doctorConsultaPerdida')->name('doctor-consulta-perdida');
    Route::get('doctor-ingreso', 'FrontEndController@doctorIngreso')->name('doctor-ingreso');
    Route::get('doctor-pass', 'FrontEndController@doctorPass')->name('doctor-pass');
    Route::get('doctor-historial-medico','FrontEndController@DoctorHistotialMedico')->name('doctor-historial-medico');
    Route::get('doctor-chat','FrontEndController@DoctorChat')->name('doctor-chat');
    Route::get('doctor-receta','FrontEndController@DoctorReceta')->name('doctor-receta');
    Route::get('doctor-analisis','FrontEndController@DoctorAnalisis')->name('doctor-analisis');
    Route::get('doctor-list-historial','FrontEndController@listHistorial')->name('list-historial');

    // responsable laboratorio
    Route::get('lab-account','FrontEndController@LabAccount')->name('lab-account');
    Route::get('lab-historial','FrontEndController@LabHistorial')->name('lab-historial');
    Route::get('lab-analisis','FrontEndController@LabAnalisis')->name('lab-analisis');
    Route::get('lab-new-analisis','FrontEndController@LabNewAnalisis')->name('lab-new-analisis');
    Route::get('lab-ayuda','FrontEndController@LabAyuda')->name('lab-ayuda');
    Route::get('lab-analisis-medico','FrontEndController@LabAnalisisMedico')->name('lab-analisis-medico');


    // secretaria laboratorio
    Route::get('lab-sec-account','FrontEndController@LabSecAccount')->name('lab-sec-account');
    Route::get('lab-sec-new-historial','FrontEndController@LabSecNewHistorial')->name('lab-sec-new-historial');
    Route::get('lab-sec-historial','FrontEndController@LabSecHistorial')->name('lab-sec-historial');
    Route::get('lab-sec-analisis','FrontEndController@LabSecAnalisis')->name('lab-sec-analisis');
    Route::get('lab-sec-ayuda','FrontEndController@LabSecAyuda')->name('lab-sec-ayuda');
    Route::get('lab-sec-comprobante','FrontEndController@LabSecComprobante')->name('lab-sec-comprobante');
    Route::get('lab-sec-list-comprobante','FrontEndController@LabSecListComprobante')->name('lab-sec-list-comprobante');

});
Route::get('logout', 'FrontEndController@getLogout')->name('logout');
# contact form
Route::post('contact', 'FrontEndController@postContact')->name('contact');

Route::get('ayuda', function(){
  return view('ayuda');
});
Route::get('como-funciona', function(){
  return view('como-funciona');
});
Route::get('postulacion', function(){
  return view('postulacion');
});
Route::get('terms-conditions', function(){
  return view('terms-conditions');
});
Route::get('inteligencia-artificial', function(){
  return view('inteligencia-artificial');
});
Route::get('empresarial', function(){
  return view('empresarial');
});
Route::get('nuestro-staff', function(){
  return view('nuestro-staff');
});
Route::get('medicina', function(){
  return view('medicina');
});

#frontend views
Route::get('/', ['as' => 'home', function () {
    return view('index');
}]);

Route::get('blog','BlogController@index')->name('blog');
Route::get('blog/{slug}/tag', 'BlogController@getBlogTag');
Route::get('blogitem/{slug?}', 'BlogController@getBlog');
Route::post('blogitem/{blog}/comment', 'BlogController@storeComment');

Route::get('{name?}', 'FrontEndController@showFrontEndView');
# End of frontend views
Route::get('print/resultado-analisis/{id}', 'Laboratory\ExamenResultadoController@printResultadoAnalisis')->name('print.resultado.analisis');
Route::get('print/receta-medica/{id}', 'Recipe\RecipeController@getRecetaPDF')->name('print.receta.medica');
Route::get('print/receta-medica/offline/{id}', 'Recipe\RecipeController@getRecetaPDFOffline')->name('print.receta.medica.offline');
Route::get('print/orden-analisis/{id}', 'OrderAnalysis\OrderAnalysisController@printOrderAnalysis')->name('print.orden.analysis');

