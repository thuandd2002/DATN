<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Support\Facades\Log;
use Modules\Admin\Models\Information\Information;

class SendEmailComment extends Mailable
{
//    use  SerializesModels;
    private $data;
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($data)
    {
        $this->data = $data;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        Log::info("----- send email handle");

        $address = ''; // email được nhận
        $subject = 'Có 1 khách hàng vừa comment'; //Tiêu đề
        $name = 'Hệ thống website'; // Ai gủi đi


        return $this->view('email.comment_to_admin')->with(
            [ 'data' => $this->data ]
        );

//        return $this->view('email.comment_to_admin')
//            ->from($address, $name)
//            ->cc($address, $name)
//            ->bcc($address, $name)
//            ->replyTo($address, $name)
//            ->subject($subject)
//            ->with([ 'data' => $this->data ]);
    }
}
