<?php
namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class ProfileUpdateEmail extends Mailable
{
    use Queueable, SerializesModels;

    public $email;

    public function __construct($email)
    {
        $this->email = $email;
        // dd($email->subject);
    }

    public function build()
    {
        return $this->from($this->email->sender)
                    ->view('mails.file_update')
                    ->subject($this->email->subject)
                    ->to($this->email->receiver)
                    // ->text('mails.demo_plain')
                    ->with(
                      [
                            'testVarOne' => '1',
                            'testVarTwo' => '2',
                      ]);
                    //   ->attach(public_path('/images').'/demo.jpg', [
                    //           'as' => 'demo.jpg',
                    //           'mime' => 'image/jpeg',
                    //   ]);
    }
}
