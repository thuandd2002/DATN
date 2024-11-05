<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/25/18
 * Time: 8:37 PM
 */

namespace Modules\Admin\Models\Rating;

use Illuminate\Database\Eloquent\Model;
use Modules\Product\Models\Product;
class Rating extends Model
{
    protected $table = 'rating';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'products_id',
        'rating',
        'user_id'
    ];
    public function product()
    {
        return $this->belongsTo(Product::class,'products_id')->select('id', 'pro_name');
    }
}