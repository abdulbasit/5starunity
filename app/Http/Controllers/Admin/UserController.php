<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\LotteryContestent;
use App\Models\Recomendations;
use App\Models\Vallet;
use App\Models\UserDocument;
use  App\Models\TransLog;
use  App\Models\BlogComment;
use App\Traits\EmailTrait;
use Auth;
use ZipArchive;
class UserController extends Controller
{
    use EmailTrait;
    public function index()
    {
        $userData = User::with('userProfile')->get();
        return view('admin.users.index',compact('userData'));
    }
    public function recomandations()
    {
        $userData = Recomendations::all();
        return view('admin.users.recomandatins',compact('userData'));
    }
    public function creditHistory($id,$type="")
    {
        $user_id = $id;
        $creditHistoryData = Vallet::where('user_id',$id)->where('status','approved');
        if($type=='credit')
        {
            $creditHistoryData = $creditHistoryData->where('credit','>','0');
        }
        else if($type=='lottery')
        {
            $creditHistoryData = $creditHistoryData->where('credit','0');
        }
        $creditHistoryData = $creditHistoryData->orderBy('id','desc')->get();
        return view('admin.users.credit_history',compact('creditHistoryData','user_id','type'));
    }
    public function transactionHistory($id)
    {
        $lotterData = LotteryContestent::where('vallet_id',$id)->get();
        return view('admin.users.trans_history',compact('lotterData'));
    }
    public function transLog($id)
    {
        $transLog = TransLog::where('vallet_id',$id)->first();
        return view('admin.users.trans_log',compact('transLog'));
    }
    public function userDocuments($id)
    {
        $userDocuments = UserDocument::where('user_id',$id)->orderBy('type', 'asc')->get();
        return view('admin.users.documents',compact('userDocuments'));
    }
    public function approve($id)
    {
        $document_status = UserDocument::where('id',$id)->first();
        $document_status->status ="0";
        $document_status->save();
        return redirect('admin/user/documents/'.$document_status->user_id);
    }
    public function cancel($id,Request $request)
    {

        $document_status = UserDocument::where('id',$id)->first();
        $document_status->status ="1";
        $document_status->notes =$request->get('notes');
        $document_status->save();
    }
    public function download($id,$type)
    {

        $documents = UserDocument::where('id',$id)->first();

        if($type=='idproof')
        {

            $file= public_path(). "/uploads/users/documents_proofs/id_proof/"; 
            $zipFileName = 'AllDocuments.zip';
            $zip = new ZipArchive;
            
            // if ($zip->open($file . '/' . $zipFileName, ZipArchive::CREATE) === TRUE) {
            //     foreach($articles as $article) {
            //       $images = $article->image;
            //     $zip->addFile($file, $images);
            // }      
            // $zip = $zip->open('AllDocuments.zip', ZipArchive::CREATE);
            ob_clean();
            $res = $zip->open('AllDocuments.zip');
            if ($res === TRUE) {
                echo 'ok';
                // $zip->extractTo('test');
                // $zip->close();
            } else {
                echo 'failed, code:' . $res;
            }
            dd($res);
            $zip->addFile($file, "1570475224_5star_profile_id_front.jpg");  
            $zip->close();

            
            // Set Header
            $headers = array(
                'Content-Type' => 'application/octet-stream',
            );
            $filetopath=$file.'/'.$zipFileName;
            // Create Download Response
            if(file_exists($filetopath)){
                return response()->download($file,$zipFileName,$headers);
            }
        }
        else
        {
            if($documents->type=='res')
            {
                $file = public_path(). "/uploads/users/documents_proofs/res_proof/".$documents->res_proof;
                $info = pathinfo($file);
                $ext = $info['extension'];
            }
            else
            {
                $file= public_path(). "/uploads/users/documents_proofs/id_proof/".$documents->res_proof;
                $info = pathinfo($file);
                $ext = $info['extension'];
            }
            $headers = array(
                'Content-Type: application/'.$ext,
            );
            return response()->download($file );
        }

        // return Response::download($file, $documents->res_proof , $headers);
    }

    public function update_status($id,$status)
    {
        $user = User::where('id',$id)->first();

        $user->status =$status;
        $user->save();
        if($status=='0')
        {
            //send email for approve account 
            $data = array("sender_name"=>$user->name);
            $emailData = array("to"=>$user->email,"from_email"=>"no-reply","subject"=>"Account Approved","email_data"=>$data);
            $this->ApproveAccountAdminEmail($emailData);
           
        }
        else if ($status=='4')
        {
            //send email for delete account 
            $data = array("sender_name"=>$user->name);
            $emailData = array("to"=>$user->email,"from_email"=>"no-reply","subject"=>"Delet Account","email_data"=>$data);
            $this->DeleteAccountAdminEmail($emailData);
            $this->delete($id);
        }
        return redirect('admin/users');
        
    }
    public function delete($id)
    {
        
        $deleteProfile = UserProfile::where('user_id',$id);
        $deleteProfile->delete();

        $deleteBlogComment = BlogComment::where('user_id',$id);
        $deleteBlogComment->delete();

        $deleteDocuments = userDocument::where('user_id',$id);
        $deleteDocuments->delete();

        $deleteVallet = Vallet::where('user_id',$id);
        $deleteVallet->delete();

        $deleteAccount = User::find($id);

        $deleteAccount->delete();
      
        return redirect()->back();
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function documents()
    {
        return view('admin.users.documents');
    }
    public function deleteRquest()
    {
        $userData = User::with('userProfile')->where('status','3')->get();
        
        return view('admin.users.index',compact('userData'));
    }
    public function deletedAccounts()
    {
        $userData = User::withTrashed()->restore();
        return view('admin.users.index',compact('userData'));
    }
}
