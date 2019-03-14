<?php
namespace App\Http\Controllers\Auth;
use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use App\Models\AllowedCountry;
use App\Models\UserDocument;
use App\Models\State;
use App\Models\Country;
use App\Models\UserProfile;
use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Mail\RegistrationEmail;
use Illuminate\Support\Facades\Mail;
class RegisterController extends Controller
{

    use RegistersUsers;

    protected $redirectTo = '/login';
    public function __construct()
    {
        // $this->middleware('guest');
    }
    public function index()
    {
        $countries = AllowedCountry::with('country')->get();

        return view('auth/register',compact('countries'));
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
        $profile_picture = $request->file('profile_pic');
        $resident_proof = $request->file('resident_proof');
        $identity_card = $request->file('identity_card');

        $dob =  date('Y-m-d', strtotime($request->get('dob')));
        $address = $request->get('address');
        $country = $request->get('country');
        $state = $request->get('state');
        $city = $request->get('city');
        $postal_code = $request->get('postal_code');
        $phone = $request->get('phone');
        $verificatation = md5(Carbon::now());

        $user_id = User::create([
            'name' => $request->get('fname')." ".$request->get('lname'),
            'email' => $request->get('email'),
            'password' => Hash::make($request->get('password')),
            'role' => '0',
            'status'=>'1',//disabled
            'verification'=>$verificatation
        ]);
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

        $profile_id = UserProfile::create([
            'user_id' => $user_id->id,
            'dob' => $dob,
            'address' => $address,
            'country' => $country,
            'state' =>$state,
            'city' =>$city,
            'postal_code'=>$postal_code,
            'profile_picture'=>$imageName,
            'user_contact'=>$phone,
            'created_at'=>"2019-03-14"
        ]);

        $resProofImg = public_path('uploads/users/documents_proofs/res_proof');
        foreach ($resident_proof as $resident_proofImage)
        {
            $resident_proofImage->getClientOriginalName();
            $resident_proofImage->getClientOriginalExtension();
            $resident_proofImage->getRealPath();
            $resident_proofImage->getSize();
            $resident_proofImage->getMimeType();

            //Move Uploaded File
            $res_poroof = time().'_5star_res_proof.'.$resident_proofImage->getClientOriginalExtension();
            $resident_proofImage->move($resProofImg, $res_poroof);

            $product_images = UserDocument::create([
                "user_id" => $user_id->id,
                "res_proof"=>$res_poroof,
                "status"=>'0',
                'updated_at'=>Carbon::now(),
                'created_at'=>Carbon::now(),
                "type"=>'res'
            ]);
        }

        $idProofImg = public_path('uploads/users/documents_proofs/id_proor');
        foreach ($identity_card as $identity_proofImage)
        {
            $identity_proofImage->getClientOriginalName();
            $identity_proofImage->getClientOriginalExtension();
            $identity_proofImage->getRealPath();
            $identity_proofImage->getSize();
            $identity_proofImage->getMimeType();

            //Move Uploaded File
            $id_proofImg = time().'_5star_id_proof.'.$identity_proofImage->getClientOriginalExtension();
            $identity_proofImage->move($idProofImg, $res_poroof);

            $product_images = UserDocument::create([
                "user_id" => $user_id->id,
                "res_proof"=>$id_proofImg,
                "status"=>'0',
                "type"=>'identity',
                'updated_at'=>Carbon::now(),
                'created_at'=>Carbon::now(),
            ]);
        }
        $this->mailSend($mailData);
        return redirect()->route('login')->with('info','Verification emaiil has been sent to you please check your inbox!');
    }
    public function verify_email($token)
    {
        $email_verification = User::where('verification',$token)->first();
        if($email_verification)
        {
            $email_verification->verification="";
            $email_verification->email_verified_at=Carbon::now();
            $email_verification->save();
            return redirect()->route('login')->with('success','Email Verified Successfully! ');
        }
        else
        {
            return redirect()->route('login')->with('error','Sorry. No Record Found! ');
        }

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
}
