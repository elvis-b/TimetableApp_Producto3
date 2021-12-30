@extends('layouts.admin')
@section('content')

    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
        <div class="container">

            <div class="row mt-3 mb-3 justify-content-start">
                <div class="col-md-12">
                    <h3 style="text-align: center">Nuevo Usuario</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-md-12">
                    <form method="POST" action="{{ route('user.store') }}">
                        {{ csrf_field() }}

                        <div class="form-group">
                            <label for="nameInput">Nombre</label>
                            <input type="text" name="name" id="name" class="form-control" placeholder="nombre">
                        </div>

                        <div class="form-group">
                            <label for="nameInput">Apellidos</label>
                            <input type="text" name="surname" id="surname" class="form-control" placeholder="apellidos">
                        </div>

                        <div class="form-group">
                            <label for="nameInput">Correo Electrónico</label>
                            <input type="text" name="email" id="email" class="form-control"
                                   placeholder="correo electrónico">
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="startDateInput">DNI</label>
                                <input type="text" name="nif" id="nif" class="form-control input-sm" placeholder="dni">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="endDateInput">Teléfono</label>
                                <input type="numeric" name="phone" id="phone" class="form-control input-sm"
                                       placeholder="teléfono">
                            </div>
                        </div>

                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="startDateInput">Usuario</label>
                                <input type="text" name="username" id="username" class="form-control input-sm"
                                       placeholder="usuario">
                            </div>
                            <div class="form-group col-md-6">
                                <label for="endDateInput">Contraseña</label>
                                <input type="password" name="password" id="password" class="form-control input-sm"
                                       placeholder="contraseña">
                            </div>
                        </div>
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
                            <input type="submit" value="Guardar" class="btn btn-success btn-block">
                        </div>

                        <div class="form-row mt-1">
                            <a href="{{ route('user.index') }}" class="btn btn-info btn-block">Atrás</a>
                        </div>
                    </form>
                </div>

            </div>
        </div>
    </div>
    <style>

    </style>
@endsection
