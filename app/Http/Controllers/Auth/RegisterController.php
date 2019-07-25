<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\AllowedCountry;
use App\Models\UserDocument;
use App\Models\InvitationList;
use App\Models\State;
use App\Models\Country;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\RegistrationEmail;
use Illuminate\Support\Facades\Mail;

use Auth;
use DB;
class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/login';
    public function __construct()
    {
        // $this->middleware('guest');
    }
    public function index(Request $request)
    {
        if (@Auth::guard('client')->user()->id!="")
            return redirect()->route('dashboard');

        $invitee =  $request->input('invitee');
        $countries = AllowedCountry::with('country')->get();
        return view('auth/register',compact('countries','invitee'));
    }
    public function ajaxStates(Request $request)
    {
        $state =  State::where('country_id',$request->get('country_id'))->get();
        $options = '';
        foreach($state as $stateName)
        {
            $options.='<option value="'.$stateName->id.'">'.$stateName->name.'</option>';
        }
        return $options;
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:6', 'confirmed'],
        ]);
    }

    protected function create(Request $request)
    {
       
        //check if user is freferrer then approve its acceptence    
        if($request->get('invitee')!="")
        {
            $userInvites = InvitationList::where('verification_code',$request->get('invitee'))->first();
            $userInvites->verification_code="";
            $userInvites->updated_at=Carbon::now();
            $userInvites->save();

        }
        $profile_picture = $request->file('profile_pic');
        $identity_card_front = $request->file('identity_card_front');
        $identity_card_back = $request->file('identity_card_back');
        $resident_proof = $request->file('resident_proof');
        $identity_card = $request->file('identity_card');
        $address2 = $request->file('address2');

        $dob =  date('Y-m-d', strtotime($request->get('dob')));
        $address = $request->get('address');
        $country = $request->get('country');
        $state = $request->get('state');
        $city = $request->get('city');
        $postal_code = $request->get('postal_code');
        $phone = $request->get('phone');
        $verificatation = md5(Carbon::now());
        $referral_code = mt_rand(0,100000);
        $emailCheck = User::where('email',$request->get('email'))->count();
        if($emailCheck>0)
            return 'error';
            // return redirect()->route('login')->with('error','Email already registered!');
        $get_user_name =  explode("@",$request->get('email'));
        $user_name = $get_user_name[0];
        

        $user_id = User::create([
            'name' => $request->get('fname'),
            'middle_name' => $request->get('mname'),
            'last_name' => $request->get('lname'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => '0',
            'status'=>'1',//disabled
            'verification'=>$verificatation
        ]);

        //add user name
        $checkUserName = User::where("user_name",$user_name)->count();
        if($checkUserName>0)
            $user_name = $this->generate_username($user_name, 1000);

        //referral code generate 
        $referral_code = rand();
        $referral_code = md5($referral_code.date('ymdhis').$user_id);
        
        //generate user code
        $number = $user_id->id;
        $length = ceil(log10($number));
        $user_number = substr("000000000",$length).number_format($number);
        $user_id->user_name = $user_name.$user_id->id;
        $user_id->referral_code = substr($referral_code,0,15);
        $user_id->user_number = $user_number;
        $user_id->save();

        $mailData = array('email_address'=>$request->get('email'),"verification_token"=>$verificatation,
                           "user_name"=> $request->get('fname')." ".$request->get('lname') );

        if($profile_picture!="")
        {
            $file = $profile_picture;
            $thumbnailPath = public_path('uploads/users/profile_pic/');
            $file->getClientOriginalName();
            $file->getClientOriginalExtension();
            $file->getRealPath();
            $file->getSize();
            $file->getMimeType();
            $imageName = time().'_5star_profile.'.$file->getClientOriginalExtension();
            $file->move($thumbnailPath, $imageName);
        }
        else
        {
            $imageName='';
        }
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
        else
        {
            $identity_card_front_img='';
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
        else
        {
            $identity_card_back_img='';
        }

        $profile_id = UserProfile::create([
            'user_id' => $user_id->id,
            'dob' => $dob,
            'address' => $address,
            "address_2"=>$address2,
            'country' => $country,
            'state' =>$state,
            'city' =>$city,
            'postal_code'=>$postal_code,
            'profile_picture'=>$imageName,
            'user_contact'=>$phone,
            'created_at'=>"2019-03-14",
            "street"=>$request->get('street_n'),
            "house_number"=>$request->get('hnumber')
        ]);


        $idProofImg = public_path('uploads/users/documents_proofs/id_proof');
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
                "user_id" => $user_id->id,
                "res_proof"=>$id_proofImg,
                "id_front"=>$identity_card_front_img,
                "id_back"=>$identity_card_back_img,
                "status"=>'1',
                "type"=>'identity',
                'updated_at'=>Carbon::now(),
                'created_at'=>Carbon::now(),
            ]);
        }
        
        $this->mailSend($mailData);
        return redirect()->route('login')->with('info',__('messages.register_success_info'));
    }
    public function verify_email($token)
    {
        $email_verification = User::where('verification',$token)->first();
        if($email_verification)
        {
            $email_verification->verification="";
            $email_verification->email_verified_at=Carbon::now();
            $email_verification->save();
            return redirect()->route('login')->with('success','Email Verified Successfully!');
        }
        else
        {
            return redirect()->route('login')->with('error','Sorry. No Record Found!');
        }
    }
    public function check_email(Request $request)
    {

         $emailCheck = User::where('email',$request->get('email'))->count();
         if($emailCheck>0)
            echo  $response = "error";
    }
    public function mailSend($mailData)
    {
        $objDemo = new \stdClass();
        $objDemo->verification_code = $mailData['verification_token'];
        $objDemo->recevier_name = $mailData['user_name'];
        $objDemo->sender ="admin@xnowad.com";
        $objDemo->receiver = $mailData['email_address'];
        Mail::to($mailData['email_address'])->send(new RegistrationEmail($objDemo));
    }
    public function profileUpdate()
    {
        $route='update-profile';
        $userId = Auth::guard('client')->user()->id;
        $userData = User::where('users.id',$userId)->first();
        $userProfile = UserProfile::with("country_name","state_name")->where('user_id',$userId)->first();
        $userDocuments = UserDocument::where('user_id',$userId)->get();
        $userInfo = array("user_data"=>$userData,"user_profile"=>$userProfile,"user_documents"=>$userDocuments);
        return view('usr_profile.edit_profile',compact('userInfo','route'));
    }
    public function ajaxImage(Request $request)
    {

        if ($request->isMethod('get'))
            return view('ajax_image_upload');
        else {
            $userId = Auth::guard('client')->user()->id;
            $validator = Validator::make($request->all(),
                [
                    'file' => 'image',
                ],
                [
                    'file.image' => 'The file must be an image (jpeg, png, bmp, gif, or svg)'
                ]);
            if ($validator->fails())
                return array(
                    'fail' => true,
                    'errors' => $validator->errors()
                );
            $extension = $request->file('file')->getClientOriginalExtension();
            $dir = 'uploads/users/profile_pic';
            $filename =  time()."_5star_profile".'.'.$extension;
            $request->file('file')->move($dir, $filename);
            $userData = UserProfile::where('user_id',$userId)->first();
            $userData->profile_picture =$filename;
            $userData->save();
            return $filename;
        }
    }
    public function email_template()
    {
        return view('mails.register_verification');
    }
    public function deleteImage($filename)
    {
        File::delete('uploads/users/profile_pic/' . $filename);
    }
    function generate_username($string_name, $rand_no){
		$username_parts = array_filter(explode(" ", strtolower($string_name))); //explode and lowercase name
		$username_parts = array_slice($username_parts, 0, 2); //return only first two arry part
	
		$part1 = (!empty($username_parts[0]))?substr($username_parts[0], 0,8):""; //cut first name to 8 letters
		$part2 = (!empty($username_parts[1]))?substr($username_parts[1], 0,5):""; //cut second name to 5 letters
		$part3 = ($rand_no)?rand(0, $rand_no):"";
		
		$username = $part1. str_shuffle($part2). $part3; //str_shuffle to randomly shuffle all characters 
		return $username;
}
}
