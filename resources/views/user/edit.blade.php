@extends('layouts.admin')
@section('content')

    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
        <div class="row mt-3 mb-3 justify-content-start">
            <h3>Actualizar Perfil</h3>
        </div>

        <div class="row" style="    margin: 0 auto;">
            <form method="POST" action="{{ route('user.update', $id_user) }}">
                {{ csrf_field() }}
                <input name="_method" type="hidden" value="PATCH">

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="adminCheck" id="adminCheck"
                           @if(isset($profile_data[1])) checked @endif>
                    <label class="form-check-label" for="adminCheck">admin</label>
                </div>

                <div class="form-group form-check">
                    <input type="checkbox" class="form-check-input" name="teacherCheck" id="teacherCheck"
                           @if(isset($profile_data[2])) checked @endif>
                    <label class="form-check-label" for="teacherCheck">profesor</label>
                </div>

                <div class="form-row">
                    <input type="submit" value="Actualizar" class="btn btn-success btn-block">
                </div>

                <div class="form-row mt-1">
                    <a href="{{ route('user.index') }}" class="btn btn-info btn-block">Atrás</a>
                </div>
            </form>
        </div>

    </div>
@endsection
