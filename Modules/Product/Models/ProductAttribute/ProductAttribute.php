<?php

namespace Modules\Product\Models;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\Menu\Menu;

class ProductAttribute extends Model
{
    protected $table = 'product_attributes';
    protected $fillable = ['pa_name','pa_type','pa_menu_id'];

    public function menu()
    {
        return $this->belongsTo(Menu::class,'pa_menu_id','id');
    }

    public function value()
    {
//        return $this->belongsToMany(ProductValue::class,'product_values','av_attibute_id');
    }
}
