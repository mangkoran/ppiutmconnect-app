<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    public function index(Request $r)
    {
        // $role = $r->session()->get('user_access');
        $role = auth()->user()->access_grant;

        if($role == 3){
            return redirect('admin');
        } else if($role == 2){
            return redirect('management');
        } else if($role == 1){
            return redirect('member');
        }

        return view('home');
    }

}
