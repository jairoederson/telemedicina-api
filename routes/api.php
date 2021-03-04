<?php
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Headers: Origin, Content-Type, Authorization, X-Auth-Token, x-xsrf-token');
header('Access-Control-Allow-Methods: GET, POST, PUT, PATCH, DELETE, HEAD, OPTIONS');

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
 */

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::group(['middleware' => 'auth:api'], function () {
    // type documents
    Route::get('get/typeDocuments','TypeDocument\TypeDocumentController@getTypeDocumentsActive');
});
/*
Route::group(['prefix' => 'laboratory'], function () {
    Route::group(['middleware' => 'auth:api'], function() {
        Route::post('muestra/create','Laboratory\TomaMuestraController@createbysolicitud');
        Route::get('edit/muestra/{id}', 'Laboratory\TomaMuestraController@edit');
        Route::get('get/order/', 'Laboratory\TomaMuestraController@vexGetOrderAnalysis');
        Route::post('update/codigobarra/muestra', 'Laboratory\TomaMuestraController@updateCodigobarra');
        Route::post('delete/toma/muestra/', 'Laboratory\TomaMuestraController@destroy');
    });

});*/

Route::group(['prefix' => 'laboratory'], function () {
    Route::post('muestra/create','Laboratory\TomaMuestraController@createbysolicitud');
    Route::get('edit/muestra/{id}', 'Laboratory\TomaMuestraController@edit');
    Route::get('get/order/', 'Laboratory\TomaMuestraController@vexGetOrderAnalysis');
    Route::get('get/order/utm', 'Laboratory\TomaMuestraController@getOrderAnalysisUTM');
    Route::get('get/eliminar/motivos', 'Laboratory\TomaMuestraController@listamotivos');
    Route::get('get/rechazo/muestra', 'Laboratory\TomaMuestraController@listarechazo');
    Route::post('send/orden/utm', 'Laboratory\TomaMuestraController@sendUTM');

    Route::get('get/toma/muestras', 'Laboratory\GuiaControlInternoController@index');
    Route::post('filter/toma/muestras', 'Laboratory\GuiaControlInternoController@filterTomaMuestras');

    Route::get('get/guiacontrol/imprimir/{id}', 'Laboratory\GuiaControlInternoController@imprimir');
    Route::get('get/guiacontrol/{id}', 'Laboratory\GuiaControlInternoController@getGuiacontrol');
    Route::get('get/listarechazo/muestra', 'Laboratory\GuiaControlInternoController@listarechazo');
    Route::get('get/recepcion/muestra', 'Laboratory\GuiaControlInternoController@GetRecepcionMuestra');
    Route::post('filter/recepcion/muestra', 'Laboratory\GuiaControlInternoController@FilterRecepcionMuestra');
    Route::get('get/recepcion/solicitud/{id}', 'Laboratory\GuiaControlInternoController@GetRecepcionSolicitud');
    Route::get('get/informe/solicitud/{id}', 'Laboratory\ExamenResultadoController@getInformebyid');
    Route::get('avance/informe/solicitud/{id}', 'Laboratory\ExamenResultadoController@avanceinforme');
    Route::get('get/resultado/solicitud/{id}', 'Laboratory\ExamenResultadoController@getResultadoSolicitud');
    Route::get('get/resultados/solicitud', 'Laboratory\ExamenResultadoController@listarResultados');
    Route::get('get/correccion/resultados', 'Laboratory\ExamenResultadoController@getCorreccionResultados');
    Route::get('get/rechazo/solicitud/{id}', 'Laboratory\GuiaControlInternoController@GetRechazoSolicitud');

    Route::post('update/codigobarra/muestra', 'Laboratory\TomaMuestraController@updateCodigobarra');
    Route::post('delete/toma/muestra', 'Laboratory\TomaMuestraController@destroy');
    Route::post('delete/order/solicitud', 'Laboratory\TomaMuestraController@eliminarorden');

    Route::post('save/guiacontrol/interno', 'Laboratory\GuiaControlInternoController@store');
    Route::post('save/recepcion/muestra', 'Laboratory\GuiaControlInternoController@saveRecepcionmuestra');
    Route::post('delete/recepcion/solicitud', 'Laboratory\GuiaControlInternoController@eliminarBySolicitud');
    Route::post('save/informe/examen', 'Laboratory\ExamenResultadoController@store');
    Route::post('aprobar/informe/solicitud', 'Laboratory\ExamenResultadoController@AprobarInformeSolicitud');
    Route::post('buscar/informe/solicitud', 'Laboratory\InformeResultadoController@buscadorSolicitud');
    Route::post('buscar/informe/fechas', 'Laboratory\InformeResultadoController@buscadorFechas');
    Route::post('buscar/informe/paciente', 'Laboratory\InformeResultadoController@buscadorPaciente');
    Route::post('buscar/informe/numerodoc', 'Laboratory\InformeResultadoController@buscadorNumerodoc');
    Route::post('buscar/informe/numerodoc/paginated', 'Laboratory\InformeResultadoController@buscadorNumerodocPaginated');
    Route::post('buscar/tomamuestra/solicitud', 'Laboratory\GuiaControlInternoController@buscadorSolicitud');
    Route::post('buscar/tomamuestra/codigobarra', 'Laboratory\GuiaControlInternoController@buscadorCodigobarra');
    Route::post('buscar/tomamuestra/paciente', 'Laboratory\GuiaControlInternoController@buscadorPaciente');
    Route::post('buscar/tomamuestra/numerodoc', 'Laboratory\GuiaControlInternoController@buscadorNumerodoc');
    //filtro fechas
    Route::post('filter/solicitud/fechas', 'Laboratory\TomaMuestraController@getFechasFilter');
    Route::post('filter/tomamuestras/fechas', 'Laboratory\GuiaControlInternoController@getFechasFilter');
    Route::post('filter/informes/fechas', 'Laboratory\InformeResultadoController@getFechasFilter');

});

