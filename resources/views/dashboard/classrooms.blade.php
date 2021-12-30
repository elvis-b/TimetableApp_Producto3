@extends('layouts.public')
@section('content')

    <div class="scroller">
        <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
            <div class="row m-3 justify-content-center">
                <h3>Mis clases</h3>
            </div>
            <div class="calendar-container">
                <div id='calendar'></div>
            </div>
            <div class="row">
                <table class="table table-striped">
                    <thead>
                    <tr>
                        <th scope="col">Horario</th>
                        <th scope="col">Aula</th>
                        <th scope="col">Asignatura</th>
                    </tr>
                    </thead>

                    <tbody>
                    @if($classrooms->count())
                        @foreach($classrooms as $classroom)
                            <tr>
                                {{--                            <td>{{$classroom}}</td>--}}
                                <td>{{$classroom->schedule}}</td>
                                <td>{{$classroom->name}}</td>
                                <td>{{$classroom->subject}}</td>
                            </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="3">No hay clases</td>
                        </tr>
                    @endif
                    </tbody>
                </table>
            </div>
        </div>
        <div style="height: 40px;width: 1px"></div>
    </div>

    <style>
        .calendar-container {
            width: 100%;
        }
    </style>
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            let events = loadEvents({!! $classrooms->toJson() !!});
            var calendarEl = document.getElementById('calendar');
            var calendar = new FullCalendar.Calendar(calendarEl, {
                headerToolbar: {
                    left: 'prev,next today',
                    center: 'title',
                    right: 'dayGridMonth,timeGridWeek,timeGridDay',
                },
                initialView: 'dayGridMonth',
                events: events,
                locale: 'es'

            });
            calendar.render();

        });


    </script>
    <style>
        .container {
            max-width: 90%;
        }
    </style>
@endsection
