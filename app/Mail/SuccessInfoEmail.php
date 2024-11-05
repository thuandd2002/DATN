<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Admin\Models\Information\Information;

class SuccessInfoEmail extends Mailable
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
        $info           =  Information::first();// email nhan

        $address = $info->if_email; // email được nhận
        $subject = 'Có 1 khách hàng đăng ký tư vấn'; //Tiêu đề
        $name = 'Hệ thống website'; // Ai gủi đi

        return $this->view('email.messages_to_admin')
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject)
            ->with([ 'data' => $this->data ]);
    }
}
