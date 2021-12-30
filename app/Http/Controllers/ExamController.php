<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Exam;
use App\SubjectStudent;
use App\Subject;


class ExamController extends Controller
{
	/**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
    }


    public function add($id_subject_student)
    {
        return view('exam.create', compact(['id_subject_student']));
    }


    public function calculate($id_subject_student)
    {
        $subject_student = SubjectStudent::find($id_subject_student);
        $subject = Subject::find($subject_student->id_subject);

    	$exams = Exam::where('id_subject', $subject_student->id_subject)->where('id_student', $subject_student->id_student)->get();

    	$note_exams = 0.0;
    	$num_exams = 0;
        foreach ($exams as $exam) {
        	if (isset($exam->note)) {
	        	$note_exams = $note_exams + $exam->note;
	        	$num_exams = $num_exams + 1;
        	}
        }

        if ($num_exams > 0) {
        	$note_final = null;
        	$note_exams = $note_exams / $num_exams;

          	if (isset($subject_student->note_work)) {
          		$average_note_exam = $note_exams * $subject->percentage_exam;
          		$average_note_work = $subject_student->note_work * $subject->percentage_work;
        		$note_final = $average_note_exam + $average_note_work;
        	}

			SubjectStudent::find($id_subject_student)->update([
                'note_exam' => $note_exams,
                'note_final' => $note_final
			]);
        }


        return redirect()->action('SubjectStudentController@data', [$id_subject_student])->with('success','Nota calculada satisfactoriamente');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$this->validate($request,['name'=>'required', 'id_subject_student'=>'required']);
        $subject_student = SubjectStudent::find($request->input('id_subject_student'));

        Exam::create([
                'name' => $request->input('name'),
                'note' => $request->input('note'),
                'id_subject' => $subject_student->id_subject,
                'id_student' => $subject_student->id_student
            ]);

        return redirect()->action('SubjectStudentController@data', [$request->input('id_subject_student')])->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
    	$exam = Exam::find($id);

    	$subject_student = SubjectStudent::where('id_subject', $exam->id_subject)->where('id_student', $exam->id_student)->firstOrFail();
    	$id_subject_student = $subject_student->id_subject_student;

        return view('exam.edit',compact(['exam', 'id_subject_student']));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    	$exam = Exam::find($id);
        $exam->update($request->all());

        return redirect()->action('SubjectStudentController@data', [$request->input('id_subject_student')])->with('success','Registro creado satisfactoriamente');
    }
    

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        Exam::find($id)->delete();
        return redirect()->action('SubjectStudentController@data', [$request->input('id_subject_student')])->with('success','Registro creado satisfactoriamente');
    }
}
