@extends('layouts.public')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">

        <div class="row m-3 justify-content-center">
            <h3>Mis trabajos</h3>
        </div>


        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Trabajo</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Nota</th>
                </tr>
                </thead>

                <tbody>
                @if($works->count())
                    @foreach($works as $work)
                        <tr>
                            <td>{{$work->name}}</td>
                            <td>{{$work->subject}}</td>
                            <td>{{$work->note}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No hay Trabajos</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
