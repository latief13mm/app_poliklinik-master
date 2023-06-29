<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class loginPasienController extends Controller
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

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'homePasien';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:pasien')->except('logout');
    }

    public function showLoginPasienForm(){
        return view('loginPasien', ['url' => 'pasien']);
    }

    public function username(){
        return 'username';
    }

    public function loginPasien(Request $request)
    {

        if (Auth::guard('pasien')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {

            return redirect()->intended('homePasien');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    public function logout(Request $request)
    {
        
    Auth::guard('pasien')->logout();

    $request->session()->invalidate();

    return redirect('login/pasien');
    }


}
