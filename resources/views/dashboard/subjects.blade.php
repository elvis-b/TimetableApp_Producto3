@extends('layouts.public')
@section('content')
    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">

        <div class="row m-3 justify-content-center">
            <h3>Mis asignaturas</h3>
        </div>


        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Nombre</th>
                    <th scope="col">Examenes</th>
                    <th scope="col">Trabajos</th>
                    <th scope="col">Nota final</th>
                </tr>
                </thead>

                <tbody>
                @if($subjects_student->count())
                    @foreach($subjects_student as $subject_student)
                        <tr>
                            <td>
                                {{$subject_student->subject}}
                            </td>

                            <td>
                                @if(isset($subject_student->note_exam))
                                    {{$subject_student->note_exam * $subject_student->subject->percentage_exam}}
                                @else
                                    --
                                @endif
                            </td>

                            <td>
                                @if(isset($subject_student->note_work))
                                    {{$subject_student->note_work * $subject_student->subject->percentage_work}}
                                @else
                                    --
                                @endif
                            </td>

                            <td>
                                @if(isset($subject_student->note_final))
                                    {{$subject_student->note_final}}
                                @else
                                    --
                                @endif
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No hay asignaturas</td>
                    </tr>
                @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
