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
     * ProductCart
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function productCart(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'productsCart' => ['required', 'array'],
        ]);
        if ($validator->fails()) {
            $this->API_RESPONSE['ERRORS'] = $validator->errors();
            $this->API_STATUS = $this->AVAILABLE_STATUS['BAD_REQUEST'];
        } else {
            $validator = $validator->validate();
            $products = [];
            foreach ($validator['productsCart'] as $pr) {
                $pr = json_decode($pr, true);
                $prod = Product::query()->find($pr['product']['id']);
                if (!$prod)
                    return response()->json(['Producto no encontrado'], 400,  [], JSON_NUMERIC_CHECK);
                array_push($products, ['product' => $prod, 'qty' => $pr['qty']]);
            }
            $this->API_RESPONSE = $products;
        }
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }
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
            $validator['image'] = '/images/default.jpg';
            $validator['gallery'] = [];
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
     * Product Details
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function details(int $id)
    {
        $this->API_RESPONSE = Product::query()->find($id);
        return response()->json($this->API_RESPONSE, $this->API_STATUS, [], JSON_NUMERIC_CHECK);
    }

    /**
     * List
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function list()
    {
        $this->API_RESPONSE = Product::query()->orderByDesc('id')->get();
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
     * Upload Gallery
     * @param Request request
     * @return Illuminate\Http\JsonResponse
     */
    public function uploadGallery(int $id, Request $request)
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
            $paths = $product->gallery;
            if (!is_array($paths))
                $paths = [];
            $image = $request->file('image');
            array_push($paths, $this->uploadImage($image, $product, 'gallery-' . count($paths)));
            $product->gallery = $paths;
            if ($product->save()) {
                $this->API_RESPONSE = $product;
            } else {
                $this->API_RESPONSE = $product->errors;
                $this->API_STATUS = 503;
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
     * uploadImage
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
