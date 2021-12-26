<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Client;
use App\Models\Shop\Destination;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use App\Models\User;
use App\Notifications\AdminOrderNotification;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Validator;

class OrderController extends Controller
{
    /**
     * Create
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            // 'destination_id' => ['required', 'integer'],
            'name' => ['required', 'string'],
            'address' => ['required', 'string'],
            'email' => ['required', 'string'],
            'phone' => ['required', 'numeric'],
            // Products
            'products.*.product.id' => ['required', 'integer'],
            'products.*.qty' => ['required', 'integer'],
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            // $destination = Destination::query()->find($validator['destination_id']);
            // if (!$destination)
            //     return response()->json(['Destinacion no encontrada'], 400, [], JSON_NUMERIC_CHECK);

            // Check products available
            // $orderPrice = $destination->price;
            $orderPrice = 0;
            $orderProducts = [];
            foreach ($validator['products'] as $prodReq) {
                $productModel = Product::query()->find($prodReq['product']['id']);
                if (!$productModel)
                    return response()->json(['Producto no encontrado'], 400, [], JSON_NUMERIC_CHECK);
                if ($productModel->stock < $prodReq['qty'])
                    return response()->json(['No tenemos la cantidad requerida'], 400, [], JSON_NUMERIC_CHECK);
                $productModel->stock -= $prodReq['qty'];
                if (!$productModel->save())
                    return response()->json($productModel->errors, 503, [], JSON_NUMERIC_CHECK);
                array_push($orderProducts, [
                    'shop_product_id' => $prodReq['product']['id'],
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
            $client = new Client(
                $validator['name'],
                $validator['email'],
                $validator['phone'],
                $validator['address'],
            );
            if ($order->save()) {
                $order->order_products()->createMany($orderProducts);
                $order->order_products;
                $this->API_RESPONSE = $order;
                $sellUsers = User::query()->where('type', 'VENTAS')->get();
                // Send email Notification
                Notification::send($sellUsers, new AdminOrderNotification($order));
                Notification::send($client, new OrderNotification($order));
            } else {
                $this->API_RESPONSE = $order->errors;
                $this->API_STATUS = $this->AVAILABLE_STATUS['SERVICE_UNAVAILABLE'];
            }
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }
    /**
     * List
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $this->API_RESPONSE = Order::query()->with('order_products')->orderByDesc('updated_at')->get();
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }
}
