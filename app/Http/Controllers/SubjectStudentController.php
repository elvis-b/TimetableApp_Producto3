<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\SubjectStudent;
use App\Subject;
use App\User;
use App\Exam;
use App\Work;

class SubjectStudentController extends Controller
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

    }


    public function add($id)
    {
        $subject = Subject::find($id);
        $subject->students = SubjectStudent::where('id_subject', $id)->get();
        $users = User::all();

        //create default profile
        $students = array();
        foreach ($subject->students as $student) {
            $students[$student->id_student] = true;
        }

        return view('subject_student.create', compact(['subject', 'users', 'students']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //clean students
        $id_subject = $request->input('id_subject');
        SubjectStudent::where('id_subject', $id_subject)->delete();

        //add all students
        $students =  $request->input('students');

        foreach ($students as $key => $id_student) {
            SubjectStudent::create([
                'id_subject' => $id_subject,
                'id_student' => $id_student
            ]);
        }

        return redirect()->action('SubjectStudentController@show', [$id_subject])->with('success','Registro creado satisfactoriamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {        
        $subject_students = SubjectStudent::where('id_subject', $id)->orderBy('id_subject_student','ASC')->paginate(10);


        $subject = Subject::find($id);

        foreach ($subject_students as $subject_student) {
            $subject_student->subject = $subject;
            $subject_student->student = User::find($subject_student->id_student);
        }

        return view('subject_student.index', compact(['subject_students', 'subject']));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $subject_students = SubjectStudent::where('id_subject', $id)->orderBy('id_subject_student','ASC')->paginate(10);

        return view('subject_student.create', compact(['subject', 'users', 'students']));
    }



    public function data($id)
    {
        $subject_student = SubjectStudent::find($id);
        
        $subject_student->subject = Subject::find($subject_student->id_subject);
        $subject_student->student = User::find($subject_student->id_student);

        $subject_student->works = Work::where('id_subject', $subject_student->id_subject)->where('id_student', $subject_student->id_student)->orderBy('id_work','ASC')->paginate(5);
        $subject_student->exams = Exam::where('id_subject', $subject_student->id_subject)->where('id_student', $subject_student->id_student)->orderBy('id_exam','ASC')->paginate(5);

        return view('subject_student.data', compact(['subject_student']));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
