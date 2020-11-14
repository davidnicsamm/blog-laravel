@extends('layouts.app')

@section('content')
    
    <div class="container ">
        <div class="row  justify-content-center">
            <div class="col-md-8 ">
                <div class="card w-100 ">
                    <div class="card-header">
                        Ver Entrada
                        
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{ $post->name }}</p>
                        <p><strong>Slug: </strong>{{ $post->slug }}</p>
                        <p><strong>Contenido: </strong>{{ $post->body }}</p>

                      
                        
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection