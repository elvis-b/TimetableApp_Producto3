@extends('layouts.admin')
@section('content')

    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
        <div class="row m-3 justify-content-center">
            <h1>{{ $subject }}<h1><br>
        </div>

        <div class="row m-3 justify-content-center">
            <h3>Lista estudiantes</h3>
        </div>


        <div class="row mb-1 justify-content-end">
            <a href="{{ action('SubjectStudentController@add', $subject->id_subject) }}" class="btn btn-success"
               role="button">Actualizar estudiante</a>
        </div>

        <div class="row">
            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">Estudiante</th>
                    <th scope="col">Examenes ({{$subject->percentage_exam * 100}}%)</th>
                    <th scope="col">Trabajos ({{$subject->percentage_work * 100}}%)</th>
                    <th scope="col">Nota final</th>
                    <th scope="col">Detalle</th>
                </tr>
                </thead>

                <tbody>
                @if($subject_students->count())
                    @foreach($subject_students as $subject_student)
                        <tr>
                            <td>
                                {{$subject_student->student}}
                            </td>

                            <td>
                                @if(isset($subject_student->note_exam))
                                    {{$subject_student->note_exam * $subject->percentage_exam}}
                                @else
                                    --
                                @endif
                            </td>

                            <td>
                                @if(isset($subject_student->note_work))
                                    {{$subject_student->note_work * $subject->percentage_work}}
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

                            <td>
                                <a class="btn btn-success btn-xs"
                                   href="{{action('SubjectStudentController@data', [$subject_student->id_subject_student])}}"><i
                                        class="fa fa-info-circle"></i></a>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="5">No hay estudiantes</td>
                    </tr>
                @endif
                </tbody>
            </table>
            {{ $subject_students->links() }}
        </div>

        <div class="row mt-4 justify-content-end">
            <a href="{{ route('subject.index') }}" class="btn btn-info btn-block" role="button">Atrás</a>
        </div>
    </div>
@endsection
