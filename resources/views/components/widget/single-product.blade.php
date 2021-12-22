<div class="single-wid-product">
    <a href="{{ route('product-details', ['id'=>$product['id']]) }}">
        <img src="{{ $product['image'] }}" alt="{{ $product['name'] }}" class="product-thumb">
    </a>
    <h2><a  href="{{ route('product-details', ['id'=>$product['id']]) }}">{{ $product['name'] }}</a></h2>
    <div class="product-wid-rating">
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
        <i class="fa fa-star"></i>
    </div>
    <div class="product-wid-price">
        <ins>${{ $product['price'] }}.00</ins>
    </div>
    
    <div class="btn c-primary btn-sm" onclick="shopCartHelper().addProductCart({{json_encode($product)}},1)">
        <i class="fa fa-shopping-cart"></i>
    </div>
</div>