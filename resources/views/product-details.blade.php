@extends('layout.main')

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Detalles del Producto</h2>
                </div>
            </div>
        </div>
    </div>
</div>
    
@if (isset($product))
    
<div class="single-product-area" style="padding: 1rem">
    {{-- <div class="zigzag-bottom"></div> --}}
    <div class="container">
        <div class="product-content-right">
            <div class="row">
                <div class="col-sm-6">
                    <div class="product-images">
                        <div class="product-main-img">
                            <img src="{{ asset($product['image']) }}" alt="{{ $product['name'] }}" id="product-image-component">
                        </div>
                        
                        @if (count($product['gallery']))
                            <div class="product-gallery">
                                <img src="{{ asset($product['image']) }}" onclick="setImage('{{ asset($product['image']) }}')">
                                @foreach ($product['gallery'] as $gallery)
                                    <img style="cursor: pointer" src="{{ asset($gallery) }}" alt="" onclick="setImage('{{ asset($gallery) }}')">
                                @endforeach
                            </div>
                        @endif
                    </div>
                </div>
                
                <div class="col-sm-6">
                    <div class="product-inner">
                        <h2 class="product-name">{{ $product['name'] }}</h2>
                        <div class="product-inner-price">
                            <ins>${{ $product['price']}}.00</ins> 
                        </div>    
                        
                        <div class="cart">
                            <div class="quantity">
                                <input type="number" id="product-qty-input" size="4" class="input-text qty text" title="Qty" value="1" name="quantity" min="1" step="1">
                            </div>
                            <button class="add_to_cart_button" onclick="shopCartHelper().addProductCart({{json_encode($product)}}, document.getElementById('product-qty-input').value)">Añadir</button>
                        </div>   
                        <h2 style="margin-top: 2rem">Descripción</h2>  
                        {{ $product['description'] }}
                    </div> 
                </div>                    
            </div>
        </div>
    </div>
</div>
@endif    

@endsection()

@section('scripts')
<script>
    const img = document.getElementById('product-image-component');
    function setImage(_img){
        img.src = _img;
    }
</script>
@endsection