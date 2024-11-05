<?php

namespace Modules\Admin\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Modules\Admin\Models\Order\Order;
use PDF;


class AdminPdfController extends AdminBaseController
{
    public function index(Request $request,$id)
    {
        $infoOrder = Order::with(['product', 'user'])->where('id', '=', $id)->get();
        $data = $infoOrder[0];
        return view('admin::order.print',compact("data"));
    }


    public function print(Request $request)
    {
        $params = $request->all();

        $pdf = \App::make('dompdf.wrapper');
        $html = view('admin::pdf.index',compact('params'))->render();
        $pdf->loadHTML($html);

        return $pdf->stream('hop-dong.pdf');
    }

    public function printXuatxe(Request $request,$id)
    {
        $data = [
            "name" => Auth::user()->name,
        ];
        $pdf = \App::make('dompdf.wrapper');
        $html = view('admin::pdf.phieuxuatkho',compact(['data']))->render();
        $pdf->loadHTML($html);

        return $pdf->stream('phieu-xuat-xe.pdf');
    }
}
