<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Auth;
use App\Models\TeamSpend;
use App\Models\CupponCount;
use Carbon\Carbon;
use App\Models\User;
use App\Models\Vallet;
use App\Models\Country;
use App\Models\AllowedCountry;
use App\Models\BonusTaler;
use App\Models\State;
use App\Models\UserDocument;
use App\Models\Recomendations;
use App\Models\DiscountCuppon;
use App\Models\InvitationList;
use App\Models\UserProfile;
use App\Mail\ChangeMailEmail;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationEmail;
use App\Mail\inviteEmail;
use App\Traits\EmailTrait;
use File;
use Illuminate\Support\Facades\Hash;
class UserController extends Controller
{
    use EmailTrait;
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
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
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $teamSpends = TeamSpend::where('reciver_id',$userId)->sum('amount');
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='dashboard';
        $bonusTaler = BonusTaler::where('user_id',$userId)->orderBy('id','desc')->first();
        return view('usr_profile.index',compact('userInfo','route','available_balance','purchasedLots','spent','bonusTaler','teamSpends'));
    }
    public function profile()
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
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
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

        $emailData = array("to"=>$userData->email,"from_email"=>"admin","subject"=>"Profile On Hold","email_data"=>array("name"=>$userData->name));
        $identity_card_back_img='';
        $identity_card_front_img='';

        $identity_card_front = $request->file('identity_card_front');
        $identity_card_back = $request->file('identity_card_back');
        $resident_proof = $request->file('resident_proof');
        $identity_card = $request->file('identity_card');
        
        $userData->name = $request->get('name');
        $userData->middle_name=$request->get('mname');
        $userData->last_name=$request->get('lname');
        
        //update user profile
        $dob =  date('Y-m-d', strtotime($request->get('dob')));
        $documents = UserDocument::where('user_id',$userId)->orderby('id','desc')->first();
        if($identity_card_front!="")
        {
            $file1 = $identity_card_front; 
            $identity_card_front_img_thumbnailPath = public_path('uploads/users/documents_proofs/id_proof');
            $file1->getClientOriginalName();
            $file1->getClientOriginalExtension();
            $file1->getRealPath();
            $file1->getSize();
            $file1->getMimeType();
            $identity_card_front_img = time().'_5star_profile_id_front.'.$file1->getClientOriginalExtension();
            $file1->move($identity_card_front_img_thumbnailPath, $identity_card_front_img);
            $documents->id_front = $identity_card_front_img;
            $documents->status='1';
            $documents->updated_at = Carbon::now();
            $documents->save();
        }
        if($identity_card_back!="")
        {
            $file2 = $identity_card_back;
            $identity_card_back_img_thumbnailPath = public_path('uploads/users/documents_proofs/id_proof');
            $file2->getClientOriginalName();
            $file2->getClientOriginalExtension();
            $file2->getRealPath();
            $file2->getSize();
            $file2->getMimeType();
            $identity_card_back_img = time().'_5star_profile_id_back.'.$file2->getClientOriginalExtension();
            $file2->move($identity_card_back_img_thumbnailPath, $identity_card_back_img);
            $documents->id_front = $identity_card_back_img;
            $documents->status='1';
            $documents->updated_at = Carbon::now();
            $documents->save();
        }
      
       
        
        if($identity_card)
        {
                $file3 = $identity_card;
                $idProofImg = public_path('uploads/users/documents_proofs/res_proof');
                $file3->getClientOriginalName();
                $file3->getClientOriginalExtension();
                $file3->getRealPath();
                $file3->getSize();
                $file3->getMimeType();
    
                //Move Uploaded File
                // dd($identity_card->getClientOriginalExtension());
               $id_proofImg = time().'_5star_id_proof.'.$identity_card->getClientOriginalExtension();
               $file3->move($idProofImg, $id_proofImg);
    
               $documents->res_proof = $id_proofImg;
               $documents->status='1';
               $documents->updated_at = Carbon::now();
               $documents->save();
            
        }
        $userData->status='1';
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
        //save user datta after all processes 
        $userData->save();
        
        $this->profileUpdateEmail($emailData);
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
        // $userInfo->save();
        $mailData = array('email_address' => $oldEmail,"verification_token" => $verificatation,
        "user_name" => $userInfo->name." ".$userInfo->middle_name." ".$userInfo->last_name,
        "new_email" => $newEmail);
        $this->changeEmailSend($mailData);
        Auth::guard('client')->logout();
        return true;
    } 
    public function changeEmailSend($mailData)
    {
        try {
                $obj = new \stdClass();
                $obj->verification_code = $mailData['verification_token'];
                $obj->recevier_name = $mailData['user_name'];
                $obj->new_email = $mailData['new_email'];
                $obj->sender ="admin@xnowad.com";
                $obj->receiver = $mailData['email_address'];
                $mailObj = new ChangeMailEmail($obj);
                Mail::to($mailData['email_address'])->send($mailObj);
                return "Success";
            } 
        catch (Exception $ex) {
                // Debug via $ex->getMessage();
                return "We've got errors!";
            }
       
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
        // if (file_exists($file_path) and !empty($file_path)) {
            File::delete($file_path);
            //UPDATE database
            $userProfile->profile_picture = "";
            $userProfile->save();
        // }
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
    public function refer($filters)
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
        if($filters=='all')
            $emaailsList = InvitationList::where('sender_id',$userId)->paginate(10);
        if($filters=='active')    
            $emaailsList = InvitationList::where('sender_id',$userId)->where('verification_code','')->paginate(10);
        if($filters=='inactive')        
            $emaailsList = InvitationList::where('sender_id',$userId)->where('verification_code','!=','')->paginate(10);

        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='refer';
        return view('usr_profile.refer_form',compact('userInfo','route','available_balance','purchasedLots','spent','emaailsList','filters'));
    }
    public function sendInivte(Request $request)
    {
    
        $userId = Auth::guard('client')->user()->id;
        $senderName = Auth::guard('client')->user()->name;
        $data=[];
        $mailSent='';
        $alreadyRegMsg='';
        $emailsList = $request->get('email_list');
        $alreadyRegistered = [];
        $alreadyInvited = [];
        $sendInvite = [];
        foreach(explode(",",$emailsList) as $email){
            //check if email already exists then skip entry 
            $regUers = User::where('email',$email)->count();

            if($regUers>0)
                $alreadyRegistered[]=$email;

            $emailcheck = InvitationList::where('email',$email)->count();

            if($emailcheck>0)
                $alreadyInvited[]=$email;

            if($emailcheck==0 && $regUers==0)
            {
                $sendInvite[] = $email;
                $invitationEmail = InvitationList::create([
                    'email' => $email,
                    'sender_id' => $userId,
                    'status' =>'0',
                    'type' => ""
                ]);
            
                $verification_code = md5($email.date('ymdhis').$invitationEmail->id);
                $invitationEmail->verification_code = $verification_code;
                $invitationEmail->save();
                $data['verification_code'] = $verification_code;
                $data['sender_name']=$senderName;
                $emailData = array("to"=>$email,"from_email"=>"admin","subject"=>"Invitation Email","email_data"=>$data);
                $this->inviteEmail($emailData);
            }
        }
        $already = array_unique(array_merge($alreadyRegistered,$alreadyInvited));
        return redirect()->back()->with('message',["mail_sent"=>$sendInvite,"already"=>$already]);
    }
    public function promotions()
    {
        $userId = Auth::guard('client')->user()->id;
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='promotions';
        return view('usr_profile.promotions',compact('userInfo','route'));
    }
    public function partners()
    {
        $userId = Auth::guard('client')->user()->id;
        $cuppons = DiscountCuppon::all();
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='partner';
        return view('usr_profile.promotions',compact('userInfo','route','cuppons'));
    }
    public function redirectToUrl($id)
    {
        $userId = Auth::guard('client')->user()->id;
        $cuppon = DiscountCuppon::find($id);
        $cupponCounter = CupponCount::where('cuppon_id',$id)->count();
        dd('dddd');
        $cupponCounterCreate = CupponCount::create([
            "cuppon_id"=>$id,
            "counter"=>"",
            "user_id"=>$userId,
            "ip_address"=>$this->get_client_ip()
        ]);
        return view('usr_profile.redirect',compact('cuppon'));
    }
    function get_client_ip() 
    {
        $ipaddress = '';
        if (getenv('HTTP_CLIENT_IP'))
            $ipaddress = getenv('HTTP_CLIENT_IP');
        else if(getenv('HTTP_X_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_X_FORWARDED_FOR');
        else if(getenv('HTTP_X_FORWARDED'))
            $ipaddress = getenv('HTTP_X_FORWARDED');
        else if(getenv('HTTP_FORWARDED_FOR'))
            $ipaddress = getenv('HTTP_FORWARDED_FOR');
        else if(getenv('HTTP_FORWARDED'))
            $ipaddress = getenv('HTTP_FORWARDED');
        else if(getenv('REMOTE_ADDR'))
            $ipaddress = getenv('REMOTE_ADDR');
        else
            $ipaddress = '0.0.0.0';
        return $ipaddress;
    }
    public function recomendations()
    {
        return view('usr_profile.recomendation');
    }
    public function savecomadation(Request $request)
    {
        $user_recomandations = Recomendations::create([

            "first_name"=>$request->get('first_name'),
            "function"=>$request->get('function'),
            "company_name"=>$request->get('company'),
            "email"=>$request->get('email'),
            "comments"=>$request->get('comments')
        ]);
        return redirect('/partners')->with('success','Recomandations sent successfuly');
    }
    public function documentArea()
    {
        
        $userId = Auth::guard('client')->user()->id;
        $cuppons = DiscountCuppon::all();
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='documents_area';
        return view('usr_profile.coming_soon',compact('userInfo','route','cuppons'));
    }
    public function course()
    {
        $userId = Auth::guard('client')->user()->id;
        $cuppons = DiscountCuppon::all();
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='activities';
        return view('usr_profile.coming_soon',compact('userInfo','route','cuppons'));
    }   
    public function contacts()
    {
        $userId = Auth::guard('client')->user()->id;
        $cuppons = DiscountCuppon::all();
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='my_contacts';
        return view('usr_profile.coming_soon',compact('userInfo','route','cuppons'));
    }   
    public function security()
    {
        $userId = Auth::guard('client')->user()->id;
        $cuppons = DiscountCuppon::all();
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        $route='security';
        return view('usr_profile.coming_soon',compact('userInfo','route','cuppons'));
    }   
    
}
