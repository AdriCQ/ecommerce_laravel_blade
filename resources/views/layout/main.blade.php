<!DOCTYPE html>
<!--
	ustora by freshdesignweb.com
	Twitter: https://twitter.com/freshdesignweb
	URL: https://www.freshdesignweb.com/ustora/
-->
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/png" href="{{ asset('admin/icons/favicon-128x128.png') }}"/>
    <title>@if (isset($config) && isset($config['name']))
        {{ $config['name'] }}
    @endif</title>
    <script src="{{ asset('js/vendor/vue.min.js') }}"></script>
    
    <!-- Google Fonts -->
    <link href='{{ asset('template/fonts/google-font-1.css') }}' rel='stylesheet' type='text/css'>
    <link href='{{ asset('template/fonts/google-font-2.css') }}' rel='stylesheet' type='text/css'>
    <link href='{{ asset('template/fonts/google-font-3.css') }}' rel='stylesheet' type='text/css'>
   
    <!-- Bootstrap -->
    <link rel="stylesheet" href="{{ asset('template/css/bootstrap.min.css') }}">
    
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('template/css/font-awesome.min.css') }}">
    
    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('template/css/owl.carousel.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('template/css/responsive.css') }}">

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
  <body>
    @if (isset($config) && isset($destinations))
        
    @include('components.header')
    @include('components.modals')

    @yield('content')

    @include('components.footer')
    @else
        <h1 class="text-center" style="margin-top: 15rem">Sitio en Configuración</h1>
    @endif




    <script src="{{ asset('js/vendor/axios.min.js') }}"></script>
    <!-- Latest jQuery form server -->
    <script src="{{ asset('template/js/jquery.min.js') }}"></script>
    {{-- <script src="https://code.jquery.com/jquery.min.js"></script> --}}
    
    <!-- Bootstrap JS form CDN -->
    <script src="{{ asset('template/js/bootstrap.min.js') }}"></script>
    
    <!-- jQuery sticky menu -->
    <script src="{{ asset('template/js/owl.carousel.min.js') }}"></script>
    <script src="{{ asset('template/js/jquery.sticky.js') }}"></script>
    
    <!-- jQuery easing -->
    <script src="{{ asset('template/js/jquery.easing.1.3.min.js') }}"></script>
    
    <!-- Main Script -->
    <script src="{{ asset('template/js/main.js') }}"></script>
    <script src="{{ asset('js/cart.js') }}"></script>
    <script src="{{ asset('js/modal.js') }}"></script>

    <script>
        shopCartHelper().load();
        document.getElementById('cart-count').innerHTML = shopCartHelper().load().length;
    </script>
    
    <!-- Slider -->
    <script type="text/javascript" src="{{ asset('template/js/bxslider.min.js') }}"></script>
	<script type="text/javascript" src="{{ asset('template/js/script.slider.js') }} "></script>

    @yield('scripts')
  </body>
</html>