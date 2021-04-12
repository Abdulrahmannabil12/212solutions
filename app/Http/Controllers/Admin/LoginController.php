<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function  getLogin(){

        return view('admin.auth.login');
    }

    public function save(){

        $admin = new Admin();
        $admin -> name ="abdulrahman";
        $admin -> email ="admin@admin.com";
        $admin -> password = bcrypt("12345678");
        $admin -> save();

    }

    public function login(LoginRequest $request){

        $remember_me = $request->has('remember_me') ? true : false;

        if (auth()->guard('admin')->attempt(['email' => $request->input("email"), 'password' => $request->input("password")], $remember_me)) {

            return redirect() -> route('admin.dashboard');
        }
         return redirect()->back()->with(['error' => 'Something went Wrong']);
    }
    public function logout(Request $request){

            Auth::logout();

            return redirect()->route('admin.login')->with(['success'=>'logged out successfully']);

      }
}
