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
use Illuminate\Support\Facades\Hash;
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
    // Create http link
    if (isset($config['social_facebook']) && !str_contains($config['social_facebook'], 'https://'))
      $config['social_facebook'] = 'https://' . $config['social_facebook'];
    if (isset($config['social_twitter']) && !str_contains($config['social_twitter'], 'https://'))
      $config['social_twitter'] = 'https://' . $config['social_twitter'];
    if (isset($config['social_instagram']) && !str_contains($config['social_instagram'], 'https://'))
      $config['social_instagram'] = 'https://' . $config['social_instagram'];
    if (isset($config['social_youtube']) && !str_contains($config['social_youtube'], 'https://'))
      $config['social_youtube'] = 'https://' . $config['social_youtube'];
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
   * pay
   * @param Request request
   * @return Illuminate\Http\JsonResponse
   */
  public function pay(int $id)
  {
    $order = Order::find($id);
    if (!$order) {
      $this->DATA['title'] = 'No encontramos la orden';
      return view('notification')->with($this->DATA);
    }
    $this->DATA['order'] = $order;
    $this->DATA['moretext'] = 'Nueva orden<br>';
    $this->DATA['moretext'] .= 'Nombre: ' . $order->name . '<br>';
    $this->DATA['moretext'] .= 'Tel: ' . $order->phone . '<br>';
    $this->DATA['moretext'] .= 'Direccion: ' . $order->address . '<br>';
    $this->DATA['moretext'] .= 'Productos:<br>';
    foreach ($order->order_products as $orderProduct) {
      $this->DATA['moretext'] .= '- x' . $orderProduct->qty . ' ' . $orderProduct->product->name . ' $' . $orderProduct->qty * $orderProduct->product->price . '<br>';
    }
    $this->DATA['confirmation'] = bcrypt($order->id);
    return view('pay')->with($this->DATA);
  }

  public function payCompleted(Request $request)
  {
    $validator = Validator::make($request->all(), [
      'confirmation' => ['required', 'string'],
      'id' => ['required', 'integer']
    ]);
    if ($validator->fails()) {
      return response()->json($validator->errors()->toArray(), 400);
    }
    $validator = $validator->validate();
    $order = Order::find($validator['id']);
    if (!$order) {
      $this->DATA['title'] = 'No encontramos la orden';
      return view('notification')->with($this->DATA);
    }
    if (!Hash::check($order->id, $validator['confirmation'])) {
      $this->DATA['title'] = 'Error de pago';
      $this->DATA['content'] = ['No hemos podido confirmar el pago'];
    } else {
      $order->pay = true;
      $order->save();

      $msg = '';
      $orderPrice = 0;
      foreach ($order->order_products as $op) {
        $productModel = $op->product;
        $msg = $msg . ' - x' . $op->qty . ' ' . $productModel->name . ': $' . $productModel->price * $op->qty;
        $orderPrice += $productModel->price * $op->qty;
      }
      $msg = $msg . ' Total: $' . $orderPrice;

      // Save File
      $storeData = Config::query()->first();
      $now = \DateTime::createFromFormat('U.u', microtime(true));
      $sellUsers = User::query()->where('type', 'VENTAS')->get();

      $jsonData = [
        'name' => $storeData->name . '-' . $order->name,
        'tel' => $order->phone,
        'addr' => $order->address,
        'msg' => $msg,
        'date' => $now->format("m-d-Y H:i:s.u"),
      ];
      $filename = $order->name . '_' . now()->timestamp . '.json';
      $fcont = file_get_contents("../hash");
      $jsonPath = str_replace(array("\n", "\r"), '', $fcont);
      $str = json_encode($jsonData);
      // $fp = fopen("../../messages/" . $jsonPath . "/" . $filename, 'w');
      // fwrite($fp, $str);
      // fclose($fp);
      Storage::disk('messages')->put($jsonPath . '/' . $filename, $str);
      // Send email Notification
      Notification::send($sellUsers, new AdminOrderNotification($order));

      $this->DATA['order'] = $order;
      $this->DATA['title'] = 'Orden Guardada';
      $this->DATA['content'] = ['Su pedido ha sido pagado correctamente. Gracias por usar nuestro servicio.'];
      $this->DATA['track_url'] =
        url('/order/' . $order->id . '?hash=' . $order->getHash());
    }
    return view('notification')->with($this->DATA);
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
