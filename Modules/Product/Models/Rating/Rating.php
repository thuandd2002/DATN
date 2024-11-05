<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/25/18
 * Time: 8:37 PM
 */

namespace Modules\Product\Models\Rating;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
    protected $table = 'rating';
    public $timestamps = true;
    protected $fillable = [
        'id',
        'products_id',
        'rating'
    ];
}
