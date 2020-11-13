@extends('layouts.app')

@section('content')
    
    <div class="container ">
        <div class="row  justify-content-center">
            <div class="col-md-8 ">
                <div class="card w-100 ">
                    <div class="card-header">
                        Ver Etiqueta
                        
                    </div>
                    <div class="card-body">
                        <p><strong>Nombre: </strong>{{ $tag->name }}</p>
                        <p><strong>Slug: </strong>{{ $tag->slug }}</p>

                      
                        
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection