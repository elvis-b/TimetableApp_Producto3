@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
        <div class="row mt-3 mb-3 justify-content-start">
            <h3>Actualizar estudiantes</h3>
        </div>

        <div class="row">
            <form method="POST" action="{{action('SubjectController@storeStudent', $subject->id_subject)}}">
                {{ csrf_field() }}

                <div class="form-group">
                    <label for="nameInput">Estudiantes</label>
                    <select multiple="multiple" class="form-control" name="students[]" id="students[]">
                        @foreach($users as $user)
                            <option @if(isset($students[$user->id])) selected="selected"
                                    @endif value={{$user->id}}>{{ $user }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-row">
                    <input type="submit" value="Guardar" class="btn btn-success btn-block">
                </div>

                <div class="form-row mt-1">
                    <a href="{{ route('subject.index') }}" class="btn btn-info btn-block">Atrás</a>
                </div>

                <input type="hidden" name="id_subject" value="{{$subject->id_subject}}">

            </form>
        </div>

    </div>
@endsection
