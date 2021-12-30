@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
<div class="row mt-3 mb-3 justify-content-center">
    <h3>Nueva clase</h3>
</div>

<div class="row justify-content-center">
    <form method="POST" action="{{ route('classroom.store') }}" >
        {{ csrf_field() }}

        <div class="form-group">
            <label for="nameInput">Nombre de la clase</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="nombre">
        </div>

        <div class="form-group">
            <label for="nameInput">Horarios</label>
            <select class="form-control" name="schedule" id="schedule">
                @foreach($schedules as $schedule)
                    <option value={{$schedule->id_schedule}}>{{ $schedule }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nameInput">Profesores</label>
            <select class="form-control" name="teacher" id="teacher">
                @foreach($users as $user)
                    <option value={{$user->id}}>{{ $user }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="nameInput">Asignaturas</label>
            <select class="form-control" name="subject" id="subject">
                @foreach($subjects as $subject)
                    <option value={{$subject->id_subject}}>{{ $subject }}</option>
                @endforeach
            </select>
        </div>


        <div class="form-row">
            <input type="submit"  value="Guardar" class="btn btn-success btn-block">
        </div>

        <div class="form-row mt-1">
            <a href="{{ route('classroom.index') }}" class="btn btn-info btn-block">Atrás</a>
        </div>
    </form>
</div>
    </div>

@endsection
