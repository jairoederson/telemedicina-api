<?php

use Illuminate\Database\Seeder;

class CategoryQuestionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         DB::table('category_questions')->insert(array(
        	array('title' => 'Mis Pedidos',
            	'description' => 'categoria informativa',
              'url'=> 'https://www.alo.doctor/mobile/paciente/dist/#/help/list/Pedidos',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

          array('title' => 'Devoluciones y reembolsos',
            	'description' => 'categoria informativa',
              'url'=> 'https://www.alo.doctor/mobile/paciente/dist/#/help/list/devoluciones',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

          array('title' => 'Pago',
            	'description' => 'categoria informativa',
              'url'=> 'https://www.alo.doctor/mobile/paciente/dist/#/help/list/Pago',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

          array('title' => 'Mi cuenta',
            	'description' => 'categoria informativa',
              'url'=> 'https://www.alo.doctor/mobile/paciente/dist/#/help/list/ajustes',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),

          array('title' => 'Promociones',
            	'description' => 'categoria informativa',
              'url'=> 'https://www.alo.doctor/mobile/paciente/dist/#/help/list/Promociones',
              'created_at' => date("Y-m-d H:i:s"),
              'updated_at' => date("Y-m-d H:i:s")),
        ));


        DB::table('answers')->insert(array(
         // categoria mis pedidos
         array('category_id' => '1',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si me llega un producto vencido?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),

         array('category_id' => '1',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si mi pedido no llega?',
               'question_frequency' => '1',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),

         array('category_id' => '1',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si mi pedida llega en mal estado?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),


         // categoria devoluciones y reembolsos
         array('category_id' => '2',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si me llega un producto vencido?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),

         array('category_id' => '2',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si mi pedido no llega?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),

         array('category_id' => '2',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si mi pedida llega en mal estado?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),


         // categoria pago
         array('category_id' => '3',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si me llega un producto vencido?',
               'question_frequency' => '1',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),

         array('category_id' => '3',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si mi pedido no llega?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),


         array('category_id' => '3',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si mi pedida llega en mal estado?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),


         // categoria mi cuenta
         array('category_id' => '4',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si me llega un producto vencido?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),

         array('category_id' => '4',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si mi pedido no llega?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),

         array('category_id' => '4',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si mi pedida llega en mal estado?',
               'question_frequency' => '1',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),


         // categoria mis promociones
         array('category_id' => '5',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si me llega un producto vencido?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),

         array('category_id' => '5',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si mi pedido no llega?',
               'question_frequency' => '0',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),

         array('category_id' => '5',
               'answer' => 'Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Aenean commodo ligula eget dolor. Aenean massa. Cum sociis natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec, pellentesque eu, pretium quis, sem. Nulla consequat massa quis enim.',
               'question' => '¿Qué pasa si mi pedida llega en mal estado?',
               'question_frequency' => '1',
               'created_at' => date("Y-m-d H:i:s"),
               'updated_at' => date("Y-m-d H:i:s")),

       ));

        factory(App\SubcategoryQuestion::class, 10)->create();
    }
}
