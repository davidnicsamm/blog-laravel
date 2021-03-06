@extends('layouts.app')
@section('content')

<div class="container justify-content-center">

    <div class="col-md-8 col-md-offset-2">
        <h1>Lista de Artículos</h1>

        @foreach($posts as $post)

            <div class="card mb-3 p-4" style="width:75vw">
                    @if($post->file)
                        <img src="{{ $post->file }}" class="img-responsive">
                    @endif

               
                <div class="card-body">  
                    <h5 class="card-title">
                        {{ $post->name }}
                    </h5>           

                    <p clss="card-text">{{ $post->excerpt }}</p>
                    <a href="{{ route('post', $post->slug) }}">Leer más</a>

                </div>
            </div>

        @endforeach
        
       {{ $posts->links() }}

    </div>

</div>


@endsection