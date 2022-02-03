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

    public function adminLoginView(){
        if(Auth::user()){
            if(Auth::user()->user_type == 'super_admin'){
                return redirect()->route("super_admin.home");
            }
            else if(Auth::user()->user_type == 'admin'){
                return redirect()->route("admin.home");
            }
        }
        else {
            return view('auth.login');
        }
    }
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
      //
    }
}
