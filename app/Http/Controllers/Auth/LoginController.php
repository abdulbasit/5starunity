<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;

class LoginController extends Controller
{

    public function __construct()
    {
      $this->middleware('guest:client', ['except' => ['logout']]);
    }
    protected function guard()
    {
        return Auth::guard('client');
    }
    public function showLoginForm()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required',
        'status'=>'in:0'
      ]);

      // Attempt to log the user in

      if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password,'verification'=>"",'status'=>"0"], $request->remember)) {
        // if successful, then redirect to their intended location
        // return redirect()->intended(route('/home1'));
        return redirect('/profile');
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->route('login')->with('error','Invalid credentionals please try again with correct information! ');
    //   return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect('/');
    }
}
