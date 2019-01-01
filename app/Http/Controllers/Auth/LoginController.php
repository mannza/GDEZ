<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

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
     public function login(Request $request)
     {
         if (Auth::attempt([
           'email'=>$request->email,
           'password'=>$request->password
         ]))
       {
         $user=User::where('email',$request->email)->first();

         if ($users->is_admin())
         {
           return redirect()->route('home');
         }
         return redirect()->route('dashboard');
}
         return redirect()->back();

     }

            // protected $redirectTo = '/home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }
}
