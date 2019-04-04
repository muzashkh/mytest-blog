<?php

namespace App\Http\Controllers\CMS;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

class AuthController extends Controller
{

	public function showRegisterForm()
	{
		return view('cms/register');
	}

	public function register(Request $request)
	{
		$request->validate([
		    'username' => 'required|string|unique:users|min:3|max:15',
            'email' => 'required|email|unique:users',
            'first_name' => 'required|string|min:3|max:50',
            'last_name' => 'required|string|min:3|max:50',
            'password' => 'required|confirmed|min:6|max:8',
		]);

		$is_admin = $request->filled('is_admin') ? 1 : 0;

		$user = User::create([
				'username' => $request->get('username'),
				'email' => $request->get('email'),
				'first_name' => $request->get('first_name'),
				'last_name' => $request->get('last_name'),
				'password' => $request->get('password'),
				'is_admin' => $is_admin,
			 ]);

		auth()->login($user);

		return redirect()->to(route('admin.posts'));
	}
    
    public function showLoginForm()
    {
    	return view('cms/login');
    }

    public function login(Request $request)
    {
    	$request->validate([
		    'username' => 'required|string|min:3|max:15',
            'password' => 'required|min:6|max:8',
		]);

		if(\Auth::attempt(request(['username', 'password']), $request->filled('remember'))){

			return redirect()->to(route('admin.posts'));
		}
    }

    public function logout()
    {
    	auth()->logout();
    	return redirect()->to(route('admin.login'));
    }
}
