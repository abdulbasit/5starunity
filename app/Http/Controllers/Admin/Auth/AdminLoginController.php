<?php

namespace App\Http\Controllers\Admin\Auth;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;
use Route;
use App\Models\Admin;
class AdminLoginController extends Controller
{

    public function __construct()
    {
      $this->middleware('guest:admin', ['except' => ['logout']]);
      // $this->middleware('auth', ['except' => 'showLoginForm']);
    }

    public function showLoginForm()
    {
      return view('admin.auth.login');
    }

    public function login(Request $request)
    {
      // Validate the form data
      $this->validate($request, [
        'email'   => 'required|email',
        'password' => 'required'
      ]);

      // $user = Admin::where("email",$request->email)->where('password',$request->password)
      // ->first();
      // dd($user);
      // Attempt to log the user in

      if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
        // if successful, then redirect to their intended location
        // dd(Auth::admin(Auth::guard('admin')->user()));
        
        return redirect()->intended(route('admin.dashboard'));
      }
      // if unsuccessful, then redirect back to the login with the form data
      return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/admin');
    }
    protected function guard()
    {
        return Auth::guard("admin");
    }
}
