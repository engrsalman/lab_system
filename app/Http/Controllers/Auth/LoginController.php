<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function adminLogin(Request $request){

        $request->validate([
            'email' =>'required',
            'password' => 'required'
        ]);

        $user_exists = User::where('email', $request->email)->first();
        if ($user_exists) {
            if ((isset($request->password) && Hash::check($request->password, $user_exists->password))) {
                if ($user_exists->active_status != 1) {
                    return redirect()->back()
                        ->withErrors(['password' => 'Your account is inactive.']);
                }
                Auth::loginUsingId($user_exists->id);
                if(Auth::user()->user_type == 'super_admin'){
                    return redirect()->route("super_admin.home");
                }
                else if(Auth::user()->user_type == 'admin'){
                    return redirect()->route("admin.home");
                }
            }
            else {
                return redirect()->back()
                    ->withErrors(['password' => 'Password is invalid.']);
            }
        } else {
            return redirect()->back()
                ->withErrors(['email' => 'Email is invalid']);
        }
    }
}
