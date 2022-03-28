@extends('layout.main')

@section('content')
<div class="product-big-title-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="product-bit-title text-center">
                    <h2>{{ $title }}</h2>
                    @isset($content)
                    @foreach ($content as $c)
                        <h2 style="font-size: 4rem">{{ $c }}</h2>
                    @endforeach
                    @endisset

                    @isset($track_url)
                      <h2>Guarde su enlace de rastreo de pedido</h2>
                      <h2>
                        <a href="{{$track_url }}" target="blank">{{$track_url}}</a>
                      </h2>
                    @endisset
                </div>
            </div>
        </div>
    </div>
</div>
@endsection