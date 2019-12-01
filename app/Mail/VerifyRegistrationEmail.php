<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class VerifyRegistrationEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct($email)
    {
        $this->email = $email;
    }

    public function build()
    {
        return $this->from('admin@xnowad.com',"5Starunity Registration")
                    ->view('mails.register_verify')
                    ->with(
                      [
                        'testVarOne' => '1',
                        'testVarTwo' => '2',
                      ]);
    }
}
