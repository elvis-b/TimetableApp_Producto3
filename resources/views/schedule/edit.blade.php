@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
<div class="row mt-3 mb-3 justify-content-center">
    <h3>Editar Horario</h3>
</div>

<div class="row justify-content-center">
    <form method="POST" action="{{ route('schedule.update', $schedule->id_schedule) }}" >
        {{ csrf_field() }}
        <input name="_method" type="hidden" value="PATCH">

        <div class="form-group">
            <label for="nameInput">Día de la semana</label>
            <select class="form-control" name="day" id="day">
                <option @if($schedule->day == "Lunes") selected="selected" @endif>Lunes</option>
                <option @if($schedule->day == "Martes") selected="selected" @endif>Martes</option>
                <option @if($schedule->day == "Miércoles") selected="selected" @endif>Miércoles</option>
                <option @if($schedule->day == "Jueves") selected="selected" @endif>Jueves</option>
                <option @if($schedule->day == "Viernes") selected="selected" @endif>Viernes</option>
                <option @if($schedule->day == "Sábado") selected="selected" @endif>Sábado</option>
                <option @if($schedule->day == "Domingo") selected="selected" @endif>Domingo</option>
            </select>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="startDateInput">Hora de Inicio</label>
                <input type="time" name="time_start" id="time_start" class="form-control input-sm" placeholder="Hora de Inicio" value="{{$schedule->time_start}}">
            </div>
            <div class="form-group col-md-6">
                <label for="endDateInput">Hora de fin</label>
                <input type="time" name="time_end" id="time_end" class="form-control input-sm" placeholder="Hora de fin" value="{{$schedule->time_end}}">
            </div>
        </div>


        <div class="form-row">
            <input type="submit"  value="Actualizar" class="btn btn-success btn-block">
        </div>

        <div class="form-row mt-1">
            <a href="{{ route('schedule.index') }}" class="btn btn-info btn-block">Atrás</a>
        </div>
    </form>
</div>

    </div>
@endsection
