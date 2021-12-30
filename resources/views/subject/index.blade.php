@extends('layouts.admin')
@section('content')

    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
<div class="row m-3 justify-content-center">
    <h3>Lista Asignaturas</h3>
</div>

<div class="row mb-1 justify-content-end">
    <a href="{{ route('subject.create') }}" class="btn btn-success" role="button">Añadir Asignatura</a>
</div>

<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nombre</th>
              <th scope="col">Exámenes</th>
              <th scope="col">Trabajos</th>
              <th scope="col">Duración</th>
              <th scope="col">Estudiantes</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
        </thead>

        <tbody>
            @if($subjects->count())
                @foreach($subjects as $subject)
                    <tr>
                        <th scope="row">{{$subject->id_subject}}</th>
                        <td>{{$subject->name}}</td>
                        <td>{{$subject->percentage_exam * 100}}%</td>
                        <td>{{$subject->percentage_work * 100}}%</td>
                        <td>{{$subject->date_start}} - {{$subject->date_end}}</td>
                        <td>
                            <a class="btn btn-success btn-xs" href="{{action('SubjectStudentController@show', $subject->id_subject)}}"><i class="fa fa-user"></i></a>
                        </td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{action('SubjectController@edit', $subject->id_subject)}}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{action('SubjectController@destroy', $subject->id_subject)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="7">No hay asignaturas</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $subjects->links() }}
</div>
    </div>
@endsection
