<?php
/**
 * Created by PhpStorm.
 * User: mac
 * Date: 10/25/18
 * Time: 8:37 PM
 */

namespace Modules\Product\Models\Product;

use Illuminate\Database\Eloquent\Model;

class ProductImage extends Model
{
    protected $table = 'product_images';
    protected $fillable = ['pi_name','pi_slug','pi_product_id'];
}