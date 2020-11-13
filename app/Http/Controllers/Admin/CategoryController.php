<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**Validación formulario */
use App\Http\Requests\CategoryStoreRequest;
use App\Http\Requests\CategoryUpdateRequest;
/**Validación formulario */

use App\Models\Category;

class CategoryController extends Controller
{

    public function __construct(){
        //Verifica que el usuario haya iniciado sesión.
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //Retornar todas las etiquetas.
        $categories = Category::orderBy('id','DESC')->paginate();
       
        return view('admin.categories.index',compact('categories'));
        //compact('categories') Crea un array con la variable categories
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retorna el formulario para crear la etiqueta.
        return view('admin.categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryStoreRequest $request)    
    {
        //Si la validación es correcta, se ejecuta el guardado.
        //Guarda los datos del formulario mostrado por create.
        $category = Category::create($request->all());

        //Redirecciona a la vista de edición de la etiqueta.
        return redirect()->route('categories.edit',$category->id)
            ->with('info','Categoría creada con éxito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //Muestra el detalle de una etiqueta.
        $category = Category::find($id);
        return view('admin.categories.show', compact('category'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //Editar el contenido de una etiqueta
        $category = Category::find($id);
        return view('admin.categories.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryUpdateRequest $request, $id)
    {

         //Si la validación es correcta, se ejecuta la modificación

        //Guarda las modificaciones ingresadas en edit.
        $category = Category::find($id);
        $category->fill($request->all())->save();

        return redirect()->route('categories.edit',$category->id)
        ->with('info','Catgoría actualizada con éxito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //Elimina una etiqueta
        Category::find($id)->delete();

        return back()->with('info','Etiqueta eliminada con éxito');
    }
}
