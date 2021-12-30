@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
<div class="row mt-3 mb-3 justify-content-start">
    <h3>Actualizar Clase</h3>
</div>

<div class="row">
    <form method="POST" action="{{ route('classroom.update', $classroom->id_classroom) }}" >
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group">
            <label for="nameInput">Nombre de la clase</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="nombre" value="{{$classroom->name}}">
        </div>

        <div class="form-group">
            <label for="nameInput">Horarios</label>
            <select class="form-control" name="schedule" id="schedule">
                @foreach($schedules as $schedule)
                    <option  @if($classroom->id_schedule == $schedule->id_schedule) selected="selected" @endif value={{$schedule->id_schedule}}>{{ $schedule }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nameInput">Profesores</label>
            <select class="form-control" name="teacher" id="teacher">
                @foreach($users as $user)
                    <option @if($classroom->id_teacher == $user->id) selected="selected" @endif value={{$user->id}}>{{ $user }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nameInput">Asignaturas</label>
            <select class="form-control" name="subject" id="subject">
                @foreach($subjects as $subject)
                    <option @if($classroom->id_subject == $subject->id_subject) selected="selected" @endif value={{$subject->id_subject}}>{{ $subject }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-row">
            <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
        </div>

        <div class="form-row mt-1">
            <a href="{{ route('classroom.index') }}" class="btn btn-info btn-block">Atrás</a>
        </div>
    </form>
</div>

    </div>
@endsection
