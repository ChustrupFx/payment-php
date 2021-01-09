<header>

    <div class="header-bg bg-dark d-flex justify-content-center align-items-center">

        <nav>
            <ul class="d-flex list-unstyled">
                <li>
                    <a class="btn btn-light" href="{{ route('shoppingcart.show') }}">
                        <i class="fas fa-shopping-cart text-dark"></i>
                    </a>
                </li>
                @guest()
                    <li>
                        <a href="{{ route('login.show') }}" class="btn btn-light">Login</a>
                    </li>
                    <li>
                        <a href="{{ route('register.show') }}" class="btn btn-light">Registrar</a>
                    </li>
                @endguest
                @auth()
                    <li>
                        <form action="{{ route('logout') }}" method="post">
                            @csrf
                            <input type="submit" class="btn btn-light" value="Logout">
                        </form>
                    </li>
                @endauth
            </ul>
        </nav>

    </div>

</header>