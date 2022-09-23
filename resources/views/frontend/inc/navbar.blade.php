<div class="nav-top d-flex justify-content-between align-content-center">
    <ul class="nav">
        <li class="nav-item">
            <a class="nav-link ml-3" href="#"><img src="{{ asset('images/site/indo.png') }}"
                    width="25px">&nbsp;&nbsp;indonesia</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="#">
                <i class="fas fa-phone"></i>&nbsp;&nbsp;(055)546334992
            </a>
        </li>
    </ul>
    <ul class="nav">
        @guest
            <li class="nav-item">
                <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
            </li>
            @if (Route::has('register'))
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                </li>
            @endif
        @else
            <div class="dropdown my-1 mr-3">
                <button class="btn btn-dark btn-sm dropdown-toggle" type="button" id="dropdownMenuButton"
                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <b>{{ Auth::user()->name }}</b>
                </button>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <li class="nav-item">
                        <a class="dropdown-item text-dark" href="{{ url('profile') }}" role="button" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            Profil Saya
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="dropdown-item text-dark" href="{{ url('history') }}" role="button" aria-haspopup="true"
                            aria-expanded="false" v-pre>
                            Riwayat Belanja
                        </a>
                    </li>
                    <li>
                        <a class="dropdown-item text-dark" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                                                                                                                                                              document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </li>
                </div>
            </div>
            <li class="nav-item mr-3">
                @php
                    $order = \App\Order::where('user_id', auth()->user()->id)
                        ->where('status', 0)
                        ->first();
                    if (!empty($order)) {
                        $notif = App\OrderDetail::where('order_id', $order->id)->count();
                    } else {
                        $notif = 0;
                    }
                @endphp
                <a class="nav-link" href="{{ url('checkout') }}"><i class="fas fa-shopping-cart"></i> <span
                        class="badge badge-dark" style="vertical-align: top">{{ $notif }}</span></a>
            </li>
        @endguest
    </ul>
</div>
<nav class="navbar navbar-expand-lg navbar-light bg-faded">
    <div class="container">
        <a class="navbar-brand" href="/"><img src="{{ asset('images/site/sanstore.png') }}" width="125px"></a>
        <ul class="nav navbar-nav ml-auto">
            <li class="nav-item active">
                <a class="nav-link" href="/">Halaman Utama <span class="sr-only"></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('front-product') }}">Produk</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('about') }}">Tentang Kami</a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('contact') }}">Hubungi Kami</a>
            </li>
        </ul>
    </div>
</nav>
