<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Vallet;
use App\Models\Country;
use App\Models\AllowedCountry;
use App\Models\State;
use App\Models\UserDocument;
use App\Models\InvitationList;
use App\Models\UserProfile;
use App\Mail\ChangeMailEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationEmail;
// use App\Mail\inviteEmail;

use File;
class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $mailData = array('email_address' => 'abdulbasit05@gmail.com',"verification_token" => 'yaf89sdhf9asd8yfh',
        "user_name" => 'abdul ',"new_email" => 'basi_321@hotmail.com');
        $this->mailSend($mailData);
        dd('here i am ');
        $spent = 0;
        $userId = Auth::guard('client')->user()->id;
        $available_balance = Vallet::where('credit','>','0')->where('user_id',$userId)->where('status','approved')->orderBy('id','desc')->first();
        $purchasedLots = Vallet::where('balance','<','0')->where('user_id',$userId)->where('status','approved')->orderBy('id','desc')->get();

        foreach($purchasedLots as $spneMoney)
        {
            // str_replace("-","",$spneMoney->balance);
            $spent+=str_replace("-","",$spneMoney->balance);
        }
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        // dd($userProfile['country_name']->name);
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        // dd($userInfo['user_profile']);
        $route='dashboard';
        return view('usr_profile.index',compact('userInfo','route','available_balance','purchasedLots','spent'));
    }
    public function profile()
    {
       
        $spent = 0;
        $userId = Auth::guard('client')->user()->id;
        $available_balance = Vallet::where('credit','>','0')->where('user_id',$userId)->where('status','approved')->orderBy('id','desc')->first();
        $purchasedLots = Vallet::where('balance','<','0')->where('user_id',$userId)->where('status','approved')->orderBy('id','desc')->get();

        foreach($purchasedLots as $spneMoney)
        {
            // str_replace("-","",$spneMoney->balance);
            $spent+=str_replace("-","",$spneMoney->balance);
        }
        
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        // dd($userProfile['country_name']->name);
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        // dd($userInfo['user_profile']);
        $route='profile';
        return view('usr_profile.profile',compact('userInfo','route','available_balance','purchasedLots','spent'));
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
    public function dashboard()
    {
        $userId = Auth::guard('client')->user()->id;
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='dashboard';
        return view('usr_profile.dashboard',compact('userInfo','route'));
    }
    public function removePicture()
    {
        $userId = Auth::guard('client')->user()->id;
        $userProfile = UserProfile::where('user_id',$userId)->first();
        $file_path = public_path().'/uploads/users/profile_pic/'.$userProfile->profile_picture;
        if (file_exists($file_path) and !empty($file_path)) {
            File::delete($file_path);
            //UPDATE database
            $userProfile->profile_picture = "";
            $userProfile->save();
        }
        return redirect()->back();
    }
    public function deleteAccount()
    {
        $userId = Auth::guard('client')->user()->id;
        $userData = User::where('users.id',$userId)->first();
        //update column in case of delete my account 3 for request and 4 for approve deletion account by admin 
        $userData->status='3';
        $userData->save();
        return redirect()->back()->with('notice','Account deletion request has been sent to administrator. You will be inform via email once it approved');
    }
    public function refer()
    {
        $spent = 0;
        $userId = Auth::guard('client')->user()->id;
        $available_balance = Vallet::where('credit','>','0')->where('user_id',$userId)->where('status','approved')->orderBy('id','desc')->first();
        $purchasedLots = Vallet::where('balance','<','0')->where('user_id',$userId)->where('status','approved')->orderBy('id','desc')->get();

        foreach($purchasedLots as $spneMoney)
        {
            $spent+=str_replace("-","",$spneMoney->balance);
        }
        $userData = User::where('users.id',$userId)->first();
        $emaailsList = InvitationList::where('sender_id',$userId)->get();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='refer';
        return view('usr_profile.refer_form',compact('userInfo','route','available_balance','purchasedLots','spent','emaailsList'));
    }
    public function sendInivte(Request $request)
    {
            $userId = Auth::guard('client')->user()->id;
           
            $emailsList = $request->get('email_list');
            foreach(explode(",",$emailsList) as $email){
                $verification_code = md5($email.date('ymdhis').$userId);
                InvitationList::create([
                    'email' => $email,
                    'sender_id' => $userId,
                    'status' =>'0',
                    'type' => "",
                    'verification_code' => $verification_code
                ]);
                $verification_code ="";
            }
            return redirect()->back()->with('message','Invitations email sent to your selected users ');
    }

}
