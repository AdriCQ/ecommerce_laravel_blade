<?php

namespace App\Http\Controllers\Shop;

use App\Http\Controllers\Controller;
use App\Models\Shop\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Intervention\Image\Facades\Image as ImageIntervention;

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
     * delete
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

    /**
     * List
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $this->API_RESPONSE = Product::all();
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
     * UploadMainImage
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function uploadMainImage(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'image' => ['required', 'image'],
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            $product = Product::query()->find($id);
            if (!$product)
                return response()->json(['Producto no encontrado'], 400, [], JSON_NUMERIC_CHECK);
            $path = $this->uploadImage($validator['image'], $product, 'main');
            $product->image = $path;
            $product->save();
            $this->API_RESPONSE = $product;
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }

    /**
     * Upload Gallery Images
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function uploadGalleryImages(int $id, Request $request)
    {
        $validator = Validator::make($request->all(), [
            'images' => ['required', 'array'],
            'images.*' => ['required', 'image']
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }

    /**
     * 
     */
    private function uploadImage($image, Product $product, $type = 'main')
    {
        $filename = $product->id . '-' . $type . '.jpg';
        $storage_path = '/public/products/images';
        $public_path = '/storage/products/images';
        if (!Storage::exists($storage_path))
            Storage::makeDirectory($storage_path);
        $resizeDimension = 480;
        $pathCpy = $storage_path  . '/' . $filename;
        Storage::put($pathCpy, '');
        ImageIntervention::make($image)
            ->resize($resizeDimension, null, function ($constraints) {
                $constraints->aspectRatio();
            })->save(storage_path('/app' . $pathCpy));

        return $public_path . '/' . $filename;
    }
}
