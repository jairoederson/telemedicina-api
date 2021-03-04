export function SetValues(id) {

    // let params = {userId: id};
    // let data = JSON.stringify(params);
    // $.ajax({
    //     type: 'post',
    //     url: 'https://www.alo.doctor/api/load/medical/history',
    //     dataType: 'json',
    //     data: data,
    //     contentType: 'application/json; charset=utf-8',
    //     success: function (response) {
    //         //alert(JSON.stringify(response));
    //         //alert(response.data.user.name);
    //         $("#nombres").val(response.data.user.name);
    //         $("#nroDocumento").val(response.data.user.numdoc);
    //         $("#apePaterno").val(response.data.user.last_name);
    //         $("#genero").val(response.data.user.gender);
    //         $("#fNacimiento").val(response.data.user.birth_date);
    //         $("#correo").val(response.data.user.email);
    //         if(response.data.celphone!=null){
    //             $("#celular").val(response.data.celphone.number);
    //         }

    //         var html = '<option value="" disabled selected>Seleccione una Opción</option>';
            
    //         jQuery.each(response.data.type_documents, function (i, val) {
    //             if (val.id === response.data.user.type_document_id) {
    //                 html = html + "<option selected value='" + val.id + "'>" + val.type_name + "</option>";
    //             } else {
    //                 html = html + "<option value='" + val.id + "'>" + val.type_name + "</option>";
    //             }
    //         });

    //         $('#tipoDocumento').html(html);

    //         var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //         jQuery.each(response.data.civil_status, function (i, val) {
    //             if (val.id === response.data.patient.civil_status_id) {
    //                 html = html + "<option selected value='" + val.id + "'>" + val.name + "</option>";
    //             } else {
    //                 html = html + "<option value='" + val.id + "'>" + val.name + "</option>";
    //             }
    //             ;
    //         });
    //         $('#estadoCivil').html(html);

    //         var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //         jQuery.each(response.data.distritos, function (i, val) {
    //             if (val.id === response.data.ubigeo.id) {
    //                 html = html + "<option selected value='" + val.id + "'>" + val.ubigeo + "</option>";
    //             } else {
    //                 html = html + "<option value='" + val.id + "'>" + val.ubigeo + "</option>";
    //             }
    //             ;
    //         });
    //         $('#cboDistritoDA').html(html);

    //         var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //         jQuery.each(response.data.provincias, function (i, val) {
    //             if (val.provincia === response.data.ubigeo.provincia) {
    //                 html = html + "<option selected value='" + val.provincia + "'>" + val.ubigeo + "</option>";
    //             } else {
    //                 html = html + "<option value='" + val.provincia + "'>" + val.ubigeo + "</option>";
    //             }
    //             ;
    //         });
    //         $('#cboProvinciaDA').html(html);

    //         if(response.data.ubigeo!=null){
    //             $('#cboDepartamentoDA').val(response.data.ubigeo.departamento);
    //         }
    //         $('#dADireccion').val(response.data.user.address);

    //         if(response.data.placeBirthPatient!=null){
    //             if (response.data.placeBirthPatient.ubigeo_id != null) {
    //                 var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //                 jQuery.each(response.data.distritosLN, function (i, val) {
    //                     if (val.id === response.data.ubigeoLN.id) {
    //                         html = html + "<option selected value='" + val.id + "'>" + val.ubigeo + "</option>";
    //                     } else {
    //                         html = html + "<option value='" + val.id + "'>" + val.ubigeo + "</option>";
    //                     }
    //                     ;
    //                 });
    //                 $('#cboDistritoLN').html(html);

    //                 var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //                 jQuery.each(response.data.provinciasLN, function (i, val) {
    //                     if (val.provincia === response.data.ubigeoLN.provincia) {
    //                         html = html + "<option selected value='" + val.provincia + "'>" + val.ubigeo + "</option>";
    //                     } else {
    //                         html = html + "<option value='" + val.provincia + "'>" + val.ubigeo + "</option>";
    //                     }
    //                     ;
    //                 });
    //                 $('#cboProvinciaLN').html(html);

    //                 $('#cboDepartamentoLN').val(response.data.ubigeoLN.departamento);
    //             };
    //         }
    //         if (response.data.placeOriginPatient != null) {
    //             if (response.data.placeOriginPatient.ubigeo_id != null) {
    //                 var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //                 jQuery.each(response.data.distritosLP, function (i, val) {
    //                     if (val.id === response.data.ubigeoLP.id) {
    //                         html = html + "<option selected value='" + val.id + "'>" + val.ubigeo + "</option>";
    //                     } else {
    //                         html = html + "<option value='" + val.id + "'>" + val.ubigeo + "</option>";
    //                     }
    //                     ;
    //                 });
    //                 $('#cboDistritoLP').html(html);

    //                 var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //                 jQuery.each(response.data.provinciasLP, function (i, val) {
    //                     if (val.provincia === response.data.ubigeoLP.provincia) {
    //                         html = html + "<option selected value='" + val.provincia + "'>" + val.ubigeo + "</option>";
    //                     } else {
    //                         html = html + "<option value='" + val.provincia + "'>" + val.ubigeo + "</option>";
    //                     }
    //                     ;
    //                 });
    //                 $('#cboProvinciaLP').html(html);

    //                 $('#cboDepartamentoLP').val(response.data.ubigeoLP.departamento);
    //             };
    //         }

    //         var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //         jQuery.each(response.data.degree_instructions, function (i, val) {
    //             if (val.id === response.data.patient.degree_instruction_id) {
    //                 html = html + "<option selected value='" + val.id + "'>" + val.name + "</option>";
    //             } else {
    //                 html = html + "<option value='" + val.id + "'>" + val.name + "</option>";
    //             }
    //             ;
    //         });
    //         $('#gradoInstruccion').html(html);
    //         $('#ocupacion').val(response.data.patient.ocupation);
    //         $('#cEducativoLaboral').val(response.data.patient.work_center);


    //             var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //             jQuery.each(response.data.type_passengers, function (i, val) {
    //                 if(response.data.passengerDataPatient != null){
    //                     if (val.id === response.data.passengerDataPatient.type_passenger_id) {
    //                     html = html + "<option selected value='" + val.id + "'>" + val.name + "</option>";
    //                     } else {
    //                         html = html + "<option value='" + val.id + "'>" + val.name + "</option>";
    //                     };
    //                 }else{
    //                     html = html + "<option value='" + val.id + "'>" + val.name + "</option>";
    //                 }

    //             });
    //             $('#vinculo').html(html);
    //             var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //             jQuery.each(response.data.type_documents, function (i, val) {
    //                 if(response.data.passengerDataPatient != null){
    //                     if (val.id === response.data.passengerDataPatient.type_document_id) {
    //                     html = html + "<option selected value='" + val.id + "'>" + val.type_name + "</option>";
    //                     } else {
    //                         html = html + "<option value='" + val.id + "'>" + val.type_name + "</option>";
    //                     };
    //                 }else{
    //                     html = html + "<option value='" + val.id + "'>" + val.type_name + "</option>";
    //                 }
    //             });
    //             $('#tDocumentoA').html(html);
    //             if(response.data.passengerDataPatient != null){
    //                 $('#nomApeA').val(response.data.passengerDataPatient.name_passenger);
    //                     $('#nroDocumentoA').val(response.data.passengerDataPatient.nro_document);
    //             }




    //             var html = '<option value="" disabled selected>Seleccione una Opción</option>';
    //             jQuery.each(response.data.blood_types, function (i, val) {
    //                 if (response.data.medicalDataPatient != null) {
    //                     if (val.id === response.data.medicalDataPatient.blood_type_id) {
    //                     html = html + "<option selected value='" + val.id + "'>" + val.name + "</option>";
    //                     } else {
    //                         html = html + "<option value='" + val.id + "'>" + val.name + "</option>";
    //                     };
    //                 }else{
    //                     html = html + "<option value='" + val.id + "'>" + val.name + "</option>";
    //                 }

    //             });
    //             $('#grupoSanguineo').html(html);
    //         if (response.data.medicalDataPatient != null) {
    //             $('#fatorRh').val(response.data.medicalDataPatient.factor_rh);
    //         }
    //         //$('#gradoInstruccion').val(response.data.user.address);
    //         if (response.data.telephone != null) {
    //             $('#fijoDC').val(response.data.telephone.number);
    //         }

    //         $('select').material_select();
    //         $("input + label").addClass("active");
    //     },
    //     error: function (error) {
    //         alert(error);
    //     }
    // });


}

function resetearCom(idCombroReseteo) {
    $('#' + idCombroReseteo).html("");
    $('#' + idCombroReseteo).append($('<option>', {
        value: '',
        text: 'Seleccione una Opción',
        disabled: 'disabled',
        selected: 'selected'
    }));
}

