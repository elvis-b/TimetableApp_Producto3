@extends('layouts.public')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">

<div class="row m-3 justify-content-center">
    <h3>Mis clases</h3>
</div>


<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">Horario</th>
              <th scope="col">Aula</th>
              <th scope="col">Asignatura</th>
            </tr>
        </thead>

        <tbody>
            @if($classrooms->count())
                @foreach($classrooms as $classroom)
                    <tr>
                        <td>{{$classroom->schedule}}</td>
                        <td>{{$classroom->name}}</td>
                        <td>{{$classroom->subject}}</td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="3">No hay clases</td>
                </tr>
            @endif
        </tbody>
    </table>
</div>
    </div>
@endsection
