<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Carbon\Carbon;
use Lang;
use Auth;

class HomeController extends Controller
{
    protected $view_data = [];
    
    /**
     * Constructor
     *
     */
    public function __construct()
    {
        $this->view_data['main_title'] = "Dashboard";
        $this->view_data['active_menu'] = 'dashboard';
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['sliders'] = json_encode([]);
        return view('login',$data);
    }

    /**
     * Authenticate admin user
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request)
    {
        $rules = array(
            'email' => 'required',
            'password' => 'required',
        );

        $attributes = array(
            'email' => "email",
            'password' => 'password',
        );

        $this->validate($request,$rules,[],$attributes);

        $remember = ($request->remember_me == 'on');
        if (Auth::attempt($request->only('email','password'),$remember)) {
            $admin = User::where('email', $request->email)->first();

            return redirect()->route('dashboard');
        }
        else {
            flashMessage('danger',"Failed to Login","Invalid Username or password");
        }
        
        return redirect()->route('login');        
    }

    /**
     * Log out current admin user.
     *
     * @return \Illuminate\Http\Response
     */
    public function logout()
    {
        session()->forget('url.intended');
        Auth::logout();
        return redirect()->route('login');
    }

    /**
     * Display a User Dashboard with total consolidated data
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        return view('dashboard',$this->view_data);
    }
}
