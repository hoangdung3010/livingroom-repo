<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    //
    protected $table="orders";
    protected $guarded = [];

    //Mqh n-1 giữa Order và product
    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
