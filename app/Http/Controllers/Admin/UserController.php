<?php

namespace App\Http\Controllers\Admin;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use App\Models\UserProfile;
use App\Models\Vallet;
use App\Models\UserDocument;
use Auth;
class UserController extends Controller
{

    public function index()
    {
        $userData = User::with('userProfile')->get();
        return view('admin.users.index',compact('userData'));
    }
    public function creditHistory($id)
    {
        $creditHistoryData = Vallet::where('user_id',$id)->where('status','approved')->orderBy('id','desc')->get();
        return view('admin.users.credit_history',compact('creditHistoryData'));
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
    public function download($id)
    {

        $documents = UserDocument::where('id',$id)->first();

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
        // return Response::download($file, $documents->res_proof , $headers);

    }
    public function update_status($id,$status)
    {
        $user = User::where('id',$id)->first();
        $user->status =$status;
        $user->save();
        return redirect('admin/users');
    }
    public function create()
    {
        return view('admin.users.create');
    }
    public function documents()
    {
        return view('admin.users.documents');
    }
}
