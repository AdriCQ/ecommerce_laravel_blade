@extends('layout.main')

@section('content')
    <div class="promo-area">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo1">
                        <i class="fa fa-refresh"></i>
                        <p>+{{ $widgets['orders'] }} Clientes</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo2">
                        <i class="fa fa-truck"></i>
                        <p>Envío a Domicilio</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo3">
                        <i class="fa fa-lock"></i>
                        <p>Seguridad</p>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6">
                    <div class="single-promo promo4">
                        <i class="fa fa-gift"></i>
                        <p>+{{ $widgets['products'] }} productos</p>
                    </div>
                </div>
            </div>
        </div>
    </div> <!-- End promo area -->
    
    <x-slider.product title="Productos Destacados" :products="$top" />
    
    <x-slider.destination :destinations="$destinations" />
     
    <h2 class="section-title">Todos los Productos</h2>
    
    <div class="product-widget-area" style="marigin-top:2rem">
        <div class="container">
            <div class="row">
                @foreach ($products as $product)
                    <div class="col-sm-6 col-md-4">
                        <x-widget.single-product :product="$product"/>
                    </div>
                @endforeach
            </div>
        </div>
    </div> <!-- End product widget area -->
@endsection