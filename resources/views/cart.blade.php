@extends('layout.main')

@section('content')
    <div class="product-big-title-area">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="product-bit-title text-center">
                        <h2>Carrito</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="single-product-area">
        {{-- <div class="zigzag-bottom"></div> --}}
        <div class="container">
            <div class="row">                
                <div class="col-md-8">
                    <div class="product-content-right">
                        <div class="woocommerce">
                            <form method="post" action="#">
                                <table cellspacing="0" class="shop_table cart">
                                    <thead>
                                        <tr>
                                            <th class="product-remove">&nbsp;</th>
                                            <th class="product-thumbnail">&nbsp;</th>
                                            <th class="product-name">Producto</th>
                                            <th class="product-price">Precio</th>
                                            <th class="product-quantity">Cantidad</th>
                                            <th class="product-subtotal">Total</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($productsCart as $product)
                                        <tr class="cart_item">
                                            <td class="product-remove">
                                                <a title="Remove this item" class="remove" href="#">×</a> 
                                            </td>

                                            <td class="product-thumbnail">
                                                <a href="{{ route('product-details', ['id'=>$product['product']['id']]) }}"><img width="145" height="145" alt="poster_1_up" class="shop_thumbnail" src="{{ asset($product['product']['image']) }}"></a>
                                            </td>

                                            <td class="product-name">
                                                <a href="{{ route('product-details', ['id'=>$product['product']['id']]) }}">{{ $product['product']['name'] }}a</a> 
                                            </td>

                                            <td class="product-price">
                                                <span class="amount">${{ $product['product']['price'] }}.00</span> 
                                            </td>

                                            <td class="product-quantity">
                                                <div class="quantity buttons_added">
                                                    <input type="number" size="4" class="input-text qty text" title="Qty" value="{{ $product['qty'] }}" min="0" step="1">
                                                </div>
                                            </td>

                                            <td class="product-subtotal">
                                                <span class="amount">${{ $product['qty'] * $product['product']['price'] }}.00</span> 
                                            </td>
                                        </tr>
                                        @endforeach
                                        
                                        <tr>
                                            <td class="actions" colspan="6">
                                                <div name="update_cart" onclick="shopCartHelper().clear()" class="btn btn-danger btn-lg">Limpiar Carrito</div>
                                                <div class="btn btn-success btn-lg">Comprar</div>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </form>
                        </div>                        
                    </div>                    
                </div>
            </div>
        </div>
    </div>

@endsection()