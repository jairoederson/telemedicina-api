<?php

use Illuminate\Database\Seeder;

class SpecialtiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('specialties')->insert(array(
        	array('name' => 'Medicina General',
            	'description' => 'La medicina general constituye el primer nivel de atención médica. El médico general es un profesional capacitado para diagnosticar y manejar diferentes patologías comunes y derivar al especialista indicado cuando corresponda.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

            array('name' => 'Anatomía Patológica',
            	'description' => 'La ‘anatomía patológica’ es la especialidad médica que se encarga del estudio de las lesiones celulares, tejidos, órganos, de sus consecuencias estructurales y funcionales y por tanto de las repercusiones en el organismo. Lo hace a través del estudio de muestras titulares (biopsias y piezas quirúrgicas) y celulares (citología).',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Alergología',
            	'description' => 'Se entiende por Alergología la especialidad médica que comprende el conocimiento, diagnóstico y tratamiento de la patología producida por mecanismos inmunológicos, con las técnicas que le son propias; con especial atención a la alergia.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Cardiología ',
            	'description' => 'La cardiología es la especialidad médica que se ocupa de las afecciones del corazón y del aparato circulatorio. Se incluye dentro de las especialidades médicas, es decir que no abarca la cirugía, aún cuando muchas enfermedades cardiológicas son de sanción quirúrgica, por lo que un equipo cardiológico suele estar integrado por cardiólogo, cirujano cardíaco y fisiatra, integrando además a otros especialistas cuando el terreno del paciente así lo requiere.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Dermatología  ',
            	'description' => 'La dermatología es la especialidad médica encargada del estudio de la piel, su estructura, función y enfermedades.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Geriatría',
            	'description' => 'La Geriatría es la especialidad médica que se ocupa de los aspectos preventivos, curativos y de la rehabilitación de las enfermedades del adulto en senectud. La definición de Geriatría suele ir acompañada de la de Gerontología -el estudio de los fenómenos asociados al envejecimiento-, para su mejor diferenciación.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Ginecología',
            	'description' => 'Ginecología significa literalmente La ciencia de la mujer, pero en medicina ésta es la especialidad médica y quirúrgica que trata las enfermedades del sistema reproductor femenino (útero, vagina y ovarios) y de la reproducción.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Hematología',
            	'description' => 'La Hematología es la especialidad médica que se dedica al tratamiento de los pacientes con enfermedades hematológicas, para ello se encarga del estudio e investigación de la sangre y los órganos hematopoyéticos (médula ósea, ganglios linfáticos, bazo, etc) tanto sanos como enfermos.
					Las enfermedades hematológicas afectan la producción de sangre y sus componentes, como los glóbulos rojos, la hemoglobina, las proteínas plasmáticas, el mecanismo de coagulación, etc.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Neurología',
            	'description' => 'La neurología es la especialidad médica que trata los trastornos del sistema nervioso. Específicamente se ocupa de la prevención, diagnóstico, tratamiento y rehabilitación de todas las enfermedades que involucran al sistema nervioso central, el sistema nervioso periférico y el sistema nervioso autónomo, incluyendo sus envolturas (meninges), vasos sanguíneos y tejidos como los músculos.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Oftalmología',
            	'description' => 'La oftalmología es la especialidad médico-quirúrgica que se relaciona con el diagnóstico y tratamiento de los defectos y de las enfermedades del aparato de la visión.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Oncología',
            	'description' => 'La oncología es la especialidad médica dedicada con el diagnóstico y tratamiento del cáncer.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Pediatría',
            	'description' => 'La pediatría es la especialidad médica que estudia al niño y sus enfermedades.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Psiquiatría',
            	'description' => 'La psiquiatría es la especialidad médica que se ocupa del estudio, diagnóstico, tto, prevención y rehabilitación de los trastornos mentales y del comportamiento debido a disfunciones o enfermedades neurológicas o de otros sistemas orgánicos; a factores psicológicos o a disfunciones socioculturales y del contexto medioambiental de los individuos.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Reumatología',
            	'description' => 'La Reumatología es la especialidad médica que abarca todas las enfermedades del aparato locomotor (músculo esqueléticas) y las que afectan tejido conectivo.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Traumatología',
            	'description' => 'La traumatología se ocupa de las lesiones traumáticas de columna y extremidades que afectan a: sus huesos (fracturas, epifisiólisis), ligamentos y articulaciones (esguinces, luxaciones, artritis traumáticas), músculos y tendones (roturas fibrilares, hematomas, contusiones, tendinitis); y piel (heridas).',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s")),

              array('name' => 'Urología',
            	'description' => 'La urología es la especialidad médico-quirúrgica que se ocupa del estudio, diagnóstico y tratamiento de las patologías que afectan al aparato urinario y retroperitoneo de ambos sexos y al aparato reproductor masculino, sin límite de edad.',
            	'estado' => 1,
            	'usuario_created_id' => 1,
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"))


            
    	));
    	
    }
}
