<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Validator;
use Hash;
use Session;
use App\Models\User;

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
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function index()
    {
        return view('auth.login');
    }
    public function login(Request $request)
    {
        // dd(Session::all());
        $input = $request->all();
        
        $this->validate($request, [
            'email' => 'required|email',
            'password'=>'required|min:6',
        ]);

        if(Auth::attempt(array('email' => $input['email'], 'password' => $input['password'])))
        {
            if (auth()->user()->is_admin == 1) {
                return redirect()->route('dashboard.1');
            }else{
                return redirect()->route('dashboard.0');
            }
        }else{
            return redirect()->route('form.login')
                ->with('error','Email or Password wrong !');
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();
        return redirect()->route('form.login');
    }
}
