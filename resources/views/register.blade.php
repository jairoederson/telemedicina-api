<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrese</title>
    <!--global css starts-->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/bootstrap.min.css') }}">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/farmacias-logo.ico') }}">
    <link href="{{ asset('assets/vendors/daterangepicker/css/daterangepicker.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/datetimepicker/css/bootstrap-datetimepicker.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('assets/vendors/clockface/css/clockface.css') }}" rel="stylesheet" type="text/css"/>
    <link href="{{ asset('assets/vendors/jasny-bootstrap/css/jasny-bootstrap.css') }}" rel="stylesheet" type="text/css" />
    <!--end of global css-->
    <!--page level css starts-->
    <!-- <link type="text/css" rel="stylesheet" href="{{asset('assets/vendors/iCheck/css/all.css')}}" /> -->
    <script src='https://www.google.com/recaptcha/api.js'></script>

    <!--end of page level css-->
    <!-- MATERIAL DESIGN -->
    <!-- Compiled and minified CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('assets/css/frontend/register.css') }}">

    <!-- Compiled and minified JavaScript -->

</head>
<body class="bg-naranja">
  <div class="max-ancho">
    <div class="container">
    <!--Content Section Start -->
    <div class="row">
        <div class="box animation flipInX" style="border-radius: 10px; max-width: 380px">
          <a href="/">
            <img src="{{ asset('assets/images/medicentros-peruanos.png') }}" alt="logo" class="img-responsive mar" width="180px">
          </a>
            <h4 class="text-center" style="color: #9f9f9f">Ingresa tus datos</h4>
            <!-- Notifications -->
            <div id="notific">
            @include('notifications')
            </div>

            @if($infoSocialite['avatar_original'] != "https://www.alo.doctor/images/user/default/default.jpg")
            <div style="text-align: center;">
              <img src="{{$infoSocialite['avatar_original']}}" alt="" width="85px" style="border-radius: 50%;">
            </div>
            @endif
            
            <form action="{{ route('register') }}" method="POST" id="reg_form">
            
                <input type="hidden" name="_token" value="{{ csrf_token() }}" />

                <br>

                <input id="img" type="hidden" name="img" value="{{$infoSocialite['avatar_original']}}">
                <input id="provider" type="hidden" name="provider" value="{{$infoSocialite['provider']}}">
                <input id="provider_id" type="hidden" name="provider_id" value="{{$infoSocialite['provider_id']}}">

                <div class="form-group" style="padding-bottom: 10px">
                    <label>Tipo de documento</label>
                    <select id="type_document_id" class="form-control" name="type_document_id" required>
                        <option value="1">DNI</option>
                        <option value="2">CARNET DE EXTRANJERIA</option>
                        <option value="3">PASAPORTE</option>
                        <option value="4">CARNET IDENTIDAD</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Fecha de emisión</label>
                    <div class="input-group issue-date">
                        <!-- <div class="input-group-addon">
                        </div> -->
                        <i class="livicon" data-name="laptop" data-size="16" data-c="#e22715" data-hc="#e22715" data-loop="true"></i>
                        <!-- <i class="fa fa-user icon"></i> -->
                        <input type="text" class="form-control" id="rangepicker4"/>
                    </div>
                    <!-- /.input group -->
                </div>
                <br>
                <div class="group form-group {{ $errors->first('numdoc', 'has-error') }}">
                    <input id="numdoc" onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" type="number" value="{!! old('numdoc') !!}" name="numdoc" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="material">Número de documento</label>
                    {!! $errors->first('numdoc', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="group form-group {{ $errors->first('email', 'has-error') }}">
                    <input onkeyup="this.value = this.value.replace(/[&$*<>]/g, '')" type="email" name="email" value="{{$infoSocialite['email']}}" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="material">Correo</label>
                    {!! $errors->first('email', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="group form-group {{ $errors->first('tel', 'has-error') }}">
                  <input id="tel" onkeyup="this.value = this.value.replace(/[&$*<>]/g, ''); validateTel()" type="tel" name="tel" value="{!! old('tel') !!}" required>
                  <span class="highlight"></span>
                  <span class="bar"></span>
                  <label class="material">Celular</label>
                  {!! $errors->first('tel', '<span class="help-block">:message</span>') !!}
                  <span id="validateTel" style="color: red"></span>
                </div>

                <div class="group form-group {{ $errors->first('password', 'has-error') }}">
                    <span id="icon-span" onclick="showPassword()" class="glyphicon glyphicon-eye-open icon-visibility" style="cursor: pointer; padding-left: 20px;"></span>
                    <input id="password" type="password" name="password" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="material"> Contraseña</label>
                    {!! $errors->first('password', '<span class="help-block">:message</span>') !!}
                </div>

                <div class="group form-group {{ $errors->first('password_confirm', 'has-error') }}" style="margin-bottom: 20px">
                    <span id="icon-span-rep" onclick="showPasswordRep()" class="glyphicon glyphicon-eye-open icon-visibility" style="cursor: pointer; padding-left: 20px;"></span>
                    <input id="rep-password" type="password" name="password_confirm" required>
                    <span class="highlight"></span>
                    <span class="bar"></span>
                    <label class="material">Repetir Contraseña</label>
                    {!! $errors->first('password_confirm', '<span class="help-block">:message</span>') !!}
                </div>
                <div class="req-container" id="validation-password" style="display: none">
                  <ul style="padding-left: 5px">
                    <li style="list-style: none;" id="req-length"><span class="glyphicon glyphicon-remove-circle"> </span>&nbsp8 caracteres</li>
                    <li style="list-style: none;" id="req-upper"><span class="glyphicon glyphicon-remove-circle"> </span>&nbsp1 mayúscula</li>
                    <li style="list-style: none;" id="req-lower"><span class="glyphicon glyphicon-remove-circle"> </span>&nbsp1 minúscula</li>
                    <li style="list-style: none;" id="req-digit"><span class="glyphicon glyphicon-remove-circle"> </span>&nbsp1 dígito</li>
                    <li style="list-style: none;" id="req-special"><span class="glyphicon glyphicon-remove-circle"> </span>&nbsp1 caracter especial</li>
                  </ul>
                </div>
            <div>
                <div class="clearfix"></div>
                <!-- <h5>Genero</h5>
                <div class="form-group {{ $errors->first('gender', 'has-error') }}">
                  <label style="position: inline" class="radio-inline">
                    <input type="radio" name="gender" id="inlineRadio1" value="male">Masculino
                  </label>

                  <label style="position: inline" class="radio-inline">
                    <input type="radio" name="gender" id="inlineRadio2" value="female" >Femenino
                  </label>
                    {!! $errors->first('gender', '<span class="help-block">:Mensaje</span>') !!}
                </div> -->

                <div class="checkbox cb-padding-top cb-padding-bottom">
                    <label>
                        <input id="terms-conditions" type="checkbox" name="subscribed" style="border: 1px solid">  Acepto los <a href="" data-toggle="modal" data-target="#term-condition" class="text-link-color"> términos y condiciones</a>
                    </label>
                </div>
                <div class="center">
                  <div class="g-recaptcha" data-sitekey="6Lf5-tcZAAAAAAXUQuvG3a8dL93N3IUP87ZlMe31"></div>
                </div>
                
                <br>
                <button type="submit" class="btn btn-block btn-color" style="color: #e22715; background-color: #fff; border: 1px solid;">REGISTRARSE</button>
                <br>
                  Si ya tiene una cuenta. Por favor <a href="{{ route('login') }}" class="text-link-color"> Inicie Sesión</a>
            </form>
        </div>
    </div>
    <!-- //Content Section End -->
  </div>
  </div>

  <!-- SECTION MODAL -->
  <div id="term-condition" class="modal fade" role="dialog">
    <div class="row modal-dialog">
      <div class="modal-content">
        <div class="panel panel-primary" id="hidepanel1">
          <div class="panel-heading">
            <div class="row">

              <div class="col-md-11 modal-header">
                <h3 class="panel-title">
                  <b>
                    Términos y condiciones
                  </b>
                </h3>
              </div>
              <div class="col-md-1 pull-right icon-close" style="padding-top:13px">
                <a href="" data-dismiss="modal" style="margin-top:20px">
                  <b>X</b>
                </a>
              </div>
            </div>
          </div>
        <div class="panel-body">

          <div class="content-tc">
            <ol>
              <li>
                <b>Derechos de propiedad</b>
              </li>
              <p>Entre usted y Mifarma, Mifarma es dueño único y exclusivo, de todos los derechos, título e intereses en y del Sitio Web, de todo el contenido (incluyendo, por ejemplo, audio, fotografías, ilustraciones, gráficos, otros medios visuales, videos, copias, textos, software, títulos, archivos de Onda de choque, etc.), códigos, datos y materiales del mismo, el aspecto y el ambiente, el diseño y la organización del Sitio Web y la compilación de los contenidos, códigos, datos y los materiales en el Sitio Web, incluyendo pero no limitado a, cualesquiera derechos de autor, derechos de marca, derechos de patente, derechos de base de datos, derechos morales, derechos sui generis y otras propiedades intelectuales y derechos patrimoniales del mismo. Su uso del Sitio Web no le otorga propiedad de ninguno de los contenidos, códigos, datos o materiales a los que pueda acceder en o a través del Sitio Web.</p>

              <li><b>Licencia limitada</b></li>
              <p>Usted puede acceder y ver el contenido del Sitio Web desde su computadora o desde cualquier otro aparato y, a menos de que se indique de otra manera en estos Términos y Condiciones o en el Sitio Web, sacar copias o impresiones individuales del contenido del Sitio Web para su uso personal, interno únicamente. El uso del Sitio Web y de los servicios que se ofrecen en o a través del Sitio Web, son sólo para su uso personal, no comercial.</p>

              <li><b>Uso prohibido</b></li>
              <p>Cualquier distribución, publicación o explotación comercial o promocional del Sitio Web, o de cualquiera de los contenidos, códigos, datos o materiales en el Sitio Web, está estrictamente prohibida, a menos de que usted haya recibido el previo permiso expreso por escrito del personal autorizado de Mifarma o de algún otro poseedor de derechos aplicable. A no ser como está expresamente permitido en el presente contrato, usted no puede descargar, informar, exponer, publicar, copiar, reproducir, distribuir, transmitir, modificar, ejecutar, difundir, transferir, crear trabajos derivados de, vender o de cualquier otra manera explotar cualquiera de los contenidos, códigos, datos o materiales en o disponibles a través del Sitio Web. Usted se obliga además a no alterar, editar, borrar, quitar, o de otra manera cambiar el significado o la apariencia de, o cambiar el propósito de, cualquiera de los contenidos, códigos, datos o materiales en o disponibles a través del Sitio Web, incluyendo, sin limitación, la alteración o retiro de cualquier marca comercial, marca registrada, logo, marca de servicios o cualquier otro contenido de propiedad o notificación de derechos de propiedad. Usted reconoce que no adquiere ningún derecho de propiedad al descargar algún material con derechos de autor de o a través del Sitio Web. Si usted hace otro uso del Sitio Web, o de los contenidos, códigos, datos o materiales que ahí se encuentren o que estén disponibles a través del Sitio Web, a no ser como se ha estipulado anteriormente, usted puede violar las leyes de derechos de autor y otras leyes de los Estados Unidos y de otros países, así como las leyes estatales aplicables, y puede ser sujeto a responsabilidad legal por dicho uso no autorizado.</p>

              <li><b>Marcas comerciales</b></li>
              <p>Las marcas comerciales, logos, marcas de servicios, marcas registradas (conjuntamente las "Marcas Comerciales") expuestas en el Sitio Web o en los contenidos disponibles a través del Sitio Web son Marcas Comerciales de Mifarma registradas y no registradas y otras, y no pueden ser usadas con respecto a productos y/o servicios que no estén relacionados, asociados o patrocinados por sus poseedores de derechos y que puedan causar confusión a los clientes, o de alguna manera que denigre o desacredite a sus poseedores de derechos. Todas las Marcas Comerciales que no sean de Mifarma que aparezcan en el sitio Web o en o a través de los servicios del Sitio Web, si las hubiera, son propiedad de sus respectivos dueños. Nada que esté contenido en el Sitio Web deberá ser interpretado como otorgando, por implicación, desestimación, o de otra manera, alguna licencia o derecho para usar alguna Marca Comercial expuesta en el Sitio Web sin el permiso escrito de Mifarma o de terceros que puedan ser dueños de dicha Marca Comercial. El mal uso de las Marcas Comerciales expuestas en el Sitio Web o en o a través de cualquiera de los servicios del Sitio Web está estrictamente prohibido.</p>

              <li><b>Derechos de propiedad</b></li>
              <p>En el curso del uso que usted haga del Sitio Web y/o de los servicios puestos a su disposición en o a través del Sitio Web, se le puede pedir que nos proporcione cierta información personalizada (dicha información en lo sucesivo "Información del Usuario"). Las políticas de uso y recopilación de información de Mifarma con respecto a la privacidad de dicha Información del Usuario se establecen en la Política de Privacidad del Sitio Web, la cual está incorporada al mismo como referencia para todos los propósitos. Usted reconoce y acepta ser el único responsable de la exactitud del contenido de la Información del Usuario.</p>

              <li><b>Materiales presentados</b></li>
              <p>A menos que se solicite específicamente, no pedimos ni deseamos recibir ninguna información confidencial, secreta o patrimonial, ni otro material de usted a través del Sitio Web, por correo electrónico o de cualquier otra manera. Cualquier información, trabajos creativos, demostración, ideas, sugerencias, conceptos, métodos, sistemas, diseños, planes, técnicas u otros materiales que nos haya mandado o presentado (incluyendo, por ejemplo y sin limitación, aquello que usted presenta o envía a nuestros grupos de chateo, tablas de mensajes y/o a nuestros ‘blogs’, o que nos manda vía correo electrónico) ("Materiales Presentados") se considerará como no confidencial o secreto y que puede ser usado por nosotros de cualquier manera consistente con la Política de Privacidad del Sitio Web. Al presentarnos o mandarnos Materiales Presentados, usted: (i) representa y garantiza que los Materiales Presentados son originales suyos, que ninguna otra persona tiene ningún derecho sobre ellos, y que cualquier "derecho moral" sobre los Materiales Presentados ha sido renunciado, y (ii) usted nos concede, a nosotros y a nuestros afiliados, derecho y licencia libres de regalías, sin restricciones, mundiales, perpetuos, irrevocables, no exclusivos y totalmente transferibles, que pueden ser cedidos y sub-licenciados, para usar, copiar, reproducir, modificar, adaptar, publicar, traducir, crear trabajos derivados de, distribuir, ejecutar, exponer e incorporar en otros trabajos cualquiera de los Materiales Presentados (todos o en parte) en cualquier forma, medio o tecnología no conocida o por desarrollar, incluyendo propósitos promocionales y/o comerciales. No podemos ser responsables de conservar ningún Material Presentado proporcionado por usted y podemos borrar o destruir dicho Material Presentado en cualquier momento.</p>

              <li><b>Conducta prohibida del usuario</b></li>
              <p> Usted garantiza y está de acuerdo en que, mientras use el Sitio Web y los diversos servicios y artículos que se ofrecen en o a través del Sitio Web, usted no: (a) personalizará a ninguna persona o entidad ni desvirtuará su afiliación con alguna otra persona o entidad; (b)  insertará su propio anuncio, posicionamiento de marca o algún otro contenido promocional o el de un tercero  en cualquiera de los contenidos, materiales o servicios o materiales del Sitio Web (por ejemplo, sin limitación, en una actualización RSS o en un programa de radio grabado (podcast) recibido de Mifarma o de algún otro modo a través del Sitio Web), ni usará, redistribuirá, republicará o explotará dichos contenidos o servicios con cualquier otro propósito adicional comercial o promocional; ni (c) intentará ganar acceso no autorizado a otros sistemas de cómputo a través del Sitio Web. Usted no: (i) participará en navegar por la red, en "raspar (scraping) la pantalla", "raspar (scraping) la base da datos", en recolectar direcciones de correo electrónico, direcciones inalámbricas u otra información personal o de contactos, o cualquier otro medio automático de obtener listas de usuarios u otra información de o a través del sitio Web o de los servicios ofrecidos en o a través del Sitio Web, incluyendo, sin limitación, cualquier información que se encuentre en algún servidor o base de datos relacionada con el Sitio Web o los servicios ofrecidos en o a través del Sitio Web; (ii) obtendrá o intentará obtener acceso no autorizado a los sistemas de cómputo, materiales o información por cualquier medio; (iii) usará el Sitio Web o los servicios puestos a su disposición en o a través del Sitio Web de alguna manera con la intención de interrumpir, dañar, deshabilitar, sobrecargar o deteriorar el Sitio Web o dichos servicios, incluyendo, sin limitación, mandar mensajes masivos no solicitados o "inundar" servidores con solicitudes; (iv) usará el Sitio Web o los servicios o artículos del Sitio Web en violación de la propiedad intelectual o de otros derechos legales o patrimoniales de Time Inc o de algún tercero; ni (v) usará el Sitio Web o los servicios del Sitio Web en violación de cualquier ley aplicable. Usted se obliga además, a no intentar (o alentar o apoyar el intento de otro) a embaucar, destruir, decodificar, o de otro modo alterar o interferir con el Sitio Web o con los servicios del Sitio Web, o con cualquier contenido del mismo, o hacer cualquier uso no autorizado del mismo. Usted se obliga a no usar el Sitio Web de alguna manera que pudiera dañar, deshabilitar, sobrecargar o deteriorar el Sitio Web o interferir con que cualquier otra persona pueda usar o disfrutar del Sitio Web o de cualquiera de sus servicios. Usted no obtendrá ni intentará obtener algún material o información a través de cualquier medio que no haya sido estipulado o puesto a la disposición del público intencionalmente a través del Sitio Web.</p>

              <li><b>Foros Públicos</b></li>
              <p>Mifarma puede, de vez en cuando, tener servicios de mensajería, servicios de chateo, tableros de noticias, blogs, otros foros y otros servicios disponibles en o a través del Sitio Web. Además de cualquier otra normatividad y regulación que podamos publicar con respecto a un servicio en particular, usted se obliga a no cargar, informar, transmitir, distribuir o de otra manera publicar a través del Sitio Web o de cualquier servicio o artículo puesto a la disposición en o a través del Sitio Web, cualquier material que (i) restrinja o inhiba a cualquier otro usuario de usar y disfrutar del Sitio Web o de los servicios del Sitio Web, (ii) sea fraudulento, ilegal, amenazante, abusivo, hostigante, calumnioso, difamatorio, obsceno, vulgar, ofensivo, pornográfico, profano, sexualmente explícito o indecente, (iii) constituya o aliente conductas que pudieran constituir una ofensa criminal, dar lugar a responsabilidad civil o de otro modo violar cualquier ley local, estatal, nacional o internacional, (iv) viole, plagie o infrinja los derechos de terceros incluyendo, sin limitación, derechos de autor, marcas comerciales, secretos comerciales, confidencialidad, contratos, patentes, derechos de privacidad o publicidad o cualquier otro derecho de propiedad, (v) contenga un virus, elemento de espionaje u otro componente dañino, (vi) contenga enlaces fijos, publicidad, cartas de cadenas o esquemas de pirámides de cualquier tipo, o (vii) constituya o contenga indicaciones de origen, endosos o declaraciones de hechos falsos o engañosos. Usted además se obliga a no personificar a cualquier otra persona o entidad, ya sea real o ficticia, incluyendo cualquier persona de Mifarma Usted tampoco puede ofrecer comprar o vender algún producto o servicio en o a través de sus comentarios presentados en nuestros foros. Solamente usted es responsable del contenido y de las consecuencias de cualquiera de sus actividades.</p>

              <li><b>Derecho de monitoreo y control</b></li>
              <p>Mifarma se reserva el derecho, pero no tiene la obligación, de monitorear y/o revisar todos los materiales enviados al Sitio Web o a través de los servicios o artículos del Sitio Web por los usuarios, y Mifarma no es responsable de dichos materiales enviados por los usuarios. Sin embargo, Mifarma se reserva el derecho en todo momento de divulgar cualquier información que sea necesaria para satisfacer cualquier ley, reglamento o solicitud gubernamental, o de editar, rehusarse a colocar o a quitar cualquier información o materiales, todos o en parte, que a discreción únicamente de Mifarma sean censurables o en violación de estos Términos de Uso, de las políticas de Time Inc o de la ley aplicable. También podemos imponer límites sobre ciertos artículos de los foros o restringir su acceso a parte o a todos los foros sin notificación o sanción, si creemos que usted está en incumplimiento de las directrices establecidas en este párrafo, nuestros términos y condiciones o la ley aplicable, o por cualquier otra razón sin notificación o responsabilidad.</p>

              <li><b>Información Privada o Delicada en Foros Públicos</b></li>
              <p>Es importante recordar que los comentarios presentados en un foro pueden ser registrados y almacenados en múltiples lugares, tanto en nuestro Sitio Web como en otra parte en Internet, los cuales pueden ser accesibles durante mucho tiempo y no se tiene control sobre quién los leerá eventualmente. Es por lo tanto importante que tenga usted cuidado y sea selectivo acerca de la información personal que divulgue acerca de usted y de otros, y en especial, no debe divulgar información delicada, patrimonial o confidencial en sus comentarios en nuestros foros públicos.</p>

              <li><b>Enlaces con el Sitio Web</b></li>
              <p>Usted está de acuerdo en que si incluye un enlace (link) de cualquier otro sitio web al Sitio Web, dicho enlace se abrirá en una nueva ventana navegadora y se enlazará con la versión completa de una página formateada HTML de este Sitio Web. Usted no tiene permitido enlazarse directamente a ninguna imagen almacenada en el Sitio Web o en nuestros servicios, como sería usar un método de enlace "en-línea" para provocar que la imagen almacenada por nosotros fuera expuesta en otro sitio web. Usted se obliga a no descargar o usar imágenes almacenadas en este Sitio Web en otro sitio web, con cualquier propósito, incluyendo, sin limitación, publicar dichas imágenes en otro sitio web. Usted se obliga a no enlazarse de cualquier otro sitio web a este Sitio Web de tal manera que el Sitio Web, o cualquier página del Sitio Web, esté "enmarcado", rodeado u ofuscado por los contenidos, materiales o posicionamientos de marca de cualquier tercero. Nos reservamos todos nuestros derechos bajo la ley para insistir en que cualquier enlace al Sitio Web sea descontinuado y a revocar su derecho a enlazarse al Sitio Web de cualquier otro sitio web, en cualquier momento en el que le mandemos notificación por escrito.</p>

              <li><b>Indemnización</b></li>
              <p>Usted se obliga a defender, indemnizar y a sacar a Mifarma y a los directores, funcionarios, empleados y agentes de Mifarma y sus afiliados en paz y a salvo de cualquier demanda, responsabilidad, costos y gastos, de cualquier naturaleza, incluyendo honorarios de abogados, en que incurriera como resultado del uso del Sitio Web, su colocación o transmisión de cualquier mensaje, contenido, información, software u otros materiales a través del Sitio Web, o su incumplimiento o violación de la ley o de estos Términos y Condiciones. Mifarma se reserva el derecho, a su propio costo, de asumir la defensa y control exclusivos de cualquier asunto de otra manera sujeto a indemnización por parte suya, y en dicho caso, usted se obliga a cooperar con Mifarma en la defensa de dicha demanda.</p>

              <li><b>Órdenes de Productos y Servicios</b></li>
              <p>Podemos poner ciertos productos a la disposición de visitantes y registrados del Sitio Web. Si usted ordena cualquier producto, por el presente documento usted representa y garantiza que tiene 18 años de edad o más. Se obliga a pagar la totalidad de los precios de cualquier compra que haga, ya sea con tarjeta de crédito/débito concurrente con su orden en línea o por otro medio de pago aceptable para Mifarma Usted se obliga a pagar todos los impuestos aplicables. Si el pago no es recibido por nosotros de parte del emisor de su tarjeta de crédito o débito o de sus agentes, usted se obliga a pagar todas las cantidades debidas al momento de la reclamación por nuestra parte. Algunos productos que usted compra y/o descarga en o a través del Sitio Web pueden estar sujetos a términos y condiciones adicionales que le serán presentados al momento de dicha compra o descarga.</p>

              <li><b>Sitios Web de Terceros</b></li>
              <p>Usted puede enlazar (link) del Sitio Web a sitios web de terceros y terceros pueden enlazarse al Sitio Web ("Sitios Enlazados"). Usted reconoce y está de acuerdo en que nosotros no tenemos responsabilidad sobre la información, contenido, productos, servicios, anuncios, códigos u otros materiales que puedan o no puedan ser proporcionados por o a través de los Sitios Enlazados, aún si son propiedad de o son dirigidos por afiliados nuestros. Los enlaces (links) a Sitios Enlazados no constituyen un aval o patrocinio nuestro de dichos sitios web o de la información, contenido, productos, servicios, anuncios, códigos u otros materiales presentados en o a través de dichos sitios web. La inclusión de cualquier enlace a dichos sitios en nuestro Sitio no implica el aval, patrocinio o recomendación de ese sitio de Mifarma Mifarma rechaza cualquier responsabilidad por los enlaces (1) de otro sitio web a este Sitio Web y (2) a otro sitio web de este Sitio Web. Mifarma no puede garantizar los estándares de cualquier sitio web al cual se le proporcionen enlaces en este Sitio Web, ni será Mifarma responsable de los contenidos de dichos sitios, o de cualquier enlace subsecuente. Mifarma no representa o garantiza que los contenidos del sitio web de algún tercero sean exactos, que cumplan con la ley estatal o federal, o que cumplan con las leyes de derechos de autor o con otras leyes de propiedad intelectual. Mifarma tampoco es responsable de cualquier forma de transmisión recibida de cualquier sitio web enlazado. Cualquier confianza depositada en los contenidos de un sitio web de terceros es hecha por su propio riesgo y usted asume todas las responsabilidades y consecuencias que resulten de dicha confianza.</p>


            </ol>
          </div>
        </div>
        <div class="panel-footer">
          <div class="modal-pie">
            <div class="text-right">
                <button data-dismiss="modal" class="btn bg-naranja" style="color: #ffffff;">Cancelar</button>
                &nbsp;
                <button data-dismiss="modal" onclick="acceptTerms()" class="btn bg-verde" style="color: #ffffff;">Acepto</button>
            </div>
          </div>
        </div>
      </div>
      </div>
    </div>
  </div>
  <!-- SECTION MODAL END -->
<!--global js starts-->
<script src="{{ asset('assets/vendors/moment/js/moment.min.js') }}" type="text/javascript"></script>
<script type="text/javascript" src="{{ asset('assets/js/jquery.min.js') }}"></script>
<script type="text/javascript" src="{{ asset('assets/js/bootstrap.min.js') }}"></script>
<script src="{{ asset('assets/vendors/daterangepicker/js/daterangepicker.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/datetimepicker/js/bootstrap-datetimepicker.min.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/vendors/clockface/js/clockface.js') }}" type="text/javascript"></script>
<script src="{{ asset('assets/js/pages/datepicker.js') }}" type="text/javascript"></script>
<!--global js end-->

<script type="text/javascript">
    $("#password").focusin(function() {
      $("#validation-password").show();
    });

    $("#rep-password").focusin(function() {
      $("#validation-password").show();
    });
  // METHOD SHOW PASSWORD
  function acceptTerms(){
    // $('#terms-conditions').is(':checked');
    $("#terms-conditions").prop('checked', true);
  }
  $(function () {
    "user strict";

    /**
    * start password checking logic
    */
      password.init();

  });

/**
 * Hold functions related to client side password validation
 */
var password = (function () {

    "use strict";

    var minPasswordLength = 8;

    var _hasLowerCase = /[a-z]/;
    var _hasUpperCase = /[A-Z]/;
    var _hasDigit = /\d/;
    // match special characters except space
    var _hasSpecial = /(_|[^\w\d ])/;

    var password = [];
    var password2 = [];

    var hasEightCharsListItem,
        hasUpperCaseListItem,
        hasLowerCaseListItem,
        hasSpecialListItem,
        hasDigitListItem;

    // Enforces that password2 = password, and display an error message if it does not
    var mustMatch = function () {

        if (password.val() !== password2.val()) {
            // show not matching error
            password2.addClass('invalid');
            return false;
        }

        password2.removeClass('invalid');
        return true;
    };

    // check validation and adjust classes
    var checkAndSwitchClasses = function (has, $element) {
        if (has) {
            $element.find(".glyphicon").removeClass("glyphicon-remove-circle").removeClass('invalid').addClass('valid').addClass("glyphicon-ok-circle");
            return true;
        }

        $element.find(".glyphicon").removeClass("glyphicon-ok-circle").removeClass('valid').addClass('invalid').addClass("glyphicon-remove-circle");
        return false;

    };

    // Enforces server side password rules on the client for convenience
    var enforceRules = function () {

        $('.invalid').removeClass('invalid');

        var pw = password.val().toLowerCase();

        var hasEight = pw.length >= minPasswordLength;
        var hasLower = _hasLowerCase.test(password.val());
        var hasUpper = _hasUpperCase.test(password.val());
        var hasDigit = _hasDigit.test(password.val());
        var hasSpecial = _hasSpecial.test(password.val());

        checkAndSwitchClasses(hasEight, hasEightCharsListItem);
        checkAndSwitchClasses(hasLower, hasLowerCaseListItem);
        checkAndSwitchClasses(hasUpper, hasUpperCaseListItem);
        checkAndSwitchClasses(hasDigit, hasDigitListItem);
        checkAndSwitchClasses(hasSpecial, hasSpecialListItem);

        if (pw.length === 0) $('.invalid').removeClass('invalid');

        // don't move forward until the password is actually *good*
/*        if (!(hasEight && hasLower && hasUpper && hasDigit && hasSpecial)) {
            return false;
        }*/

      if (mustMatch() && (hasEight && hasLower && hasUpper && hasDigit && hasSpecial)){
        $('#submit').addClass('valid');
      } else {
        $('#submit').removeClass('valid');
      }
    };

    return {

        init: function () {
            // hook all password/password2 fields on a page
            password = $('#password');
            password2 = $('#rep-password');

            // hook all req list items
            hasEightCharsListItem = $('#req-length');
            hasUpperCaseListItem = $('#req-upper');
            hasLowerCaseListItem = $('#req-lower');
            hasSpecialListItem = $('#req-special');
            hasDigitListItem = $('#req-digit');

            password.keyup(enforceRules);
            password2.keyup(enforceRules);

        }
    };
}());

  function showPassword() {
    var x = document.getElementById("password");
    if (x.type === "password") {
      $("#icon-span").removeClass('glyphicon-eye-open');
      $("#icon-span").addClass('glyphicon-eye-close');
        x.type = "text";
    } else {
      $("#icon-span").removeClass('glyphicon-eye-close');
      $("#icon-span").addClass('glyphicon-eye-open');
        x.type = "password";
    }
  }
  function showPasswordRep() {
    var x = document.getElementById("rep-password");
    if (x.type === "password") {
      $("#icon-span-rep").removeClass('glyphicon-eye-open');
      $("#icon-span-rep").addClass('glyphicon-eye-close');
        x.type = "text";
    } else {
      $("#icon-span-rep").removeClass('glyphicon-eye-close');
      $("#icon-span-rep").addClass('glyphicon-eye-open');
        x.type = "password";
    }
  }

  function medico(){
    var cmp = document.getElementById("cmp").style.display ;
    if(cmp == 'none'){
      document.getElementById("cmp").style.display = 'block';
      document.getElementById("cmpField").required = true;
      document.getElementById("specialty").style.display = 'block';
      document.getElementById("specialtyField").required = true;
    }else {
      document.getElementById("cmp").style.display = 'none';
      document.getElementById("cmpField").required = false;
      document.getElementById("specialty").style.display = 'none';
      document.getElementById("specialtyField").required = false;
    }
  }

  $("#numdoc").keyup(function(){
    let type_document_id = $("#type_document_id").val();
    if(type_document_id == 1){
      let numdoc = $("#numdoc").val();
      if(numdoc.length > 8){
        $("#numdoc").val(($("#numdoc").val()).slice(0, -1));
      }

    }else if(type_document_id == 2){
      let numdoc = $("#numdoc").val();
      if(numdoc.length > 12){
        $("#numdoc").val(($("#numdoc").val()).slice(0, -1));
      }
    }else if(type_document_id == 3){
      let numdoc = $("#numdoc").val();
      if(numdoc.length > 12){
        $("#numdoc").val(($("#numdoc").val()).slice(0, -1));
      }
    }else if(type_document_id == 4){
      let numdoc = $("#numdoc").val();
      if(numdoc.length > 15){
        $("#numdoc").val(($("#numdoc").val()).slice(0, -1));
      }
    }

  });

  function validateTel(){
    let tel = $("#tel").val();
    let validate = new RegExp("^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{3,6}$");
    
    if(validate.test(tel)){
      $('#validateTel').text("");
    }else{
      if(tel.length > 8){
        $('#validateTel').text('Nro de celular no valido');
      }else{
        $('#validateTel').text("");
      }
    }
  }

  let pwd = document.getElementById('')
</script>
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.100.2/js/materialize.min.js"></script> -->

</body>
</html>
