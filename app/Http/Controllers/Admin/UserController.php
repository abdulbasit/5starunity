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
        $zipName = date('ymdhis')."_".$documents->user->name."-".$documents->user->last_name."-"."documents";
        if($type=='idproof')
        {

            $zip_file = str_replace(" ","-",$zipName).'.zip'; // Name of our archive to download

            // Initializing PHP class
            $zip = new \ZipArchive();
            $zip->open($zip_file, \ZipArchive::CREATE | \ZipArchive::OVERWRITE);
            
            $front = $documents->id_front;
            $back = $documents->id_back;
            // Adding file: second parameter is what will the path inside of the archive
            // So it will create another folder called "storage/" inside ZIP, and put the file there.
            $zip->addFile(public_path('uploads/users/documents_proofs/id_proof/'.$front), $front);
            $zip->addFile(public_path('uploads/users/documents_proofs/id_proof/'.$back), $back);
            $zip->close();
            
            header('Content-Type: application/zip');
            header("Content-Disposition: attachment; filename=$zip_file");
            header('Content-Length: ' . filesize($zip_file));
            //header("Location: php-merchantpay.zip");
            readfile($zip_file);
            unlink($zip_file);

            // We return the file immediately after download
            // return response()->download($zip_file);
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
