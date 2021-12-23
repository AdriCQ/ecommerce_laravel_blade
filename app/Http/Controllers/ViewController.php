<?php

namespace App\Http\Controllers;

use App\Models\Shop\Config;
use App\Models\Shop\Destination;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class ViewController extends Controller
{
    private $DATA = [];

    public function __construct()
    {
        $config = Config::query()->first();
        $this->DATA['config'] = $config;
        $this->DATA['active'] = '';
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
    public function order(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'destination_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'array'],
            // Products
            'products.*.product_id' => ['required', 'integer'],
            'products.*.qty' => ['required', 'integer'],
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            $destination = Destination::query()->find($validator['destination_id']);
            if (!$destination)
                return response()->json(['Destinacion no encontrada'], 400, [], JSON_NUMERIC_CHECK);

            // Check products available
            $orderPrice = $destination->price;
            $orderProducts = [];
            foreach ($validator['products'] as $prodReq) {
                $productModel = Product::query()->find($prodReq['product_id']);
                if (!$productModel)
                    return response()->json(['Producto no encontrado'], 400, [], JSON_NUMERIC_CHECK);
                if ($productModel->stock < $prodReq['qty'])
                    return response()->json(['No tenemos la cantidad requerida'], 400, [], JSON_NUMERIC_CHECK);
                $productModel->stock -= $prodReq['qty'];
                if (!$productModel->save())
                    return response()->json($productModel->errors, 503, [], JSON_NUMERIC_CHECK);
                array_push($orderProducts, [
                    'shop_product_id' => $prodReq['product_id'],
                    'qty' => $prodReq['qty']
                ]);
                $orderPrice += $productModel->price;
            }
            $order = new Order([
                'name' => $validator['name'],
                'address' => $validator['address'],
                'email' => $validator['email'],
                'phone' => $validator['phone'],
                'total_price' => $orderPrice,
            ]);
            if ($order->save()) {
                $order->order_products()->createMany($orderProducts);
                $order->order_products;
                $this->API_RESPONSE = $order;
                // Send email Notification
                Notification::send([], new OrderNotification($order));
            } else {
                $this->API_RESPONSE = $order->errors;
                $this->API_STATUS = $this->AVAILABLE_STATUS['SERVICE_UNAVAILABLE'];
            }
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }
}
