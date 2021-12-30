<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\ClassroomStudent;
use App\User;
use App\Subject;
use App\Schedule;

use DB;
use App\Quotation;

class ClassroomController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $classrooms = Classroom::orderBy('id_classroom','ASC')->paginate(10);

        foreach ($classrooms as $classroom) {
            $classroom->subject = Subject::find($classroom->id_subject);
            $classroom->teacher = User::find($classroom->id_teacher);
            $classroom->schedule = Schedule::find($classroom->id_schedule);
        }

        return view('classroom.index', compact('classrooms'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //  
        //get all teachers
        $users = User::join('profile', function ($join) {
            $join->on('users.id', '=', 'profile.id_user')
                 ->where('profile.id_profile', 2);
        })->get();

        //get subjects
        $subjects = Subject::all();

        //get schedule
        $schedules = Schedule::all();

        return view('classroom.create', compact(['users', 'subjects', 'schedules']));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $this->validate($request,[ 'name'=>'required', 'subject'=>'required', 'teacher'=>'required', 'schedule'=>'required']);

        Classroom::create([
                'name' => $request->input('name'),
                'id_subject' => $request->input('subject'),
                'id_teacher' => $request->input('teacher'),
                'id_schedule' => $request->input('schedule')
            ]);

        return redirect()->route('classroom.index')->with('success','Registro creado satisfactoriamente');

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
        //
        $classroom = Classroom::find($id);

        //get all teachers
        $users = User::join('profile', function ($join) {
            $join->on('users.id', '=', 'profile.id_user')
                 ->where('profile.id_profile', 2);
        })->get();

        //get subjects
        $subjects = Subject::all();

        //get schedule
        $schedules = Schedule::all();

        return view('classroom.edit', compact(['classroom', 'users', 'subjects', 'schedules']));
    }

    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function student($id)
    {
        $classroom = Classroom::find($id);
        $classroom->students = ClassroomStudent::where('id_classroom', $id)->get();
        $users = User::all();

        //create default profile
        $students = array();
        foreach ($classroom->students as $student) {
            $students[$student->id_student] = true;
        }

        return view('classroom.student', compact(['classroom', 'users', 'students']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeStudent(Request $request)
    {
        //clean students
        $id_classroom = $request->input('id_classroom');
        ClassroomStudent::where('id_classroom', $id_classroom)->delete();

        //add all students
        $students =  $request->input('students');

        foreach ($students as $key => $id_student) {
            ClassroomStudent::create([
                'id_classroom' => $id_classroom,
                'id_student' => $id_student
            ]);
        }

        return redirect()->route('classroom.index')->with('success','Registro creado satisfactoriamente');
    }


    private function mapped_implode($glue, $array, $symbol = '=') {
        return implode($glue, array_map(
                function($k, $v) use($symbol) {
                    return $k . $symbol . $v;
                },
                array_keys($array),
                array_values($array)
                )
            );
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
        $this->validate($request,[ 'name'=>'required', 'subject'=>'required', 'teacher'=>'required', 'schedule'=>'required']);

        Classroom::find($id)->update([
                'name' => $request->input('name'),
                'id_subject' => $request->input('subject'),
                'id_teacher' => $request->input('teacher'),
                'id_schedule' => $request->input('schedule')
            ]);


        return redirect()->route('classroom.index')->with('success','Registro actualizado satisfactoriamente');
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
        Classroom::find($id)->delete();
        return redirect()->route('classroom.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
