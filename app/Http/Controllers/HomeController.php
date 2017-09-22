<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Auth;
use App\User;
use Mail;

class HomeController extends Controller
{
	public function dashboard()
	{
		// Auth::logout();
		return view('dashboard');
	}

    public function showLogin()
    {
    	return view('login');
    }

    public function login(Request $request)
    {
    	$request->validate([
    		'email' => 'required|email|min:3',
    		'password' => 'required|min:3',
    	]);

    	$data = [];

    	if ($request->remember) {
    		$data = array_except($request->all(), '_token');
    		$data = array_except($request->all(), 'remember');

    		Auth::attempt($data, true);
    	}else{
    		$data = array_except($request->all(), '_token');

    		Auth::attempt($data);
    	}

    	if (Auth::check()) {
    		return redirect('/');
    	}

    	session()->flash('msg', 'Correo o contraseña incorrectos');
    	return back();
    }

    public function showReset()
    {
    	return view('reset');
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

    	session()->flash('msg', 'Se ha reestablecido la contraseña, ingrese a su correo para ver la nueva contraseña');
    	session()->flash('status', 'success');

    	return back();
    }
}
