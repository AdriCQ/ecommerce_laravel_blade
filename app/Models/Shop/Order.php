<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;
    protected $table = 'shop_orders';
    protected $guarded = ['id'];


    /**
     * -----------------------------------------
     *	Relations
     * -----------------------------------------
     */

    public function order_products()
    {
        return $this->hasMany(OrderProduct::class, 'shop_order_id', 'id');
    }
}
