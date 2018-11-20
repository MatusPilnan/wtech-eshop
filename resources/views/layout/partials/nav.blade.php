<nav class="navbar navbar-expand-lg sticky-top navbar-dark bg-dark">
        <a class="navbar-brand order-lg-1" href="{{ route('home') }}">
            <img src="{{ asset('img/logo2.png') }}" alt="logo" height="64">
        </a>
        <a class="nav-item btn btn-secondary ml-auto order-lg-3" href="/cart">
            <img src="{{ asset('img/cart-7-64.png') }}" alt="Nakupny kosik" height="48">
            @if(!empty(session('cart', array())))
            <span class="badge badge-light">{{array_sum(session('cart', array()))}}</span>
            @endif
        </a>
        <button class="navbar-toggler order-lg-4" type="button" data-toggle="collapse" data-target="#navbarMenu">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse order-lg-2" id="navbarMenu">
            <ul class="navbar-nav">
                <li class="nav-item active">
                    <a class="nav-link text-right" href="{{ route('home') }}">{{ __('Domov') }}</a>
                </li>
                @guest
                <li class="nav-item">
                    <a class="nav-link text-right" href="{{ route('login') }}">{{ __('Login') }}</a>
                </li>
                @else
                <li class="nav-item dropdown text-right">
                    <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                        {{ Auth::user()->name }} <span class="caret"></span>
                    </a>

                    <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="{{ route('logout') }}"
                            onclick="event.preventDefault();
                                            document.getElementById('logout-form').submit();">
                            {{ __('Logout') }}
                        </a>

                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>
                </li>
                @endguest
                <li class="nav-item dropdown d-lg-none">
                    <a class="nav-link dropdown-toggle text-right" href="#navbarKatalog" id="navbarDropdownMenuLink"
                        role="button" data-toggle="collapse">
                        Katalog
                    </a>
                    <div class="collapse" id="navbarKatalog">
                        <div class="text-right">
                            @include('layout.partials.catalog')
                        </div>

                    </div>
                </li>
            </ul>
        </div>
    </nav>