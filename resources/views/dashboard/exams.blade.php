@extends('layouts.public')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">

        <div class="row m-3 justify-content-center">
            <h3>Mis exámenes</h3>
        </div>


        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Examen</th>
                    <th scope="col">Asignatura</th>
                    <th scope="col">Nota</th>
                </tr>
                </thead>

                <tbody>
                @if($exams->count())
                    @foreach($exams as $exam)
                        <tr>
                            <td>{{$exam->name}}</td>
                            <td>{{$exam->subject}}</td>
                            <td>{{$exam->note}}</td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="3">No hay Exámenes</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
