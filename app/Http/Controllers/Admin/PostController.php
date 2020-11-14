<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
/**Validación formulario */
use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
/**Validación formulario */

use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;

class PostController extends Controller
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
        //Retornar todas las entradas del usuario.
        $posts = Post::orderBy('id','DESC')
        ->where('user_id', auth()->user()->id)
        
        ->paginate();
       
        return view('admin.posts.index',compact('posts'));
        //compact('posts') Crea un array con la variable posts
    }   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //Obtener las categorías y las etiquetas
        $categories = Category::orderBy('name','ASC')->pluck('name','id'); 
        $tags  = Tag::orderBy('name','ASC')->get(); 

        //Retorna el formulario para crear la etiqueta.
        return view('admin.posts.create', compact('categories','tags'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PostStoreRequest $request)    
    {
        //Si la validación es correcta, se ejecuta el guardado.
        //Guarda los datos del formulario mostrado por create.
        $post = Post::create($request->all());

        //Redirecciona a la vista de edición de la etiqueta.
        return redirect()->route('posts.edit',$post->id)
            ->with('info','Entrada creada con éxito');
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
        $post = Post::find($id);
        return view('admin.posts.show', compact('post'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         //Obtener las categorías y las etiquetas
         $categories = Category::orderBy('name','ASC')->pluck('name','id'); 
         $tags  = Tag::orderBy('name','ASC')->get(); 

        //Editar el contenido de una etiqueta
        $post = Post::find($id);
        return view('admin.posts.edit', compact('post','categories','tags'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(PostUpdateRequest $request, $id)
    {

         //Si la validación es correcta, se ejecuta la modificación

        //Guarda las modificaciones ingresadas en edit.
        $post = Post::find($id);
        $post->fill($request->all())->save();

        return redirect()->route('posts.edit',$post->id)
        ->with('info','Entrada actualizada con éxito');
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
        Post::find($id)->delete();

        return back()->with('info','Etiqueta eliminada con éxito');
    }
}
