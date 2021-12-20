<div class="single-product">
    <div class="product-f-image">
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}">
        <div class="product-hover">
            <a href="#" class="add-to-cart-link" onclick="shopCartHelper().addProductCart({{json_encode($product)}},1)"><i class="fa fa-shopping-cart"></i> Añadir</a>
        </div>
    </div>
    
    <h2><a href="single-product.html">{{ $product['name'] }}</a></h2>
    
    <div class="product-carousel-price">
        <ins>${{$product['price']}}.00</ins>
    </div> 
</div>