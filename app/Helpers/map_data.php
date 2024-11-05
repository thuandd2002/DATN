<?php

if (!function_exists('map_attribute_value'))
{
    function map_attribute_value($attributes , $value)
    {
        $array = [];

        foreach ($attributes as $attr)
        {
            foreach ($value as $item)
            {
                if ($attr['id'] == $item->av_attribute_id)
                {
                    $array[$attr['atr_name']][] = [
                        'value' => $item->av_name
                    ];
                }
            }
        }

        return $array;
    }
}