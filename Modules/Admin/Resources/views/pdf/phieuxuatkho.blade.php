<!DOCTYPE html
    PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="vi" lang="vi">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title>Phiếu xuất kho</title>
    <meta name="author" content="Download.com.vn" />
    <style type="text/css">
        * {
            margin: 0;
            padding: 0;
            text-indent: 0;
        }

        h2 {
            color: black;
            font-family: 'arian';
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
        }

        .p,
        p {
            color: black;
            font-family: 'arian';
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
            margin: 0pt;
        }

        h1 {
            color: black;
            font-family: 'arian';
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 14pt;
        }

        .s1 {
            color: black;
            font-family: 'arian';
            font-style: italic;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        .s2 {
            color: black;
            font-family: 'arian';
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        .s3 {
            color: black;
            font-family: 'arian';
            font-style: normal;
            font-weight: bold;
            text-decoration: none;
            font-size: 12pt;
        }

        li {
            display: block;
        }

        #l1 {
            padding-left: 0pt;
        }

        #l1>li>*:first-child:before {
            /* content: "- "; */
            color: black;
            font-family: 'arian';
            font-style: normal;
            font-weight: normal;
            text-decoration: none;
            font-size: 12pt;
        }

        table,
        tbody {
            vertical-align: top;
            overflow: visible;
        }
    </style>
</head>

<body>
    <h2 style="padding-top: 3pt;padding-left: 28pt;text-indent: 0pt;text-align: left;">Đơn vị:
        VIET PHU LUXURY</h2>
    <h2 style="padding-top: 5pt;padding-left: 28pt;text-indent: 0pt;text-align: left;">Bộ phận:
       Nhân viên kho</h2>
    <h2 style="padding-top: 3pt;padding-left: 54pt;text-indent: 0pt;line-height: 14pt;text-align: center;">Mẫu số 02 -
        VT</h2>
    <p style="padding-left: 54pt;text-indent: 0pt;text-align: center;">(Ban hành theo Thông tư số 133/2016/TT-BTC ngày
        26/8/2016 của Bộ Tài chính)</p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <h1 style="padding-top: 4pt;padding-left: 28pt;text-indent: 0pt;text-align: center;">PHIẾU XUẤT KHO</h1>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
   
    <p style="padding-top: 6pt;padding-left: 159pt;text-indent: 0pt;text-align: right; margin-right: 20px;">Số:
        {{(rand(10,1000000))}}</p>

    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <ul id="l1">
        <li data-list-text="-">
            <p style="padding-top: 4pt;padding-left: 18pt;text-indent: -7pt;text-align: left;">Họ và tên người nhận
                hàng: {{$data['name']}} . </p>
        </li>
        <li data-list-text="-">
            <p style="padding-top: 4pt;padding-left: 18pt;text-indent: -7pt;text-align: left;">Địa chỉ (bộ phận): Nhân viên chăm sóc khách hàng .</p>
        </li>
        <li data-list-text="-">
            <p style="padding-top: 10pt;padding-left: 18pt;text-indent: -7pt;text-align: left;">Lý do xuất
                kho: Khách hàng mua xe .
            </p>
        </li>
        <li data-list-text="-">
            <p style="padding-top: 10pt;padding-left: 18pt;text-indent: -7pt;text-align: left;">Xuất tại kho (ngăn lô): K1A .  </p>
               <p style="padding-top: 10pt;padding-left: 18pt;text-indent: -7pt;text-align: left;"> Địa điểm : Kho VIET PHU LUXURY .</p>
            <p style="text-indent: 0pt;text-align: left;"><br /></p>

        </li>

    </ul>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <p class="s1" style="text-indent: 0pt;text-align: right; padding-right:20px;">Ngày {{getdate()['mday']}}  tháng {{getdate()['mon']}} năm {{getdate()['year']}}</p>
    <p style="text-indent: 0pt;text-align: left;"><br /></p>
    <div style="display: flex">
        <div>
        <h2 style="padding-top: 4pt;padding-left: 40pt;text-indent: 0pt;text-align: right; margin-right: 100px;">Người lập phiếu</h2>
    <p class="s1" style="padding-left: 40pt;text-indent: 0pt;text-align: right; margin-right: 115px;">(Ký, họ tên)</p>

        </div>
        <div>
        <h2 style="padding-top: 4pt;padding-left: 30pt;text-indent: 5pt; text-align: left;">Người nhận hàng</h2>
        <p class="s1" style="padding-left: 14pt;text-indent: 0pt;text-align: left; margin-left: 45px;">(Ký, họ tên)</p>
        </div>
        <div>
            <h2 style="padding-top: 4pt;padding-left: 40pt;text-indent: 0pt;text-align: right; margin-right: 400px;">Thủ kho</h2>
            <p class="s1" style="padding-left: 40pt;text-indent: 0pt;text-align: right; margin-right: 385px;">(Ký, họ tên)</p>
        </div>
   
    </div>
   
    <div style="display: flex">
        <div >
            <h2 style="padding-top: 4pt;padding-left: 30pt;text-indent: 5pt; text-align: left;">Kế toán trưởng <span
                class="p">(Hoặc bộ phận có nhu cầu nhập)</span></h2>
            <p class="s1" style="padding-left: 14pt;text-indent: 0pt;text-align: left; margin-left: 155px;">(Ký, họ tên)</p>
        </div>
        <div>
                <h2 style="padding-top: 4pt;padding-left: 40pt;text-indent: 0pt;text-align: right; margin-right: 140px;">Giám đốc</h2>
            <p class="s1"style="padding-left: 40pt;text-indent: 0pt;text-align: right; margin-right: 130px;">(Ký, họ tên)</p>
        </div>
    </div>
</body>

</html>
