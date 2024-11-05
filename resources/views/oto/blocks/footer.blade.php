<style>
    .logo-items {
        position: absolute;
    }

    .footer-content {
        display: flex;
        justify-content: space-between;
        margin-left: 286px;
    }
    .danhmuc{
        display: grid;
        grid-template-columns: 1fr 1fr;
    }

    @media (max-width:991px) {
        .logo-footer {
            position: initial;
        }
        .footer-content {
            margin-left: 0px;
        }
        .logo-items {
            display: none;
        }

    }

    @media (max-width:767px) {
        .logo-items {
            display: none;
        }

        .footer-content {
            margin-left: 20px !important;
            margin-right: 20px !important;
        }
        /* .danhmuc{
            display: block;
        } */

    }
    @media (max-width:610px) {
        .footer--title {
            font-size: 14px !important;
        }

        .items-icon {
            font-size: 18px !important;
        }
        .size-content{
            font-size: 12px !important;
        }
        .adress{
            font-size: 12px !important;
        }

    }
    @media (max-width:537px) {
        .footer-content{
            display: grid;
            grid-template-columns: 1fr 1fr;
        }
        .footer--title {
            font-size: 14px !important;
        }

        .items-icon {
            font-size: 18px !important;
        }
        .adress{
            width: 200px;
        }
        .danhmuc{
            width: 150px;
        }

    }

    @media (max-width: 425px) {
        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr
        }
        .adress{
            width: 150px !important;
        }
        .footer--title {
            font-size: 14px !important;
        }

        .logo-items {
            position: unset;
            margin-left: 0px;
        }

        

    }

    @media (max-width: 375px) {
          /* .danhmuc{
            display: block;
        } */
        .footer--title {
            font-size: 14px !important;
        }

        .logo-items {
            position: unset;
            margin-left: 0px;
        }

        .footer-content {
            display: grid;
            grid-template-columns: 1fr 1fr
        }
        .adress{
            width: 150px !important;
        }


    }
</style>




<section class="contact__info_hide">
    <div class="hotline">
        <div id="phonering-alo-phoneIcon" class="phonering-alo-phone phonering-alo-green phonering-alo-show">
            <div class="phonering-alo-ph-circle"></div>
            <div class="phonering-alo-ph-circle-fill"></div>
            <div class="phonering-alo-ph-img-circle">
                <a class="pps-btn-img " title="Liên hệ"
                    href="tel:{{ isset($information->if_phone) ? $information->if_phone : "" }}"> <i
                        class="fa fa-phone"></i> </a>
            </div>
        </div>
    </div>


</section>
<footer id="footer" style="margin-top: 20px;background-color: #4267b2">
    <div class="footer-bottom" style="background-color: #4267b2">
        <div class="container">
            <div class="">

                @if (!$mobiledetect->isMobile())

                <?php
                    $avatar_logo = isset($information->if_logo) ? pare_url_file($information->if_logo) : asset('images/logo2.png');
                    ?>
                <div class=" footer--item">
                    <div class="logo-items">
                        <a href="/" title="logo ">
                            <img data-src="{{ $avatar_logo }}" alt="logo-footer" class="lazy"
                                src="{{ asset('images/loading.gif') }}" style="width: 150px;height: 100px;">
                        </a>
                    </div>
                </div>
                @endif

                <div class="footer-content">
                    <div class="footer--item">
                        <h4 class="footer--title">Danh mục</h4>
                        <ul style="margin: 0;" class="danhmuc">
                      
                            @if ($menusRan ?? [])
                            @foreach($menusRan ?? [] as $ran)
                            <li><a class="size-content" href="{{ route('get.menu.action',[str_slug_fix($ran->m_title),$ran->id]) }}"
                                    style="font-size: 14px;color: white">{{ $ran->m_title }}</a></li>
                            @endforeach
                            @endif
                        </ul>
                    </div>
                    <div class="footer--item">

                        <h4 class="footer--title">Thông tin website</h4>
                        <p class="size-content"><span><a style="color: white;" title="Công ty" href="/" target="_blank"></a>{{
                                isset($information->if_company) ? $information->if_company : '' }}</span></p>
                        <p class="size-content">Hotline:&nbsp;<span>{{ isset($information) ? $information->if_phone : '' }}</span></p>
                        <p class="size-content">Email: <span>{{ isset($information) ? $information->if_email : '' }}</span></p>
                        <p style="width: 250px;" class="adress">Địa chỉ: {{ isset($information) ? $information->if_address : '' }}</p>
                    </div>
                    <div class="footer--item">
                        <h4 class="footer--title">Mạng xã hội</h4>

                        <a  href="{{ isset($information) ? $information->if_youtobe : '' }}" target="_blank"
                            style="color:#FFF"><i class="fa fa-youtube items-icon" style="font-size: 30px"></i></a>
                        <a href="{{ isset($information) ? $information->if_facebook : '' }}" target="_blank"
                            style="color:#FFF; margin-left: 10px"><i class="fa fa-facebook items-icon"
                                style="font-size: 30px"></i></a>
                        <a href="{{ isset($information) ? $information->if_google : '' }}" target="_blank"
                            style="color:#FFF; margin-left: 10px"><i class="fa fa-google-plus items-icon"
                                aria-hidden="true" style="font-size: 30px"></i></a>
                    </div>


                </div>

            </div>
        </div>
    </div>
</footer>