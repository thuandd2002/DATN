@extends('email.app')
@section('content')
    <tr>
        <td style="color:#fc205b;font-size:20px;font-weight:bold">
            Xin chào Admin
        </td>
    </tr>
    {{--<tr>--}}
        {{--<td style="color:#5b5b5c;padding-top:15px;font-weight:bold" width="98%">--}}
            {{--Cảm ơn Quý công ty đã đăng đăng tin tuyển dụng trên 123Job.Vn--}}
        {{--</td>--}}
    {{--</tr>--}}
    <tr>
        <td style="color:#5b5b5c;padding-top:15px" width="98%">
            Vừa có 1 khách hàng xác nhận nhận tư vấn với email là {{ isset ($data['email'] ) ? $data['email'] : '' }} - Và số điện thoại là {{ isset($data['phone']) ? $data['phone'] : '' }}
        </td>
    </tr>
    {{--<tr>--}}
        {{--<td style="padding:25px 25px 30px;font-size:16px;text-align:center">--}}
            {{--<a style="padding:10px 50px;background-color:#fc205b;text-decoration:none;color:#fff;border-radius:5px" href="" target="_blank">Xem thông tin</a>--}}
        {{--</td>--}}
    {{--</tr>--}}
    {{--<tr>--}}
        {{--<td style="color:#5b5b5c;padding-bottom: 10px;" width="98%">--}}
            {{--Chúc Quý công ty sớm tìm được nhiều ứng viên phù hợp.--}}
        {{--</td>--}}
    {{--</tr>--}}
@endsection