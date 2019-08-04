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
use App\Mail\inviteEmail;
use App\Traits\EmailTrait;
use File;
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

        $emailData = array("to"=>$userData->email,"from_email"=>"admin","subject"=>"Profile On Hold","email_data"=>array("name"=>$userData->name));
        //update user complete name
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
        if($identity_card_front!="")
        {
            $file1 = $identity_card_front;
            $identity_card_front_img_thumbnailPath = public_path('uploads/users/documents_proofs/');
            $file1->getClientOriginalName();
            $file1->getClientOriginalExtension();
            $file1->getRealPath();
            $file1->getSize();
            $file1->getMimeType();
            $identity_card_front_img = time().'_5star_profile.'.$file1->getClientOriginalExtension();
            $file1->move($identity_card_front_img_thumbnailPath, $identity_card_front_img);
        }
        if($identity_card_back!="")
        {
            $file2 = $identity_card_back;
            $identity_card_back_img_thumbnailPath = public_path('uploads/users/documents_proofs/');
            $file2->getClientOriginalName();
            $file2->getClientOriginalExtension();
            $file2->getRealPath();
            $file2->getSize();
            $file2->getMimeType();
            $identity_card_back_img = time().'_5star_profile.'.$file2->getClientOriginalExtension();
            $file2->move($identity_card_back_img_thumbnailPath, $identity_card_back_img);
        }
      
        $idProofImg = public_path('uploads/users/documents_proofs/id_proof');
        //delete old files uploaded by user 
        $deleteDocuments = UserDocument::where('user_id',$userId);
        $deleteDocuments->delete();
        //===============================
        foreach ($identity_card as $identity_proofImage)
        {
            $identity_proofImage->getClientOriginalName();
            $identity_proofImage->getClientOriginalExtension();
            $identity_proofImage->getRealPath();
            $identity_proofImage->getSize();
            $identity_proofImage->getMimeType();

            //Move Uploaded File
           $id_proofImg = time().'_5star_id_proof.'.$identity_proofImage->getClientOriginalExtension();
           $identity_proofImage->move($idProofImg, $id_proofImg);

            $product_images = UserDocument::create([
                "user_id" => $userId,
                "res_proof"=>$id_proofImg,
                "id_front"=>$identity_card_front_img,
                "id_back"=>$identity_card_back_img,
                "status"=>'1',
                "type"=>'identity',
                'updated_at'=>Carbon::now(),
                'created_at'=>Carbon::now(),
            ]);
            
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
            $emaailsList = InvitationList::where('sender_id',$userId)->leftJoin('vallets','user_id','reciver_id')->paginate(10);
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
        $emailsList = $request->get('email_list');
        $alreadyRegistered = '';
        foreach(explode(",",$emailsList) as $email){
            //check if email already exists then skip entry 
            $regUers = User::where('email',$email)->count();
            if($regUers>0)
                $alreadyRegistered.=$email.",";

            $emailcheck = InvitationList::where('email',$email)->count();
            if($emailcheck==0 && $regUers==0)
            {
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
        return redirect()->back()->with('message','Invitations email sent to your selected users ?'.$alreadyRegistered);
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

}