// Socket Pusher
Route::get('triggerVideoCall', 'Trigger\TriggerController@sendTriggerVideoCall');
Route::post('customTrigger', 'Trigger\TriggerController@sendCustomTrigger');

// User State Sinch
Route::get('signout/user/sinch/{user_sinch}', 'Doctor\DoctorController@signOutUserSinch');
Route::get('get/state/user/sinch/{user_sinch}', 'Doctor\DoctorController@getStateUserSinch');
Route::get('get/doctor/status/{user_id}', 'Doctor\DoctorController@isDoctorActive');

// User
Route::resource('users', 'User\UserController', ['except' => ['create', 'edit']]);
Route::post('login', 'User\UserController@login');
Route::post('logout', 'User\UserController@vexSolucionesLogout');
Route::post('login/wizard', 'User\UserController@loginWizard');
Route::post('login/social', 'User\UserController@loginSocial');
Route::post('register', 'User\UserController@create');
Route::post('valid/credentials', 'User\UserController@validarCredenciales');
Route::get('get/users/account', 'User\UserController@getUsersAccount');
Route::post('activate/account', 'User\UserController@sendactivateAccount');
Route::get('activate/account/{token}', 'User\UserController@activateAccount')->name('activate.api');
Route::get('get/user/plan/{id}', 'User\UserController@getUserPlan');
Route::get('get/activation/user/{id}', 'User\UserController@getActivationUser');
Route::put('update/mobile/token', 'User\UserController@vexSolucionesUpdateMobileToken');
Route::post('search/reniec/dni', 'User\UserController@getFullnamereniec');
Route::post('search/sunat/ruc', 'Reniec\SunatController@getDataByRUC');
Route::get('get/auth/user/{userId}', 'User\UserController@vexSolucionesGetAuthUser');

// test
Route::post('test/register/user/call', 'User\UserController@pruebaCallUser');

Route::post('get/user/id', 'User\UserController@getUserId');
Route::post('get/user/email', 'User\UserController@getUserEmail');
Route::post('user/edit', 'User\UserController@edit');
Route::post('user/edit/image', 'User\UserController@editImage');
Route::post('user/edit/image64', 'User\UserController@editImageBase64');
Route::post('user/create', 'User\UserController@create');
Route::post('user/get/doctors', 'User\UserController@getDoctors');
Route::post('user/update/password', 'User\UserController@updatePassword');
Route::get('get/user/twilio/{userSinch}', 'User\UserController@vex_soluciones_get_user_twilio');
Route::post('auth/fingerprint/user', 'User\UserController@authWithFingerprint');

// Doctor
Route::post('patient/saveQualification', 'Doctor\DoctorController@saveCalification');
Route::post('earning/month', 'Doctor\DoctorController@getEarningByMonth');
Route::get('get/months', 'Doctor\DoctorController@months');
Route::post('earning/year', 'Doctor\DoctorController@getEarningByYear');
Route::post('update/status', 'Doctor\DoctorController@updateStatus');
Route::get('get/status/doctor/{id}', 'Doctor\DoctorController@getStatusDoctor');

