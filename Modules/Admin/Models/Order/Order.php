<?php

namespace Modules\Admin\Models\Order;

use Illuminate\Database\Eloquent\Model;
use Modules\Admin\Models\Menu\Menu;
use Modules\Product\Models\Product;
use App\User;

class Order extends Model
{
    protected $table = 'orders';
    protected $fillable = ['o_guest_id','o_product_id','o_menu_id','o_submit','o_status','o_messages','o_ip', 'car_viewing_day','cancel_appointment','admin_id','update_at','create_at','export_car_customer'];

    const  PROCESSSING    = 0;  // DANG XU LY 
    const  NO_DEPOSITED     = 1; //CHUA DAT COC
    const  DEPOSITED    = 2;  // DA DAT COC
    const APPOINTMENT_TO_PICK_UP_THE_CAR = 3; //hen ngay lay xe
    const BOUGHT = 4; //đã mua 


    private $status = [
        0 => 'Đang xử lý',
        1 => 'Chưa đặt cọc',
        2 => 'Đã đặt cọc',
        3 => 'Hẹn ngày lấy xe',
        4 => 'Đã mua'
    ];

    public function getTextIndexAttribute()
    {
        return array_get($this->status,$this->o_status,'N\A');
    }

    public function product()
    {
        return $this->belongsTo(Product::class,'o_product_id')->select('id', 'pro_name','pro_price','pro_price_import','pro_price_repair');
    }

    public function menu()
    {
        return $this->belongsTo(Menu::class,'o_menu_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'o_guest_id');
    }
}
