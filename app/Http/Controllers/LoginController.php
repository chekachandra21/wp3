<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Requests;
use App\Login;
use Session;

class LoginController extends Controller
{
	public function index()
    {
    	return view('login');
    }
	public function check(Request $request)
	{
		$user = $request->username;
		$pass = md5($request->password);

		$post=DB::table('users')->first();
		$username=$post->username;
		$password=$post->password;
		if ($user==$username && $pass==$password) {
			Session::set("login", [
                "username"=>"$username"
    	]);
			return view('home');
		}else {
			Session::flash("flash_notification", [
                "level"=>"danger",
                "message"=>"GAGAL LOGIN BROW"
            ]);
			return view('login');
		}
	}
	public function logout()
		{
			Session::flush();
			Return redirect()->route('login.index');
		}
}
