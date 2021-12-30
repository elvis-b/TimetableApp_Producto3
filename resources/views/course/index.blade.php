@extends('layouts.admin')
@section('content')

    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
        <div class="row m-3 justify-content-center">
            <h3>Lista Cursos</h3>
        </div>

        <div class="row mb-1 justify-content-end">
            <a href="{{ route('course.create') }}" class="btn btn-success" role="button">Añadir Curso</a>
        </div>

        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Asignaturas</th>
                    <th scope="col">Editar</th>
                    <th scope="col">Eliminar</th>
                </tr>
                </thead>

                <tbody>
                @if($courses->count())
                    @foreach($courses as $course)
                        <tr>
                            <th scope="row">{{$course->id_course}}</th>
                            <td>{{$course->name}}</td>
                            <td>
                                <a class="btn btn-success btn-xs"
                                   href="{{action('CourseController@subject', $course->id_course)}}"><i
                                        class="fa fa-user"></i></a>
                            </td>
                            <td>
                                <a class="btn btn-primary btn-xs"
                                   href="{{action('CourseController@edit', $course->id_course)}}"><i
                                        class="fa fa-pencil"></i></a>
                            </td>
                            <td>
                                <form action="{{action('CourseController@destroy', $course->id_course)}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i>
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No hay cursos</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{ $courses->links() }}
        </div>
    </div>

@endsection
