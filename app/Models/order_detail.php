<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class order_detail extends Model
{
    use HasFactory;
    protected $table = 'order_detail';
    protected $fillable = ["order_id",'status','order_status','customer_id','oder_customer_name',
    'order_customer_email',
    'order_customer_address','order_customer_phone','payment_id','order_total','name','new_price','sale','avatar_path','quantity','product_id'];
    public $listStatus = [
        1 => [
            'status' => 1,
            'name' => 'Chưa sử lý',
        ],
        2 => [
            'status' => 2,
            'name' => 'Nhận đơn',
        ],
        3 => [
            'status' => 3,
            'name' => 'Đang vận chuyển',
        ],
        4 => [
            'status' => 4,
            'name' => 'Hoàn thành',
        ],
        -1 => [
            'status' => -1,
            'name' => 'Hủy bỏ',
        ],
    ];
    //Mqh 1-n giữa order_detail và Order
    public function orders()
    {
        return $this->hasMany(order_detail::class, "order_id", "id");
    }
}
