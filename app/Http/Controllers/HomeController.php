<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Admin;
use App\Models\Driver;
use App\Models\Customer;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $admin_param = array(
            'users' => User::get(),
            'admins' => Admin::get(),
            'drivers' => Driver::get(),
            'customers' => Customer::get(),
        );

        if (auth()->user()->group_id == 1) {
            return view('admin', $admin_param);
        } else {
            return view('home');
        }
    }
}
