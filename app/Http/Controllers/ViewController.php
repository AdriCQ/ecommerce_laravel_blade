<?php

namespace App\Http\Controllers;

use App\Models\Shop\Client;
use App\Models\Shop\Config;
use App\Models\Shop\Destination;
use App\Models\Shop\Order;
use App\Models\Shop\Product;
use App\Models\User;
use App\Notifications\AdminOrderNotification;
use App\Notifications\ContactNotification;
use App\Notifications\FindOrderNotification;
use App\Notifications\OrderNotification;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image as ImageIntervention;
use Illuminate\Support\Facades\Notification;
use Illuminate\Support\Facades\Storage;
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
    // $intent = auth()->user()->createSetupIntent();
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
    $products = Product::query()->where('stock', '>', 0);
    $this->DATA['products'] = $products->get();
    $this->DATA['top'] = $products->orderBy('purchases', 'desc')->get();
    $this->DATA['active'] = 'home';
    $this->DATA['widgets'] = [
      'orders' => Order::query()->count(),
      'products' => $products->count()
    ];
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
    if ($order->checkToken($data['hash'])) {
      $this->DATA['order'] = $order;
    }
    return view('order', $this->DATA);
  }

  /**
   * Find
   * @param Request request
   * @return Illuminate\Http\JsonResponse
   */
  public function findAction(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'name' => ['required', 'string'],
      'email' => ['required', 'email'],
      'orderToken' => ['required', 'string']
    ]);
    if ($validator->fails()) {
      $this->DATA['title'] = 'Los Datos proporcionados son incorrectos';
    } else {
      $validator = $validator->validate();
      $orderToken = explode('|', $validator['orderToken']);
      $orderId = $orderToken[0];
      $token = $orderToken[1];
      $order = Order::query()->find($orderId);
      if (!$order) {
        $this->DATA['title'] = 'Orden no encontrada';
      } else if (!$order->checkToken($token))
        $this->DATA['title'] = 'Orden no encontrada';
      else {
        $notifiable = User::query()->where('type', 'RASTREO')->get();
        Notification::send($notifiable, new FindOrderNotification($validator['name'], $validator['email'], $order));
        $this->DATA['title'] = 'Solicitud de Rastreo Enviada.';
        $this->DATA['content'] = ['Le enviaremos un email con la respuesta de su solicitud'];
      }
    }
    return view('notification')->with($this->DATA);
  }

  /**
   * makeOrder
   * @param Request request
   * @return Illuminate\Http\JsonResponse
   */
  public function makeOrder(Request $request)
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
      $this->DATA['title'] = 'Error procesando orden';
      $this->DATA['content'] = $validator->errors()->toArray();
    } else {
      $validator = $validator->validate();
      $orderPrice = 0;
      $orderProducts = [];
      $continue = true;
      $reazon = '';
      foreach ($validator['products'] as $prodReq) {
        $productModel = Product::query()->find($prodReq['product']['id']);
        if (!$productModel) {
          $continue = false;
          $reazon = ['Producto no encontrado'];
        }
        if ($productModel->stock < $prodReq['qty']) {
          $continue = false;
          $reazon = ['Inventario insuficiente'];
        }
        $productModel->stock -= $prodReq['qty'];
        if (!$productModel->save())
          $continue = false;
        array_push($orderProducts, [
          'shop_product_id' => $prodReq['product']['id'],
          'qty' => $prodReq['qty']
        ]);
        $orderPrice += $productModel->price;
      }
      if (!$continue) {
        $this->DATA['title'] = 'Error procesando orden';
        $this->DATA['content'] = $reazon;
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

        $sellUsers = User::query()->where('type', 'VENTAS')->get();
        // Send email Notification
        Notification::send($sellUsers, new AdminOrderNotification($order));
        Notification::send($client, new OrderNotification($order));
        $this->DATA['title'] = 'Orden Guardada';
        $this->DATA['content'] = ['Le hemos enviado un email a su correo con los datos de su pedido'];
      } else {
        $this->DATA['title'] = 'Error procesando orden';
      }
    }
    return view('notification')->with($this->DATA);
  }
  /**
   * 
   */
  public function orderCompleted()
  {
    $this->DATA['title'] = 'Orden Guardada';
    $this->DATA['content'] = ['Le hemos enviado un email a su correo con los datos de su pedido'];
    return view('notification')->with($this->DATA);
  }
  /**
   * Contact
   * @param Request request
   * @return Illuminate\Http\JsonResponse
   */
  public function contact(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'subject' => ['required', 'string'],
      'message' => ['required', 'string'],
      'email' => ['required', 'email']
    ]);
    if ($validator->fails()) {
      $this->DATA['content'] = $validator->errors()->toArray();
      $this->DATA['title'] = 'Error al contactarnos';
    } else {
      $validator = $validator->validate();
      $userContact = User::query()->where('type', 'CONTACTO')->get();
      Notification::send($userContact, new ContactNotification($validator['email'], $validator['subject'], $validator['message']));
      $this->DATA['title'] = 'Mensaje enviado';
    }
    return view('notification')->with($this->DATA);
  }

  public function uploadTest(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'image' => ['required', 'image']
    ]);
    if ($validator->fails()) {
      $this->DATA['content'] = $validator->errors()->toArray();
      $this->DATA['title'] = 'Error al contactarnos';
    } else {
      $validator = $validator->validate();
      $image = $request->file('image');
      $storage_path = '/files';
      if (!Storage::disk('images')->exists($storage_path))
        Storage::disk('images')->makeDirectory($storage_path);
      $resizeDimension = 480;
      // Storage::disk('images')->put($filePath, '');
      ImageIntervention::make($image)
        ->resize($resizeDimension, null, function ($constraints) {
          $constraints->aspectRatio();
        })->save(public_path('images/imagetest.jpg'));
    }
    return view('upload')->with($this->DATA);
  }
}
