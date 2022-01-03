<?php

namespace App\Models\Shop;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;

/**
 * @property string name
 * @property string email
 * @property string phone
 * @property string address
 * @property string created_at
 * @property string updated_at
 */
class Order extends Model
{
    use HasFactory;
    protected $table = 'shop_orders';
    protected $guarded = ['id'];
    /**
     * @method checkToken
     * @return boolean
     */
    public function checkToken($token)
    {
        return Hash::check($this->getToken(), $this->getHash());
    }
    /**
     * @method getToken
     * @return string
     */
    public function getToken()
    {
        $hash = $this->name . $this->address . $this->email . $this->created_at;
        return str_replace(array("\n", "\r"), '', $hash);
    }
    /**
     * @method getHash
     * @return string
     */
    public function getHash()
    {
        return Hash::make($this->getToken());
    }
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
