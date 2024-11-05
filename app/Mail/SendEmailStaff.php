<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Admin\Models\Information\Information;

class SendEmailStaff extends Mailable
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
        $this->email_detail = $data['email'][0];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {

        $address = isset( $this->email_detail->email) ?   $this->email_detail->email : ''; // email được nhận
        // $address =   $address; // email được nhận
        $subject = 'Có người đặt lịch xem xe ô tô cần bạn xử lý'; //Tiêu đề
        $name = 'Hệ thống website'; // Ai gủi đi

        return $this->view('email.staff')
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject)
            ->with([ 'data' => $this->data , 'email' => $this->email_detail ]);
    }
}