<?php

namespace App\Http\Controllers\Frontend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Mail\DemoMail;
use Illuminate\Support\Facades\Mail;

class DemoMailController extends Controller
{
    //
    public function sendmail(){
        Mail::to('duc2722000@gmail.com')->send(new DemoMail);
    }
}
