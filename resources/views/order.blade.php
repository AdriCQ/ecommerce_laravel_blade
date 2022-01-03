@extends('layout.main')

@section('content')

<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Pedido</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
   <div class="single-product-area">
       @isset($order)
        <table cellspacing="0" class="shop_table cart">
            <thead>
                <tr>
                    <th class="product-thumbnail">&nbsp;</th>
                    <th class="product-name">Producto</th>
                    <th class="product-price">Precio</th>
                    <th class="product-quantity">Cantidad</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($order->order_products as $orderProduct)
                    
                <tr class="cart_item">
                    <td class="product-thumbnail">
                        <a href="#"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{ asset($orderProduct->product->image) }}"></a>
                    </td>

                    <td class="product-name">
                        <a href="#">{{ $orderProduct->product->name }}</a> 
                    </td>

                    <td class="product-price">
                        <span class="amount">${{ $orderProduct->product->price }}.00</span> 
                    </td>

                    <td class="product-quantity">
                        <span>{{ $orderProduct->qty }}</span>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
        <div style="margin: 1rem" class="row">
            <form method="post" action="{{ route('find-action')}}">
                {{ csrf_field() }}
            <div class="col-xs-12 col-sm-6">
                <div class="form-group">
                    <label class="form-label">Nombre</label>
                    <input name="name" type="text" class="form-control" value="{{ $order->name }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Email</label>
                    <input name="email" type="email" class="form-control" value="{{ $order->email }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Dirección</label>
                    <input type="text" class="form-control" value="{{ $order->address }}" readonly>
                </div>
                <div class="form-group">
                    <label class="form-label">Identificador de Pedido</label>
                    <input type="text" readonly class="form-control" name="orderToken" value="{{ $order->id.'|'. $order->getHash() }}">
                </div>
            </div>
            <div class="col-xs-12 col-sm-6  text-center">
                <button type="submit" class="btn c-primary" style="width:100%; margin-top: 1rem">Rastrear pedido</button>
            </div>
            </form>
        </div>
       @endisset
   </div>
</div>

@endsection()