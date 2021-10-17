<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

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
    public function index(Request $request)
    {
        $user = User::where( 'email', Auth::user()->email )->first();
        
        if(Auth::user()->hasRole('user')){
            $role=session()->put('role1', 'user');
        return view('student.index', ['user' => $user]);
        }elseif(Auth::user()->hasRole('admin')){
            $role=session()->put('role1', 'admin');
        return view('admin.index', ['user' => $user]);
        }
    }
}
