<Style>
    .header-top-2 {
        padding-top: 10px;
        padding-bottom: 10px;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
    .header-tleft{
        margin-top: 0px;
    }

    .content-2 {
        position: relative;

    }

    .btn-search-2 {
        top: -3%;
        left: 81%;
        border: none;
        font-size: 20px;
        background: none;
        position: absolute;
        color: #0083d5;
    }

    @media (min-width: 375px) and (max-width: 767px) {
        .from-search {
            position: relative;
            display: block;
        }

        /* .header-top-2 {
            display: block;
        } */

        .txt-search {
            width: 100%;
            position: relative;
        }

        .btn-search-2 {
            position: absolute;
            top: -2%;
           right: -6%;
        }
    }
    @media (max-width:991px) {
        .header-tleft{
            width: 250px;
            display: none;
        }

    
    }
    @media (max-width:768px) {
        .header-tleft{
            width: 250px;
            display: none;
        }

    }

    @media (max-width:320px) {
        .from-search {
            position: relative;
            display: block;
        }

        .header-top-2 {
            display: block;
        }

        .txt-search {
            width: 100%;
            position: relative;
        }

        .btn-search-2 {
            position: absolute;
            top: 5%;
            right: -4%;
        }
    }
</Style>
<div class="home-top">
    <div class="container">
        <div class="header-top-2 ">
            <div class="header-tleft">
                <div class="link-list link-list-first">
                    <span><i class="fa fa-phone" aria-hidden="true"></i><a
                            href="tel:{{ $information->if_phone ?? "" }}">{{ isset($information) ? $information->if_phone : '' }}</a></span>
                </div>
                <div class="link-list ">
                    <span><i class="fa fa-envelope-o" aria-hidden="true"></i><a
                            href="mailto:{{ $information->if_email ?? "" }}">{{ isset($information) ? $information->if_email : '' }}</a></span>
                </div>
            </div>
            <div class="content-2">
                <div class="from-search">
                    <form method="GET" action="{{ route('get.search') }}" class="search-form">
                        <input type="text" name="k" class="txt-search" placeholder="Tìm xe nhanh"
                            autocomplete="off">
                        <button type="submit" class="btn-search-2" id="" st><span
                                class="fa fa-search"></span></button>
                    </form>
                </div>


            </div>
            <div class="content-3">
                <ul style="list-style: none;display: flex;margin-bottom: 5px; " class="pull-right">
                    @if (get_name_by_user('web'))
                        <li><a href="{{ route('account.profile') }}" style="color: #FFF; line-height: 35px;">
                                {{ get_name_by_user('web') }}</a></li>
                        <li><a href="{{ route('get.logout') }}"
                                style="color: #FFF; line-height: 35px; margin-left: 15px">Đăng xuất</a></li>
                    @else
                        <li style="margin-right: 10px;"><a href="{{ route('get.register') }}"
                                style="color: #FFF; line-height: 35px;">Đăng ký</a></li>
                        <li><a href="{{ route('get.login') }}" style="color: #FFF; line-height: 35px;">Đăng nhập</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </div>
</div>

