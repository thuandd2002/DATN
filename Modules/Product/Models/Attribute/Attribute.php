<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/7/18
 * Time: 10:53 PM
 */

namespace Modules\Product\Models\Attribute;


use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\Menu\Menu;
use Modules\Product\Models\AttributeValue\AttributeValue;

class Attribute extends  Model
{
    protected $table = 'attributes';
    protected $fillable = ['atr_name','atr_type','atr_menu_id','created_at','updated_at'];

    public function menu()
    {
        return $this->belongsTo(Menu::class,'atr_menu_id','id');
    }

    public function value()
    {
        return $this->hasMany(AttributeValue::class,'av_attribute_id','');
    }
}