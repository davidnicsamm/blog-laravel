@extends('layouts.app')
@section('content')

<div class="container justify-content-center">

    <div class="col-md-8 col-md-offset-2">
        <h1>{{ $post->name }}</h1>



            <div class="card mb-3 p-4" style="width:75vw">
                    @if($post->file)
                        <img src="{{ $post->file }}" class="img-responsive">
                    @endif

               
                <div class="card-body">  
                    <h5 class="card-title">
                       Categoría
                       <a href="{{ route('category',$post->category->slug) }}">{{ $post->category->name }}</a>
                    </h5>           

                    <p clss="card-text">{{ $post->excerpt }}</p>
                    <hr>
                    {!! $post->body !!}
                    <hr>
                    Etiquetas
                    @foreach($post->tags as $tag)
                        <a href="{{ route('tag',$tag->slug) }}"> {{ $tag->name }} </a>

                    @endforeach
                  
                </div>
            </div>

    
        
    

    </div>

</div>


@endsection