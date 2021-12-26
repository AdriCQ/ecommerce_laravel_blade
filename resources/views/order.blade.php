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
       @endisset
   </div>
</div>

@endsection()