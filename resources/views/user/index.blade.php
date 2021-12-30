@extends('layouts.admin')
@section('content')

    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
    <div class="row m-3 justify-content-center">
        <h3>Lista Usuarios</h3>
    </div>
    <div class="row mb-1 justify-content-end">
        <a href="{{ route('user.create') }}" class="btn btn-success" role="button">Añadir Usuario</a>
    </div>




        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Nombre</th>
                    <th scope="col">Apellidos</th>
                    <th scope="col">Email</th>
                    <th scope="col">Perfil</th>
                </tr>
                </thead>

                <tbody>
                @if($users->count())
                    @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->surname}}</td>
                            <td>{{$user->email}}</td>

                            <td>
                                <a class="btn btn-primary btn-xs" href="{{action('UserController@edit', $user->id)}}"><i
                                        class="fa fa-pencil"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No hay usuarios</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{ $users->links() }}
        </div>
    </div>

@endsection
