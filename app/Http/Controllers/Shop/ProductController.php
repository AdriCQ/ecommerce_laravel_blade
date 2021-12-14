<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ProductController extends Controller
{
    /**
     * CreateProduct
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function create(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'integer'],
            'description' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            $product = new Product($validator);
            if ($product->save())
                $this->API_RESPONSE = $product;
            else {
                $this->API_RESPONSE = $product->errors;
                $this->API_STATUS = $this->AVAILABLE_STATUS['SERVICE_UNAVAILABLE'];
            }
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Update
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function update(int $productId, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => ['required', 'string'],
            'price' => ['required', 'numeric'],
            'stock' => ['required', 'integer'],
            'description' => ['required', 'string'],
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            $product = Product::query()->find($productId);
            $product['name'] = $validator['name'];
            $product['price'] = $validator['price'];
            $product['stock'] = $validator['stock'];
            $product['description'] = $validator['description'];
            if ($product->save())
                $this->API_RESPONSE = $product;
            else {
                $this->API_RESPONSE = $product->errors;
                $this->API_STATUS = $this->AVAILABLE_STATUS['SERVICE_UNAVAILABLE'];
            }
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }


    /**
     * Update
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function delete(int $productId)
    {
        $product = Product::query()->find($productId);
        if ($product->delete())
            $this->API_RESPONSE = $product;
        else {
            $this->API_RESPONSE = $product->errors;
            $this->API_STATUS = $this->AVAILABLE_STATUS['SERVICE_UNAVAILABLE'];
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }
}
