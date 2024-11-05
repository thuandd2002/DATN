<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
class AdminBaseController extends Controller
{
    public function getMessagesSuccess($messages = 'Thêm mới')
    {
        \Session::flash('toastr', [
            'type'    => 'success',
            'message' => $messages
        ]);
    }
}
