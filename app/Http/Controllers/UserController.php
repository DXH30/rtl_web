<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function register(Request $request) {
        if (!$request->isMethod('post') {
            return view('register');
        } else { 
            $validator = Validator::make($request->all(), [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required',
                'role' => 'required'
            ]);
            if (!$validator->fails()) {
                $data = new User;
                $data->name = $request->input('name');
                $data->email = $request->input('email');
                $data->password = Hash::make($request->input('password'));
                $data->role = $request->input('role');
            } else {
                return redirect()->back()->withErrors(['msg' => 'Data yang anda masukkan kurang lengkap']);
            }
        }
    }

    public function login(Request $request) {
        if (!$request->isMethod('post')) {
            return view('login');
        } else {
            $remember = $request->has('remember') ? true : false;
            Auth::attempt($request->only(['email', 'password'], $remember);
        }
    }

    public function logout(Request $request) {
        Auth::logout();
        return redirect()->to('login');
    }
}
