<div class="home-menu aaaa">
    <nav class="navbar-core navbar-white navbar-v1 headroom headroom--not-bottom headroom--pinned headroom--top">
        <div class="s-wrapper">
            <div class="container2">
                <div class="header-menu s-inner clearfix">
                    <div class="pull-left nav-left">
                        <div class="logo">
                            <?php
                            $avatar_logo = isset($information->if_logo) ? pare_url_file($information->if_logo) : asset('images/logo.jpg');
                            ?>
                            <a href="/">
                                <img class="lazy" src="{{ asset('images/loading.gif') }}" data-src="{{ $avatar_logo }}"
                                    alt="logo" style="width: 100%; height: 100px;">
                            </a>
                        </div>
                    </div>
                    <button class="hamburger has-animation hamburger--collapse" id="toggle-icon">
                        <span class="hamburger-box">
                            <span class="hamburger-inner"><i class="fa fa-bars"></i></span>
                        </span>
                    </button>

                    <div class="pull-right nav-right">
                        <div class="navbar-main" id="main-menu-top">
                            @if (isset($menus) && !empty($menus))
                            {!! show_menu($menus) !!}
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </nav>
</div>
<Style>
    .header-menu {
        width: 100%;
        display: flex;
        align-items: center;
        justify-content: space-between;
    }
</Style>