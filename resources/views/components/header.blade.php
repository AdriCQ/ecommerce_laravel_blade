<div class="site-branding-area">
    <div class="container">
        <div class="row">
            <div class="col-sm-6">
                <a href="{{ route('home') }}">
                <div class="logo">
                    <h1><a href="{{ route('home') }}">{{ $config['name'] }}</a></h1>
                </div></a>
            </div>
            
            <div class="col-sm-6">
                <div class="shopping-item c-primary">
                    <a href="" id="to-cart-anchor" >Carrito 
                      @if(isset($config['wallet_type']))
                      ({{ $config['wallet_type']}})
                      @endif
                      <i class="fa fa-shopping-cart"></i> <span class="product-count" id="cart-count">0</span></a>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End site branding area -->

<div class="mainmenu-area">
    <div class="container">
        <div class="row">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
            </div> 
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    <li class="{{ $active == 'home' ? 'active':'' }}" ><a href="{{ route('home') }}">Inicio</a></li>
                    {{-- <li><a href="shop.html">Shop page</a></li> --}}
                    {{-- <li><a href="single-product.html">Single product</a></li> --}}
                    <li class="{{ $active == 'cart' ? 'active':'' }}"><a id="to-cart-tab" href="#">Carrito</a></li>
                    <li class="{{ $active == 'checkout' ? 'active':'' }}"><a href="{{ route('find') }}">Rastreo</a></li>
                    <li><a href="#footer-form">Contacto</a></li>
                </ul>
            </div>  
        </div>
    </div>
</div> <!-- End mainmenu area -->
    