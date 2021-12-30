@extends('layouts.admin')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">

<div class="row m-3 justify-content-center">
    <h3>Lista Horarios</h3>
</div>

<div class="row mb-1 justify-content-end">
    <a href="{{ route('schedule.create') }}" class="btn btn-success" role="button">Añadir Horario</a>
</div>

<div class="row">
    <table class="table table-striped">
        <thead>
            <tr>
              <th scope="col">#</th>
              <th scope="col">Días</th>
              <th scope="col">Hora de Inicio</th>
              <th scope="col">Hora de Fin</th>
              <th scope="col">Editar</th>
              <th scope="col">Eliminar</th>
            </tr>
        </thead>

        <tbody>
            @if($schedules->count())
                @foreach($schedules as $schedule)
                    <tr>
                        <th scope="row">{{$schedule->id_schedule}}</th>
                        <td>{{$schedule->day}}</td>
                        <td>{{$schedule->time_start}}</td>
                        <td>{{$schedule->time_end}}</td>
                        <td>
                            <a class="btn btn-primary btn-xs" href="{{action('ScheduleController@edit', $schedule->id_schedule)}}"><i class="fa fa-pencil"></i></a>
                        </td>
                        <td>
                            <form action="{{action('ScheduleController@destroy', $schedule->id_schedule)}}" method="post">
                                {{csrf_field()}}
                                <input name="_method" type="hidden" value="DELETE">
                                <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            @else
                <tr>
                    <td colspan="6">No hay horarios</td>
                </tr>
            @endif
        </tbody>
    </table>
    {{ $schedules->links() }}
</div>
    </div>
@endsection
