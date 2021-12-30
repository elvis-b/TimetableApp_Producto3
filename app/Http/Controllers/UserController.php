<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Profile;
use Illuminate\Support\Facades\Validator;
use Monolog\Logger;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::orderBy('id', 'ASC')->paginate(10);
        $profiles = Profile::orderBy('id', 'ASC');

        return view('user.index', compact('users', 'profiles'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'surname' => 'required',
            'username' => 'required',
            'nif' => 'required',
            'phone' => 'required',
            'email' => 'required',
            'password' => 'required'
        ]);


        if ($validator->fails()) {
            return redirect()->route('login.create')->with('error', 'ERROR: Revisa los datos de usuario');
        } else {

            $userId = User::create([
                'name' => $request->input('name'),
                'surname' => $request->input('surname'),
                'username' => $request->input('username'),
                'nif' => $request->input('nif'),
                'phone' => $request->input('phone'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password'))
            ])->id;

            if ($request->input('adminCheck')) {
                Profile::create([
                    'id_profile' => 1,
                    'id_user' => $userId
                ]);
            }
            if ($request->input('teacherCheck')) {
                Profile::create([
                    'id_profile' => 2,
                    'id_user' => $userId
                ]);
            }


            return redirect()->route('user.index')->with('success', 'Perfil actualizado satisfactoriamente');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $id_user = $id;

        //
        $profiles = Profile::where('id_user', $id)->get();

        //create default profile
        $profile_data = array();
        foreach ($profiles as $profile) {
            $profile_data[$profile->id_profile] = true;
        }

        return view('user.edit', compact(['profile_data', 'id_user']));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_user)
    {
        //
        //$this->validate($request,[ 'adminCheck'=>'required', 'teacherCheck'=>'required', 'studentCheck'=>'required']);
        //echo $this->mapped_implode(', ', $request->all());

        $this->changeProfile(1, $id_user, $request->input('adminCheck'));
        $this->changeProfile(2, $id_user, $request->input('teacherCheck'));

        return redirect()->route('user.index')->with('success', 'Perfil actualizado satisfactoriamente');
    }


    private function mapped_implode($glue, $array, $symbol = '=')
    {
        return implode($glue, array_map(
                function ($k, $v) use ($symbol) {
                    return $k . $symbol . $v;
                },
                array_keys($array),
                array_values($array)
            )
        );
    }


    private function changeProfile($id_profile, $id_user, $state)
    {
        if ($state) {
            Profile::create([
                'id_profile' => $id_profile,
                'id_user' => $id_user
            ]);
        } else {
            Profile::where('id_profile', $id_profile)->where('id_user', $id_user)->delete();
        }
    }


    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function add(Request $request)
    {


    }
}
