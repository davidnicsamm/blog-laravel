@extends('layouts.app')

@section('content')
    
    <div class="container ">
        <div class="row  justify-content-center">
            <div class="col-md-8 ">
                <div class="card w-100 ">
                    <div class="card-header">
                        Lista de Categorías
                        <a class="btn btn-sm btn-primary float-right" href="{{ route('categories.create') }}">Crear</a>
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
                                @foreach($categories as $category)
                                    <tr>
                                        <td>{{ $category->id }}</td>
                                        <td>{{ $category->name }}</td>
                                        <td width="10px">
                                            <a href="{{ route('categories.show',$category->id) }}" class="btn btn-sm btn-default">Ver</a>
                                        </td>
                                        <td width="10px">
                                            <a href="{{ route('categories.edit',$category->id) }}" class="btn btn-sm btn-default">Editar</a>
                                        </td>
                                        <td width="10px">
                                          {!! Form::open(['route' => ['categories.destroy',$category->id],'method' => 'DELETE'])  !!}

                                            <button class="btn btn-sm btn-danger">
                                                Eliminar
                                            </button>

                                          {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach

                            </tbody>
                        </table>
                        {{ $categories->render() }}
                    </div>

                </div>
            </div>
        </div>
    </div>


@endsection