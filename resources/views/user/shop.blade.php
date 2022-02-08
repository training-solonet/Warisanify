<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css"
        integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous" />
    <link rel="stylesheet" href="{{ url('Style/css/shopp.css') }}">
    <title>Shop</title>
</head>

<body>
    @if($message = Session::get('success'))
        <script>
            alert('{{ $message }}');
        </script>
    @endif

</body>
<nav class="navbar">
    <a class="logo" href="/">Warisanify</a>
    <ul class="nav-list">
        <li><a href="/">Home</a></li>
        <li><a href="/home">Shop</a></li>
        <li><a href="/theater">Theater</a></li>
        <li><a href="/about">About</a></li>
    </ul>
</nav>

<section class="helper">
    <div class="search">
        <form action="home
        " method="GET">
            <input name="search" type="text" placeholder="Search here">
            <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
        </form>
    </div>

    <div class="right">
        <div class="cart">

            <a href="{{ route('cart.index') }}"><img
                    src="{{ url('Style/pict/shopping-cart.png') }}" alt="" srcset=""></a>
        </div>

        <div class="profil">
            <div class="circle">
                @if(Route::has('login'))
                    @auth
                        <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}" alt="">
                    @else
                        <i class="fas fa-user"></i>
                    @endauth
                @endif
            </div>
            @if(Route::has('login'))
                @auth
                    <a class="username" href="/profil">{{ Auth::user()->name }}</a>
                @else
                    {{-- <p>Login here</p> --}}
                    <a class="username" href="/login">Login Here</a>
                @endauth
            @endif
        </div>
    </div>
</section>

<section class="main-content">

    @foreach($products as $product )
        <div class="card">
            <img src="{{ url('Style/pict/wayang.png') }}" alt="">
            <div href="#" class="card-content">
                <h2>{{ $product->name }}</h2>
                <h2>Rp. {{ $product->regular_price }}</h2>
                <form method="POST" action="">
                    @csrf
                    <input type="hidden" name="id_barang" value="{{ $product->id }}">
                    <input value="1" type="number" name="quantity">
                    <button>Masuk Keranjang</button>
                </form>
                <form action="{{ route('home.show', $product->slug) }}" method="GET">
                    @csrf
                    <a href=""><button>show detail</button></a>
                </form>
            </div>
        </div>
    @endforeach

    {{ $products->links() }}



</section>

<footer class="footer">
    <div class="footer-content">
        <div class="footer-logo">
            <a href="">Warisanify</a>
        </div>

        <div class="find-us">
            <h1>Find Us</h1>
            <ul class="find-us-list">
                <li><a href="">warisanify.id</a></li>
                <li><a href="">warisanify.id</a></li>
                <li><a href="">warisanify.id</a></li>
                <li><a href="">warisanify.id</a></li>
            </ul>
        </div>

        <div class="contact-us">
            <h1>Contact Us</h1>
            <a href="">warisanify@gmail.com</a>
        </div>
    </div>
</footer>
</body>

</html>
