
<div class="product-widget-area" style="marigin-top:2rem">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="text-center h2">Destinos</div>
            </div>
            @foreach ($destinations as $dest)                
            <div class="col-xl-1 col-lg-2 col-md-3 col-sm-4 col-xs-6">
                <div class="location-card">
                    {{-- <div class="icon">
                        <i class="fa fa-location-arrow"></i>
                    </div> --}}
                    <div class="location-title">{{ $dest['name'] }}</div>
                    <div class="location-price">${{ $dest['price'] }}</div>
                </div>
            </div>
            @endforeach
        </div>
    </div>
</div>