<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Work;
use App\SubjectStudent;
use App\Subject;

class WorkController extends Controller
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
    public function create()
    {
        //
    }


    public function add($id_subject_student)
    {
        return view('work.create', compact(['id_subject_student']));
    }



    public function calculate($id_subject_student)
    {
    	$subject_student = SubjectStudent::find($id_subject_student);
        $subject = Subject::find($subject_student->id_subject);

    	$works = Work::where('id_subject', $subject_student->id_subject)->where('id_student', $subject_student->id_student)->get();

    	$note_works = 0.0;
    	$num_works = 0;
        foreach ($works as $work) {
        	if (isset($work->note)) {
	        	$note_works = $note_works + $work->note;
	        	$num_works = $num_works + 1;
        	}
        }

        if ($num_works > 0) {
        	$note_final = null;

        	$note_works = $note_works / $num_works;
          	if (isset($subject_student->note_exam)) {
          		$average_note_exam = $subject_student->note_exam * $subject->percentage_exam;
          		$average_note_work = $note_works * $subject->percentage_work;
        		$note_final = $average_note_exam + $average_note_work;
        	}

			SubjectStudent::find($id_subject_student)->update([
                'note_work' => $note_works,
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

        Work::create([
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
    	$work = Work::find($id);

    	$subject_student = SubjectStudent::where('id_subject', $work->id_subject)->where('id_student', $work->id_student)->firstOrFail();
    	$id_subject_student = $subject_student->id_subject_student;

        return view('work.edit',compact(['work', 'id_subject_student']));
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
    	$work = Work::find($id);
        $work->update($request->all());

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
        Work::find($id)->delete();
        return redirect()->action('SubjectStudentController@data', [$request->input('id_subject_student')])->with('success','Registro creado satisfactoriamente');
    }
}