// Patient
Route::post('save/temp/symptom', 'Patient\PatientController@saveTempSymptom');
Route::get('get/temp/symptom/{user_sinch}', 'Patient\PatientController@getTempSymptoms');
Route::get('get/call/state/{user_id}', 'Patient\PatientController@getCallState');
Route::post('set/call/state', 'Patient\PatientController@setCallState');
Route::get('is/affiliated/{id}', 'Associated\AssociatedController@isAffiliated');
Route::get('get/affiliates/associated/{user_id}', 'Associated\AssociatedController@getAffiliatesAssociated');
Route::get('is/asociated/{id}', 'Associated\AssociatedController@isResponsibleForCompany');
Route::post('save/affiliate', 'Associated\AssociatedController@saveNewAffiliated');
Route::post('save/affiliate/group', 'Associated\AssociatedController@saveNewAffiliatedGroup');
Route::post('set/card/to/use', 'Patient\PatientController@setCardToUse');
Route::get('get/vital/signs/{user_id}', 'Patient\PatientController@getVitalSigns');
Route::put('update/vital/signs', 'Patient\PatientController@updateVitalSign');
Route::post('search/paciente/dni', 'Patient\PatientController@searchDni');
Route::get('get/patients/all', 'Patient\PatientController@getPatients');
Route::post('register/patient', 'User\UserController@registerPaciente');
Route::put('patients/update/weight', 'Patient\PatientController@updateWeight');
Route::post('patients/allergies', 'Patient\PatientController@saveAllergy');
Route::get('patients/allergies/{user_id}', 'Patient\PatientController@getAllergies');
Route::post('patients/delete/allergy', 'Patient\PatientController@deleteAllergy');


// Family Members
Route::get('get/family/members/{user_id}', 'Relationship\RelationshipController@getFamilyMembers');
Route::get('get/family/member/{user_id}', 'Relationship\RelationshipController@getFamilyMember');
Route::get('is/tutored/{user_id}', 'Relationship\RelationshipController@isTutored');
Route::post('save/family/member', 'Relationship\RelationshipController@saveFamilyMember');

// Specialities
Route::get('specialities/specialities', 'Doctor\SpecialtyController@getSpecialties');
Route::post('specialities/specialities', 'Doctor\SpecialtyController@postSpecialties');

// Doctor Schedule
Route::post('doctorSchedule/list', 'Doctor\DoctorScheduleController@getSchedules');
Route::post('doctorSchedule/save', 'Doctor\DoctorScheduleController@postSchedules');
Route::post('doctorSchedule/delete', 'Doctor\DoctorScheduleController@delete');

// Symptom
Route::get('symptom/symptom', 'Doctor\SymptomController@getSymptom');

// Query
Route::post('queries/doctor/recieved', 'Query\QueryController@getQueryOfDoctorRecieved');
Route::get('queries/doctor/recieved/with/pagination/{doctorId}', 'Query\QueryController@getQueryOfDoctorRecievedWithPagination');
Route::post('queries/doctor/lost', 'Query\QueryController@getQueryOfDoctorLost');
Route::get('queries/doctor/lost/with/pagination/{doctorId}', 'Query\QueryController@getQueryOfDoctorLostWithPagination');
Route::post('queries/search/recieved', 'Query\QueryController@SearchQuery');
Route::post('queries/record/videocall', 'Query\QueryController@vexSetRecordVideoCall');
Route::post('queries/patient/status', 'Query\QueryController@getQueryPatientStatus');
Route::post('queries/details', 'Query\QueryController@getQueryDetailsById');
Route::post('queries/validatehour', 'Query\QueryController@ValidateHourQuery');
Route::post('queries/updatestatusduration', 'Query\QueryController@ActualizarEstadoConsultaTiempo');

// ChatRoom
Route::post('get/chat/messages', 'Query\MessageController@getChat');
Route::post('create/chatroom', 'Query\QueryController@CreateChatRoom');
Route::post('init/chatroom', 'Query\QueryController@InitChatRoom');
Route::post('queries/patient', 'Query\QueryController@getQueryOfPatient');
Route::get('queries/patient/with/pagination/{patientId}', 'Query\QueryController@getQueryOfPatientWithPagination');
Route::post('create/user/xmpp', 'User\UserController@registrarUserXmpp');
Route::post('create/roster', 'Query\QueryController@CreateRoster');
Route::resource('queries', 'Query\QueryController', ['except' => ['create', 'edit']]);

// Card
Route::get('card/getCards', 'Card\CardController@getCards');
Route::get('card/getCards/id/{id}', 'Card\CardController@getCardsByOwner');
Route::post('card/create', 'Card\CardController@create');
Route::get('card/getCard/id/{id}', 'Card\CardController@get');
Route::post('card/edit', 'Card\CardController@edit');
Route::post('typecard/patient', 'Card\CardController@getBrandTargetByPatient');
Route::post('card/delete', 'Card\CardController@deleteCard');
Route::post('card/getByBrand', 'Card\CardController@getCardByBrand');

// Culqi
Route::post('culqi/create/charge', 'Culqi\CulqiController@createChargeCulqi');
Route::post('culqi/create/charge/analysis', 'Culqi\CulqiController@createChargeCulqiAnalysis');
Route::post('culqi/save/card', 'Culqi\CulqiController@saveCardCulqi');
Route::post('culqi/set/main/card', 'Culqi\CulqiController@setUserMainCard');
Route::get('culqi/get/cards/{user_id}', 'Culqi\CulqiController@getCardsUserCulqi');
Route::get('culqi/get/card/{card_id}', 'Culqi\CulqiController@getCardUserCulqi');
Route::put('culqi/update/card', 'Culqi\CulqiController@updateUserCardCulqi');
Route::delete('culqi/delete/card/{card_id}', 'Culqi\CulqiController@deleteUserCardCulqi');
Route::post('culqi/create/refund', 'Culqi\CulqiController@saveRefound');
Route::get('culqi/get/last/charge/{patientId}', 'Culqi\CulqiController@getLastCharge');

