<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
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
        $tags = Tag::orderBy('id','DESC')->paginate();
        dd($tags);
        return view('admin.tags.index',compact('tags'));
        //compact('tags') Crea un array con la variable tags
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Retorna el formulario para crear la etiqueta.
        return view('admin.tags.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //Guarda los datos del formulario mostrado por create.
        $tag = Tag::create($request->all());

        //Redirecciona a la vista de edición de la etiqueta.
        return redirect()->route('tags.edit',$tag->id)
            ->with('info','Etiqueta creada con éxito');
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
        $tag = Tag::find($id);
        return view('admin.tags.show', compact('tag'))

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
        $tag = Tag::find($id);
        return view('admin.tags.edit', compact('tag'))
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
        //Guarda las modificaciones ingresadas en edit.
        $tag = Tag::find($id);
        $tag->fill($request->all())->save();

        return redirect()->route('tags.edit',$tag->id)
        ->with('info','Etiqueta actualizada con éxito');
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
        Tag::find($id)->delete();

        return back()->with('info','Etiqueta eliminada con éxito');
    }
}
