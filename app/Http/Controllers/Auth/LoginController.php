<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use URL;
use Session;
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

        Session::flash('route', $request->get('pre-route'));
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required',
        'status'=>'in:0'
      ]);

      // Attempt to log the user in
    //   ,'verification'=>""
    if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password,'verification'=>""], $request->remember)) {

        if(Session::get('route')!="")
            return redirect(Session::get('route'));
        else
            return redirect('/dashboard');
    }
    else  if (Auth::guard('client')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
    {
        Auth::guard('client')->logout();
        return redirect()->route('login')->with('error',' E-Mail-Adresse nicht verifiziert; bitte überprüfen Sie Ihren Mail-Account.');
    }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->route('login')->with('error','E-Mail-Adresse und / oder Passwort falsch - bitte versuchen Sie es erneut.');
    //   return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('client')->logout();
        return redirect('/');
    }
}
