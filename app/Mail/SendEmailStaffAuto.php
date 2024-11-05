<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Admin\Models\Information\Information;

class SendEmailStaffAuto extends Mailable
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
        $address = isset($this->data['email_address']) ?  $this->data['email_address'] : ''; // email được nhận
        // $address =   $address; // email được nhận
        $subject = 'Có người đặt lịch xem xe ô tô cần bạn tư vấn'; //Tiêu đề
        $name = 'Hệ thống website'; // Ai gủi đi

        return $this->view('email.staffauto')
            ->from($address, $name)
            ->cc($address, $name)
            ->bcc($address, $name)
            ->replyTo($address, $name)
            ->subject($subject)
            ->with([ 'data' => $this->data ]);
    }
}