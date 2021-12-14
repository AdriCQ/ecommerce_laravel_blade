<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class OrderProduct extends Model
{
    use HasFactory;
    public $timestamps = false;
    protected $table = 'shop_order_products';
    protected $guarded = ['id'];
    protected $with = ['product'];

    /**
     * product
     */
    public function product()
    {
        return $this->belongsTo(Product::class, 'shop_product_id', 'id');
    }
    /**
     * order
     */
    public function order()
    {
        return $this->belongsTo(Order::class, 'shop_order_id', 'id');
    }
}
