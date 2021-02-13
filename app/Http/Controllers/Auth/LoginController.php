<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Http\Request;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\User;
use Validator;

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

    public function show_login_form(){
        return view('auth.login');
    }

    public function process_login(Request $request){
        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password
        ];

        $remember = $request->remember;
        if($remember){
            cookie('remember', json_encode('hello world'), 100000);
        }
        if( auth()->attempt($credentials,$remember) ) {
            $user = Auth::user();
            $success['token'] =  $user->createToken('AppName')->accessToken;
            return redirect()->route('home');
        } else {
            return redirect()->back();
        }
    }

    public function show_signup_form(){
        return view('auth.register');
    }

    public function register(Request $request)
    {
        // dd($request);
        $request->validate([
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8|',
            'password_confirmation' => 'required|same:password',
        ]);

        // if ($validator->fails()) {
        //   return response()->json([ 'error'=> $validator->errors() ]);
        // }

        $data = $request->all();

        $data['password'] = Hash::make($data['password']);

        $user = User::create($data);
        $success['token'] =  $user->createToken('AppName')->accessToken;

        return redirect()->route('login');
    }

    public function logout()
    {
        \Auth::logout();

        return redirect()->route('login');
    }
}
