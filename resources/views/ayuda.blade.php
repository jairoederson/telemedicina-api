@extends('layouts/default')

{{-- Page title --}}
@section('title')
Contact
@parent
@stop

{{-- page level styles --}}
@section('header_styles')
    <!--page level css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/ayuda.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/faq.css') }}">
    <!-- <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/mdb.css') }}"> -->

    <!--end of page level css-->
@stop

{{-- breadcrumb --}}
@section('top')

@stop


{{-- Page content --}}
@section('content')
    <!-- Map Section Start -->
    <!-- <div class="">
        <div id="map" style="width:100%; height:400px;"></div>
    </div> -->

    <div class="content">
      <div class="container max-ancho espacio-top espacio-bottom">

        <div class="row">
          <div class="col m3 s12">
            <h3 class="category-title">CATEGORIAS</h3>
            <p class="category-question">
              <a href="">Mi Cuenta(9)</a>
            </p>
            <p class="category-question">
              <a href="">Mis Pedidos(6)</a>
            </p>
            <p class="category-question">
              <a href="">Pagos(9)</a>
            </p>
            <p class="category-question">
              <a href="">Cupones y Descuentos(9)</a>
            </p>
            <p class="category-question">
              <a href="">Devoluciones(9)</a>
            </p>
            <p class="category-question">
              <a href="">Privacidad y Normas(9)</a>
            </p>
            <p class="category-question">
              <a href="">Envios(9)</a>
            </p>
            <p class="category-question">
              <a href="">Ventas Coorporativas(9)</a>
            </p>
          </div>
          <div class="col m9 s12">
            <h3 class="category-title left">MIS PEDIDOS</h3>
            <div class="col s12">
                <div class="panel panel-default">
                  <div class="panel-body">
                    <div class="panel-group panel-accordion faq-accordion">
                      <div id="faq">
                        <div class="mix category-1 col-lg-12 panel panel-default" data-value="1">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="collapsed ubuntu-text" data-toggle="collapse" data-parent="#faq" href="#question1">
                                <strong class="c-gray-light">1.</strong>
                                No puedo acceder a mi cuenta. ¿Que puedo hacer?.
                                <span class="pull-right">
                                  <i class="glyphicon glyphicon-chevron-down"></i>
                                </span>
                              </a>
                            </h4>
                          </div>
                          <div id="question1" class="panel-collapse collapse">
                            <div class="panel-body">
                              <p class="text-justify section-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Impedit quidem delectus rerum eligendi mollitia, repudiandae quae beatae. Et repellat quam atque corrupti iusto architecto impedit explicabo repudiandae qui similique aut iure ipsum quis inventore nulla error aliquid alias quia dolorem dolore, odio excepturi veniam odit veritatis. Quo iure magnam, et cum. Laudantium, eaque non? Tempore nihil corporis cumque dolor ipsum accusamus sapiente aliquid quis ea assumenda deserunt praesentium voluptatibus, accusantium a mollitia necessitatibus nostrum voluptatem numquam modi ab, sint rem.
                              </p>
                              
                              <div class="right section-see-more">
                                <a href="">Ver más</a>
                              </div>
                              
                            </div>
                          </div>
                        </div>
                        <div class="mix category-1 col-lg-12 panel panel-default" data-value="2">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="collapsed ubuntu-text" data-toggle="collapse" data-parent="#faq" href="#question2">
                                <strong class="">2.</strong>
                                Mi cuenta no esta disponible. ¿Que puedo hacer?
                                <span class="pull-right">
                                  <i class="glyphicon glyphicon-chevron-down"></i>
                                </span>
                              </a>
                            </h4>
                          </div>
                          <div id="question2" class="panel-collapse collapse">
                            <div class="panel-body">
                              <p class="text-justify section-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempore, placeat quisquam rerum! Eligendi fugit dolorum tenetur modi fuga nisi rerum, autem officiis quaerat quos. Magni quia, quo quibusdam odio. Error magni aperiam amet architecto adipisci aspernatur! Officia, quaerat magni architecto nostrum magnam fuga nihil, ipsum laboriosam similique voluptatibus facilis nobis? Eius non asperiores, nesciunt suscipit veniam blanditiis veritatis provident possimus iusto voluptas, eveniet architecto quidem quos molestias, aperiam eum reprehenderit dolores ad deserunt eos amet. Vero molestiae commodi unde dolor dicta maxime alias, velit, nesciunt cum dolorem, ipsam soluta sint suscipit maiores mollitia assumenda ducimus aperiam neque enim! Quas culpa dolorum ipsam? Ipsum voluptatibus numquam natus? Eligendi explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae, molestias!
                              </p>
                              <div class="right section-see-more">
                                <a href="">Ver más</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mix category-1 col-lg-12 panel panel-default" data-value="3">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question3">
                                <strong class="c-gray-light">3.</strong>
                                ¿Como puedo cancelar mi cuenta?
                                <span class="pull-right">
                                  <i class="glyphicon glyphicon-chevron-down"></i>
                                </span>
                              </a>
                            </h4>
                          </div>
                          <div id="question3" class="panel-collapse collapse">
                            <div class="panel-body">
                              <p class="text-justify section-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Nisi tempore, placeat quisquam rerum! Eligendi fugit dolorum tenetur modi fuga nisi rerum, autem officiis quaerat quos. Magni quia, quo quibusdam odio. Error magni aperiam amet architecto adipisci aspernatur! Officia, quaerat magni architecto nostrum magnam fuga nihil, ipsum laboriosam similique voluptatibus facilis nobis? Eius non asperiores, nesciunt suscipit veniam blanditiis veritatis provident possimus iusto voluptas, eveniet architecto quidem quos molestias, aperiam eum reprehenderit dolores ad deserunt eos amet. Vero molestiae commodi unde dolor dicta maxime alias, velit, nesciunt cum dolorem, ipsam soluta sint suscipit maiores mollitia assumenda ducimus aperiam neque enim! Quas culpa dolorum ipsam? Ipsum voluptatibus numquam natus? Eligendi explicabo eos, perferendis voluptatibus hic sed ipsam rerum maiores officia! Beatae, molestias!
                              </p>
                              <div class="right section-see-more">
                                <a href="">Ver más</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mix category-2 col-lg-12 panel panel-default" data-value="4">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question4">
                                <strong class="c-gray-light">4.</strong>
                                ¿Cómo puedo usar mi nueva direccion de correo electrónico en mi cuenta?
                                <span class="pull-right">
                                  <i class="glyphicon glyphicon-chevron-down"></i>
                                </span>
                              </a>
                            </h4>
                          </div>
                          <div id="question4" class="panel-collapse collapse">
                            <div class="panel-body">
                              <p class="text-justify section-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                              </p>
                              <div class="right section-see-more">
                                <a href="">Ver más</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mix category-2 col-lg-12 panel panel-default" data-value="4">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question5">
                                <strong class="c-gray-light">5.</strong>
                                ¿Cómo cambio mi direccion de email?
                                <span class="pull-right">
                                  <i class="glyphicon glyphicon-chevron-down"></i>
                                </span>
                              </a>
                            </h4>
                          </div>
                          <div id="question5" class="panel-collapse collapse">
                            <div class="panel-body">
                              <p class="text-justify section-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                              </p>
                              <div class="right section-see-more">
                                <a href="">Ver más</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mix category-2 col-lg-12 panel panel-default" data-value="4">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question6">
                                <strong class="c-gray-light">6.</strong>
                                ¿Por qué ha cambiado mi nivel de socio?
                                <span class="pull-right">
                                  <i class="glyphicon glyphicon-chevron-down"></i>
                                </span>
                              </a>
                            </h4>
                          </div>
                          <div id="question6" class="panel-collapse collapse">
                            <div class="panel-body">
                              <p class="text-justify section-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                              </p>
                              <div class="right section-see-more">
                                <a href="">Ver más</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mix category-2 col-lg-12 panel panel-default" data-value="4">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question7">
                                <strong class="c-gray-light">7.</strong>
                                ¿Cuáles son las ventajas del programa de socios?
                                <span class="pull-right">
                                  <i class="glyphicon glyphicon-chevron-down"></i>
                                </span>
                              </a>
                            </h4>
                          </div>
                          <div id="question7" class="panel-collapse collapse">
                            <div class="panel-body">
                              <p class="text-justify section-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                              </p>
                              <div class="right section-see-more">
                                <a href="">Ver más</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mix category-2 col-lg-12 panel panel-default" data-value="4">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question8">
                                <strong class="c-gray-light">8.</strong>
                                ¿Por qué no puedo ver el precio con descuento?
                                <span class="pull-right">
                                  <i class="glyphicon glyphicon-chevron-down"></i>
                                </span>
                              </a>
                            </h4>
                          </div>
                          <div id="question8" class="panel-collapse collapse">
                            <div class="panel-body">
                              <p class="text-justify section-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                              </p>
                              <div class="right section-see-more">
                                <a href="">Ver más</a>
                              </div>
                            </div>
                          </div>
                        </div>
                        <div class="mix category-2 col-lg-12 panel panel-default" data-value="4">
                          <div class="panel-heading">
                            <h4 class="panel-title">
                              <a class="collapsed" data-toggle="collapse" data-parent="#faq" href="#question9">
                                <strong class="c-gray-light">9.</strong>
                                ¿Cómo me registro en Humanidad Sur?
                                <span class="pull-right">
                                  <i class="glyphicon glyphicon-chevron-down"></i>
                                </span>
                              </a>
                            </h4>
                          </div>
                          <div id="question9" class="panel-collapse collapse">
                            <div class="panel-body">
                              <p class="text-justify section-body">
                                Lorem ipsum dolor sit amet, consectetur adipisicing elit. Perferendis earum autem consectetur labore eius tenetur esse, in temporibus sequi cum voluptatem vitae repellat nostrum odio perspiciatis dolores recusandae necessitatibus, unde, deserunt voluptas possimus veniam magni soluta deleniti! Architecto, quidem, totam. Fugit minus odit unde ea cupiditate ab aperiam sed dolore facere nihil laboriosam dolorum repellat deleniti aliquam fugiat laudantium delectus sint iure odio, necessitatibus rem quisquam! Ipsum praesentium quam nisi sint, impedit sapiente facilis laudantium mollitia quae fugiat similique. Dolor maiores aliquid incidunt commodi doloremque rem! Quaerat, debitis voluptatem vero qui enim, sunt reiciendis tempore inventore maxime quasi fugiat accusamus beatae modi voluptates iste officia esse soluta tempora labore quisquam fuga, cum. Sint nemo iste nulla accusamus quam qui quos, vero, minus id. Eius mollitia consequatur fugit nam consequuntur nesciunt illo id quis reprehenderit obcaecati voluptates corrupti, minus! Possimus, perspiciatis!
                              </p>
                              <div class="right section-see-more">
                                <a href="">Ver más</a>
                              </div>
                            </div>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </div>
        
      </div>
    </div>
  </div>

@stop

{{-- page level scripts --}}
@section('footer_scripts')
<script type="text/javascript" src="{{ asset('assets/js/frontend/faq.js') }}"></script>
<script src="{{ asset('assets/vendors/wow/js/wow.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/vendors/mixitup/jquery.mixitup.js') }}"></script>

@stop
