<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationEmail;
use App\Mail\InviteEmail;
use App\Mail\ProfileUpdateEmail;
use App\Mail\DeleteAccountEmail;
use App\Mail\ApprovedAccountEmail;
trait EmailTrait {
 
    public function sendEmails($mailObj) {
 
        try {
           
            Mail::send($mailObj);
            return "Success";
        } 
        catch (Exception $ex) {
                // Debug via $ex->getMessage();
                return "We've got errors!";
            }
           
       
    }
    public function inviteEmail($param)
    {
        $regFrom = \Config::get('constants.emailsFrom.'.$param['from_email']);
            $obj = new \stdClass();
            foreach($param['email_data'] as $key=>$emailData)
            {
                $obj->$key = $emailData;
            }
            $obj->sender = $regFrom;
            $obj->subject = $param['subject'];
            $obj->receiver = $param['to'];
            $mailObj = new InviteEmail($obj); 
            $this->sendEmails($mailObj);
    }
    public function profileUpdateEmail($param)
    {
        $regFrom = \Config::get('constants.emailsFrom.'.$param['from_email']);
            $obj = new \stdClass();
            foreach($param['email_data'] as $key=>$emailData)
            {
                $obj->$key = $emailData;
            }
            $obj->sender = $regFrom;
            $obj->subject = $param['subject'];
            $obj->receiver = $param['to'];
            $mailObj = new ProfileUpdateEmail($obj); 
            $this->sendEmails($mailObj);
    }
    //admin emails 

    public function DeleteAccountAdminEmail($param)
    {
        $regFrom = \Config::get('constants.emailsFrom.'.$param['from_email']);
            $obj = new \stdClass();
            foreach($param['email_data'] as $key=>$emailData)
            {
                $obj->$key = $emailData;
            }
            $obj->sender = $regFrom;
            $obj->subject = $param['subject'];
            $obj->receiver = $param['to'];
            $mailObj = new DeleteAccountEmail($obj); 
            $this->sendEmails($mailObj);
    }
    public function ApproveAccountAdminEmail($param)
    {
        $regFrom = \Config::get('constants.emailsFrom.'.$param['from_email']);
            $obj = new \stdClass();
            foreach($param['email_data'] as $key=>$emailData)
            {
                $obj->$key = $emailData;
            }
            $obj->sender = $regFrom;
            $obj->subject = $param['subject'];
            $obj->receiver = $param['to'];
            $mailObj = new ApprovedAccountEmail($obj); 
            $this->sendEmails($mailObj);
    }
}
 