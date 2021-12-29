<?php

namespace App\Http\Controllers;

use App\Models\Shop\Config;
use App\Models\Shop\Destination;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class ViewController extends Controller
{
    private $DATA = [];

    public function __construct()
    {
        $config = Config::query()->first();
        $destinations = Destination::all()->toArray();
        $this->DATA['config'] = $config;
        $this->DATA['active'] = '';
        $this->DATA['destinations'] = $destinations;
    }
    /**
     * cart
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function cart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'productsCart' => ['required'],
        ]);
        if ($validator->fails()) {
            return $validator->errors();
        } else {
            $validator = $validator->validate();
            $validator['productsCart'] = json_decode($validator['productsCart']);
            $this->DATA['active'] = 'cart';
            $products = [];
            foreach ($validator['productsCart'] as $pr) {
                $prod = Product::query()->find($pr->product->id);
                if (!$prod)
                    view('cart')->with($this->DATA);
                array_push($products, ['product' => $prod, 'qty' => $pr->qty]);
            }
            $this->DATA['productsCart'] = $products;
        }
        return view('cart')->with($this->DATA);
    }
    /**
     * @method find
     * @return view
     */
    public function find()
    {
        return view('find')->with($this->DATA);
    }
    /**
     * home
     */
    public function home()
    {
        $products = Product::all()->toArray();
        $this->DATA['products'] = $products;
        $this->DATA['active'] = 'home';
        return view('welcome')->with($this->DATA);
    }
    /**
     * productDetails
     */
    public function productDetails(int $id)
    {
        $product = Product::query()->find($id);
        $this->DATA['product'] = $product;
        return view('product-details')->with($this->DATA);
    }

    /**
     * Create Order
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function orderDetails(int $id, Request $req)
    {
        $validator = Validator::make($req->all(), [
            'hash' => ['required', 'string']
        ]);
        $data = $validator->validate();
        $order = Order::query()->with('order_products')->find($id);
        $hash = $order->hash;
        if (Hash::check($hash, $data['hash']))
            $this->DATA['order'] = $order;
        return view('order', $this->DATA);
    }
}
