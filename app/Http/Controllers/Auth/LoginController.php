<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

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

    public function login(Request $request)
    {   
        $input = $request->all();
  
        $this->validate($request, [
            'username' => 'required',
            'password' => 'required|min:6',
        ],[
            'min' => 'minimal karakter password berjumlah 6'
        ]);
  
        $fieldType = filter_var($request->username, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
        // var_dump(filter_var($request->username, FILTER_VALIDATE_EMAIL));
        // die;

        if (filter_var($request->username, FILTER_VALIDATE_EMAIL)){

            if (auth()->attempt(array($fieldType => $input['username'], 'password' => $input['password']))) {
                return redirect()->route('home')->with('pesan','Selamat Datang!');
            } 
            
            
             else {
                return redirect()->route('login')->with('pesan','email atau password salah');
            }
        }else
        {
            return redirect()->route('login')->with('pesan','format email salah!');
        }
    }
}