// Company
Route::get('company/getCompanies', 'Company\CompanyController@getCompanies');
Route::post('company/create', 'Company\CompanyController@create');
Route::post('company/edit', 'Company\CompanyController@edit');
Route::get('company/getCompany/id/{id}', 'Company\CompanyController@get');

// Recipe
Route::resource('treatments', 'Recipe\RecipeController', ['except' => ['create', 'edit']]);
Route::post('update/state/notification', 'Recipe\RecipeController@updateStateNotification');
Route::post('resend/recipe', 'Recipe\RecipeController@resendRecipe');
Route::post('biological_functions', 'Recipe\RecipeController@saveBiologicalFunction');
Route::post('vital_functions', 'Recipe\RecipeController@saveVitalFunction');
Route::post('physical_exams', 'Recipe\RecipeController@savePhysicalExam');
Route::post('diagnostics', 'Recipe\RecipeController@saveDiagnostic');
Route::post('medicaments', 'Recipe\RecipeController@saveMedicament');
Route::post('auxiliary_exams', 'Recipe\RecipeController@saveAuxiliaryExam');
Route::post('procedures', 'Recipe\RecipeController@saveProcedure');

Route::get('get/details/patient/{consulta_id}', 'Recipe\RecipeController@getDetailPatient');

Route::post('get/treatments/paciente', 'Recipe\RecipeController@getTreatmentByPaciente');
Route::post('get/treatments/paciente/paginated', 'Recipe\RecipeController@getTreatmentByPacientePaginated');
Route::post('get/treatments/doctor', 'Recipe\RecipeController@getTreatmentByDoctor');
Route::post('get/treatments/doctor/paginated', 'Recipe\RecipeController@getTreatmentByDoctorPaginated');
Route::post('get/treatments/paciente/no/vistos', 'Recipe\RecipeController@getTreatmentsPacienteNotSeen');

Route::get('get/medicaments/treatment/{id}', 'Recipe\RecipeController@getMedicamentsByTreatment');
Route::get('get/medicaments/treatment/offline/{id}', 'Recipe\RecipeController@getMedicamentsByTreatmentOffline');
Route::get('get/state/notification/patient/{id}', 'Recipe\RecipeController@existRecipeMakedPatient');

Route::get('autocomplete/medicament/{medicament}', 'Medicament\MedicamentController@autocompleteMedicament');
Route::get('get/detail/medicament/{sku}', 'Medicament\MedicamentController@getDetailMedicament');

//payment
Route::post('payment/generateCompany','Payment\PaymentController@generatePaymentCompany');
Route::post('payment/generatePatient','Payment\PaymentController@generatePaymentPatient');

//question
Route::post('question/create','Question\QuestionController@saveQuestion');
Route::post('question/get','Question\QuestionController@getQuestions');
Route::post('question/get/category','Question\QuestionController@getQuestionByCategory');
Route::post('question/get/active','Question\QuestionController@getQuestionActived');
Route::post('question/state','Question\QuestionController@stateQuestion');
Route::post('question/status','Question\QuestionController@changeStatusQuestion');

// answer
Route::post('answer/create','Question\AnswerController@saveAnswer');
Route::post('answer/get','Question\AnswerController@getAnswers');
Route::post('answer/get/category','Question\AnswerController@getAnswersByCategory');
Route::post('answer/get/active','Question\AnswerController@getAnswersActivated');
Route::post('answer/state','Question\AnswerController@stateAnswer');
Route::get('question/related/{id}','Question\AnswerController@relatedAnswer');

// vote answer
Route::post('create/answer/vote','Question\AnswerVoteController@saveVoteAnswer');
Route::get('get/vote/valoration','Question\AnswerVoteController@getVotesValoration');

// category question
Route::post('category/create', 'Question\CategoryQuestionController@saveCategoryQuestion');
Route::post('category/get', 'Question\CategoryQuestionController@getCategoryQuestions');
Route::post('category/get/active', 'Question\CategoryQuestionController@getCategoryActivated');
Route::post('category/state', 'Question\CategoryQuestionController@stateCategory');
Route::get('get/data/atencionCliente', 'Question\CategoryQuestionController@getDataAtencionCliente');
Route::get('get/category/{id}', 'Question\CategoryQuestionController@getDataCategory');
Route::get('get/categoryquestion/{id}', 'Question\CategoryQuestionController@getCategorySubcategory');
Route::get('get/categoryquestion', 'Question\CategoryQuestionController@getCategorySubcategories');

