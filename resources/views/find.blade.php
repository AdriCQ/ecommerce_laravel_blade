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
    <div class="h2 text-center">Rastrear Pedido</div>
    <div style="margin-top: 2rem" class="row" id="find-vue">
        <div class="col-xs-12 col-sm-6">
            <form action="{{ route('find-action') }}" method="post">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="form-name" class="form-label">Nombre</label>
                    <input type="text" name="name" class="form-control" id="form-name" placeholder="Nombre" />
                </div>
                <div class="form-group">
                    <label for="form-email" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="form-email" placeholder="Email" />
                </div>
                <div class="form-group">
                    <label for="form-orderID" class="form-label">Identificador del Pedido</label>
                    <input type="text" name="orderId" class="form-control" id="form-orderID" placeholder="ID" />
                </div>
                <div class="form-group">
                    <button type="submit" class="btn c-primary">
                        <i class="fa fa-search" aria-hidden="true"></i>
                        Rastrear Pedido</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection