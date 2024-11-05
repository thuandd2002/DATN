<div>
    <table bgcolor="#CCC" style="margin-top:10px;font-family:'Helvetica',san-serif;color:#444;padding: 30px;" width="100%">
        <tbody>
        <tr>
            <td>
                <table align="center" bgcolor="white" cellpadding="0" cellspacing="0" style="margin:auto;border-radius:7px;width:100%;max-width:550px">
                    <tbody>
                    <tr bgcolor="#00BCD4">
                        <td style="padding:12px 25px;border-radius:7px 7px 0 0">
                            <a href="" target="_blank">
                                <img alt="" border="0" src="" style="float:left" width="105px" class="CToWUd">
                            </a>
                            <div style="float:right;color:#fff;margin-top:11px;font-size:18px">
                                <b>Kênh mua bán Oto hiệu quả</b>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:5px 20px 0 20px">
                            <table style="font-size:14px;line-height:20px" width="100%">
                                <tbody>
                                <tr>
                                    <td style="color:#5b5b5c;font-size:14px;padding: 15px 0;border-top: 1px solid #f3f3f3;" width="98%">
                                        <i>
                                            Xin chào : {{ isset($data['email']) ? $data['email'][0]->name : '' }}
                                        </i>
                                        <p>Có một thông tin khách hàng cần bạn phê duyệt và tư vấn : </p>
                                        <ul>
                                          
                                            <li>Ô tô : {{$data['order_detail']->product->pro_name}}</li>
                                            <li>Tên khách hàng : {{$data['order_detail']->user->name}}</li>
                                            <li>Email : {{$data['order_detail']->user->email}}</li>
                                            <li>SDT : {{$data['order_detail']->user->phone}}</li>
                                        </ul>
                                        <p>Xin cảm ơn !</p>
                                    </td>

                                </tr>
                            
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:35px 20px 0 20px">
                            <table style="font-size:14px;line-height:20px" width="100%">
                                <tbody>

                                <tr>
                                    <td style="height: 30px;"></td>
                                </tr>
                                <tr>
                                    <td style="color:#5b5b5c;font-size:14px;padding: 15px 0;border-top: 1px solid #f3f3f3;" width="98%">
                                        <i>
                                            Vui lòng liên hệ Chuyên viên hỗ trợ, tư vấn tài khoản:
                                        </i>
                                    </td>
                                </tr>

                                </tbody>
                            </table>
                        </td>
                    </tr>
                    <tr>
                        <td style="padding:15px 25px;font-family:Arial,sans-serif;color:#999999;text-align:center;font-size:13px;font-style:italic">
                            <div style="background:#f3f3f3;padding:10px">Đây là email tự động, vui lòng không trả lời email này.</div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <table width="100%" cellpadding="0" cellspacing="0" style="border-radius:7px">
                                <tbody>
                                <tr>
                                    <td style="font-family:Arial,sans-serif;text-align:center;font-size:14px;padding:15px">
                                        <span style="font-size:15px;color:#5c5c5c"><strong>Kênh mua bán xe uy tín hàng đầu Việt Nam</strong></span>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:13px;font-family:Arial,sans-serif;text-align:center;color:#5c5c5c;padding-bottom: 10px;">
                                        <a href="" style="text-decoration:none;color:#5c5c5c" target="_blank">Liên hệ</a>
                                        |
                                        <a href="" style="text-decoration:none;color:#5c5c5c" target="_blank">Chính sách bảo mật</a>
                                        |
                                        <a href="" style="text-decoration:none;color:#5c5c5c" target="_blank">Điều khoản sử dụng</a>
                                        |
                                        <a href="#" style="text-decoration:none;color:#5c5c5c" target="_blank">Ngừng nhận email</a>
                                        <br>
                                        <p>/</p>
                                    </td>
                                </tr>
                                <tr>
                                    <td style="font-size:11px;font-family:Arial,sans-serif;text-align:center;padding-bottom:30px;color:#5c5c5c">
                                        Hotline:
                                        <br>
                                        Website:
                                        <a href="" style="text-decoration:none;color:#5c5c5c" target="_blank">/</a>
                                    </td>
                                </tr>
                                </tbody>
                            </table>
                        </td>
                    </tr>
                    </tbody>
                </table>
            </td>
        </tr>
        </tbody>
    </table>
</div>