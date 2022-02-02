<!-- Hero section START -->
<section class="hero">
    <nav class="navbar">
        <div class="logo">
            <a href="/">Warisanify</a>
        </div>

        <ul class="nav-list">
            <li><a href="/">Home</a></li>
            <li><a href="/home">Shop</a></li>
            <li><a href="/theater">Theater</a></li>
            <li><a href="/about">About</a></li>

            @if(Route::has('login'))
                @auth
                    @if(Auth::user()->role === 'admin')
                    <li>{{ Auth::user()->name }}</li>
                    <li><a href="">Dashboard</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button>logout</button>
                    </form>
                    @else
                    <li><a href="">{{ Auth::user()->name }}</a></li>
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <button>logout</button>
                    </form>
                    @endif
                @else
                    <li><a href="{{ route('login') }}">login</a></li>
                    <li><a href="{{ route('register') }}">register</a></li>
                @endif
            @endif
        </ul>
    </nav>

    <div class="hero-text">
        <h1>Lorem Ipsum dolor</h1>
        <h3>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
            dolore magna aliqua.</h3>
    </div>

</section>
<!-- Hero section END -->