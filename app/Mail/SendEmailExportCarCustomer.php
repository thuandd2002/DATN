<?php

namespace App\Mail;

use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use Modules\Admin\Models\Information\Information;

class SendEmailExportCarCustomer extends Mailable
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

        $orderInfo = $this->data['infoOrder'][0];

            $address = isset($orderInfo->user) ? $orderInfo->user->email : ''; 
            $subject = 'Xuất xe ra khỏi kho'; 
            $name = 'Hệ thống website'; // Ai gủi đi
    
            return $this->view('email.export_cart_customer')
                ->from($address, $name)
                ->cc($address, $name)
                ->bcc($address, $name)
                ->replyTo($address, $name)
                ->subject($subject)
                ->with([ 'orderInfo' => $orderInfo ]);  
    }
}