// category suggestion
Route::post('categorySuggestion/create','Suggestion\CategorySuggestionController@saveCategorySuggestion');
Route::get('categorySuggestion/get/active','Suggestion\CategorySuggestionController@getCategorySuggestionActive');
Route::post('categorySuggestion/update/state','Suggestion\CategorySuggestionController@changeStateCategorySuggestion');

// suggestion
Route::post('suggestion/create','Suggestion\SuggestionController@saveSuggestion');
Route::get('suggestion/get/active','Suggestion\SuggestionController@getSuggestionActive');
Route::post('suggestion/get/category','Suggestion\SuggestionController@getSuggestionByCategory');
Route::post('suggestion/update/state','Suggestion\SuggestionController@changeStateSuggestion');

// image suggestion
Route::post('imageSuggestion/create','Suggestion\ImageSuggestionController@saveImageSuggestion');
Route::get('imageSuggestion/get/active','Suggestion\ImageSuggestionController@getImageSuggestionActive');
Route::post('imageSuggestion/get/suggestion','Suggestion\ImageSuggestionController@getImageBySuggestion');
Route::post('imageSuggestion/update/state','Suggestion\ImageSuggestionController@changeStateImageSuggestion');



// Order Analysis
Route::post('update/order/state','OrderAnalysis\OrderAnalysisController@vexUpdateOrderAnalysis');
Route::get('get/orders','OrderAnalysis\OrderAnalysisController@vexGetOrderAnalysis');
Route::post('get/orders/doctor','OrderAnalysis\OrderAnalysisController@vexGetOrderAnalysisDoctor');
Route::post('get/orders/paciente','OrderAnalysis\OrderAnalysisController@vexGetOrderAnalysisPaciente');
Route::get('get/orders/paciente/pendings/{patient_id}','OrderAnalysis\OrderAnalysisController@vexGetOrdersAnalysisPendingPaciente');
Route::get('get/one/order/{id}', 'OrderAnalysis\OrderAnalysisController@vexGetOneOrderAnalysis');
Route::get('get/order/notification/patient/{id}', 'OrderAnalysis\OrderAnalysisController@vexExistAnalisisMakedPaciente');
Route::get('get/order/notification/doctor/{id}', 'OrderAnalysis\OrderAnalysisController@vexExistAnalisisMakedDoctor');

// Receipt
Route::post('save/receipt', 'Receipt\ReceiptController@saveReceipt');

// Result
Route::post('save/result', 'Result\ResultController@saveResult');
Route::post('get/result', 'Result\ResultController@getReceipt');

// Coin Purse
Route::get('auth/wallet', 'CoinPurse\CoinPurseController@authWallet');
Route::get('check/wallet/affiliation/{dni}', 'CoinPurse\CoinPurseController@checkWalletAffiliationData');
Route::post('register/affiliate/wallet', 'CoinPurse\CoinPurseController@registerWallet');
Route::get('check/balance/wallet/{dni}', 'CoinPurse\CoinPurseController@checkWalletBalance');
Route::get('check/balance/detail/wallet/{dni}', 'CoinPurse\CoinPurseController@checkWalletDetailBalance');

// Active Medication
Route::get('autocomplete/active/medication/{word}', 'AlergyPatient\AlergyPatientController@autocompleteActiveMedicament');
Route::post('save/patient/medication/active', 'AlergyPatient\AlergyPatientController@saveActiveMedicationPatient');
Route::get('get/active/medication/{dni}', 'AlergyPatient\AlergyPatientController@getAlergicMedicamentActive');

// Openfire
Route::post('chat/openfire', 'OpenFire\ChatController@getChat');

// twilio 
Route::post('twilio/get/token', 'Twilio\TwilioController@getToken');

// Reciec
Route::post('person/data/reniec', 'Reniec\ReniecController@getDataByDNI');

// ML
Route::post('predict/disease','ML\MLController@diseasePredict');

// OFFLINE SYSTEM
// comprobantes
Route::post('verify/voucher/by/code', 'Voucher\VoucherController@verifyVoucherByCode');
Route::post('verify/voucher/by/barcode', 'Voucher\VoucherController@verifyVoucherByBarCode');
Route::post('save/voucher', 'Voucher\VoucherController@saveVoucher');
Route::post('update/voucher', 'Voucher\VoucherController@updateStateVoucher');

