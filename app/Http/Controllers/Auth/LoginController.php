<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Auth;

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

    public function guard(){
        return Auth::guard();
    }

    public function view(){
        if (auth()->guard('users')->check()) {
            return redirect()->route('adminPage.base');
        }
        return view('admin-page.page.login');
    }

    public function loginExe(Request $Request){
        if (Auth::guard('users')->attempt(['email' => $Request->email, 'password' => $Request->password ])){
            return redirect()->route('adminPage.base');
        }
        else{
            return redirect()->back()->with('status', 'Sorry not found your account and please check your password');
        }
    }

    public function logout(){
        auth()->guard('users')->logout();
        return redirect()->route('adminPage.login.view');
    }
}
