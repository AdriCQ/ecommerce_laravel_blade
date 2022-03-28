@extends('layout.main')

@section('content')

<div class="single-product-area" style="margin: 2rem 0 2rem 0">
  <cryptopass 
    import="{{$order['total_price']}}" 
    to="https://cryptopass.privatewire.app/api/cryptopass"
    lang="spanish"
    
    wallets='{
      "{{ $config['wallet_type'] }}": "{{ $config['wallet'] }}"
    }'
    onsubmit="onSubmit"
    onreject="onReject"
    onaccept="onAccept"
  >
    <input name="moretext" hidden readOnly type="text" value="{{ $moretext }}"></input>
  </cryptopass>
</div>
@endsection()


@section('scripts')

<script>
  let submit = false;

  function onAccept(evt) {
    console.log('onAccept', evt);
    if (submit) {
      localStorage.clear();
      modalHandler().success('Orden completada', 'La orden se ha almacenado en nuestros servidores');
      setTimeout(() => {
        window.location = window.location.origin + "/order/pay-completed?confirmation={{ htmlentities($confirmation) }}&id={{$order['id'] }}";
      }, 1500);
      
    }
  }

  function onError(evt) {
    console.log('onError', evt);
  }

  function onReject(evt) {
    if (submit) {
      console.log('onReject', evt);
      modalHandler().error('Error', 'No se pudo completar la orden. Revise que los datos estén correctos.');
    }
  }

  function onSubmit(evt) {
    console.log('onSubmit', evt);
    submit = true;
  }
</script>
<script src="https://cryptopass.privatewire.app/crypass.js"></script>

@endsection()

@section('extra_styles')
<link rel="stylesheet" href="https://cryptopass.privatewire.app/crypass.css">
@endsection()