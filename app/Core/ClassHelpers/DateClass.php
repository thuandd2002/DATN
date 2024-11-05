<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/15/18
 * Time: 6:07 AM
 */

namespace App\Core\ClassHelpers;


class DateClass
{
    /**
     * Lấy timeline từ date truyền vào
     *
     * @param timestamp $end_date - ngày kết thúc, $typeReturn - kiểu trả về
     * @return string/int
     */
    public static function getTimeline($end_date, $typeReturn = 1)
    {

        $return_date    = date('Y-m-d h:i:s', strtotime($end_date));
        $pick_date      = date('Y-m-d h:i:s');
        $pick_date      = date_create($pick_date);
        $return_date    = date_create($return_date);
        $diff           = date_diff($pick_date,$return_date);
//        $diff->format('%y %m %d %h %i %s');

        $day = $diff->d;
        $month = $diff->m;
        $hour = $diff->h;

        switch ($typeReturn)
        {
            //Trả về đầy đủ
            case 1:
                $stringDate = 'Còn ' . $month . ' tháng ' . $day . ' ngày ';
                if($month == 0){
                    $stringDate = 'Còn ' . $day . ' ngày ' . $hour . ' giờ';
                }

                if($day == 0){
                    $stringDate = 'Còn ' . $hour . ' giờ';
                }
                break;
            //Trả về tháng
            case 2:
                $stringDate = $month;
                break;
            //Trả về ngày
            case 3:
                $stringDate = $day;
                break;
            //Trả về giờ
            case 4:
                $stringDate = $hour;
                break;
            default:
                break;
        }
        return $stringDate;
    }

    /**
     * Get time post
     * @return string
     */
    public static function postedTimer($minutes)
    {
        $msg = "";
        if($minutes < 1)
        {
            $msg = "khoảng 1 phút trước";
        } else if($minutes >= 1 && $minutes < 60)
        {
            $msg = round($minutes) . " phút trước";
        } else if($minutes >= 60 && $minutes < 1140)
        {
            $msg = round($minutes / 60) . " giờ trước";
        } else
        {
            $msg = round($minutes / (60 * 24)) . " ngày trước";
        }

        return $msg;
    }
}