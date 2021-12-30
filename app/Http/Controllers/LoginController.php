<?php

namespace App\Http\Controllers;

use App\Profile;
use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use App\User;

class LoginController extends Controller
{
	public function index()
  {
   	return view('login.index');
  }


  public function create()
  {
    return view('login.create');
  }


  /**
   * Display a listing of the resource.
   *
   * @return \Illuminate\Http\Response
   */
  public function logout()
  {
      Auth::logout();
      return redirect('/login');
  }


  public function auth(Request $request)
  {

      $validator = Validator::make($request->all(), [
          'email'=>'required',
          'password'=>'required'
      ]);


      if ($validator->fails()) {
          return redirect()->route('login.index')->with('error','ERROR: Revisa los datos de usuario');
      } else {
        $email = $request->input('email');
        $password = $request->input('password');


        if (Auth::attempt(['email' => $email, 'password' => $password])) {
            return redirect()->route('dashboard.index')->with('success','El usuario se ha autenticado correctamente');
        } else {
            return redirect()->route('login.index')->with('error','Error en las credenciales del usuario');
        }
      }
  }

	public function store(Request $request)
  {
		$validator = Validator::make($request->all(), [
        'name'=>'required',
        'surname'=>'required',
        'username'=>'required',
        'nif'=>'required',
        'phone'=>'required',
        'email'=>'required',
        'password'=>'required'
    ]);


    if ($validator->fails()) {
      return redirect()->route('login.create')->with('error','ERROR: Revisa los datos de usuario');
    } else {

      User::create([
        'name' => $request->input('name'),
        'surname' => $request->input('surname'),
        'username' => $request->input('username'),
        'nif' => $request->input('nif'),
        'phone' => $request->input('phone'),
        'email' => $request->input('email'),
        'password' => bcrypt($request->input('password'))
      ]);

      return redirect()->route('login.index')->with('success','Usuario creado satisfactoriamente');
    }
  }
}
