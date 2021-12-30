@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
<div class="row mt-3 mb-3 justify-content-center">
    <h3>Nueva Asignatura</h3>
</div>

<div class="row justify-content-center">
    <form method="POST" action="{{ route('subject.store') }}" >
        {{ csrf_field() }}

        <div class="form-group">
            <label for="nameInput">Nombre de la asignatura</label>
            <input type="text" name="name" id="name" class="form-control" placeholder="Nombre de la asignatura">
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="startDateInput">Fecha de Inicio</label>
                <input type="date" name="date_start" id="date_start" class="form-control input-sm" placeholder="Fecha de Inicio">
            </div>
            <div class="form-group col-md-6">
                <label for="endDateInput">Fecha de fin</label>
                <input type="date" name="date_end" id="date_end" class="form-control input-sm" placeholder="Fecha de fin">
            </div>
        </div>

        <div class="form-row">
            <div class="form-group col-md-6">
                <label for="endDateInput">Peso Exámenes</label>
                <input type="number" name="percentage_exam" step="any" id="percentage_exam" min="0" max="1" class="form-control" placeholder="peso exámenes">
            </div>
            <div class="form-group col-md-6">
                <label for="endDateInput">Peso Trabajo</label>
                <input type="number" name="percentage_work" step="any" id="percentage_work" min="0" max="1" class="form-control" placeholder="peso trabajo">
            </div>
        </div>

        <div class="form-row">
            <input type="submit"  value="Guardar" class="btn btn-success btn-block">
        </div>

        <div class="form-row mt-1">
            <a href="{{ route('subject.index') }}" class="btn btn-info btn-block">Atrás</a>
        </div>
    </form>
</div>
    </div>


@endsection
