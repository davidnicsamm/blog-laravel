@extends('layouts.app')
@section('content')

<div class="container">

    <div class="col-md-8 col-md-offset-2">
        <h1>Lista de Artículos</h1>

        @foreach($posts as $post)

            <div class="card" style="width:75vw">
                    @if($post->file)
                        <img src="{{ $post->file }}" class="img-responsive">
                    @endif

                <div class="card-title">
                    {{ $post->name }}
                </div>
                <div class="card-body">             

                    {{ $post->excerpt }}
                    <a href="#">Leer más</a>

                </div>
            </div>

        @endforeach
        
       {{ $posts->links() }}

    </div>

</div>


@endsection