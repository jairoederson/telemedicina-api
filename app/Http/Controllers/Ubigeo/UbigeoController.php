<?php

namespace App\Http\Controllers\Ubigeo;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Ubigeo;

class UbigeoController extends Controller
{
  public static $API_KEY_GOOGLE = "AIzaSyBaqwA3AsIg-CXn--wLPQw-1qvN5ImZ7E0";
  public $TYPE = "hospital";
  public $RADIUS = "150000";
  public $KEYWORD = "cruise";
  public $URL_API_GOOGLE = "";
  
  // Obtener departamentos
  public function getDepartments()
  {
    $departamentos = Ubigeo::where('provincia', '=', '00')
                      ->where('distrito', '=', '00')
                      ->get();
    if(count($departamentos)==0){
      return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"Ubigeos no encontrados", 'data'=>[]]);

    }else{
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion Exitosa", 'data'=>$departamentos]);

    }
  }

  // Obtener provincias por departamento
  public function getProviciasByDepartment($departmentId)
  {
    $provincias = Ubigeo::where('departamento', '=', $departmentId)
                          ->where('distrito', '=', '00')
                          ->get();

    $provinciasData = [];
    foreach ($provincias as $key => $provincia) {
      if($provincia->provincia == '00'){
      }else{
        array_push($provinciasData, $provincia);
      }
    }
    if(count($provinciasData) == 0){
      return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"Ubigeos no encontrados", 'data'=>[]]);

    } else{
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion Exitosa", 'data'=>$provinciasData]);

    }
  }

  // Obtener distrito por provincia
  public function getDistritosByProvincia(Request $request)
  {
    $distritos = Ubigeo::where('departamento', '=', $request->get('departamento'))
            ->where('provincia', '=', $request ->get('provincia'))
            ->get();

    $distritosData = [];
    foreach ($distritos as $key => $distrito) {
      if($distrito->distrito == '00'){

      }else{
        array_push($distritosData, $distrito);
      }
    }

    if(count($distritosData) == 0){
      return response()->json(['estado'=>false, 'code'=>'404', 'message'=>"Ubigeos no encontrados", 'data'=>[]]);

    } else{
      return response()->json(['estado'=>true, 'code'=>'201', 'message'=>"Peticion Exitosa", 'data'=>$distritosData]);

    }
  }

  public function getMedicalCentersCloser(Request $request)
  {
    $lat = $request->get('lat');
    $lng = $request->get('lng');

    $only_medical_centers = true;

    if($only_medical_centers){
      $response = array(
        "html_attributions"=> array(),
        "results"=> array(
          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-12.068646",
                "lng"=>"-75.210309"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"D32",
            "local_name"=>"HUANCAYO PACHITE",
            "medical_center_name"=>"MCA HUANCAYO 2",
            "cm"=>"CM Huancayo Pachitea",
            "city"=>"HUANCAYO",
            "direction"=>"PROLONGACION PACHITEA NRO 107 HUANCAYO",
            "email"=>"cmD32@medicentros.arcangel.pe",
            "cel"=>"970367686",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-12.072405",
                "lng"=>"-75.213489"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"D34",
            "local_name"=>"HUANCAYO CHILCA",
            "medical_center_name"=>"MCA HUANCAYO 3",
            "cm"=>"CM Huancayo Chilca",
            "city"=>"HUANCAYO",
            "direction"=>"AV. Huancavelica Nro 596 CHILCA HUANCAYO",
            "email"=>"cmD34@medicentros.arcangel.pe",
            "cel"=>"970367093",
            "business_hours"=>"8:00 am. - 1:00 pm. / 4:00 pm. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-12.068790",
                "lng"=>"-76.958114"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"B96",
            "local_name"=>"AV. LA MOLINA 1",
            "medical_center_name"=>"MCA LA MOLINA 1",
            "cm"=>"CM AV LA MOLINA",
            "city"=>"LIMA",
            "direction"=>"URB. A. RESIDENCIAL MONTERRICO AV. LA MOLINA Nro 836 TAMBIEN 828 OF 202 2DO PISO",
            "email"=>"cmB96@medicentros.arcangel.pe",
            "cel"=>"970371392",
            "business_hours"=>"8:00 am. - 1:00 pm. / 4:00 pm. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-12.038244",
                "lng"=>"-76.965643"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"C15",
            "local_name"=>"STA ANITA LOS CHANCAS",
            "medical_center_name"=>"MCA STA ANITA 1",
            "cm"=>"CM SANTA ANITA LOS CHANCAS",
            "city"=>"LIMA",
            "direction"=>"AV. LOS CHANCAS NRO 486 - SANTA ANITA",
            "email"=>"cmC15@medicentros.arcangel.pe",
            "cel"=>"970369092",
            "business_hours"=>"8:00 am. - 2:00 pm. / 3:00 pm. - 9:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-14.063829",
                "lng"=>"-75.730404"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"D28",
            "local_name"=>"ICA MUNICIPALIDAD 4",
            "medical_center_name"=>"MCA ICA 1",
            "cm"=>"CM ICA MUNICIPALIDAD",
            "city"=>"ICA",
            "direction"=>"AV. MUNICIPALIDAD NRO 276 - ICA",
            "email"=>"cmD28@medicentros.arcangel.pe",
            "cel"=>"970367671",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-14.058269",
                "lng"=>"-75.750615"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"T42",
            "local_name"=>"ICA PARCONA 2",
            "medical_center_name"=>"MCA ICA 3",
            "cm"=>"CM ICA PARCONA",
            "city"=>"ICA",
            "direction"=>"AV. JOSE GALVEZ NRO 100 (ESQUINA AV. YUPANQUI)",
            "email"=>"cmT42@medicentros.arcangel.pe",
            "cel"=>"970368482",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-13.713745",
                "lng"=>"-76.205625"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"D25",
            "local_name"=>"PISCO B. DE HUMAY 2",
            "medical_center_name"=>"MCA PISCO 1",
            "cm"=>"CM Pisco B De Humay",
            "city"=>"PISCO",
            "direction"=>"BEATITA DE HUMAY Nº 503 - PISCO",
            "email"=>"cmD25@medicentros.arcangel.pe",
            "cel"=>"970369498",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),
          
          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-17.431555",
                "lng"=>"-66.127588"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"D96",
            "local_name"=>"AREQUIPA GOYENECHE 2",
            "medical_center_name"=>"POLICLINICO AREQUIPA 1",
            "cm"=>"POLIC. AREQUIP GOYEN",
            "city"=>"AREQUIPA",
            "direction"=>"AV.SIGLO XX # 228 2DO PISO",
            "email"=>"cmD96@medicentros.arcangel.pe",
            "cel"=>"970370885 /970367074",
            "business_hours"=>"8:00 am - 8:00pm",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-16.401953",
                "lng"=>"-71.517946"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"C46",
            "local_name"=>"AREQUIPA CASTILLA 2",
            "medical_center_name"=>"MCA AREQUIPA 2",
            "cm"=>"CM Arequipa  Mariscal Castilla",
            "city"=>"AREQUIPA",
            "direction"=>"AV. MARISCAL CASTILLA N° 528 TIENDA N° 3 - MIRAFLORES",
            "email"=>"cmD32@medicentros.arcangel.pe",
            "cel"=>"970367471",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-16.390214",
                "lng"=>"-71.548112"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"C42",
            "local_name"=>"AREQUIPA TRINIDAD MORAN 3",
            "medical_center_name"=>"MCA AREQUIPA 3",
            "cm"=>"CM Arequipa Trinidad Moran",
            "city"=>"AREQUIPA",
            "direction"=>"AV. TRINIDAD MORAN  # 108 - CAYMA",
            "email"=>"cmC42@medicentros.arcangel.pe",
            "cel"=>"970368198",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-16.354765",
                "lng"=>"-71.566312"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"C37",
            "local_name"=>"AREQUIPA  ZAMACOLA",
            "medical_center_name"=>"MCA AREQUIPA 4",
            "cm"=>"CM Arequipa  Zamacola",
            "city"=>"AREQUIPA",
            "direction"=>"CALLE MARAÑON 100 C/AVIACION - ZAMACOLA - CERRO COLORADO",
            "email"=>"cmC37@medicentros.arcangel.pe",
            "cel"=>"970368287",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-16.399921",
                "lng"=>"-71.535143"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"C75",
            "local_name"=>"AREQUIPA STO DOMINGO 2",
            "medical_center_name"=>"MCA AREQUIPA 5",
            "cm"=>"CM Arequipa Santo Domingo",
            "city"=>"AREQUIPA",
            "direction"=>"CALLE SANTO DOMINGO Nº 115 TDA 2 - 2DO PISO - AREQUIPA",
            "email"=>"cmC75@medicentros.arcangel.pe",
            "cel"=>"970367479",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-18.044855",
                "lng"=>"-70.254815"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"C03",
            "local_name"=>"TACNA ALBARRACIN 2",
            "medical_center_name"=>"MCA TACNA 2",
            "cm"=>"CM Tacna Albarracin",
            "city"=>"TACNA",
            "direction"=>"ASOC. DE VIVIENDA SAN FRANCISCO, MAZ 14-LOTE 22 - TACNA",
            "email"=>"cmC03@medicentros.arcangel.pe",
            "cel"=>"970367772",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"-18.013765",
                "lng"=>"-70.250609"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"B85",
            "local_name"=>"TACNA SAN MARTIN 3",
            "medical_center_name"=>"MCA HUANCAYO 2",
            "cm"=>"CM Tacna San Martin",
            "city"=>"TACNA",
            "direction"=>"CALLE HIPÓLITO UNANUE Y LA AV. SAN MARTÍN Nº 304 - TACNA",
            "email"=>"cmB85@medicentros.arcangel.pe",
            "cel"=>"970365374",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),

          array(
            "geometry" => array(
              "location"=>array(
                "lat"=>"0",
                "lng"=>"0"
              ),
              "viewport"=>array(
                array(
                  "northeast" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                  "southwest" => array(
                    "lat"=>"",
                    "lng"=>""
                  ),
                )
              )
            ),
            "icon"=> "",
            "id"=> "",
            "name"=> "",
            "opening_hours"=> array(
              "open_now"=> false
            ),
            "photos"=>array(
              array(
                "height"=> 0,
                "html_attributions"=> [
                    ""
                ],
                "photo_reference"=> "",
                "width"=> 0
              ),
            ),
            "place_id"=> "",
            "plus_code"=> array(
              "compound_code"=> "",
              "global_code"=> ""
            ),
            "rating"=> 0,
            "reference"=> "",
            "scope"=> "",
            "types"=> [
                "hospital",
                "point_of_interest",
                "establishment"
            ],
            "user_ratings_total"=> 0,
            "vicinity"=> "",
            "cod"=>"B35",
            "local_name"=>"ICA",
            "medical_center_name"=>"Laboratorio ica",
            "cm"=>"",
            "city"=>"ICA",
            "direction"=>"",
            "email"=>"labica@medicentros.arcangel.pe",
            "cel"=>"970367773",
            "business_hours"=>"8:00 am. - 8:00 pm.",
            "days_of_attention"=>"Lunes a Sabado",
            "obs"=>"activo",
            "img"=>"https://www.alo.doctor/images/icon/centro_medico.png"
          ),
          
        ), 
      );

      return response()->json(["message"=>"Centros de salud encontrados", "code"=>200, "status"=>true, "data"=>$response]);
    }

    $url = "https://maps.googleapis.com/maps/api/place/nearbysearch/json?location=$lat,%20$lng&radius=150000&type=hospital&keyword=cruise&key=AIzaSyBaqwA3AsIg-CXn--wLPQw-1qvN5ImZ7E0";
    
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_TIMEOUT, 30);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, true);
    $resultado = curl_exec ($ch);

    $json_resultado = json_decode($resultado);

    if(count($json_resultado->results) == 0){
      return response()->json(["message"=>"No se encontraron centros de salud cercanos", "status"=>false, "code"=>404]);
    }

    return response()->json(["message"=>"Centros de salud encontrados", "code"=>200, "status"=>true, "data"=>json_decode($resultado)]);
    
  }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
