@extends('layouts.app')

@section('content')
    
    <div class="container ">
        <div class="row  justify-content-center">
            <div class="col-md-8 ">
                <div class="card w-100 ">
                    <div class="card-header">
                        Crear Entrada
                        
                    </div>
                    <div class="card-body">

                        {!! Form::open(['route' => 'posts.store']) !!}
                            @include('admin.posts.partials.form')
                        {!! Form::close()  !!}
                        
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection