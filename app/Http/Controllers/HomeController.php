<?php

namespace App\Http\Controllers;

use Auth;
use Hash;
use Illuminate\Http\Request;

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
        return view('home');
    }
    /*
    <!--@csrf
    <input type="hidden" name="token" value="{{ $token }}"> -->
    */
    public function showChangePasswordForm()
    {
        return view('auth.changepassword');
    }
    public function showSetPasswordView()
    {
        return view('auth.passwords.reset');
    }

    public function changePassword(Request $request)
    {
        if(!(Hash::check($request->get('current-password'), Auth::user()->password))) {
            // passwords match
            return redirect()->back()->with("error", "Current password dont match");
        }
        if(strcmp($request->get('current-password'), $request->get('password'))==0){
            // current password and new password are same
            return redirect()->back()->with("error", "New password cannot be same as current");
        }
        $validatedData = $request->validate([
            'current-password' => 'required',
            'password' => 'required|string|confirmed',
        ]);
        // change password
        $user = Auth::user();
        $user->password = bcrypt($request->get('password'));
        $user->save();

        return redirect()->back()->with("success", "Password changed successfully");
    }
}
