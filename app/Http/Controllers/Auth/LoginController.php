<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
  

    // use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = 'home';

    /**
     * Create a new controller instance.
     *
     * @return void
     */

    public function __construct()
    {
        $this->middleware('guest')->except('logout');
        $this->middleware('guest:user')->except('logout');
    }

    public function username(){
        return 'username';
    }

    public function showLoginForm(){
        return view('welcome');
    }

    public function showLoginFormAdmin(){
        return view('interface/login');
    }

  
    public function loginAdmin(Request $request)
    {

        if (Auth::guard('user')->attempt(['username' => $request->username, 'password' => $request->password], $request->get('remember'))) {
            // Auth berhasil, tambahkan session 
            session(['user' => true]);

            return redirect()->intended('home');
        }
        return back()->withInput($request->only('username', 'remember'));
    }

    public function logout(Request $request)
    {

        // if (Auth::guard('admin')->check()) {
        //     Auth::guard('admin')->logout();
        //     $request->session()->invalidate();
        //     return redirect('login/admin');
        // }
    
        // return redirect('welcome');

        if (Auth::guard('user')->check()) {
            Auth::guard('user')->logout();
        } elseif (Auth::guard('pasien')->check()) {
            Auth::guard('pasien')->logout();
        }
        
        $request->session()->invalidate();
        
        return redirect('login/admin');
    
    }



}