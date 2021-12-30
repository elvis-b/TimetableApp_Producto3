@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
<div class="row mt-3 mb-3 justify-content-center">
    <h3>Nuevo Horario</h3>
</div>

<div class="row justify-content-center">
    <form method="POST" action="{{ route('schedule.store') }}" >
        {{ csrf_field() }}

        <div class="form-group">
            <label for="nameInput">Día de la semana</label>
            <select class="form-control" name="day" id="day">
                <option>Lunes</option>
                <option>Martes</option>
                <option>Miércoles</option>
                <option>Jueves</option>
                <option>Viernes</option>
                <option>Sábado</option>
                <option>Domingo</option>
            </select>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="startDateInput">Hora de Inicio</label>
                <input type="time" name="time_start" id="time_start" class="form-control input-sm" placeholder="Hora de Inicio">
            </div>
            <div class="form-group col-md-6">
                <label for="endDateInput">Hora de fin</label>
                <input type="time" name="time_end" id="time_end" class="form-control input-sm" placeholder="Hora de fin">
            </div>
        </div>


        <div class="form-row">
            <input type="submit"  value="Guardar" class="btn btn-success btn-block">
        </div>

        <div class="form-row mt-1">
            <a href="{{ route('schedule.index') }}" class="btn btn-info btn-block">Atrás</a>
        </div>
    </form>
</div>
    </div>

@endsection
