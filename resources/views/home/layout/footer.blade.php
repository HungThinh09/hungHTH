<hr>
<footer>
    <div class="container">
        <div class="row">
            <div class="col-6 col-xs-12">
                Slogan: {{ getSetting('slogan') }}
            </div>
            <div class="col-6 col-xs-12">
                <p>Đia chỉ : {{ getSetting('address') }} </p>
                <p> SDT : {{ getSetting('phone') }}</p>
                <p><a href="{{ getSetting('facebook') }}">
                        <ion-icon name="logo-facebook"></ion-icon>
                    </a> |
                    <a href="{{ getSetting('instagram') }}">
                        <ion-icon name="logo-instagram"></ion-icon>
                    </a>
                </p>

            </div>
        </div>
    </div>
</footer>
<div id="cart">
    <a href="{{ route('myCart') }}">
        <ion-icon name="cart-outline"></ion-icon>
    </a>
    @if (count($cart->items) > 0)
        <div class="soProduct">
            {{ count($cart->items) }}
        </div>
    @endif

</div>
<div id="backTop">
    <ion-icon name="chevron-up-circle-outline"></ion-icon>
</div>
<script src="{{ asset('admins/plugins/jquery/jquery.min.js') }}"></script>
<script src="{{ asset('admins/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<script src="{{ asset('admins/dist/js/adminlte.min.js') }}"></script>
<script type="module" src="https://unpkg.com/ionicons@5.5.2/dist/ionicons/ionicons.esm.js"></script>
<script src="{{ asset('homes\js\backToTop.js') }}"></script>

@yield('js')
