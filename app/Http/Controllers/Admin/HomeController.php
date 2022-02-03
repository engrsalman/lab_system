<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

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
        return view('admin.dashboard');
    }

    public function passwordView(){
        return view('admin.password_change');
    }

    public function passwordChange(Request $request){
        $this->validate($request, [
            'old_password' => ['required', 'string'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        $user = Auth::user();
        $user = User::where('id',$user->id)->first();
        $old_password = Hash::check($request->old_password, $user->password);
        if ($old_password) {
            $user->update([
                'password' => Hash::make($request->password),
                'password_hint' => $request->password
            ]);
            Session::flash('success','Password changed successfully.');
        } else {
            Session::flash('warning','Your old password does not matched!.');
        }
        return back();
    }
}
