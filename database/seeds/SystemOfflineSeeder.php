<?php

use Illuminate\Database\Seeder;

class SystemOfflineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      // TIPO DE DOCUMENTO
        DB::table('type_vouchers')->insert(array(
        	array(
            'name' => 'BOLETA DE VENTA',
            'description' => 'Boleta de venta',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        	array(
            'name' => 'FACTURA',
            'description' => 'factura',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

      // ESTADO CIVIL
        DB::table('civil_status')->insert(array(
        	array(
            'name' => 'SOLTERO',
            'description' => 'soltero',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        	array(
            'name' => 'CASADO',
            'description' => 'casado',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'CONVIVIENTE',
            'description' => 'conviviente',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'DIVORCIADO',
            'description' => 'divorciado',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'VIUDO',
            'description' => 'viudo',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

      // GRADO DE INSTRUCCION
        DB::table('degree_instructions')->insert(array(
          array(
            'name' => 'NO RECUERDA',
            'description' => 'no recuerda',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'PRIMARIA',
            'description' => 'primaria',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        	array(
            'name' => 'SECUNDARIA',
            'description' => 'secundaria',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'SUPERIOR',
            'description' => 'superior',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        // TIPO DE ACOMPAÑANTE
        DB::table('type_passengers')->insert(array(
          array(
            'name' => 'PADRE',
            'description' => 'padre',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'MADRE',
            'description' => 'madre',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        	array(
            'name' => 'ABUELO',
            'description' => 'abuelo',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'ABUELA',
            'description' => 'abuela',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'HERMANO',
            'description' => 'hermano',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'HERMANA',
            'description' => 'hermana',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'TIO',
            'description' => 'tio',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'TIA',
            'description' => 'tia',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'NA',
            'description' => 'na',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

      // ANTECEDENTES GENERALES - PRENATALES
        DB::table('general_prenatals')->insert(array(
          array(
            'name' => 'NO RECUERDA',
            'description' => 'no recuerda',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'INFECCION DE TRACTO URINARIO',
            'description' => 'infeccion de tracto urinario',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        	array(
            'name' => 'PLACENTA PREVIA',
            'description' => 'placenta previa',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'ANEMIA',
            'description' => 'anemia',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'AMENAZA DE ABORTO',
            'description' => 'amenaza de aborto',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'DESPRENDIMIENTO PREMATURO DE LA PLACENTA',
            'description' => 'desprendimiento prematuro de la placenta',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'HIPERTENSION INDUCIDA POR EL EMBARAZO',
            'description' => 'hipertension inducida por el embarazo',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'HIPERDEMESIS GRAVIDICA',
            'description' => 'hiperdemesis gravidica',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'OTROS',
            'description' => 'otros',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        // ANTECEDENTES GENERALES - PARTO
        DB::table('general_births')->insert(array(
          array(
            'name' => 'NO RECUERDA',
            'description' => 'no recuerda',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'NORMAL O EUTOSICO',
            'description' => 'normal o eutosico',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'CESAREA O DISTOSICO',
            'description' => 'cesarea o distosico',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        ));

        // ANTECEDENTES GENERALES - INMUNIZACIONES
        DB::table('general_immunizations')->insert(array(
          array(
            'name' => 'COMPLETO',
            'description' => 'completo',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'INCOMPLETO',
            'description' => 'incompleto',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'NO RECUERDA',
            'description' => 'no recuerda',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'BCG',
            'description' => 'bcg',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'PENTAVALENTE',
            'description' => 'pentavalente',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'HVB',
            'description' => 'hvb',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'APO',
            'description' => 'apo',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        ));


        // ANTECEDENTES GENERALES - HAVITOS NOCIVOS
        DB::table('harmful_habits')->insert(array(
          array(
            'name' => 'TABACO',
            'description' => 'tabaco',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'ALCOHOL',
            'description' => 'alcohol',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'DROGA',
            'description' => 'droga',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'CAFE',
            'description' => 'cafe',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'OTROS',
            'description' => 'otros',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'NO RECUERDA',
            'description' => 'no recuerda',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        // CONSULTA MEDICA - ENFERMEDAD ACTUAL - TIPO INFORMANTE
        DB::table('type_informants')->insert(array(
          array(
            'name' => 'DIRECTA',
            'description' => 'directa',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'INDIRECTA',
            'description' => 'indirecta',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'MIXTA',
            'description' => 'mixta',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        // CONSULTA MEDICA - ENFERMEDAD ACTUAL - APETITO
        DB::table('appetites')->insert(array(
          array(
            'name' => 'NORMAL',
            'description' => 'normal',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'DISMINUIDO',
            'description' => 'disminuido',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'AUMENTADOS',
            'description' => 'aumentados',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        // CONSULTA MEDICA - ENFERMEDAD ACTUAL - SUEÑO
        DB::table('dreams')->insert(array(
          array(
            'name' => 'NORMAL',
            'description' => 'normal',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'DISMINUIDO',
            'description' => 'disminuido',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'AUMENTADOS',
            'description' => 'aumentados',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        // CONSULTA MEDICA - ENFERMEDAD ACTUAL - DEPOSICIONES
        DB::table('depositions')->insert(array(
          array(
            'name' => 'NORMAL',
            'description' => 'normal',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'DISMINUIDO',
            'description' => 'disminuido',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'AUMENTADOS',
            'description' => 'aumentados',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        // CONSULTA MEDICA - ENFERMEDAD ACTUAL - SED
        DB::table('thirsts')->insert(array(
          array(
            'name' => 'NORMAL',
            'description' => 'normal',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'DISMINUIDO',
            'description' => 'disminuido',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'AUMENTADOS',
            'description' => 'aumentados',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        // CONSULTA MEDICA - ENFERMEDAD ACTUAL - ORINA
        DB::table('urines')->insert(array(
          array(
            'name' => 'NORMAL',
            'description' => 'normal',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'DISMINUIDO',
            'description' => 'disminuido',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'AUMENTADOS',
            'description' => 'aumentados',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        

        // CONSULTA MEDICA - TIPO DE DIAGNOSTICO
        DB::table('type_diagnostics')->insert(array(
          array(
            'name' => 'DEFINITIVO',
            'description' => 'definitivo',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

          array(
            'name' => 'PRESUNTIVO',
            'description' => 'presuntivo',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        ));

        // CONSULTA MEDICA TIPO DE VOUCHERS
        DB::table('type_vouchers')->insert(array(
        	array(
            'name' => 'BOLETA DE VENTA',
            'description' => 'Boleta de venta',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        	array(
            'name' => 'FACTURA',
            'description' => 'factura',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        // CONSULTA MEDICA TIPO DE CONCEPTO TRANSACION
        DB::table('type_concept_transactions')->insert(array(
        	array(
            'name' => 'Consulta Médica',
            'description' => 'Consulta Médica',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),
        ));

        // CONSULTA MEDICA TYPO DE UMS
        DB::table('type_ums')->insert(array(
        	array(
            'name' => 'UNIDAD',
            'description' => 'unidad',
            'state' => '1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        ));


        //medical_histories
        // DB::table('medical_histories')->insert(array(
        // 	array(
        //     'patient_id' => 1,
        //     'nro_medical_history' => 'H000000001',
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //         array(
        //     'patient_id' => 2,
        //     'nro_medical_history' => 'H000000002',
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'patient_id' => 3,
        //     'nro_medical_history' => 'H000000003',
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'patient_id' => 1,
        //     'nro_medical_history' => 'H000000004',
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        // ));

        //type_analysis
        DB::table('type_analysis')->insert(array(
        	array(
            'name' => 'tipo de analisis 1',
            'created_at' => date("Y-m-d H:i:s"),
            'updated_at' => date("Y-m-d H:i:s")),

        ));

        //order_analysis
        // DB::table('order_analysis')->insert(array(
        // 	array(
        //     'patient_id' => 1,
        //     'doctor_id' => 1,
        //     'state' => '1',
        //     'state_notification' => 'estado notificacion',
        //     'type_analysis' =>1,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'patient_id' => 2,
        //     'doctor_id' => 1,
        //     'state' => '1',
        //     'state_notification' => 'estado notificacion',
        //     'type_analysis' =>1,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'patient_id' => 3,
        //     'doctor_id' => 1,
        //     'state' => '1',
        //     'state_notification' => 'estado notificacion',
        //     'type_analysis' =>1,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        // ));

        //receipts
        // DB::table('receipts')->insert(array(
        // 	array(
        //     'order_id' => 1,
        //     'patient_id' => 1,
        //     'nro_receipt' => 1001,
        //     'amount' => 100,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'order_id' => 2,
        //     'patient_id' => 2,
        //     'nro_receipt' => 1002,
        //     'amount' => 100,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'order_id' => 3,
        //     'patient_id' => 3,
        //     'nro_receipt' => 1003,
        //     'amount' => 100,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        // ));

        //vouchers
        // DB::table('vouchers')->insert(array(
        // 	array(
        //     'code' => '123',
        //     'state' => 'pendiente',
        //     'nro_voucher' => '0001',
        //     'code_bar' => '001',
        //     'price' => 15,
        //     'quantity' => 2,
        //     'concept_id' => 1,
        //     'um_id' => 1,
        //     'type_voucher_id' =>1,
        //     'patient_id' => 1,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'code' => '12',
        //     'state' => 'cancelado',
        //     'nro_voucher' => '0002',
        //     'code_bar' => '001',
        //     'price' => 15,
        //     'quantity' => 3,
        //     'concept_id' => 1,
        //     'um_id' => 1,
        //     'type_voucher_id' =>1,
        //     'patient_id' => 2,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'code' => '1234',
        //     'state' => 'anulado',
        //     'nro_voucher' => '0003',
        //     'code_bar' => '001',
        //     'price' => 15,
        //     'quantity' => 4,
        //     'concept_id' => 1,
        //     'um_id' => 1,
        //     'type_voucher_id' =>1,
        //     'patient_id' => 3,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        // ));

        //query_offlines
        // DB::table('query_offlines')->insert(array(
        // 	array(
        //     'state' => 'pendiente triaje',
        //     'doctor_id' => 1,
        //     'voucher_id' => 1,
        //     'receipt_id' => 1,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'state' => 'pendiente atencion',
        //     'doctor_id' => 1,
        //     'voucher_id' => 2,
        //     'receipt_id' => 2,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'state' => 'en consulta',
        //     'doctor_id' => 1,
        //     'voucher_id' => 3,
        //     'receipt_id' => 3,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        // ));

        //treatments
        // DB::table('treatments')->insert(array(
        // 	array(
        //     'validity' => 'validity',
        //     'date' => '12/02/2018',
        //     'general_recomendation' => 'no actividades fisicas',
        //     'state_notification' => 'tipo de analisis 1',
        //     //'query_id' => 'tipo de analisis 1',
        //     'query_offline_id' => 1,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'validity' => 'validity',
        //     'date' => '12/02/2018',
        //     'general_recomendation' => 'no actividades mentales',
        //     'state_notification' => 'tipo de analisis 2',
        //     //'query_id' => 'tipo de analisis 1',
        //     'query_offline_id' => 2,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        //     array(
        //     'validity' => 'validity',
        //     'date' => '12/02/2018',
        //     'general_recomendation' => 'no actividades fisicas ni mentales',
        //     'state_notification' => 'tipo de analisis 3',
        //     //'query_id' => 'tipo de analisis 1',
        //     'query_offline_id' => 3,
        //     'created_at' => date("Y-m-d H:i:s"),
        //     'updated_at' => date("Y-m-d H:i:s")),
        // ));

    }
}
