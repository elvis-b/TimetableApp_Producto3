@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">

<div class="row m-3 justify-content-center">
    <h3>Lista Clases</h3>
</div>

<div class="row mb-1 justify-content-end">
    <a href="{{ route('classroom.create') }}" class="btn btn-success" role="button">Añadir Clase</a>
</div>

<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Horario</th>
              <th scope="col">Profesor</th>
              <th scope="col">Asignatura</th>
              <th scope="col">Estudiantes</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
        </thead>

        <tbody>
            @if($classrooms->count())
                @foreach($classrooms as $classroom)
                    <tr>
                        <th scope="row">{{$classroom->id_classroom}}</th>
                        <td>{{$classroom->name}}</td>
                        <td>{{$classroom->schedule}}</td>
                        <td>{{$classroom->teacher}}</td>
                        <td>{{$classroom->subject}}</td>
                        <td>
                            <a class="btn btn-success btn-xs" href="{{action('ClassroomController@student', $classroom->id_classroom)}}"><i class="fa fa-user"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{action('ClassroomController@edit', $classroom->id_classroom)}}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{action('ClassroomController@destroy', $classroom->id_classroom)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="8">No hay clases</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $classrooms->links() }}
</div>
    </div>
@endsection
