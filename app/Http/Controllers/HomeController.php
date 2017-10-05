<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use Mail;

class HomeController extends Controller
{
	public function index()
	{
		Auth::logout();
		return view('index');
	}

    public function isAuth()
    {
    	return response()->json(Auth::check());
    }

    public function login(Request $request)
    {
    	$request->validate([
    		'email' => 'required|email|min:3',
    		'password' => 'required|min:3',
    	]);

    	$data = [];

    	if ($request->remember) {
    		Auth::attempt($data, true);
    	}else{
    		$data = array_except($request->all(), 'remember');

    		Auth::attempt($data);
    	}

    	if (Auth::check()) {
    		return response()->json(['process'=> 'success']);
    	}

        return response()->json(['process'=> 'warning', 'msg'=> 'Correo o contraseña incorrectos']);
    }

    public function resetPassword(Request $request)
    {
    	$request->validate([
    		'email' => 'required|email'
    	]);

    	$user = User::where('email', $request->email)->first();

    	if (!$user) {
    		session()->flash('msg', 'Correo no registrado');
    		session()->flash('status', 'warning');
    		return back();
    	}

    	$pass = str_random(20);

    	$user->update(['password' => \Hash::make($pass)]);

    	// Mail::send('mail', ['user' => $user, 'password' => $pass], function ($message) use ($user){
    	//     $message->to($user->email);
    	
    	//     $message->subject('Se ha reestablecido la contraseña');
    	// });

    	return response()->json(['process' => 'success','msg' => 'Se ha reestablecido la contraseña, ingrese a su correo para ver la nueva contraseña']);
    }
}
