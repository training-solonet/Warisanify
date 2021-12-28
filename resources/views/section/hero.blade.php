<!-- Hero section START -->
<section class="hero">
    <nav class="navbar">
        <div class="logo">
            <a href="home.php">Warisanify</a>
        </div>

        <ul class="nav-list">
            <li><a href="/">Home</a></li>
            <li><a href="/shop">Shop</a></li>
            <li><a href="/theater">Theater</a></li>
            <li><a href="/about">About</a></li>
        @if (Route::has('login'))
        @auth
            <form action="{{ route('logout') }}" method="post">
                @csrf
               <button>
                   Logout
               </button>
            </form>
        @else
            <li><a href="{{ route('login') }}">login</a></li>
            @if (Route::has('register'))
                <li><a href="{{ route('register') }}">register</a></li>
            @endif
        @endauth
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
