<?php

namespace Modules\Product\Rules;

use Illuminate\Contracts\Validation\Rule;
use Modules\Product\Models\Product;

class CheckSumImportRepair implements Rule
{
    /**
     * Create a new rule instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Determine if the validation rule passes.
     *
     * @param  string  $attribute
     * @param  mixed  $value
     * @return bool
     */
    public function passes($attribute, $value)
    {
        $product = Product::find(request('id'));
        if (request('pro_price') < $product->pro_price_import + $product->pro_price_repair){
            return false;
        }
        return true;
    }

    /**
     * Get the validation error message.
     *
     * @return string
     */
    public function message()
    {
        return 'Tổng giá nhập và sửa chữa phải nhỏ hơn giá xuất';
    }
}
