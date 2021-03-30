<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Auth;

class AdminPanelController extends Controller
{
    public function index(Request $request)
    {
        return view('admin.register_login.dashboard');
    }

    public function adminRegisterPage(Request $request)
    {
        return view('admin.register_login.register');
    }

    public function registerAdmin(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|max:255|unique:users', 
            'password' => 'required|between:8,255|confirmed'
         ]);

        if ($validator->fails()) {
            return redirect('adminregipage')
                        ->withErrors($validator)
                        ->withInput();
        }

        User::create([
            'name' => 'admin',
            'phone_number' => 'admin',
            'address' => 'admin',
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);
        return redirect('adminloginpage')->with('success', 'Registered successfully!');     
    }


    public function adminLoginPage(Request $request)
    {
        return view('admin.register_login.login');
    }

    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|string|email',
            'password' => 'required'
        ]);

        if ($validator->fails()) {
            return redirect('adminloginpage')
                        ->withErrors($validator)
                        ->withInput();
        }


        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return view('admin.register_login.dashboard');
        }
        return redirect('adminloginpage')->with('error', 'Oppes! You have entered invalid credentials');
    }


    public function logout() {
        Auth::logout();
        return redirect('adminloginpage');
    }
  

}
