<div class="maincontent-area">
    <div class="zigzag-bottom"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="latest-product">
                    <div class="col-12">
                        <div class="text-center h2">{{$title}}</div>
                    </div>
                    <div class="product-carousel">
                       @foreach ($destinations as $dest)
                           <div class="location-card">
                                {{-- <div class="icon">
                                    <i class="fa fa-location-arrow"></i>
                                </div> --}}
                                <div class="location-title">{{ $dest['name'] }}</div>
                                <div class="location-price">${{ $dest['price'] }}</div>
                            </div>
                       @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End main content area -->