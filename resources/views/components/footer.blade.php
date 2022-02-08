<div class="footer-top-area">
    {{-- <div class="zigzag-bottom"></div> --}}
    <div class="container">
        <div class="row">

            
            <div class="col-md-6">
                <div class="footer-newsletter" id="footer-form">
                    <h2 class="footer-wid-title">Contáctenos</h2>
                    <div class="newsletter-form">
                        <form action="{{ route('contact') }}" method="post">
                            {{ csrf_field() }}
                            <input name="email" type="email" placeholder="Email">
                            <input name="subject" type="text" placeholder="Asunto">
                            <textarea name="message" cols="4" placeholder="Mensaje"></textarea>
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
                        {{-- <li><a href="{{ route('cart') }}">Carrito</a></li> --}}
                        <li><a href="{{ route('find') }}">Rastrear</a></li>
                    </ul>                        
                </div>
            </div>

            <div class="col-md-3 col-sm-6">
                <div class="footer-about-us">
                    <h2>{{ $config['name'] }}</h2>
                    <p>{{ $config['description'] }}</p>
                    <div class="footer-social">
                      @isset($config['social_facebook'])
                        <a href="{{ $config['social_facebook'] }}" target="_blank">
                          <i class="fa fa-facebook"></i>
                        </a>
                      @endisset

                      @isset($config['social_twitter'])
                        <a href="{{ $config['social_twitter'] }}" target="_blank">
                          <i class="fa fa-twitter"></i>
                        </a>
                      @endisset

                      @isset($config['social_instagram'])
                        <a href="{{ $config['social_instagram'] }}" target="_blank">
                          <i class="fa fa-instagram"></i>
                        </a>
                      @endisset

                      @isset($config['social_youtube'])
                        <a href="{{ $config['social_youtube'] }}" target="_blank">
                          <i class="fa fa-youtube"></i>
                        </a>
                      @endisset
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
                    <p>&copy; 2022 GoDjango. All Rights Reserved.</p>
                </div>
            </div>
        </div>
    </div>
</div> <!-- End footer bottom area -->