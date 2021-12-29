<div class="footer-top-area">
    {{-- <div class="zigzag-bottom"></div> --}}
    <div class="container">
        <div class="row">

            
            <div class="col-md-6">
                <div class="footer-newsletter" id="footer-form">
                    <h2 class="footer-wid-title">Contáctenos</h2>
                    <div class="newsletter-form">
                        <form action="#">
                            <input type="email" placeholder="Email">
                            <input type="text" placeholder="Asunto">
                            <textarea cols="4" placeholder="Mensaje"></textarea>
                            <input type="submit" value="Enviar">
                        </form>
                    </div>
                </div>
            </div>
            
            <div class="col-md-3 col-sm-6">
                <div class="footer-menu">
                    <h2 class="footer-wid-title">Navegación</h2>
                    <ul>
                        <li><a href="{{ route('home') }}">Inicio</a></li>
                        <li><a href="{{ route('cart') }}">Carrito</a></li>
                        <li><a href="{{ route('find') }}">Rastrear</a></li>
                    </ul>                        
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>{{ $config['name'] }}</h2>
                    <p>{{ $config['description'] }}</p>
                    <div class="footer-social">
                        <a href="#" target="_blank"><i class="fa fa-facebook"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-twitter"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-youtube"></i></a>
                        <a href="#" target="_blank"><i class="fa fa-linkedin"></i></a>
                    </div>
                </div>
            </div>
            
        </div>
    </div>
</div> <!-- End footer top area -->

<div class="footer-bottom-area">
    <div class="container">
        <div class="row">
            <div class="col-md-8">
                <div class="copyright">
                    <p>&copy; 2022 uCommerce. All Rights Reserved. <a href="http://www.freshdesignweb.com" target="_blank">freshDesignweb.com</a></p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->