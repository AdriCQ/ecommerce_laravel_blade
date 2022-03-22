@extends('layout.main')

@section('content')

    <div class="single-product-area" style="margin: 2rem 0 2rem 0" >
      
      <cryptopass 
        import="{{$order['total_price']}}" 
        to="https://cryptopass.privatewire.app/api/cryptopass" 
        email="{{ $order['email'] }}"
        lang="english"
        onaccept="onAccept()"
        onerror="onReject()"
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
        onsubmit="onSubmit" onaccept="onAccept" onerror="onError" onreject="onReject">
        <input name="moretext" hidden readOnly type="text" value="{{ json_encode($order) }}"></input>
        </cryptopass>
    </div>
@endsection()


@section('scripts')

<script>
    let submit = false;
    function onAccept(evt) {
      if(submit) {
        console.log('onAccept', evt);
        const id = {{ $order['id'] }};
        window.location = window.location.origin + `/order/pay/${id}/completed`;
      }
    }
    function onError(evt) { console.log('onError', evt); }
    function onReject(evt) { if(submit)console.log('onReject', evt); }
    function onSubmit(evt) { console.log('onSubmit', evt); submit=true; }
</script>
<script src="https://cryptopass.privatewire.app/crypass.js"></script>

@endsection()

@section('extra_styles')
<link rel="stylesheet" href="https://cryptopass.privatewire.app/crypass.css">
@endsection()