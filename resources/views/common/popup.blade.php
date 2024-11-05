<style>
    div.cookie-popup-wrap{
        width: 100%; height: 100%;
        z-index: 999;
        position: fixed; background: rgba(0,0,0,0.6); top: 0;left: 0;
        display: none;
    }

    div.cookie-popup{
        width: 40%; margin: 10% auto;
        background-color: #fff; padding: 10px 20px;
    }

    div.cookie-popup h2{
        border-bottom: 1px solid #DDDDDD; margin-bottom: 20px;
        font-size: 25px; padding: 15px; text-align: center;
    }

    div.cookie-popup h6{
        border-top: 1px solid #DDDDDD; text-align: right;
        font-size: 12px; margin-top: 20px; padding-top: 5px;
    }

    div.cookie-popup h6 a{ color: #888; text-decoration: none;}


    .cookie-popup .form-group { width: 80%;margin: 10px auto }
</style>
<div class="cookie-popup-wrap cookie-popup-wrap-form">
    <div class="cookie-popup" style="position: relative">
        <a href="#" id="closepopup"><i class="fa fa-close"></i></a>
        <form action="" method="POST" style="padding-bottom: 20px" id="cookie-popup-form">
            <fieldset>
                <legend>Đăng ký tư vấn miễn phí</legend>
                <div class="form-group">
                    <lable>Họ tên <span class="m-errors">(*)</span></lable>
                    <input  style="font-size: 14px !important;padding: 20px 10px !important;" type="text" class="validate" name="name" placeholder="Mời nhập tên" value="" required>
                </div>
                <div class="form-group">
                    <lable>Email</lable>
                    <input  style="font-size: 14px !important;padding: 20px 10px !important;" type="email" name="email" placeholder="Mời nhập email" value="">
                </div>
                <div class="form-group">
                    <lable>Số điện thoại <span class="m-errors">(*)</span></lable>
                    <input  style="font-size: 14px !important;padding: 20px 10px !important;" type="number" class="validate" name="phone" placeholder="Mời nhập sđt " value="" required>
                </div>
                <div class="form-group">
                    <lable>Nội dung</lable>
                    <textarea style="font-size: 14px !important;padding: 20px 10px !important;"  name="messages" id="" cols="30" rows="3" placeholder="Hãy điền nội dung muốn hỏi hay thông điệp gì đó tới chúng tôi ..."></textarea>
                </div>
                <buttom type="submit" id="save-info-guard" style="width:120px !important" data-url="{{ route('ajax.post.guest.save') }}"> <i class="fa fa-save"></i> Xác nhận</buttom>
            </fieldset>
        </form>
        <p class="errors"></p>

    </div><!--End .cookie-popup-->
</div>