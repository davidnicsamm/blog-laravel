@extends('layouts.app')

@section('content')
    
    <div class="container ">
        <div class="row  justify-content-center">
            <div class="col-md-8 ">
                <div class="card w-100 ">
                    <div class="card-header">
                        Lista de Etiquetas
                        <a class="btn btn-sm btn-primary float-right" href="{{ route('tags.create') }}">Crear</a>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped table-hover">
                            <thead>
                                <tr>
                                    <th width="10px">ID</th>
                                    <th>Nombre</th>
                                    <th colspan="3">&nbsp;</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($tags as $tag)
                                    <tr>
                                        <td>{{ $tag->id }}</td>
                                        <td>{{ $tag->name }}</td>
                                        <td width="10px">
                                            <a href="{{ route('tags.show',$tag->id) }}" class="btn btn-sm btn-default">Ver</a>
                                        </td>
                                        <td width="10px">
                                            <a href="{{ route('tags.edit',$tag->id) }}" class="btn btn-sm btn-default">Editar</a>
                                        </td>
                                        <td width="10px">
                                          {!! Form::open(['route' => ['tags.destroy',$tag->id],'method' => 'DELETE'])  !!}

                                            <button class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>

                                          {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $tags->render() }}
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection