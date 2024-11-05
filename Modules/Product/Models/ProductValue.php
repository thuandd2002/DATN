<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;

class ProductValue extends Model
{
    protected $table = 'product_values';
    public $timestamps = true;
    protected $fillable = ['designs',
        'interior_color',
        'engine_capacity',
        'origin', 'fuel',
        'year_of_manufacturing',
        'gear', 'number_of_seats',
        'went', 'drive', 'car_color',
        'door_number',
        'product_id'];

    private  $originn = [
        1 => 'Mỹ',
        2 => 'Hàn Quốc',
        3 => 'Trong Nước',
        4 => 'Ngoài Nước'
    ];
    private  $fuell = [
        1 => 'Xăng',
        2 => 'Dầu'

    ];
    public function getOrigin()
    {
        return array_get($this->originn,$this->origin,'N\A');
    }
    public function getFuel()
    {
        return array_get($this->fuell,$this->fuel,'N\A');
    }

}
