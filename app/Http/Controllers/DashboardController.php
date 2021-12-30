<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Subject;
use App\Schedule;
use App\SubjectStudent;
use App\Profile;
use App\User;
use App\Exam;
use App\Work;

use Auth;
use DB;

class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $userId = Auth::id();

        if ($this->isAdmin($userId)) {
            return $this->getAdminView();
        } else {
            return $this->classrooms();
        }
    }


    public function classrooms()
    {
        $userId = Auth::id();

        $days = array('Domingo', 'Lunes', 'Martes', 'Miércoles','Jueves','Viernes', 'Sábado');
        $dayOfWeek = $days[date('w')];

//        $classrooms = Classroom::join('schedule', function ($join) use ($dayOfWeek)
//        {
//            $join->on('classroom.id_schedule', '=', 'schedule.id_schedule')
//                 ->where('schedule.day', '=', DB::raw('"'.$dayOfWeek.'"'));
//        })->join('classroom_student', function ($join) use ($userId)
//        {
//            $join->on('classroom.id_classroom', '=', 'classroom_student.id_classroom')
//                 ->where('classroom_student.id_student', '=', DB::raw($userId));
//        })->orderBy('schedule.time_start','ASC')->get();


        $classrooms = Classroom::join('schedule', function ($join) use ($days) {
            $join->on('classroom.id_schedule', '=', 'schedule.id_schedule')
                ->whereIn('schedule.day',$days);
        })->join('classroom_student', function ($join) use ($userId)
        {
            $join->on('classroom.id_classroom', '=', 'classroom_student.id_classroom')
                ->where('classroom_student.id_student', '=', DB::raw($userId));
        })->orderBy('schedule.time_start','ASC')->get();


        foreach ($classrooms as $classroom) {
            $classroom->subject = Subject::find($classroom->id_subject);
            $classroom->schedule = Schedule::find($classroom->id_schedule);
        }

        return view('dashboard.classrooms', compact('classrooms'));
    }


    public function subjects()
    {
        $userId = Auth::id();
        $subjects_student = SubjectStudent::where('id_student', $userId)->get();

        foreach ($subjects_student as $subject_student) {
            $subject_student->subject = Subject::find($subject_student->id_subject);
        }

        return view('dashboard.subjects', compact('subjects_student'));
    }

    public function exams()
    {
        $userId = Auth::id();

        $exams = Exam::where('id_student', $userId)->orderBy('id_exam','ASC')->get();

        foreach ($exams as $exam) {
            $exam->subject = Subject::find($exam->id_subject);
        }

        return view('dashboard.exams', compact('exams'));
    }

    public function works()
    {
        $userId = Auth::id();

        $works = Work::where('id_student', $userId)->orderBy('id_work','ASC')->get();

        foreach ($works as $work) {
            $work->subject = Subject::find($work->id_subject);
        }

        return view('dashboard.works', compact('works'));
    }

    private function getAdminView() {
        $users = User::orderBy('id','ASC')->paginate(10);
        $profiles = Profile::orderBy('id','ASC');

        return view('user.index', compact('users', 'profiles'));
    }


    private function isAdmin($id) {
        $profile = Profile::where('id_user', $id)->where('id_profile', 1)->get();

        if (isset($profile) && count($profile) > 0) {
            return true;
        } else {
            return false;
        }
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
