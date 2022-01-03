<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" href="{{ url('css/shop.css') }}">
    <title>Shop</title>
</head>

<body>
    @if ($message = Session::get('success'))
    <script>
        alert('{{ $message }}');
    </script>
    @endif

</body>
    <nav class="navbar">
        <a class="logo" href="/">Warisanify</a>
        <ul class="nav-list">
            <li><a href="/">Home</a></li>
            <li><a href="/shop">Shop</a></li>
            <li><a href="/theater">Theater</a></li>
            <li><a href="/about">About</a></li>
        </ul>
    </nav>

    <section class="helper">
        <div class="search">
            <form action="shop" method="GET">
                <input name="search" type="text" placeholder="Search here">
                <button type="submit" class="search-button"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="right">
            <div class="cart">
                <img src="{{ url('pict/shopping-cart.png') }}" alt="" srcset="">
            </div>

            <a href="">
                <div class="profil">
                    <div class="circle">
                        {{-- <img src="" alt="" srcset=""> --}}
                        <i class="fas fa-user"></i>
                    </div>
                    @if (Route::has('login'))
                    @auth
                        {{ Auth::user()->username }}
                    @else
                        <p>Username</p>
                    @endauth
                    @endif
                </div>
            </a>
        </div>
    </section>

    <section class="main-content">


        @foreach ($keranjang as $p)
            {{-- @foreach ($p as $dataKeranjang)
            @endforeach --}}
            {{ $p->barang->id }}

        @endforeach
        {{-- @foreach ($keranjang as $dataKeranjang )
        <div class="card">
            <img src="{{ url('pict/wayang.png') }}" alt="">
            <div href="#" class="card-content">
                <h2>{{ $dataKeranjang->barang->namaBarang }}</h2>
                <a href="#">{{ $dataKeranjang->barang->kategori->namaKategori }}</a>
                <h2>Rp. {{ $dataKeranjang->barang->harga }}</h2>
                <form method="POST" action="{{ route('add-to-cart.store') }}">
                    @csrf
                    <input type="hidden" name="id_barang" value="{{ $dataKeranjang->barang->id }}">
                    <input value="1" type="number" name="jumlah_barang">
                    <button>Masuk Keranjang</button>
                </form>
            </div>
        </div>
        @endforeach --}}

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