// combos
Route::get('get/typeVouchers', 'Combo\ComboController@getTypeVouchers'); // obtener tipo de comprobantes
Route::get('get/civilStatus', 'Combo\ComboController@getCivilStatus'); // obtener estados civiles
Route::get('get/degreeInstruccions', 'Combo\ComboController@getDegreeInstruccions'); // obtener grados de instrucciones
Route::get('get/typePassengers', 'Combo\ComboController@getTypePassengers'); // obtener tipos de acompañantes
Route::get('get/Prenatals', 'Combo\ComboController@getPrenatals'); // obtener prenatales
Route::get('get/partos', 'Combo\ComboController@getPartos'); // obtener partos
Route::get('get/immunizations', 'Combo\ComboController@getImmunizations'); // obtener inmunizacionres
Route::get('get/harmfulHabits', 'Combo\ComboController@getHarmfulHabits'); // obtener habitos nocivos
Route::get('get/recordPatological', 'Combo\ComboController@getRecordPatological'); // obtener antecedentes patologicos
Route::get('get/recordPatologicalFamiliar', 'Combo\ComboController@getRecordPatologicalFamiliar'); // obtener patologicos familiares
Route::get('get/typeInformant', 'Combo\ComboController@getTypeInformant'); // obtener tipos de informantes
Route::get('get/appetites', 'Combo\ComboController@getAppetites'); // obtener apetitos
Route::get('get/dreams', 'Combo\ComboController@getDreams'); // obtener sueños
Route::get('get/depositions', 'Combo\ComboController@getDepositions'); // obtener deposiciones
Route::get('get/thirts', 'Combo\ComboController@getThirts'); // obtener sed
Route::get('get/urines', 'Combo\ComboController@getUrines'); // obtener orinas
Route::get('get/generalStatus', 'Combo\ComboController@getGeneralStatus'); // obtener estados generales
Route::get('get/diagnosticData', 'Combo\ComboController@getDiagnosticData'); // obtener lista de diagnosticos
Route::get('get/typeDiagnostic', 'Combo\ComboController@getTypeDiagnostic'); // obtener tipos de diagnostico
Route::get('get/departments', 'Ubigeo\UbigeoController@getDepartments'); // obtener departamentos
Route::get('get/provincias/{departmentId}', 'Ubigeo\UbigeoController@getProviciasByDepartment'); // obtener departamentos
Route::post('get/distritos', 'Ubigeo\UbigeoController@getDistritosByProvincia');
Route::get('get/bloodType', 'Combo\ComboController@getBloodType');

// buscar paciente
Route::post('search/patient/by/name', 'Patient\PatientController@searchPatientByName');
Route::post('search/patient/by/numdoc', 'Patient\PatientController@searchPatientByDocument');

// consulta offline
Route::post('update/state/queryOffline', 'Query\QueryOfflineController@updateStateQueryOffline');

// buscar doctor
Route::post('search/doctor/by/cmp', 'Doctor\DoctorController@searchDoctorByCmp');
Route::post('search/doctor/by/name', 'Doctor\DoctorController@searchDoctorByName');
Route::post('auth/doctor/by/cmp/and/numdoc', 'Doctor\DoctorController@authDoctorByCmpAndDni');

// triaje
Route::post('save/triaje', 'Triaje\TriajeController@saveTriaje');
Route::post('update/triaje', 'Triaje\TriajeController@updateTriaje');
Route::get('get/last/triaje/{id}', 'Triaje\TriajeController@getLastTriaje');
Route::get('get/triaje/user/{id}', 'Triaje\TriajeController@getTriajeUser');
Route::get('get/triaje/all/', 'Triaje\TriajeController@getTriajeAll');

// historial medico inicio
Route::post('load/medical/history', 'MedicalHistory\MedicalHistoryController@loadMedicalHistory');
Route::post('save/medical/history', 'MedicalHistory\MedicalHistoryController@saveMedicalHistory');
Route::post('test/medical/history', 'MedicalHistory\MedicalHistoryController@testMedicalHistory');
Route::post('update/medical/history', 'MedicalHistory\MedicalHistoryController@updateMedicalHistory');
Route::get('verify/exist/medical/history/{patientId}', 'MedicalHistory\MedicalHistoryController@verifyExistMedicalHistoryPatient');
Route::get('get/medical/history/user/{id}', 'MedicalHistory\MedicalHistoryController@HistoryMedicalPaciente');
Route::get('get/medical/history/doctor/{id}', 'MedicalHistory\MedicalHistoryController@HistoryMedicalDoctor');
Route::get('histories', 'MedicalHistory\MedicalHistoryController@getMedicalHistories');

// Especificaciones del doctor
Route::post('save/general/record', 'RecordPatient\GeneralRecordPatientController@saveGeneralRecord');
Route::post('save/ginecological/record', 'RecordPatient\GinecologicalRecordPatientController@saveGinecologicalRecord');
Route::post('save/pathological/record', 'RecordPatient\RecordPathologicalPatientController@savePathologicalRecordPatient');
Route::post('save/pathological/familiar/record', 'RecordPatient\RecordPathologicalFamiliarPatientController@savePathologicalRecordFamilyPatient');
Route::post('save/current/disease', 'Query\QueryOfflineController@saveCurrentDisease');
Route::post('save/order','OrderAnalysis\OrderAnalysisController@vexSaveOrderAnalysis');
Route::get('get/medical/history/{user_id}', 'Query\QueryController@getMedicalHistory');

