<?php

namespace App\Http\Controllers\TypeDocument;
use App\TypeDocument;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TypeDocumentController extends Controller
{
  // Obtener tipos de documentos activos
    public function getTypeDocumentsActive(){
      $type_documents = TypeDocument::where("estado", "=", 1)->get();
      return response()->json(['estado'=>true, 'code'=>'200', 'message'=>"Petición exitosa", 'data'=>$type_documents]);

    }


}
