@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
<div class="row mt-3 mb-3 justify-content-center">
    <h3>Nueva Asignatura</h3>
</div>

<div class="row justify-content-center">
    <form method="POST" action="{{ route('subjectstudent.store') }}" >
        {{ csrf_field() }}

        <div class="form-group">
            <label for="nameInput">Estudiantes</label>
            <select multiple="multiple" class="form-control" name="students[]" id="students[]">
                @foreach($users as $user)
                    <option @if(isset($students[$user->id])) selected="selected" @endif value={{$user->id}}>{{ $user }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-row">
            <input type="submit"  value="Guardar" class="btn btn-success btn-block">
        </div>

        <input type="hidden" name="id_subject" value="{{$subject->id_subject}}">

        <div class="form-row mt-1">
            <a href="{{action('SubjectStudentController@show', $subject->id_subject)}}" class="btn btn-info btn-block">Atrás</a>
        </div>
    </form>
</div>
    </div>

@endsection
