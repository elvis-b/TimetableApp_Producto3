@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
        <div class="row mt-3 mb-3 justify-content-start">
            <h3>Actualizar Curso</h3>
        </div>

        <div class="row">
            <form method="POST" action="{{ route('course.update', $course->id_course) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">

                <div class="form-group">
                    <label for="nameInput">Nombre del curso</label>
                    <input type="text" name="name" id="name" class="form-control" placeholder="Nombre del curso"
                           value="{{$course->name}}">
                </div>

                <div class="form-row">
                    <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                </div>

                <div class="form-row mt-1">
                    <a href="{{ route('course.index') }}" class="btn btn-info btn-block">Atrás</a>
                </div>
            </form>
        </div>
    </div>

@endsection