Route::post('get/queriesByDoctor', 'Admin\ConsultaController@listarConsultasPorMedico');
Route::post('update/queryStatus', 'Admin\ConsultaController@ActualizarEstadoConsulta');



// antecedentes del paciente
Route::get('check/general/record/{patientId}', 'RecordPatient\GeneralRecordPatientController@checkGeneralRecordPatient'); // verificar si el paciente tiene antecedentes checkGeneralRecordPatient

Route::get('check/ginecological/record/{patientId}', 'RecordPatient\GinecologicalRecordPatientController@checkGinecologicalRecord'); //verificar si el paciente tien actecedentes  checkGinecologicalRecord
Route::get('autocomplete/pathological/record/{word}', 'RecordPatient\RecordPathologicalPatientController@autocompletePathologicalRecord'); // busqueda de antecedentes patologicos - autocomplete
Route::get('autocomplete/pathological/familiar/record/{word}', 'RecordPatient\RecordPathologicalFamiliarPatientController@autocompletePathologicalFamiliarRecord'); // busqueda de antecedentes patologicos familiares - autocomplete

Route::post('update/general/record', 'RecordPatient\GeneralRecordPatientController@updateGeneralRecord'); // actualizar  general record
Route::post('update/ginecological/record', 'RecordPatient\GinecologicalRecordPatientController@updateGinecologicalRecord'); //  actualizar ginecological record
Route::post('update/pathological/record', 'RecordPatient\RecordPathologicalPatientController@updatePathologicalRecord'); //  actualizar  Pathological record
Route::post('update/pathological/familiar/record', 'RecordPatient\RecordPathologicalFamiliarPatientController@updatePathologicalFamiliarRecord'); //  actualizar  Pathological Familiar record

// consulta medica offline

// enfermedad actual
Route::post('update/current/disease', 'Query\QueryOfflineController@updateCurrentDisease'); // registrar nuevo antecedente

// examen fisico
Route::post('save/physical/exam', 'Query\QueryOfflineController@savePhysicalExam'); // registrar nuevo antecedente
Route::post('update/physical/exam', 'Query\QueryOfflineController@updatePhysicalExam'); // registrar nuevo antecedente

// consulta
Route::get('get/last/query/{doctor_id}', 'Query\QueryController@getLastQueryId'); // obtener el ultimo id de
// una consulta

// diagnostico
Route::get('autocomplete/diagnostic/{word}', 'Query\QueryOfflineController@autocompleteDiagnostic'); // registrar nuevo antecedente
Route::post('save/diagnostic', 'Query\QueryOfflineController@saveDiagnostic'); // registrar nuevo antecedente
Route::post('update/diagnostic', 'Query\QueryOfflineController@updateDiagnostic'); // registrar nuevo antecedente

// examen auxiliar
Route::post('save/auxiliary/exam', 'Query\QueryOfflineController@saveAuxiliaryExam'); // registrar nuevo antecedente
Route::post('update/auxiliary/exam', 'Query\QueryOfflineController@updateAuxiliaryExam'); // registrar nuevo antecedente

// procedimientos y otros
Route::post('save/procedures', 'Query\QueryOfflineController@saveProcedures'); // registrar nuevo antecedente
Route::post('update/procedures', 'Query\QueryOfflineController@updateProcedures'); // registrar nuevo antecedente

Route::post('save/query/offline', 'Query\QueryOfflineController@saveQueryOffline'); // registrar nuevo antecedente
Route::post('update/query/offline', 'Query\QueryOfflineController@updateQueryOffline'); // registrar nuevo antecedente

Route::post('save/treatment', 'Query\QueryOfflineController@saveTreatments'); // registrar nuevo antecedente
Route::post('update/treatment', 'Query\QueryOfflineController@updateTreatments'); // registrar nuevo antecedente

Route::get('find/medicalHistory/{word}', 'MedicalHistory\MedicalHistoryController@findMedicalHistory');
Route::get('find/all/record/patient/{patientId}', 'RecordPatient\AllRecordController@listAllDataGeneralRecord');

Route::get('find/date/query/offline/{fechaDe}/{fechaHasta}', 'Query\QueryOfflineController@listAllData'); // registrar nuevo antecedente
Route::get('list/query/offline/{query_offline_id}', 'Query\QueryOfflineController@listAllDataQueryOffline'); // registrar nuevo antecedente

Route::post('login/secretary', 'User\UserController@loginSecretary');
Route::post('change/state/query/offline', 'Query\QueryOfflineController@changeStateQueryOffline'); // registrar nuevo antecedente

Route::post('list/today/query/offline', 'Query\QueryOfflineController@listoTodayQueryOffline'); // registrar nuevo antecedente 315
Route::post('list/today/penAtention/query/offline', 'Query\QueryOfflineController@listTodayPenAtentionQueryOffline'); // registrar nuevo antecedente 315

