<?php
namespace App\Traits;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Mail\RegistrationEmail;
use App\Mail\InviteEmail;
use App\Mail\ProfileUpdateEmail;
use App\Mail\DeleteAccountEmail;
use App\Mail\ApprovedAccountEmail;
use App\Mail\SubscriptionEmail;
use App\Mail\CancelDocumentEmail;
use App\Mail\RessetPasswordEmail;
use App\Mail\SubsConfirmEmail;
use App\Mail\VerifyRegistrationEmail;
use App\Mail\DcomnetsApproveEmail;
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
    public function SubscribeEmail($param)
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
            $mailObj = new SubscriptionEmail($obj); 
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
    public function CancelDocumentAdminEmail($param)
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
            $mailObj = new CancelDocumentEmail($obj); 
            $this->sendEmails($mailObj);
    }
    public function SubscriptionConfirmEmail($param)
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
        $mailObj = new SubsConfirmEmail($obj); 
        $this->sendEmails($mailObj);
    }
    public function ResetPasswordmEmail($param)
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
        $mailObj = new RessetPasswordEmail($obj); 
        $this->sendEmails($mailObj);
    }
    public function RegisterVerifiedEmail($param)
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
        $mailObj = new VerifyRegistrationEmail($obj); 
        $this->sendEmails($mailObj);
    }
    public function ApproveDocuments($param)
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
        $mailObj = new DcomnetsApproveEmail($obj); 
        $this->sendEmails($mailObj);
    }
    public function CancelDocuments($param)
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
        $mailObj = new DocumentsCancelEmail($obj); 
        $this->sendEmails($mailObj);
    }
}
 