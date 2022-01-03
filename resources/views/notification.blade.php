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
                </div>
            </div>
        </div>
    </div>
</div>
@endsection