// CENTROS MEDICOS
Route::post('get/medical/centers/closer', 'Ubigeo\UbigeoController@getMedicalCentersCloser');
Route::get('orders/consults/list', 'Query\QueryOfflineController@vexSolucionesObtenerOrdenesConsultas'); // registrar nuevo antecedente


// VISANET OBTENER FORMULARIO
Route::get('get/form/visanet', 'VisaNet\VisaNetController@getFormVisanet'); // registrar nuevo antecedente

// Push notification
Route::post('send/notification/incoming/call', 'Push\PushNotificacionController@vexSendNotificacionCallIncoming');
Route::post('send/notification/new/recipe', 'Push\PushNotificacionController@vexSolucionesNotificationNewRecipe');
Route::post('send/notification/new/result', 'Push\PushNotificacionController@vexSolucionesNotificationNewResultLaboratory');
Route::post('send/notification/new/order', 'Push\PushNotificacionController@vexSolucionesNotificationNewOrder');
Route::post('send/notification/new/query', 'Push\PushNotificacionController@vexSolucionesNotificationNewPatientToConsulta');
Route::post('send/notification/incoming/call/web', 'Push\PushNotificacionController@vexSendNotificacionWeb');
Route::get('get/notifications/{user_id}', 'Push\PushNotificacionController@vexGetNotifications');
Route::put('update/notification/state', 'Push\PushNotificacionController@vexUpdateNotification');

// Pagos
Route::post('save/pagos/empresa', 'Admin\PagoController@ServicioregistropagoEmpresa');
Route::post('generar/pagos/empresa', 'Admin\PagoController@generatePaymentToCompany');
Route::get('get/pagos/empresa/{id}', 'Admin\PagoController@getHistorialPagosUser');
Route::get('get/message/horario/atencion', 'Admin\ConfiguracionController@gethorarioAtencion');
Route::post('cancelar/pagos/empresa', 'Admin\PagoController@cancelarPagoCompany');

//Staff doctors
Route::post('get/staff/doctors', 'Doctor\DoctorController@staff');
Route::post('save/firma/doctor', 'Doctor\DoctorController@uploadFirmadigital');
Route::get('list/speciality/doctors', 'Doctor\DoctorController@listSpeciality');


// CONSULTA MEDICA OFFLINE DOCTOR
Route::get('get/query/offline/pending/atention', 'Query\QueryOfflineController@vexSolucionesGetQueriesOfflinePendingToAtention');
Route::get('get/query/offline/pending/query/{id}', 'Query\QueryOfflineController@vexSolucionesGetQueriesOfflinePendingToQuery');
Route::post('sent/to/atention', 'Query\QueryOfflineController@vexSolucionesSendPatientToAtention');
Route::get('get/query/offline/atention/{id}', 'Query\QueryOfflineController@vexSolucionesGetQueriesOfflineAtention');
Route::post('search/query/offline/atention', 'Query\QueryOfflineController@vexSolucionesSearchTrazabilidad');
Route::get('get/data/patient/{id}', 'Query\QueryOfflineController@vexSolucionesObtenerDatosPaciente');
Route::put('update/data/patient', 'Query\QueryOfflineController@vexSolucionesActualizarDatosPaciente');
Route::put('update/state/query/offline', 'Query\QueryOfflineController@vexSolucionesActualizarEstadoConsulta');
Route::get('get/queries/{id}', 'Query\QueryOfflineController@vexSolucionesGetQueries');
Route::post('search/queries/offline', 'Query\QueryOfflineController@vexSolucionesSearchQueryDniOrName');
Route::get('get/query/offline/{id}', 'Query\QueryOfflineController@vexSolucionesObtenerConsulta');
Route::post('save/query/offline', 'Query\QueryOfflineController@vexSolucionesRegistrarConsulta');
Route::put('update/query/offline', 'Query\QueryOfflineController@vexSolucionesActualizarConsulta');
Route::put('update/query/offline/first/time', 'Query\QueryOfflineController@vexSolucionesActualizarConsultaPrimeraVez');

Route::get('get/record/general/{id}', 'Query\QueryOfflineController@vexSolucionesObtenerAntecedenteGeneral');
Route::get('get/record/ginecological/{id}', 'Query\QueryOfflineController@vexSolucionesObtenerAntecedenteGinecologico');
Route::get('get/record/pathological/{id}', 'Query\QueryOfflineController@vexSolucionesObtenerAntecedentePatologico');
Route::get('get/record/pathological/familiar/{id}', 'Query\QueryOfflineController@vexSolucionesObtenerAntecedentePatologicoFamiliar');

Route::post('history/docto/change', 'DoctorChangeController@store');

Route::get('analysis', 'OrderAnalysis\OrderAnalysisController@vexSolucionesGetAnalysis');

//SMS
Route::post('get/verificationCode', 'SmsController@getVerificationCode');
Route::post('check/verificationCode', 'SmsController@checkVerificationCode');
