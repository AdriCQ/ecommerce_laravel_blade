<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <h2 class="section-title">{{ $title}}</h2>
                    <div class="product-carousel">
                       @foreach ($products as $product)
                           <x-widget.product :product="$product"/>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->