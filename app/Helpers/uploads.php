<?php

if (!function_exists('upload_image'))
{
    /**
     * @param $file [tên file trùng tên input]
     * @param array $extend [ định dạng file có thể upload được]
     * @return array|int [ tham số trả về là 1 mảng - nếu lỗi trả về int ]
     */
    function upload_image($file ,array $extend  = array() )
    {
        $code = 1;

        // lay duong dan anh
        $baseFilename = public_path() . '/uploads/' . $_FILES[$file]['name'];

        // thong tin file
        $info = new SplFileInfo($baseFilename);

        // duoi file
        $ext = strtolower($info->getExtension());

        // kiem tra dinh dang file
        if ( ! $extend )
        {
            $extend = ['png','jpg','jpeg'];
        }

        if( !in_array($ext,$extend))
        {
            return $data['code'] = 0;
        }

        // Tên file mới
        $nameFile = trim(str_replace('.'.$ext,'',strtolower($info->getFilename())));
        $filename = date('Y-m-d__').str_slug($nameFile) . '.' . $ext;

        // thu muc goc de upload
        $path = public_path().'/uploads/'.date('Y/m/d/');

        if ( !\File::exists($path))
        {
            mkdir($path,0777,true);
        }

        // di chuyen file vao thu muc uploads
        move_uploaded_file($_FILES[$file]['tmp_name'], $path. $filename);

        $data = [
            'name'              => $filename,
            'code'              => $code,
            'path_img'          => 'uploads/'.$filename
        ];
        return $data;
    }
}
if (!function_exists('pare_url_file_v2'))
{
    function pare_url_file_v2($image,$folder = 'upload')
    {
        $explode = explode('___', $image);
        if (isset($explode[0]) && isset($explode[1]))
        {
            $time = $explode[0];
            $time = str_replace(['sm_', 'md_', 'lg_'], '', $time);
            $time = str_replace('_', '/', $time);

            return config($folder . '.static_url') . config($folder . '.upload_folder') . '/' . date('Y/m/d', strtotime($time)) . '/' . $image;
        }
        else
        {
            return '/' . ltrim($image, '/');
        }
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