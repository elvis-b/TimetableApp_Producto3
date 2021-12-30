@extends('layouts.admin')
@section('content')

    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">
<div class="row m-3 justify-content-center">
    <h1>{{ $subject_student->subject }} > {{ $subject_student->student }}<h1><br>
</div>


<!-- exam -->
    <div class="row mt-4 mb-1 justify-content-end">
        <a href="{{ action('ExamController@add', [$subject_student->id_subject_student]) }}" class="btn btn-success" role="button">Añadir Examen</a>
        @if($subject_student->exams->count())
        <a href="{{ action('ExamController@calculate', [$subject_student->id_subject_student]) }}" class="btn btn-primary ml-2" role="button">Calcular Nota Media</a>
        @endif
    </div>

    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Examen</th>
                  <th scope="col">Nota</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Eliminar</th>
                </tr>
            </thead>

            @if($subject_student->exams->count())
            <tfoot>
                <tr>
                  <th scope="col">Nota Media</th>
                  <th scope="col">
                    @if(isset($subject_student->note_exam))
                      {{$subject_student->note_exam}}
                    @else
                      --
                    @endif
                  </th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
            </tfoot>
            @endif

            <tbody>
                @if($subject_student->exams->count())
                    @foreach($subject_student->exams as $exam)
                        <tr>
                            <td>{{$exam->name}}</td>
                            <td>
                                @if(isset($exam->note))
                                  {{$exam->note}}
                                @else
                                  --
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{action('ExamController@edit', $exam->id_exam)}}"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>
                                <form action="{{action('ExamController@destroy', $exam->id_exam)}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="hidden" name="id_subject_student" value="{{$subject_student->id_subject_student}}">

                                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No hay examenes</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $subject_student->exams->links() }}
    </div>


<!-- work -->
    <div class="row m-3 justify-content-center">
    </div>

    <!-- work -->
    <div class="row mt-4 mb-1 justify-content-end">
        <a href="{{ action('WorkController@add', [$subject_student->id_subject_student]) }}" class="btn btn-success" role="button">Añadir Trabajo</a>

        @if($subject_student->works->count())
        <a href="{{ action('WorkController@calculate', [$subject_student->id_subject_student]) }}" class="btn btn-primary ml-2" role="button">Calcular Nota Media</a>
        @endif
    </div>

    <div class="row">
        <table class="table table-striped">
            <thead>
                <tr>
                  <th scope="col">Trabajo</th>
                  <th scope="col">Nota</th>
                  <th scope="col">Editar</th>
                  <th scope="col">Eliminar</th>
                </tr>
            </thead>

            @if($subject_student->works->count())
            <tfoot>
                <tr>
                  <th scope="col">Nota Media</th>
                  <th scope="col">
                    @if(isset($subject_student->note_work))
                      {{$subject_student->note_work}}
                    @else
                      --
                    @endif
                  </th>
                  <th scope="col"></th>
                  <th scope="col"></th>
                </tr>
            </tfoot>
            @endif

            <tbody>
                @if($subject_student->works->count())
                    @foreach($subject_student->works as $work)
                        <tr>
                            <td>{{$work->name}}</td>
                            <td>
                                @if(isset($work->note))
                                  {{$work->note}}
                                @else
                                  --
                                @endif
                            </td>
                            <td>
                                <a class="btn btn-primary btn-xs" href="{{action('WorkController@edit', $work->id_work)}}"><i class="fa fa-pencil"></i></a>
                            </td>
                            <td>
                                <form action="{{action('WorkController@destroy', $work->id_work)}}" method="post">
                                    {{csrf_field()}}
                                    <input name="_method" type="hidden" value="DELETE">
                                    <input type="hidden" name="id_subject_student" value="{{$subject_student->id_subject_student}}">

                                    <button class="btn btn-danger btn-xs" type="submit"><i class="fa fa-trash"></i></button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td colspan="4">No hay trabajos</td>
                    </tr>
                @endif
            </tbody>
        </table>
        {{ $subject_student->works->links() }}
    </div>
        <div class="row m-3 mt-4 justify-content-center animate__animated animate__fadeIn animate__faster">
            <a href="{{action('SubjectStudentController@show', $subject_student->id_subject)}}" class="btn btn-info btn-block" role="button">Atrás</a>
        </div>
  </div>



</div>

@endsection
