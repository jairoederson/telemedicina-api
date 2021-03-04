<?php

namespace App\Http\Controllers\Question;

use App\CategoryQuestion;
use App\SubcategoryQuestion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;

class SubcategoryQuestionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.CategoriaPreguntas.subcategorialista');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories = CategoryQuestion::all();
        return view('admin.CategoriaPreguntas.subcategoriacreate', compact('categories'));
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
     * @param  \App\SubcategoryQuestion  $subcategoryQuestion
     * @return \Illuminate\Http\Response
     */
    public function show(SubcategoryQuestion $subcategoryQuestion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\SubcategoryQuestion  $subcategoryQuestion
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $subcategoryQuestion = SubcategoryQuestion::find($id);
        $categories = CategoryQuestion::all();
        return view('admin.CategoriaPreguntas.subcategoriaedit', compact('subcategoryQuestion', 'categories'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\SubcategoryQuestion  $subcategoryQuestion
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubcategoryQuestion $subcategoryQuestion)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\SubcategoryQuestion  $subcategoryQuestion
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubcategoryQuestion $subcategoryQuestion)
    {
        //
    }

    public function listarCategorias(Request $request){
        $items = SubcategoryQuestion::select('subcategory_questions.*',
            DB::raw("CASE status WHEN '1' THEN 'activo' ELSE 'inactivo' END as estado"))
            ->where('status','1')->get();

        return response()->json($items);
    }

    public function eliminarCategoria(Request $request) {
        $categoria = SubcategoryQuestion::find($request['id'])->update(['status' => '0']);
        return response()->json($categoria);
    }

    public function registrarsubCategoria(Request $request) {

        $category = $request['categoria'];
        $category['state']='1';

        $result = SubcategoryQuestion::updateOrCreate(['id' => $category['id']], $category);
        return response()->json('ok');
    }
}
