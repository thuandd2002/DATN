<?php
use Illuminate\Support\Facades\Auth;

if ( !function_exists('get_name_group_permission'))
{
    function get_name_group_permission($id)
    {
        $groupPermission = config('setting.permission');
        return array_get($groupPermission,$id,'Null');
    }
}

if (!function_exists('get_data_user'))
{
    function get_data_user($type)
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user() : '';
    }
}



if (!function_exists('get_data_relation_user'))
{
    function get_data_relation_user($type, $relation, $field)
    {
        return isset(Auth::guard($type)->user()->$relation->$field) ? Auth::guard($type)->user()->$relation->$field : '';
    }
}

if (!function_exists('get_id_by_user'))
{
    function get_id_by_user($type)
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->id : '';
    }
}

if (!function_exists('get_name_by_user'))
{
    function get_name_by_user($type)
    { 
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->name : '';
    }
}

if (!function_exists('get_email_by_user'))
{
    function get_email_by_user($type)
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->email : '';
    }
}

if (!function_exists('get_phone_by_user'))
{
    function get_phone_by_user($type)
    {
        return Auth::guard($type)->user() ? Auth::guard($type)->user()->phone : '';
    }
}

if (!function_exists('get_avatar_by_user'))
{
    function get_avatar_by_user($type, $default = '/images/logo/company_default.png')
    {
        return Auth::guard($type)->user()->avatar
            ? Auth::guard($type)->user()->avatar
            : ($type == 'users' ? Auth::guard($type)->user()->avatar_facebook : $default);
    }
}

if (!function_exists("base_url"))
{
    function base_url($url = '')
    {
        return $_SERVER['HTTP_HOST'] . $url;
    }
}


if (!function_exists('pare_url_file')) {
    function pare_url_file($image)
    {
        if (!$image)
        {
            return'/images/no-image.jpg';
        }
        $explode = explode('__', $image);

        if (isset($explode[0])) {
            $time = str_replace('_', '/', $explode[0]);
        
            return '/uploads/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
    }
}


if (!function_exists("str_slug_fix"))
{
    function str_slug_fix($string)
    {
        $string = str_replace(['/','\/'],'-',$string);

        return str_slug($string);
    }
}

if (!function_exists('format_price'))
{
    function format_price($price,$sale = 0)
    {
        return number_format($price,'0',',','.');
    }
}

if (!function_exists('ip_user_client'))
{
    function ip_user_client()
    {
        if (isset($_SERVER['HTTP_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_X_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_X_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_X_FORWARDED'];
        else if(isset($_SERVER['HTTP_X_CLUSTER_CLIENT_IP']))
            $ipaddress = $_SERVER['HTTP_X_CLUSTER_CLIENT_IP'];
        else if(isset($_SERVER['HTTP_FORWARDED_FOR']))
            $ipaddress = $_SERVER['HTTP_FORWARDED_FOR'];
        else if(isset($_SERVER['HTTP_FORWARDED']))
            $ipaddress = $_SERVER['HTTP_FORWARDED'];
        else if(isset($_SERVER['REMOTE_ADDR']))
            $ipaddress = $_SERVER['REMOTE_ADDR'];
        else
            $ipaddress = 'UNKNOWN';
        return $ipaddress;
    }
}


if (!function_exists('jam_read_num_forvietnamese'))
{

    function jam_read_num_forvietnamese( $num = false ) {
        $str = '';
        $num  = trim($num);

        $arr = str_split($num);
        $count = count( $arr );

        $f = number_format($num);
        //KHÔNG ĐỌC BẤT KÌ SỐ NÀO NHỎ DƯỚI 999 ngàn
        if ( $count < 7 ) {
            $str = $num;
        } else {
            // từ 6 số trở lên là triệu, ta sẽ đọc nó !
            // "32,000,000,000"
            $r = explode(',', $f);
            switch ( count ( $r ) ) {
                case 4:
                    $str = $r[0] . ' tỉ';
                    if ( (int) $r[1] ) { $str .= ' '. $r[1] . ' Tr'; }
                    break;
                case 3:
                    $str = $r[0] . ' Triệu';
                    if ( (int) $r[1] ) { $str .= ' '. $r[1] . 'K'; }
                    break;
            }
        }
        return $str;
    }

}


if (!function_exists('show_menu'))
{
    function show_menu($category, $parent_id = 0)
    {
        // BƯỚC 2.1: LẤY DANH SÁCH CATE CON
        $cate_child = array();
        $level = 0;
        foreach ($category as $key => $item)
        {
            // Nếu là chuyên mục con thì hiển thị
            if ($item['m_parent_id'] == $parent_id)
            {
                $cate_child[] = $item;
                unset($category[$key]);
                $level =  $item['level'];
            }
        }

        // BƯỚC 2.2: HIỂN THỊ DANH SÁCH CHUYÊN MỤC CON NẾU CÓ
        if ($cate_child)
        {
            $class = 'navbar-menu';
            if ($level > 1) $class = 'dropdown-menu home-list';
            echo '<ul class="'.$class.'">';
            if ( $level == 1)
            {
                ?>
                <li><a href="<?php echo route('get.index') ?>" title="Trang chủ">Trang Chủ</a></li>
                <?php
            }

            foreach ($cate_child as $key => $item)
            {
                $id = $item['id'];
                ?>
                <li class="<?= $level > 1 ? 'menu-child' : 'dropdown' ?>">
                    <?= $level == 1 ? "<i class=\"fa fa-angle-down\"></i>" : ""; ?>
                    <a href="<?= route('get.menu.action',[str_slug_fix($item['m_title']),$id]) ?>"><?php echo $item['m_title'] ?></a>
                <?php

                show_menu($category, $id);
            }

            echo '</ul>';
        }
    }
}

if (!function_exists('get_parameter'))
{
    function get_parameter($request)
    {
        $url = preg_split("/(-)/i",$request);
        $id  = array_pop($url);

        return $id;
    }
}

function randString($length)
{
    $chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
    $str = '';
    $size = strlen($chars);
    for ($i = 0; $i < $length; $i++) {
        $str .= $chars[rand(0, $size - 1)];
    }
    return $str;
}

