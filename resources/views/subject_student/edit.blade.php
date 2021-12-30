@extends('layouts.admin')
@section('content')

    <div class="card-wrapper animate__animated animate__fadeInDown animate__faster">

<div class="row mt-4 justify-content-end">
    <a href="{{action('SubjectStudentController@show', $subject->id_subject)}}" class="btn btn-info btn-block" role="button">Atrás</a>
</div>
    </div>
@endsection
