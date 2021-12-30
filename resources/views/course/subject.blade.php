@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
        <div class="row mt-3 mb-3 justify-content-start">
            <h3>Actualizar asignaturas</h3>
        </div>

        <div class="row">
            <form method="POST" action="{{action('CourseController@storeSubject', $course->id_course)}}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nameInput">Asignaturas</label>
                    <select multiple="multiple" class="form-control" name="subjectscourse[]" id="subjectscourse[]">
                        @foreach($subjects as $subject)
                            <option @if(isset($subjectscourse[$subject->id_subject])) selected="selected"
                                    @endif value={{$subject->id_subject}}>{{ $subject }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <input type="submit" value="Guardar" class="btn btn-success btn-block">
                </div>

                <div class="form-row mt-1">
                    <a href="{{ route('course.index') }}" class="btn btn-info btn-block">Atrás</a>
                </div>

                <input type="hidden" name="id_course" value="{{$course->id_course}}">

            </form>
        </div>
    </div>

@endsection
