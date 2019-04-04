<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Country;
use App\Models\AllowedCountry;
use App\Models\State;
use App\Models\UserDocument;
use App\Models\UserProfile;
use App\Mail\ChangeMailEmail;
use Illuminate\Support\Facades\Mail;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $userId = Auth::guard('client')->user()->id;
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        // dd($userProfile['country_name']->name);
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        // dd($userInfo['user_profile']);
        $route='profile';
        return view('usr_profile.index',compact('userInfo','route'));
    }
    public function profileUpdate()
    {
        $route='update-profile';
        $userId = Auth::guard('client')->user()->id;

        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();

        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $countries = AllowedCountry::with('country')->get();
        $states = State::where('country_id',$userInfo['user_profile']['country_name']->id)->get();
        return view('usr_profile.edit_profile',compact('userInfo','route','countries','states'));
    }

    public function update(Request $request)
    {
        $userId = Auth::guard('client')->user()->id;
        $userData = User::where('users.id',$userId)->first();
        //update user complete name
        $userData->name = $request->get('name');
        $userData->middle_name=$request->get('mname');
        $userData->last_name=$request->get('lname');
        $userData->save();
        //update user profile
        $dob =  date('Y-m-d', strtotime($request->get('dob')));

        $userProfile = UserProfile::where('user_id',$userId)->first();
        $userProfile->dob=$dob;
        $userProfile->address=$request->get('address');
        $userProfile->country=$request->get('country');
        $userProfile->state=$request->get('sates');
        $userProfile->city=$request->get('city');
        $userProfile->postal_code=$request->get('postal_code');
        $userProfile->user_contact=$request->get('contact');
        $userProfile->street=$request->get('street');
        $userProfile->house_number=$request->get('house');
        $userProfile->save();
        return redirect()->route('profile')->with('success','Profile updated Successfully !');
    }
    public function change_mail(Request $request)
    {
        $oldEmail = $request->input('oldEmail');
        $newEmail = $request->input('newEmail');
        $verificatation = md5(Carbon::now());
        $userInfo = User::where('email',$oldEmail)->first();

        $userInfo->email=$newEmail;
        $userInfo->verification=$verificatation;
        $userInfo->email_verified_at="NULL";
        $userInfo->save();
        $mailData = array('email_address' => $oldEmail,"verification_token" => $verificatation,
        "user_name" => $userInfo->name." ".$userInfo->middle_name." ".$userInfo->last_name,
        "new_email" => $newEmail);
        $this->mailSend($mailData);
        Auth::guard('client')->logout();
        return true;
    }
    public function mailSend($mailData)
    {
        $obj = new \stdClass();
        $obj->verification_code = $mailData['verification_token'];
        $obj->recevier_name = $mailData['user_name'];
        $obj->new_email = $mailData['new_email'];
        $obj->sender ="admin@xnowad.com";
        $obj->receiver = $mailData['email_address'];
        Mail::to($mailData['email_address'])->send(new ChangeMailEmail($obj));
    }
}
