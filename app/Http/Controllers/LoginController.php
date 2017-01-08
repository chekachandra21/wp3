<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
		$pass = $request->password;

		$post=DB::table('users')->first();
		$username=$post->username;
		$password=$post->password;
		if (Hash::check($pass, $password)){
			if ($user==$username) {
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
		}else{
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
