<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Course;
use App\CourseSubject;
use App\Subject;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::orderBy('id_course','ASC')->paginate(10);
        return view('course.index', compact('courses'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request,['name'=>'required']);

        Course::create($request->all());
        return redirect()->route('course.index')->with('success','Registro creado satisfactoriamente');
    }



    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function subject($id)
    {
        $course = Course::find($id);
        $course->subjects = CourseSubject::where('id_course', $id)->get();
        $subjects = Subject::all();

        //create default profile
        $subjectscourse = array();
        foreach ($course->subjects as $subject) {
            $subjectscourse[$subject->id_subject] = true;
        }

        return view('course.subject', compact(['course', 'subjects', 'subjectscourse']));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeSubject(Request $request)
    {
        //clean students
        $id_course = $request->input('id_course');
        CourseSubject::where('id_course', $id_course)->delete();

        //add all students
        $subjects =  $request->input('subjectscourse');

        foreach ($subjects as $key => $id_subject) {
            CourseSubject::create([
                'id_course' => $id_course,
                'id_subject' => $id_subject
            ]);
        }

        return redirect()->route('course.index')->with('success','Registro creado satisfactoriamente');
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
        $course = Course::find($id);
        return view('course.edit',compact('course'));
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
        $this->validate($request,[ 'name'=>'required']);

        Course::find($id)->update($request->all());
        return redirect()->route('course.index')->with('success','Registro actualizado satisfactoriamente');
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
        Course::find($id)->delete();
        return redirect()->route('course.index')->with('success','Registro eliminado satisfactoriamente');
    }
}
