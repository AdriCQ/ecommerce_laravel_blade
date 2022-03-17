@extends('layout.main')

@section('content')

    <div class="single-product-area" style="margin: 2rem 0 2rem 0" >
      
      <CryptoPass 
        import="{{$order['total_price']}}" 
        to="https://cryptopass.privatewire.app/api/cryptopass" 
        lang="english" 
        wallets='{
            @if($config['currency'] === 'BTC')
              "bitcoin": "{{ $config['cp_bitcoin'] }}"
            @elseif ($config['currency'] === 'ETH')
              "ethereum": "{{ $config['cp_ethereum'] }}"

            @elseif ($config['currency'] === 'LTC')
              "litecoin": "{{ $config['cp_litecoin'] }}"
            @elseif ($config['currency'] === 'XRP')
              "ripple": "{{ $config['cp_ripple'] }}"
            @endif
          }'
          onsubmit="e=>console.log(e)">
        <input name="moretext" hidden readOnly type="text" value="{{ json_encode($order) }}"></input>
        </CryptoPass>
    </div>
@endsection()


@section('scripts')
<script src="{{ asset('cryptopass/crypass.js') }}"></script>
@endsection()

@section('extra_styles')
<link rel="stylesheet" href="{{ asset('cryptopass/crypass.css') }}">
@endsection()