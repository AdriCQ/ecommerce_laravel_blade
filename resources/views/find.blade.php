@extends('layout.main')

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>Rastrear Pedido</h2>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="container">
   <div class="single-product-area">
        <x-slider.destination :destinations="$destinations"/>
   </div>
</div>
@endsection